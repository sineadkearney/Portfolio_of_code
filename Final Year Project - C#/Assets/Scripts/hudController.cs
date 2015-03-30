// Hud Coin and Life Controller and Component
// Description: Controls the gui coin counting for coin pickup and player lives. Pauses game. Contain player health bar
//Based on code from http://walkerboystudio.com/html/unity_course_lab_4.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class HudController : MonoBehaviour {
	
public GUIText livesText;
public GUIText coinsText;

public GUISkin minSkin;				//GUI skin applied to buttons
public GUISkin maxSkin;
	
	
public bool isPaused = false; 		//accessed by the pause Menu
private Rect pauseRect;				//the GUI Rect containing the "pause" button

private InteractionManager intManager;//interaction manager for Kinect
public SpeechManager speechManager; //accessed by the options Menu, when using the Kinect
private bool selectPause = false;	//true if player selected "pause" with Kinect. Else false
private PlayerProperties pProp;

public GUITexture heartIcon;		//the GUITexture with is used as a life bar for the Player
public Texture2D fullHeart;			//the texture meaning two chances before dying
public Texture2D halfHeart;			//the texture meaning one chance before dying
public Texture2D emptyHeart;		//the texture meaning dead
	
	void Start()
	{
		GameObject playerGameObject = GameObject.Find("hero");					//get player and set to pProp
		pProp = playerGameObject.GetComponent<PlayerProperties>();
		
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
		intManager = GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>();
		heartIcon = GameObject.Find("heart_icon").GetComponent<GUITexture>();
		
		//coins and lives are slightly bigger if using a larger screen
		livesText.fontSize = Screen.width/40;
		if (livesText.fontSize < 20) livesText.fontSize = 20; //impose min size restriction
		coinsText.fontSize = livesText.fontSize;
	}
	
void Update ()
{
	if (intManager != null && intManager.enabled && intManager.IsInteractionInited())
	{
		//RIGHT HAND, hand interaction
		//get the co-ords of the handCursor, ie, if the actual mouse cursor was  being used (and not the handCursor)
		Vector3 screenNormalPosR = Vector3.zero;
		Vector3 screenPixelPosR = Vector3.zero;
		screenNormalPosR = intManager.GetRightHandScreenPos();
		if(screenNormalPosR != Vector3.zero)
		{
			// convert the normalized screen pos to pixel pos
			screenPixelPosR.x = (int)(screenNormalPosR.x * Camera.main.pixelWidth);
			screenPixelPosR.y = (int)(screenNormalPosR.y * Camera.main.pixelHeight);
		}
		Vector2 mousePosRight = new Vector2(screenPixelPosR.x, (Screen.height - screenPixelPosR.y)); 
		selectPause = pauseRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;

		//LEFT HAND, hand interaction
		//get the co-ords of the handCursor, ie, if the actual mouse cursor was  being used (and not the handCursor)
		Vector3 screenNormalPosL = Vector3.zero;
		Vector3 screenPixelPosL = Vector3.zero;
		screenNormalPosL = intManager.GetLeftHandScreenPos();
		if(screenNormalPosL != Vector3.zero)
		{
			// convert the normalized screen pos to pixel pos
			screenPixelPosL.x = (int)(screenNormalPosL.x * Camera.main.pixelWidth);
			screenPixelPosL.y = (int)(screenNormalPosL.y * Camera.main.pixelHeight);
		}	
		Vector2 mousePosLeft = new Vector2(screenPixelPosL.x, (Screen.height - screenPixelPosL.y)); 
		selectPause = selectPause || (pauseRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
	}
		
	if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			print("speech manager working");
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				print ("sPhraseTag: " + sPhraseTag);
				switch(sPhraseTag)
				{
					case "PAUSE":
						if (!isPaused)
							Pause ();
						break;
				}

				speechManager.ClearPhraseRecognized();
			}
			
		}
		
	int lives = pProp.lives; //set lives to player properties lives
	int coins = pProp.coins;
	
	livesText.text = "Lives: " + lives;
	coinsText.text = "Coins: " + coins;


}
	void OnGUI () {
		
		//pauseRect size depends on screen size, but there are upper and lower bounds for the size.  Min size is 100px, Max size is 200px
		int pauseRectX = Screen.width/9;
		int pauseRectY = Screen.height/7;
		if (pauseRectX < 100) pauseRectX = 100;
		else if (pauseRectX > 200) pauseRectX = 200;
		if (pauseRectY < 100) pauseRectY = 100;
		else if (pauseRectY > 200) pauseRectY = 200;
		
		//GUI.depth = 0;//handCursor is at -1. Ensure menu is behind handCursor	
		if (pauseRectX >150)
			GUI.skin = maxSkin;
		else
			GUI.skin = minSkin;
		
		pauseRect = new Rect(Screen.width-pauseRectX, 0, pauseRectX, pauseRectY);
	    if(!isPaused  && (GUI.Button(pauseRect, "\"Pause\"") || selectPause 
			|| Input.anyKeyDown && Event.current.isKey && Event.current.keyCode == KeyCode.P)) 
			//button doesn't appear when isPaused, ie, pause/options menu is on screen. User can also press "p" button. Feels more natural
		{
			Pause();
	    }
	}
	
	void Pause() //resume is handled in pauseMenu.cs
	{
		isPaused = true;
		Time.timeScale = 0.00000001f; //use a very small number, instead of 0, so that it can then be multiplied when moving the kinect cursor
		MenuPause pMenu = GetComponent<MenuPause>();
		pMenu.enabled = true;
		GetComponent<HudController>().enabled = false;
	}
}
