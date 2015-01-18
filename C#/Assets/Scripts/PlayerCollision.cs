 //Player Colliser Attack Component
//Description: Checks for collision with enemy  objects and  sets states
//Instruction:  Assign to a child of the Player Character Controller which consists of:
//	- a boxCollider set to a trigger
//  - this script
//  - a rigidbody that does not have gravity
//Based on code from http://walkerboystudio.com/html/unity_course_lab_4.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class PlayerCollision : MonoBehaviour {
	
private PlayerProperties pProp;			//set for player properties
private PlayerControls pControls;
private GameObject playerLink;
private bool hitLeft		= false;	//toggle for hit left
private bool hitRight		= false;	//toggle for hit  right
private bool changeState	= false;	//toggle  for changing  player state

public float hitDistanceY	= 20.0f;	//the distance the Player is thrown back in the y-axis  
public float hitDistanceX	= 20.0f;	//the distance the Player is thrown back in the x-axis
public float hitTime		= 0.2f;		//time for pushing Player  back	
public AudioClip heroHurt;		
public AudioClip deadSound;
	
	// Use this for initialization
	void Start () {
		playerLink = GameObject.FindGameObjectWithTag("Player");
		pProp = playerLink.GetComponent<PlayerProperties>();
		pControls = playerLink.GetComponent<PlayerControls>();
	}
	
	void Update()
	{
		if (hitLeft){
			AudioSource.PlayClipAtPoint(heroHurt, transform.position); //"ow!"
			//push the player away from enemy towards the left
			playerLink.transform.Translate(new Vector3(-hitDistanceX * Time.deltaTime, hitDistanceY * Time.deltaTime, 0)); //move Player back the hitDistance. Negative because of left dir
		}
		else if (hitRight){
			AudioSource.PlayClipAtPoint(heroHurt, transform.position); //"ow!"
			//push the player away from enemy towards the right
			playerLink.transform.Translate(new Vector3(hitDistanceX * Time.deltaTime, hitDistanceY * Time.deltaTime, 0)); //move Player back the hitDistance. Negative because of left dir
		}
		
		//player getting hit on either side, and state is PlayerSmall
		if ((hitRight || hitLeft) && (int)pProp.playerState == 1)
		{
			changeState = true;
		}
		if (changeState)
			ChangePlayerState();
	}
	
	void OnTriggerEnter (Collider other) //Player has the trigger box.  The gumba (other) enters the box
	{
		if (other.tag  == "enemyCollisionLeft")
		{
			hitLeft = true;
			//print ("enemey left - in trigger box");
			
			AudioSource.PlayClipAtPoint(heroHurt, transform.position); //"ow!"
			//push the player away from enemy towards the left
			//playerLink.transform.Translate(new Vector3(-hitDistanceX * Time.deltaTime, hitDistanceY * Time.deltaTime, 0)); //move Player back the hitDistance. Negative because of left dir
			//using a transform works, but if the user holds down the a button, walking towards the enemy, bumping into it several times, the player is then thrown off to the extremem right of left
			pControls.applyExternalForce = true;
			pControls.velocity = new Vector3(-hitDistanceX, hitDistanceY, 0);			
		}
		else if (other.tag  == "enemyCollisionRight")
		{
			hitRight = true;
			//print ("enemey right - in trigger box");
			
			AudioSource.PlayClipAtPoint(heroHurt, transform.position); //"ow!"
			//push the player away from enemy towards the right
			pControls.applyExternalForce = true;
			pControls.velocity = new Vector3(hitDistanceX, hitDistanceY, 0);
		}
	}
	
	void OnTriggerExit(Collider other) 
	{
		if (other.tag  == "enemyCollisionLeft")
		{
			hitLeft = false;
			changeState = true; //Player has already been moved over by now
//			print ("enemey left - out of trigger box");
		}
		else if (other.tag  == "enemyCollisionRight")
		{
			hitRight = false;
			changeState = true; //Player has already been moved over by now
			//print ("enemey left - out of trigger box");
		}
	}
	
		//player getting hit on either side, and state is PlayerSmall
	void HitDead()
	{
		if ((hitRight || hitLeft) && (int)pProp.playerState == 1) //marioSmall
		{
			changeState = true;
		}
	}
	
	void ChangePlayerState()
	{
		//the change from playerState.PlayerDead is handled in playerProperties. There must be a delay between the changing of states, so that an empty heart icon may be temporarily disaplayed in the hud
		if ((int)pProp.playerState == (int)PlayerProperties.PlayerState.PlayerSmall)
		{
			pProp.isDead = true;
			pProp.playerState = PlayerProperties.PlayerState.PlayerDead; //die
		}
		else if ((int)pProp.playerState == (int)PlayerProperties.PlayerState.PlayerLarge)
		{
			pProp.playerState = PlayerProperties.PlayerState.PlayerSmall; //change from large to small state
		}

		pProp.changePlayer = true;
		changeState = false;

	}

}
