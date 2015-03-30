// Enemy Controller
// Description: Control component enemy logic, options and properties
// Based on code from http://walkerboystudio.com/html/unity_course_lab_4.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class Enemy : MonoBehaviour {

public enum EnemyState {
	moveLeft  = 0, 
	moveRight = 1,
	enemyDie  = 2,
	goHome 	  = 3
}
public EnemyState enemyState = EnemyState.moveLeft;	//starting state
	
public float moveSpeed			= 20.0f; 			//speed of enemy
public float attackMoveSpeed	= 35.0f;			//speed up before attacking Mario

public float attackRange		= 1.0f;				//set range for speed increase
public float searchRange		= 3.0f;				//set range for finding Hero
public float returnHomeRange	= 4.0f;				//how far from central point before enemy has to go home
public float changeDirectionDist= 0.5f;				//set distance to move past target
public float deathForce			= 3.0f;				//the force that Hero bumps off the enemy with, after hit
public bool gizmoToggle			= true;				//toggle the display of debug radius
public Transform chaseTarget;						//the tranform of the enemies target
public Transform homePos;							//load up home position

private CharacterController controller;
private Vector3 velocity	= Vector3.zero;			//a way to store the player's movement in velocity
private float gravity		= 70.0f;		

private bool isRight		= false;				//is facing right
private float resetMoveSpeed= 0.0f;					//used to reset the speed, after an enemy speeds up when it is close to Player
private float distToHome	= 0.0f;					//distance from enemy to its home position
private float distToTarget	= 0.0f;					//distance from enemy to its target
	
private GameObject playerLink;						//the Player gameObject	
private PlayerControls pControls;
private Animator anim;									
	
public AudioClip enemyDie;								//the audio clip to be played when the enemy dies


void Start ()
{
	resetMoveSpeed = moveSpeed;
	controller = GetComponent<CharacterController>();	
	anim = GetComponent<Animator>();
		
	playerLink = GameObject.FindGameObjectWithTag("Player");
	chaseTarget = playerLink.transform;
	pControls = playerLink.GetComponent<PlayerControls>();
}

void Update () 
{
	distToTarget = Vector3.Distance(chaseTarget.transform.position, transform.position); //hero's position, gumba's position
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
	
    void OnControllerColliderHit(ControllerColliderHit hit) {
		
        Rigidbody body = hit.collider.attachedRigidbody;
        if (body == null || body.isKinematic)
            return;
        
        if (hit.moveDirection.y < -0.3F)
            return;
        
		switch (enemyState)
		{
			case EnemyState.moveLeft:
				enemyState = EnemyState.moveRight;
				break;
			case EnemyState.moveRight:
				enemyState = EnemyState.moveLeft;
				break;
		}
    }	

	
void OnTriggerEnter(Collider other)
{
	if (other.tag == "playerCollisionBoxFeet")// || other.tag == "Player") //Player's feet
	{ 
		enemyState = EnemyState.enemyDie;
		pControls.applyExternalForce = true;
		pControls.velocity.y  = deathForce; //make Mario bounce in the air
	}
	else if (other.tag == "enemy" && other.collider != collider) //another enemy, pass by it, not collide
		Physics.IgnoreCollision(other.GetComponent<CharacterController>(), controller);
}
	
//move enemy right
void PatrolRight()
{
	velocity.x  = moveSpeed * Time.deltaTime; //positive because we are moving controller to the right
	//currentState = enemyState;
	if (!isRight)
		Flip();
}

//move the enemy left
void PatrolLeft()
{
	velocity.x  = -moveSpeed * Time.deltaTime; //negative because we are moving the controller to the left
	//currentState = enemyState;
	if (isRight)
		Flip();
}


//kill the enemy 
void Die()
{
	anim.SetBool("isDead", true);
	velocity.x = 0; //Stop
	AudioSource.PlayClipAtPoint(enemyDie, transform.position);
	StartCoroutine(MyDieCoroutine());
}


//chase hero, checks where hero is in relation to the gumba's position
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

//toggle the gizmos for the designerm to see ranges
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
		
	//have to switch the two collision boxes tags, so that the "left" box stays on the left, and the "right" on the right
	//http://answers.unity3d.com/questions/205391/how-to-get-list-of-child-game-objects.html
	 foreach (Transform child in transform)
	{
		if (child.gameObject.tag == "enemyCollisionLeft")
			child.gameObject.tag = 	"enemyCollisionRight";
		else if (child.gameObject.tag == "enemyCollisionRight")
			child.gameObject.tag = 	"enemyCollisionLeft";
	}
		
	// Multiply the player's x local scale by -1.
	Vector3 theScale = transform.localScale;
	theScale.x *= -1;
	transform.localScale = theScale;
}
	
IEnumerator MyDieCoroutine()
{
	Destroy(controller);
	//Physics.IgnoreCollision(playerLink.GetComponent<CharacterController>(), controller);
	//allow hero to move through character controller (which is still on the land while the sprite of the mouse is falling)
		
	BoxCollider boxCollider = gameObject.GetComponent<BoxCollider>(); //Casting. gumba's box colldier
	Destroy(boxCollider);
		
	//destroy the children boxColliders, so that the Player does not collide with them while the enemey is dying
	BoxCollider[] boxChildren = gameObject.GetComponentsInChildren<BoxCollider>();
	foreach (BoxCollider boxChild in boxChildren)
		Destroy(boxChild);
	
		
	yield return new WaitForSeconds(1.5f);		
	//http://answers.unity3d.com/questions/275343/destroy-parent-of-child-gameobject.html
   	GameObject parent =transform.parent.gameObject;
   	Destroy(parent);		
}
	
}
