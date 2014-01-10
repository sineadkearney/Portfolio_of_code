using UnityEngine;
using System.Collections;

public class playerControls : MonoBehaviour {
	
	public PointManController kpc;
	
	public float  walkSpeed = 1.5f; //m  per sec, standard walk
	public float  runSpeed  = 2.0f;
	public float  fallSpeed = 2.0f; //falling off an object
	public float  swimSpeed = 5.0f;
	
	public float  walkJump = 30.0f;
	public float  runJump = 40.0f;
	public float  crouchJump = 50.0f;
	private float enhanceJumpX = 1f; //Mario jumps over (on the x-axis) more than the default
	
	public float  landGravityReset = 70.0f;
	//public float  waterGravityReset = 10.0f;
	public float  gravity = 0.0f;

	
	public float  startPos = 0.0f; //where Mario starts the level
	public int moveDirection = 1; //which way he's facing. -1= left, 1 = right, default 1;
	public bool useKinect = true; //toggle to use the input from the Kinect, or if false, use input from the keyboard only (for debugging)	
	
	public AudioClip soundJump;
	public AudioClip soundCrouchJump;		
	public float  soundRate = 0.0f;
	public float  soundDelay = 0.0f;
		
	public Vector3 velocity = new Vector3(0,0,0); //public as it is accessed by enemy.cs
	
	private bool jumpEnable = false; //only chnage when key is pressed
	private bool runJumpEnable = false;
	private bool crouchJumpEnable = false;
	private bool isWalking = false;
	private bool isRunning = false;
	private bool isCrouching = false;
	private float afterHitForceDown = 1.0f; //used when player collides with a box, etc
	

	
	//new
	public Animator anim;					// Reference to the player's animator component. Accessed when enemy dies, throwing character into the air slightly
	public bool isFacingRight = true; //toggle for whatever direction Mario is facing
	//public bool turnRight = false; //set by the Kinect camera. If the user is pointing right, true
	public int KinectMoveDirection = 1; // set by the Kinect camera, 1 = right, -1 = left
	public bool isSwimming = false;
	
	void Start()
	{
		gravity = landGravityReset;
		//StartCoroutine(MyMethod());
		//add a delay to allow kinect skeleton to form?
		anim = GetComponent<Animator>();
	}
	
	
	// Update is called once per frame
	void Update ()
	{
		CharacterController controller = GetComponent<CharacterController>();	
		
		
		if (!isSwimming) //Mario is walking on land
		{
			gravity = landGravityReset;
			//print ("isGrounded " + controller.isGrounded);

			if (controller.isGrounded) //is the character controller touching the ground (collision box), or in the air
				//TODO: when walking down a slope, isGrounded is false, but is true when stopped moving
			{
				//reset
				jumpEnable = false;
				runJumpEnable = false;
				crouchJumpEnable = false; 
				isCrouching = false;

				startPos = transform.position.y; //this will be used when zooming the camera, to subtract from onzooming in and out 
					
				velocity = new Vector3(0, 0,0);
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
					velocity.x = Input.GetAxis("Horizontal"); //note:  not  Vector3
					velocity.y = Input.GetAxis("Vertical");
					
					isWalking = ((velocity.x < 0) || (velocity.x > 0)) && !Input.GetButton("Fire1");
					isRunning = ((velocity.x < 0) || (velocity.x > 0)) && Input.GetButton("Fire1");
				}
				
				 //idle by default
					
				//walk
				if (isWalking)
				{
					velocity.x *= walkSpeed; //allows us to control speed
				}
				else if (isRunning)
				{
					velocity.x *= runSpeed; //allows us to control speed
				}

				//jump
				if (velocity.y > 0 && isRunning)// && (useKinect || Input.GetButtonDown("Vertical")))
				{
					
					velocity.y = runJump; //allows us to control speed	
					jumpEnable = true;
				}
				else if (velocity.y > 0)// && (useKinect || Input.GetButtonDown("Vertical")))
				{
					velocity.y = walkJump;
					jumpEnable = true;
				}

								
				//crouch
				//Note: if  no  skeleton  connected to Kinect,  kinectVert = -1 will be the defualt state
				else if (velocity.y < 0 && velocity.x == 0) //have to be stopped, and if you're pushing down
				{
					velocity = new Vector3(0,0,0); //as long as player is crouched, can't move
					isCrouching = true;
				}
				
				//set values to select animation to play
				anim.SetBool("Jump", jumpEnable || runJumpEnable || crouchJumpEnable);
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
						velocity.x = moveDirection*enhanceJumpX;
					}
					else
					{
						velocity.x = kpc.pointingDirection*enhanceJumpX;//kpc.moveDirection;
					}
	
				}
				else //!useKinect
				{		
					velocity.x = Input.GetAxis("Horizontal"); //note:  not  Vector3
					//can change the direction while in the air
				}
				
				
				if (jumpEnable && moveDirection == -1) //jump left
				{
					velocity.x *= walkSpeed; //can use a different walkSpeed if moving on the x-axis while jumping, is slower/faster than when walking
				}
				else if (jumpEnable && moveDirection == 1) //jump right
				{
					velocity.x *= walkSpeed; //can use a different walkSpeed if moving on the x-axis while jumping, is slower/faster than when walking
				}
			}
			

			
			if (controller.collisionFlags == CollisionFlags.Above) //collision when jumping
			{
				velocity.y = 0 - afterHitForceDown; //apply downward force, so player doesn't hang in air
			}
				

			velocity.y -= gravity * Time.deltaTime; //grab the y-axis, gravity for going down
			
			//TODO have a check for isFalling? Make player fall faster?
			
		}
		else //isSwimming
		{
			anim.SetBool("isSwimming", true);
			
			if (useKinect)
			{
				velocity.x = kpc.kinectHorz;
				velocity.y = kpc.kinectVert;
			}
			else  //!useKinect
			{
				velocity.x = Input.GetAxis("Horizontal"); //note:  not  Vector3
				velocity.y = Input.GetAxis("Vertical");
			}		
			velocity *= swimSpeed;
		}
		
		//set moveDirection so it can be compared to isFacingRight, and therefore check if the sprite needs to be flipped
		if (useKinect)
		{
			moveDirection = kpc.moveDirection;	
		}
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
		
//		print("velocity: " + velocity);
		controller.Move(velocity * Time.deltaTime); //move the controller
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
	
	

//		 private IEnumerator Wait(float seconds)
//
//    {
//
//        Debug.Log("waiting");
//
//        yield return new WaitForSeconds(seconds);
//
//        Debug.Log("wait end");
//
//    }
//	
//	void PlaySound(AudioClip soundName, float soundDelay) //name of file (soundJump), soundDelay
//{
//	if (!audio.isPlaying && Time.time > soundRate) 
//	{
//		soundRate = Time.time + soundDelay;
//		audio.clip = soundName;
//		audio.Play();
//		WaitForSeconds (audio.clip.length);
//	}
//}
//
//		 IEnumerator MyMethod() {
//    //Debug.Log("Before Waiting 2 seconds");
//    yield return new WaitForSeconds(2);
//    //Debug.Log("After Waiting 2 Seconds");
//    }
}

