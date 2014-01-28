using UnityEngine;
using System.Collections;

public class hudController : MonoBehaviour {

	// Hud Coin and Life Controller and Component
// Description: Controls the gui coin coutning for coin pickup and player  lives

//public GameObject livesFont1;					// holds a sprite sheet - should be a number sheet 0-9
//public GameObject coinFont1;					// holds a sprite sheet - should be a number sheet 0-9
//public GameObject coinFont2;					// holds a sprite sheet - should be a number sheet 0-9
//public GameObject coinFont3;					// holds a sprite sheet - should be a number sheet 0-9
	
public GUIText livesText;
public GUIText coinsText;
public GUISkin newSkin;				//GUI skin applied to buttons
	
	
public bool isPaused = false; //accessed by the pause Menu
private Rect pauseRect;
private int index = 0;						//index of animation sprite for counting through numbers
//private 
//int coin = 0;						//hold coin amount and set in animation sprite. Should get value from player
//coin was private, but needs to be accessed by itemPickup.js

public SpeechManager speechManager; //accessed by the options Menu, when using the Kinect
	private playerProperties pProp;
	
	void Start()
	{
		GameObject playerGameObject = GameObject.Find("hero");					//get player and set to pProp
		pProp = playerGameObject.GetComponent<playerProperties>();
		
		//speechManager = GameObject.Find("speech").GetComponent<SpeechManager>();
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
			
	}
	
void Update ()
{
	if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				
				switch(sPhraseTag)
				{
	
//					case "STOP":
//						if (!isPaused)
//						{
//							isPaused = true;
//							Time.timeScale = 0.0f;
//						}
//					else if (isPaused)
//						{
//							isPaused = false;
//							Time.timeScale = 1.0f;
//						}
//						break;
					case "PAUSE":
						if (!isPaused)
							{
								pause ();
							}
						break;
					case "RESUME":
						if (isPaused)
							{
								resume ();
							}
					break;
	
				}

				speechManager.ClearPhraseRecognized();
			}
			
		}
	else if (Input.GetButtonDown("pause") && !isPaused) //pause
	{
		pause();
	}
	else if (Input.GetButtonDown("pause") && isPaused) //resume
	{
		resume ();
	}
		
		
	int lives = pProp.lives; //set lives to player properties lives
	int coins = pProp.coins;
	
		livesText.text = "Lives: " + lives;
		coinsText.text = "Coins: " + coins;
		//print ("lives: " + lives + " coins: " + coins);
		//working
	
//	if (coinFont1  != null) aniSprite ( coinFont1,  10, 1, 0, 0, 10, "font1", coin);	// animated font sprite - type: font1
//	if (coinFont2  != null) aniSprite ( coinFont2,  10, 1, 0, 0, 10, "font2", coin );	// animated font sprite - type: font2
//	if (coinFont3  != null) aniSprite ( coinFont3,  10, 1, 0, 0, 10, "font3", coin );	// animated font sprite - type: font3	
//	if (livesFont1 != null) aniSprite ( livesFont1, 10, 1, 0, 0, 10, "font4", lives );	// animated font sprite - type: font3	


}
	void OnGUI () {
	    //load GUI skin
	    GUI.skin = newSkin;
	    if(!isPaused && GUI.Button(new Rect(Screen.width-100, 0, 100, 40), "Pause")) //button doesn't appear when isPaused, ie, pause/options menu is on screen
		{
			pause();
	    }
	}
	
	void pause()
	{
		isPaused = true;
		Time.timeScale = 0.0f;
		pauseMenu pMenu = GetComponent<pauseMenu>();
		pMenu.enabled = true;
	}
	
	void resume()
	{
		isPaused = false;
		Time.timeScale = 1.0f;
		pauseMenu pMenu = GetComponent<pauseMenu>();
		pMenu.enabled = false;
	}
	

}
