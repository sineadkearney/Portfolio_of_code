//Player Properties component
//Description: Set and stores the pickups and the state of player
//Instructions: attach to the characterController for the Player
//Based on code from http://walkerboystudio.com/html/unity_course_lab_4.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class PlayerProperties : MonoBehaviour {


public enum PlayerState  
{ 
	PlayerDead 	= 0, 	//Player has died
	PlayerSmall = 1, 	//Player has one hit left before dying
	PlayerLarge  = 2,  	//Player has one hit left before dying
}

public PlayerState playerState; //at initial start (if enabled) and in the inspector

public int lives			= 3;
public int coins 			= 0;
private int coinLife 		= 10; //lower for test, usually 100. extra life by coins
public bool changePlayer	= false; //could set through inspector
public bool isDead			= false; //accessed by playerCollision.cs

private Animator anim;					// Reference to the player's animator component

public AudioClip gainLife;
public AudioClip soundDie;

private HudController hud;
private	CharacterController charController;
		
void Start()
{
		playerState = (PlayerState)PlayerPrefs.GetInt("playerState");
		changePlayer = true;
		
		anim = GetComponent<Animator>();
		coins = PlayerPrefs.GetInt("playerCoins");
		lives = PlayerPrefs.GetInt("playerLives");
		
		hud = GameObject.FindWithTag("hud").GetComponent<HudController>();
		charController = GetComponent<CharacterController>();
}
	
void Update()
{
	if (changePlayer)
	{
		SetPlayerState();
	}
}


public void  AddCoin(int numCoin)//accessed by item_pickup
{
	if (coins + 1 == coinLife ) {
		coins = 0;
		AudioSource.PlayClipAtPoint(gainLife, transform.position);
		lives++;
	}
	else
		coins += numCoin;
	
}

void SetPlayerState()
{
	
	switch (playerState)
	{
		case PlayerState.PlayerSmall : //no material swap, just scaling down
			hud.heartIcon.texture = hud.halfHeart;
			changePlayer = false;
			break;
		case PlayerState.PlayerLarge :
			hud.heartIcon.texture = hud.fullHeart;
			changePlayer = false;
			break;
		case PlayerState.PlayerDead :
			hud.heartIcon.texture = hud.emptyHeart;
			changePlayer = false;
			
			if (isDead)
			{
				anim.SetBool("isDead", true);
				lives--; //subtract a life
				isDead = false;
				PlayerPrefs.SetInt("playerLives", lives);
				PlayerPrefs.SetInt("playerCoins", coins);
				PlayerPrefs.Save();

				StartCoroutine(MyDieCoroutine());
			}		
			break;
	}
}

	
 IEnumerator MyDieCoroutine()

    {
		yield return new WaitForSeconds(1f);
		charController.enabled = false;
		transform.Translate(0f, 0f, -2f); //push player towards the camera to avoid collisions
		
		yield return new WaitForSeconds(1.5f);//0.5f);
			
		playerState = PlayerState.PlayerLarge; //respawn as Large.
		
		if (lives == 0)
			Application.LoadLevel("gameOverScreen");
		else {
			PlayerPrefs.SetInt("playerLives", lives);
			PlayerPrefs.SetInt("playerCoins", coins);
			PlayerPrefs.SetInt("playerState", (int)playerState);
			PlayerPrefs.Save ();
			
			changePlayer = true;
			SetPlayerState();
			Application.LoadLevel(Application.loadedLevel);
		}
    }
	
	
}

