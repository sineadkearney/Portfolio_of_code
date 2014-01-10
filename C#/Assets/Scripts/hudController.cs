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
	
private bool isPaused = false;
private int index = 0;						//index of animation sprite for counting through numbers
//private 
//int coin = 0;						//hold coin amount and set in animation sprite. Should get value from player
//coin was private, but needs to be accessed by itemPickup.js

	private SpeechManager speechManager;
	private playerProperties pProp;
	
	void Start()
	{
		GameObject playerGameObject = GameObject.Find("hero");					//get player and set to pProp
		pProp = playerGameObject.GetComponent<playerProperties>();
		
		speechManager = GameObject.Find("speech").GetComponent<SpeechManager>();
		//speechManager = GameObject.FindGameObjectWithTag("speech").GetComponent<SpeechManager>();
		
		
	}
	
void Update ()
{
	if(speechManager != null && speechManager.IsSapiInitialized())
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
								isPaused = true;
								Time.timeScale = 0.0f;
							}
						break;
					case "RESUME":
						if (isPaused)
							{
								isPaused = false;
								Time.timeScale = 1.0f;
							}
					break;
	
				}

				speechManager.ClearPhraseRecognized();
			}
			
		}
	else if (Input.GetButtonDown("Jump") && !isPaused) //pause
		{
			isPaused = true;
			Time.timeScale = 0.0f;
		}
		else if (Input.GetButtonDown("Jump") && isPaused) //resume
		{
			isPaused = false;
			Time.timeScale = 1.0f;
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

}
