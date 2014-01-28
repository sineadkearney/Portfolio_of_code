using UnityEngine;
using System.Collections;

public class playerProperties : MonoBehaviour {

	
//Player Properties component
//Description: Set and stores the pickups and the state of player


public enum PlayerState  
{ 
	PlayerDead 	= 0, 
	PlayerSmall 	= 1, 	//mario size is small
	PlayerLarge  = 2,  	// "     "    " large
	PlayerFire	= 3,	//enable fireball power
	PlayerSwim 	= 4
}

public PlayerState playerState = PlayerState.PlayerSmall; //at initial start (if enabled) and in the inspector

public int lives			= 3;
public int coins 			= 0;
public bool changePlayer		= false; //could set through inspector
//public bool hasFire			= false;
public bool isSwimming 		= false;
	
	
int key 					= 0; //if you want, mario can collect keys to get past bits int level
//GameObject projectileFire;
//Transform projectileSocketRight;	//the spot for fireball  from the right
//Transform projectileSocketLeft;	//spot for fireball  from the left

private Animator anim;					// Reference to the player's animator component


AudioClip soundDie;
private float soundRate		= 0.0f;
private float soundDelay	= 0.0f;


private int coinLife 		= 20; //lower for test, usually 100. extra life by coins
private bool canShoot		= false;
private bool isDead			= false;
	
void Start()
{
		anim = GetComponent<Animator>();
		coins = PlayerPrefs.GetInt("playerCoins");
		if (PlayerPrefs.HasKey("playerLives"))
		{
			lives = PlayerPrefs.GetInt("playerLives");
		} //else stays 3
}
	
void Update()
{
	//var playerControls = GetComponent("playerControls");
	playerControls playerControls = GetComponent<playerControls>();
		//public Force script;
		//script = GetComponent<Force>();
		//script called "Force"
		
	PlayerLives();	//check if lives == 0. if true, so lose screen
	
	if (changePlayer)
	{
		SetPlayerState();
	}
	
	if (canShoot)
	{
//		var clone; //used to instantiate object
//		if (Input.GetButtonDown("Fire1") && projectileFire && playerControls.moveDirection == 0)
//		//if presses button, and there is an object set in the inspector, and facing left
//		{
//			clone = Instantiate (projectileFire, projectileSocketLeft.transform.position, transform.rotation);
//			//clone.rigidbody.AddForce( -90, 0, 0); //gives it force, otherwaire fireball will just drop down
//			clone.GetComponent(projectileFireball).moveSpeed = -2.0; //get instance of projectFireball.js
//		}
//		else if (Input.GetButtonDown("Fire1") && projectileFire && playerControls.moveDirection == 1)
//		//if presses button, and there is an object set in the inspector, and facing right
//		{
//			clone = Instantiate (projectileFire, projectileSocketRight.transform.position, transform.rotation);
//			//clone.rigidbody.AddForce( 90, 0, 0);
//			clone.GetComponent(projectileFireball).moveSpeed =  2.0;
//		}
	}
	else
		return;

}


public void AddKeys(int numKey) //accessed by item_pickup
{
	key += numKey;
}


public void  AddCoin(int numCoin)//accessed by item_pickup
{
	coins += numCoin;
}

void SetPlayerState()
{
	//note that controller is the green box thing around Player
	//get acces to Player Controls, so we can grab our character
//	var playerControls = GetComponent("playerControls");
		playerControls playerControls = GetComponent<playerControls>();
//	var charController = GetComponent(CharacterController);
		CharacterController charController = GetComponent<CharacterController>();
	
	switch (playerState)
	{
		case PlayerState.PlayerSmall : //no material swap, just scaling down
			playerControls.gravity = 0.0f; //turn off gravity
			
			
			transform.Translate(0f, 0.2f, 0f);
			transform.localScale = new Vector3 (1.0f, 0.7f, 1.0f);
			
			//scale down char controller height to prevent that tiny gap under the feet
			charController.height = 0.42f; //previously 0.5
			//transform.renderer.material = materialPlayerStandard;
			playerControls.gravity = playerControls.landGravityReset; //turn it back to the gravity. Should be set in the inspector, bad to hard code

			canShoot = false;
			changePlayer = false;
			break;
		case PlayerState.PlayerLarge :
			playerControls.gravity = 0.0f; //turn off gravity
			isSwimming = false;
			
			transform.Translate(0f, .2f, 0f);
			transform.localScale = new Vector3 (1.0f, 1.0f, 1.0f);
			//transform.renderer.material = materialPlayerStandard;
			
			charController.height = 0.5f; //change bac to original height
			playerControls.gravity = playerControls.landGravityReset; //turn it back to the gravity. Should be set in the inspector, bad to hard code

			canShoot = false;
			changePlayer = false;
			isSwimming = false;
			break;
		case PlayerState.PlayerFire :
//			transform.localScale = new Vector3 (1.0f, 1.0f, 1.0f);
//			transform.renderer.material  = materialPlayerFire;
//			canShoot = true;
//			changePlayer = false;
			break;
		case PlayerState.PlayerSwim :
			isSwimming = true;
			//playerControls.gravity = 0.0f; //turn off gravity

			
//			transform.localScale = new Vector3 (1.0f, 1.0f, 1.0f);
			//transform.renderer.material  = materialDiddySwim;
//			canShoot = true;
//			playerControls.gravity = playerControls.waterGravityReset;
			changePlayer = false;
			 
			break;
		case PlayerState.PlayerDead :
			isSwimming = false;
			playerControls.gravity = 0.0f; //turn off gravity

			this.transform.Translate(0f,  3 * Time.deltaTime, 0f); //move Player up into the air
			
			//this.transform.position.z = -1; //move  Player closer to camera slightly
			this.transform.position = new Vector3 (this.transform.position.x, this.transform.position.y, -1f); //move  Player closer to camera slightly
			
//			yield WaitForSeconds (0.4); //hold in air
			playerControls.gravity = playerControls.landGravityReset; //turn it back to the gravity. Should be set in the inspector, bad to hard code

//			yield WaitForSeconds (2); //wait until player has left the screen
			
			if (isDead)
			{
				lives--; //subtract a life
				this.transform.position = GetComponent<spawnSaveSetup>().curSavePos;
				//this.transform.position = GetComponent(spawnSaveSetup).curSavePos;
				playerState = PlayerState.PlayerSmall;
				changePlayer = true;
				isDead = false;
			}

			changePlayer = false;		
			break;
	}
		
		anim.SetBool("isSwimming", isSwimming);
		playerControls.isSwimming = isSwimming;
}

void PlaySound (AudioClip soundName, float soundDelay)
{
	if (!audio.isPlaying && Time.time > soundRate) 
	{
		soundRate = Time.time + soundDelay;
		audio.clip = soundName;
		audio.Play();
	}
//	yield WaitForSeconds (audio.clip.length); //sound doesn't play if this line is in PlaySound()
		
}

void PlayerLives()
{
//	if (lives == 0)
//	{
//		PlaySound(soundDie, 0);
//		yield WaitForSeconds(3); //length of file
//		Application.LoadLevel("2D Mario Screen Lose");
//	}
}
//@script AddComponentMenu("WalkerBoys/Actor/Player Properties  Script") //assign script to the menu (of unity)
}

