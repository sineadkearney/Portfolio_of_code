//Description: used after selecting an individual level to play, from a "level selection" area, to confirm the choice
//Instructions: attach to the same gameObject that contains SelectLevel.cs
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class MenuConfirmation : MonoBehaviour {

	
public GUISkin minSkin;				//GUI skin applied to buttons
public GUISkin maxSkin;
	
private Rect yesRect;
private Rect noRect;
private bool selectYes = false;
private bool selectNo = false;
	
private InteractionManager intManager; //interaction manager for Kinect
private SpeechManager speechManager; //accessed by the options Menu, when using the Kinect
private HudController hud;
	
	void Start()
	{
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
		intManager = GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>();
		hud = GameObject.FindWithTag("hud").GetComponent<HudController>();
	}
	
	void Update ()
	{
		if (intManager != null && intManager.enabled && intManager.IsInteractionInited())
		{
			//RIGHT HAND INTERACTION
			//get the co-ords of the handCursor, ie, as if the actual mouse cursor was  being used (and not the handCursor)
			Vector3 screenNormalPosR = Vector3.zero;
			Vector3 screenPixelPosR = Vector3.zero;
			screenNormalPosR = intManager.GetRightHandScreenPos();
			if(screenNormalPosR != Vector3.zero)
			{
				// convert the normalized screen pos to pixel pos
				screenPixelPosR.x = (int)(screenNormalPosR.x * Camera.main.pixelWidth);
				screenPixelPosR.y = (int)(screenNormalPosR.y * Camera.main.pixelHeight);
			}
			//Vector2 mousePosRight = new Vector2(screenPixelPosR.x,Screen.height - screenPixelPosR.y);
			Vector2 mousePosRight = new Vector2(screenPixelPosR.x - (Screen.width/4) ,(Screen.height - screenPixelPosR.y) - (Screen.height/5)); //hack.
			selectYes 	= yesRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
			selectNo	= noRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;

			//LEFT HAND INTERACTION
			//get the co-ords of the handCursor, ie,  as if the actual mouse cursor was  being used (and not the handCursor)
			Vector3 screenNormalPosL = Vector3.zero;
			Vector3 screenPixelPosL = Vector3.zero;
			screenNormalPosL = intManager.GetLeftHandScreenPos();
			if(screenNormalPosL != Vector3.zero)
			{
				// convert the normalized screen pos to pixel pos
				screenPixelPosL.x = (int)(screenNormalPosL.x * Camera.main.pixelWidth);
				screenPixelPosL.y = (int)(screenNormalPosL.y * Camera.main.pixelHeight);
			}	
			//Vector2 mousePosLeft = new Vector2(screenPixelPosR.x,Screen.height - screenPixelPosR.y);
			Vector2 mousePosLeft = new Vector2(screenPixelPosL.x - (Screen.width/4), (Screen.height - screenPixelPosL.y) - (Screen.height/5)); //hack.
			selectYes 	= selectYes || (yesRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
			selectNo 	= selectNo || (noRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
		}			
		
		//SPEECH RECOGNITION
		if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				
				switch(sPhraseTag)
				{				
					case "YES":
						Yes ();
						break;
					case "NO":
						No();
						break;
				}

				speechManager.ClearPhraseRecognized();
			}
			
		}
	}
	
void Menu() {
	
	bool useKinect = PlayerPrefs.GetInt("useKinect") == 1;
		
	//size of overall Menu box
	int overallSizeX = Screen.width/2;
	int overallSizeY = (int)(Screen.height/3); 
	if (overallSizeX < 300)overallSizeX = 300; //impose min size restrictions
	if (overallSizeY < 150) overallSizeY = 150; //impose min size restrictions
		
	//load GUI skin
	if (overallSizeX <  500) 
		GUI.skin = minSkin; //larger font size
	else  
		GUI.skin = maxSkin; //smaller font size
		
    GUI.BeginGroup(new Rect((Screen.width-overallSizeX)/2, (Screen.height-overallSizeY)/3, overallSizeX, overallSizeY));
   
    //the menu background box
    GUI.Box(new Rect(0, 0, overallSizeX, overallSizeY), "");	
		
	//size of buttons
	int buttonSizeX = (int)(overallSizeX/2.5);
	int buttonSizeY = (int)(overallSizeY/2.8);
	
	//size of gap between buttons
	int gapX = (overallSizeX - (buttonSizeX * 2)) / 3; // overall size, minus the size of two button, divided by 3 because there are 3 gaps (one at each border, one between buttons)
	int gapY = (overallSizeY - (buttonSizeY * 2)) / 3; // overall size, minus the size of two button, divided by 3 because there are 3 gaps (one at each border, one between buttons)
		
	GUI.Label(new Rect(gapX, gapY, overallSizeX-gapX, buttonSizeY-gapY), "Load this level?");
		
	yesRect = new Rect(gapX, buttonSizeY, buttonSizeX, (int)(buttonSizeY+(gapY*1.5)));
    if(GUI.Button(yesRect, "Yes") 	//if click on "Yes"
			|| selectYes 			//if the user uses the handCursor to select "yes"
			|| (!useKinect && Input.anyKeyDown && Event.current.isKey && Event.current.keyCode == KeyCode.Y)) //if press the "y" key, because it feels natural
	{
		Yes ();
    }

	noRect = new Rect(gapX+buttonSizeX+gapX, buttonSizeY, buttonSizeX, (int)(buttonSizeY+(gapY*1.5)));
    if(GUI.Button(noRect, "No") //if click on "No"
			|| selectNo			//if the user uses the handCursor to select "no"
			|| (!useKinect && Input.anyKeyDown && Event.current.isKey && Event.current.keyCode == KeyCode.N)) //if press the "n" key, because it feels natural
	{
		No ();
    }
				
    //layout end
    GUI.EndGroup();
}

	void Yes()
	{
		Time.timeScale = 1.0f; //resume game
		hud.enabled = true;
		Application.LoadLevel("loading");
	}
	
	void No()
	{
		Time.timeScale = 1.0f; //resume game
		hud.enabled = true;
		enabled = false;
	}
	
	void OnGUI () {
		Menu(); //execute theFirstMenu function
	}
}