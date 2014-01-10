using UnityEngine;
using System.Collections;

public class enemy : MonoBehaviour {

	// Gumba Controller
//Description: Control component enemy gumba logic, options and properties

public enum EnemyState {
	moveLeft  = 0, 
	moveRight = 1,
	moveStop  = 2,
	jumpAir   = 3,
	enemyDie  = 4,
	goHome 	  = 5,
	falling   = 6
}

public float moveSpeed			= 20.0f; 	//speed of gumba
public float attackMoveSpeed	= 35.0f;		//speed up before attacking Mario
public float jumpSpeed			= 3.0f; 		//equal to jump height
public EnemyState enemyState = EnemyState.moveLeft;		//starting state
public float attackRange		= 1.0f;		//set range for speed increase
public float searchRange		= 3.0f;		//set ranfe for finding Mario
public float returnHomeRange	= 4.0f;		//how far from central point before gumba has to go home
public float changeDirectionDist= 0.5f;		//set distance to move past target
public Transform chaseTarget;				//load up player/Mario target
public Transform homePos;			//load up home position
public float deathForce			= 3.0f;		//the force that Mario bumps off the gumba with
public bool gizmoToggle			= true;	//toggle the display of debug radius

//var sound				: AudioClip;		//sound of Mario jumping on gumba
//var soundDelay			: float = 0.0;		//amount of time to delay before playing sound again
//var soundRate			: float = 0.0;		//variable holds current time & delay amount

private Vector3 velocity	= new Vector3(0f,0f,0f);//a way to store the player's movement in velocity. A lot like Mario's player control
private float gravity		= 20.0f;		
private EnemyState currentState;
private bool isRight		= false;	//is facing right
private Vector3 myTransform;			//store initial position
private float resetMoveSpeed= 0.0f;
private float distToHome	= 0.0f;
private float distToTarget	= 0.0f;
private CharacterController controller;
	
private playerProperties linkToPlayerProperties;
private playerControls pControls;
private Animator anim;					// Reference to the player's animator component.
private GameObject playerLink;	
	
	
void Start ()
{
	myTransform = transform.position; //starting pos of gumba
	resetMoveSpeed = moveSpeed;
	linkToPlayerProperties = GetComponent<playerProperties>(); //Mario's properties?
	controller = GetComponent<CharacterController>();	
	anim = GetComponent<Animator>();
		
	//get the same gravity value that we are applying to the player
	playerLink =  GameObject.Find("hero");
	pControls = playerLink.GetComponent<playerControls>();
	gravity = 70;//pControls.gravity; //works for  single instance only
		//print (gameObject.transform.name + " gravity " + gravity);
			//print (gameObject.transform.name + " isGrounded " + controller.isGrounded)
}

void Update () 
{
	distToTarget = Vector3.Distance(chaseTarget.transform.position, transform.position); //mario's position, gumba's position
	velocity	= new Vector3(0f,0f,0f);
		
	if (enemyState != EnemyState.enemyDie) //don't reassign a state to the enemy if the enemy has been set to Die in OnTriggerEnter
	{
		if (distToTarget <= searchRange)
		{
			ChasePlayer();
			if (distToTarget <= attackRange)
			{
				ChasePlayer();
				moveSpeed = attackMoveSpeed;		
			}
			else
			{
				ChasePlayer();
				moveSpeed = resetMoveSpeed; //set the speed back to the original			
			}
		}
		else
		{
			distToHome = Vector3.Distance(homePos.position, transform.position);
			if (distToHome > returnHomeRange)
			{
				GoHome();
			}
		}
	}
		
		
	if (controller && controller.isGrounded) //added (controller, as this is destroyed in Die())
	{
		switch (enemyState)
		{
			case EnemyState.moveLeft:
				PatrolLeft();
				break;
			case EnemyState.moveRight:
				PatrolRight();
				break;
//			case EnemyState.moveStop:
//				if (isRight)
//					IdleRight();
//				else
//					IdleLeft();
//				break;
//			case EnemyState.jumpAir:
//				if (isRight)
//					JumpRight();
//				else
//					JumpLeft();
//				break;
			case EnemyState.enemyDie:
				Die();
				break;
			case EnemyState.goHome:
				GoHome();
				break;
		}
	}
	
	if(controller)
		{
	velocity.y -= gravity * Time.deltaTime; //apply gravity
	controller.Move(velocity * Time.deltaTime); //move the controller
		}
}

void OnTriggerEnter(Collider other)
{
//	//when he hits a trigger box
//	if (other.tag == "pathNode")
//	{
//		var linkToPathNode = other.GetComponent(pathNode); //pathNode.js
//		enemyState = parseInt(linkToPathNode.pathInstruction); //parseInt, because they are different enum types
//		if (linkToPathNode.overrideJump)
//		{
//			jumpSpeed = linkToPathNode.jumpOverride;
//		}
//	}
//	else 
		
	print (other.tag);	

	if (other.tag == "playerCollisionBoxFeet")// || other.tag == "Player") //Player's feet
	{ 
			enemyState = EnemyState.enemyDie;

		//want to push Mario back up with a force after jumping on gumba
		//PlaySound (bounceHit, soundDelay);
		pControls.velocity.y  = deathForce; //make Mario bounce in the air
		//pControls.velocity.x = 50;//pControls.moveDirection * pControls.walkSpeed;
				//print ("isDead - bounce " + enemyState);
			print (pControls.velocity);
		//pControls.anim.SetBool("Jump", true); //doesn't seem to make any difference
//		audio.clip = sound;
//		audio.Play();

		

		
	//removed code to do with deleting the boxCollider. Didn't seem necessary
	}
	else if (other.tag == "enemy") //another gumba, pass by it, not collide
	{
		if (other.collider != collider)
		{
			//Physics.IgnoreCollision(other.collider,  collider); //doesn't work
			Physics.IgnoreCollision(other.GetComponent<CharacterController>(), controller); //it works!
		}
	}
	else
		{
			print(other.tag);
		}
		

}

//move gumba right
void PatrolRight()
{
	velocity.x  = moveSpeed * Time.deltaTime; //positive because we are moving controller to the right
	currentState = enemyState;
	if (!isRight)
		Flip();
}

//move the enemy left
void PatrolLeft()
{
	velocity.x  = -moveSpeed * Time.deltaTime; //negative because we are moving the controller to the left
	currentState = enemyState;
	if (isRight)
		Flip();
}

////set movement to 0, and face right
//void IdleRight()
//{
//	velocity.x  = 0; //not moving
//	currentState = enemyState;
//	if (!isRight)
//		Flip();
//}
//
////set movement to 0, and face left
//void IdleLeft()
//{
//	velocity.x  = 0; //not moving
//	currentState = enemyState;
//	if (isRight)
//		Flip();
//}

////jumps in the air to the right
//void JumpRight()
//{
//	velocity.y = jumpSpeed; //move up
//	enemyState = currentState; //store to go back to the previous state after the jump is done
//	if (!isRight)
//		Flip();
//}
//
////jumps in the air to the left
//void JumpLeft()
//{
//	velocity.y = jumpSpeed; //move up
//	enemyState = currentState; //store to go back to the previous state after the jump is done
//	if (isRight)
//		Flip();
//}

//kill the gumba 
void Die()
{
	anim.SetBool("isDead", true);
	velocity.x = 0; //Stop
	StartCoroutine(MyCoroutine());
}


//chase Mario, checks where Mario is in relation to the gumba's position
void ChasePlayer()
{
	if (transform.position.x <= chaseTarget.position.x - changeDirectionDist)
	{
		enemyState = EnemyState.moveRight;
	}
	else if (transform.position.x >= chaseTarget.position.x + changeDirectionDist)
	{
		enemyState = EnemyState.moveLeft;
	}
}

//send gumba back to the start position (home node)
void GoHome()
{
	if (transform.position.x <= homePos.position.x) //home position is to the right
	{
		enemyState = EnemyState.moveRight;
	}
	else if (transform.position.x > homePos.position.x) //home position is to the left
	{
		enemyState = EnemyState.moveLeft;
	}
}

//toggle the gizmos for the designer to see ranges
void OnDrawGizmos ()
{
	if (gizmoToggle)
	{
		Gizmos.color = Color.red;
		Gizmos.DrawWireSphere(transform.position, attackRange);
		Gizmos.color = Color.blue;
		Gizmos.DrawWireSphere(transform.position, searchRange);
		Gizmos.color = Color.green;
		Gizmos.DrawWireSphere(homePos.position, returnHomeRange);
	}
}

void Flip ()
{
	// Switch the way the player is labelled as facing.
	isRight = !isRight;

	// Multiply the player's x local scale by -1.
	Vector3 theScale = transform.localScale;
	theScale.x *= -1;
	transform.localScale = theScale;
}
	
//function PlaySound (soundName, soundDelay)
//{
//	if (!audio.isPlaying && Time.time > soundRate) 
//	{
//		soundRate = Time.time + soundDelay;
//		audio.clip = soundName;
//		audio.Play();
//	}
//	yield WaitForSeconds (audio.clip.length); //sound doesn't play if this line is in PlaySound()
//		
//}
	
	 IEnumerator MyCoroutine()

    {
		Destroy(controller);
		//Physics.IgnoreCollision(playerLink.GetComponent<CharacterController>(), controller);
		//allow hero to move through character controller (which is still on the land while the sprite of the mouse is falling)
		
		
		BoxCollider boxCollider = gameObject.GetComponent<BoxCollider>(); //Casting. gumba's box colldier
		Destroy(boxCollider);

		yield return new WaitForSeconds(1.5f);
		Destroy(gameObject);
    }
}
