//Description: the controls for moving the Player. Takes input from either keyboard or the Kinect (via the PointManController)
//Instructions: attach to the characterController for the Player
//Based on code from http://walkerboystudio.com/html/unity_course_lab_4.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class PlayerControls : MonoBehaviour {
		
	public float crouchWalkSpeed = 5.0f;
	public float walkSpeed = 7.0f; //m  per sec, standard walk
	public float runSpeed  = 12.0f;
	public float walkJumpHeight = 30.0f;
	public float runJumpHeight = 35.0f;
	public float changeJumpDirKinect = 5.0f; //Mario jumps over (on the x-axis) more than the default
	public float gravity = 70.0f;	
	public float startPos = 0.0f; //where Player starts the level
	public int moveDirection = 1; //which way he's facing. -1= left, 1 = right, default 1. Used with the Kinect, when jumping to the right or left
	public int KinectMoveDirection = 1; // set by the Kinect camera, 1 = right, -1 = left
	public bool applyExternalForce = false; //true when another gameobject is pushing the player up/back. Else false.
	public bool isFacingRight = true; //toggle for whatever direction Mario is facing	
	public AudioClip soundJump;	
	public Vector3 velocity = Vector3.zero; //public as it is accessed by enemy.cs
	//and anything else that applies an external force to the player	
	
	private bool isJumping = false;			//true if is currently jumping, else false
	private bool isWalking = false;			//true if is currently walking, else false
	private bool isRunning = false;			//true if is currently running, else false
	private bool isCrouching = false;		//true if is currently crouching, else false
	private bool wasCrouching = false; 		//used to compare if in the previous frame, the character was crouching (regardless of value of isCrouching)
	private bool useKinect = false; 		//toggle to use the input from the Kinect, or if false, use input from the keyboard only (for debugging)	
	private bool increaseJumpWidth = false; 	//increase the x-axis value of a jump when running
	private float afterHitForceDown = 1.0f; //used when player collides with a box, etc
	
	private Vector3 initialControllerCenter = Vector3.zero;//the initial (x,y,z) co-ordinates of the characterController 
	private float initialControllerHeight = 0.0f;	//the initial height of the characterController 
	private CharacterController controller;
	private PointManController kpc; 
	private Animator anim;					// Reference to the player's animator component
	
	//public bool isSwimming = false;
	//public float  swimSpeed = 20.0f;

	
	void Start()
	{
		anim = GetComponent<Animator>();
		kpc = GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>();
		controller = GetComponent<CharacterController>();
		initialControllerHeight = controller.height;
		initialControllerCenter = controller.center;
		wasCrouching = false;
	}
	
	
	
	// Update is called once per frame
	void Update ()
	{	
		useKinect = PlayerPrefs.GetInt("useKinect") == 1; //1 = using the Kinect, 0 = not using the Kinect
		
		if (!applyExternalForce) 
			//if no external force is acting on the hero, the user is able to input movements. Else the user has to wait until the hero has landed on the grounded
		{
//			if (!isSwimming) //Mario is walking on land
//			{
//				gravity = landGravityReset;
//				//print ("isGrounded " + controller.isGrounded);
				
				if (controller.isGrounded) //is the character controller touching the ground (collision box), or in the air
					//TODO: when walking down a slope, isGrounded is false, but is true when stopped moving
				{
					//reset
					isJumping = false;
					isCrouching = false;
					increaseJumpWidth = false;
				
					startPos = transform.position.y; //this will be used when zooming the camera, to subtract from onzooming in and out 
						
					//velocity = new Vector3(0, 0,0);
					//if declared outside this if-statement, resets on each frame, so the y value is carried across, and Player falls very slowly
					
					if (useKinect)
					{
						velocity.x = kpc.kinectHorz;
						velocity.y = kpc.kinectVert;
						
						isWalking = kpc.isWalking;
						isRunning = kpc.isRunning;
					}
					else //!useKinect
					{
						velocity.x = Input.GetAxis("Horizontal");
						velocity.y = Input.GetAxis("Vertical");
						
						
						isWalking = (velocity.x != 0 && !Input.GetButton("Fire1"));
						isRunning = (velocity.x != 0 && Input.GetButton("Fire1"));
					}
					isCrouching = velocity.y < 0;
					 //animation idle by default
					
					controller.height = initialControllerHeight;
					controller.center = initialControllerCenter;
				
					//crouch
					//Note: if  no  skeleton  connected to Kinect,  kinectVert = -1 will be the defualt state
					if (isCrouching && !isWalking)// && velocity.x == 0) //have to be stopped, and if you're pushing down
					{
						if (isRunning)//you can't run while crouching, but you can walk
						{
							isRunning = false;
							isWalking = true;
						}
						velocity.x *= crouchWalkSpeed;
						controller.height  = (initialControllerHeight/3) * 2; //2 thirds of initial height
					}
					else if (isCrouching && isWalking)
					{
						isRunning = false; //you can't run while crouching, but you can walk
						velocity.x *= crouchWalkSpeed;
						controller.height  = (initialControllerHeight/3) * 2; //2 thirds of initial height
					}
					//walk
					else if (isWalking)
					{
						velocity.x *= walkSpeed; //allows us to control speed
					}
					else if (isRunning)
					{
						velocity.x *= runSpeed; //allows us to control speed
					}
	
				
					if (wasCrouching &&  !isCrouching)
					{
						//the player was crouching, but is no longer. We need to raise the character slightly, to prevent it from falling through the ground
						transform.Translate(0f, 1.0f, 0f);
					}
					
				
					//jump
					if ((useKinect && velocity.y > 0 && isRunning) 
					|| (!useKinect && velocity.y > 0 && Input.GetButtonDown("Vertical") && isRunning)) //have to do an additional check if !useKinect, so that hero jumps only once when "Vertical" key is held down
					
					{
						AudioSource.PlayClipAtPoint(soundJump, transform.position);
						velocity.y = runJumpHeight; //allows us to control speed
						increaseJumpWidth = true;
						isJumping = true;
					}
					if ((useKinect && velocity.y > 0) 
					|| (!useKinect && velocity.y > 0 && Input.GetButtonDown("Vertical"))) //have to do an additional check if !useKinect, so that hero jumps only once when "Vertical" key is held down
					{
						AudioSource.PlayClipAtPoint(soundJump, transform.position);
						velocity.y = walkJumpHeight;
						isJumping = true;
					}
						
					//set values to select animation to play
					anim.SetBool("Jump", isJumping);
					anim.SetBool("Crouch", isCrouching);
					anim.SetBool("Walking", isWalking);
					anim.SetBool("Running", isRunning);
		
				}
				else //(!controller.isGrounded)
				{
					if (useKinect)
					{
						if (kpc.jumpStraightUp)
						{
							velocity.x = 0; //jump straight up, not to a direction
						}
						else if (kpc.pointingDirection == 0)
						{
							//the user is not pointing in a direction
							velocity.x = moveDirection*changeJumpDirKinect;
						}
						else
						{
							velocity.x = kpc.pointingDirection*changeJumpDirKinect;//kpc.moveDirection;
						}
		
					}
					else if (!useKinect && increaseJumpWidth)
						velocity.x = Input.GetAxis("Horizontal") * runSpeed;
					else //!useKinect && !increaseJumpX		
						velocity.x = Input.GetAxis("Horizontal") * walkSpeed;		
				}				
					
				if (controller.collisionFlags == CollisionFlags.Above) //collision when jumping
					velocity.y = 0 - afterHitForceDown; //apply downward force, so player doesn't hang in air					
	
				velocity.y -= gravity * Time.deltaTime; //grab the y-axis, gravity for going down
//			}
//			else //isSwimming
//			{
//				anim.SetBool("isSwimming", true);
//				
//				if (useKinect)
//				{
//					velocity.x = kpc.kinectHorz;
//					velocity.y = kpc.kinectVert;
//				}
//				else  //!useKinect
//				{
//					velocity.x = Input.GetAxis("Horizontal"); //note:  not  Vector3
//					velocity.y = Input.GetAxis("Vertical");
//				}		
//				velocity *= swimSpeed;
//			}
			
			//set moveDirection so it can be compared to isFacingRight, and therefore check if the sprite needs to be flipped
			if (useKinect)
				moveDirection = kpc.moveDirection;	
			else {
				//get last move direction
				if (velocity.x < 0) {
					moveDirection = -1;//left
				}
				else if (velocity.x > 0) {
					moveDirection = 1;//right
				}
			}
			
			
			// If the input is moving the player right and the player is facing left...
			// Or if the input is moving the player left and the player is facing right...
			if((moveDirection == 1 && !isFacingRight) || (moveDirection == -1 && isFacingRight)	)
				Flip(); //flip the player
				
			
		}
		else //apply external force
		{
			velocity.y -= gravity * Time.deltaTime; //grab the y-axis, gravity for going down
			if (controller.isGrounded) //is the character controller touching the ground (collision box), or in the air
				applyExternalForce = false; //only allow for the user to change their velocity once they have landed on the ground
			
		}
		
		if (controller.enabled) //controller is disable when the Player dies
			controller.Move(velocity * Time.deltaTime); //move the controller
		wasCrouching = isCrouching;
	}
	
	
		void Flip ()
	{
		// Switch the way the player is labelled as facing.
		isFacingRight = !isFacingRight;

		// Multiply the player's x local scale by -1.
		Vector3 theScale = transform.localScale;
		theScale.x *= -1;
		transform.localScale = theScale;
	}
}