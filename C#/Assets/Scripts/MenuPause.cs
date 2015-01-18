//Description: used as in-game menu, to navigate to other sub-menus, or to quit the level prematurely
//Instruction: attach to the hud gameObject
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class MenuPause : MonoBehaviour {

	
public GUISkin minSkin;				//GUI skin applied to buttons
public GUISkin maxSkin;

private Rect resumeRect;
private Rect optionsRect;
private Rect helpRect;
private Rect exitRect;

private MenuPause pMenu;
private MenuOptions opMenu;
private MenuHelp hMenu;
private int worldIndex = 0;			//used in pause menu to see if we should go back to the levelSelect scene, or to mainMenu scene
	
private bool selectResume = false;	//true if player selected "start" with Kinect. Else false
private bool selectOptions = false;	//true if player selected "quit" with Kinect. Else false
private bool selectHelp = false;	//true if player selected "continue" with Kinect. Else false
private bool selectExit = false;	//true if player selected "continue" with Kinect. Else false

private InteractionManager intManager; //interaction manager for Kinect
private SpeechManager speechManager; //accessed by the options Menu, when using the Kinect

	void Start()
	{

		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
		worldIndex = GameObject.Find("levelProperties").GetComponent<LevelProperties>().worldIndex;
		intManager = GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>();
		
		pMenu = GetComponent<MenuPause>();
		opMenu = GetComponent<MenuOptions>();
		hMenu = GetComponent<MenuHelp>();
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
			//Vector2 mousePosRight = new Vector2(screenPixelPosR.x, Screen.height - screenPixelPosR.y);
			Vector2 mousePosRight = new Vector2(screenPixelPosR.x - (Screen.width/4), (Screen.height - screenPixelPosR.y) - (Screen.height/10)); //hack.
			selectResume 	= resumeRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
			selectOptions 	= optionsRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
			selectHelp 		= helpRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
			selectExit 		= exitRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
	
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
			Vector2 mousePosLeft = new Vector2(screenPixelPosL.x - (Screen.width/4), (Screen.height - screenPixelPosL.y) - (Screen.height/10)); //hack.
			selectResume 	= selectResume || (resumeRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
			selectOptions 	= selectOptions || (optionsRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
			selectHelp 		= selectHelp || (helpRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
			selectExit 		= selectExit || (exitRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
		}
		
		//SPEECH RECOGNITION
		if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				switch(sPhraseTag)
				{				
					case "RESUME":
						Resume ();
						break;
					case "OPTIONS":
						Options();
						break;
					case "HELP":
						Help();
						break;
					case "EXIT":
						ExitLevel();
						break;
				}
				speechManager.ClearPhraseRecognized();
			}
		}
	}
		
void Menu() {

	//size of overall Menu box
	int overallSizeX = Screen.width/2;
	int overallSizeY = (Screen.height/5)*3; 
	if (overallSizeX < 300)overallSizeX = 300; //impose min size restrictions
	else if (overallSizeX > 840) overallSizeX = 840; //impose max size restrictions
	if (overallSizeY < 300) overallSizeY = 300; //impose min size restrictions
	else if (overallSizeY > 560) overallSizeY = 560; //impose max size restrictions
	
	//load GUI skin
	if (overallSizeX <  500) 
		GUI.skin = minSkin; //larger font size
	else  
		GUI.skin = maxSkin; //smaller font size
	
	GUI.BeginGroup(new Rect((Screen.width-overallSizeX)/2, (Screen.height-overallSizeY)/3, overallSizeX, overallSizeY));
   	//GUI.depth = 0;//handCursor is at -1. Ensure menu is behind handCursor	
		
    //the menu background box
	GUI.Box(new Rect(0, 0, overallSizeX, overallSizeY), "");
    //logo picture
    //GUI.Label(new Rect(15, 10, 300, 68), logoTexture);
   
	//size of buttons
	int buttonSizeX = (int)(overallSizeX/2.5);
	int buttonSizeY = (int)(overallSizeY/2.5);
	if (buttonSizeX < 120) buttonSizeX = 120;
	if (buttonSizeY < 120) buttonSizeY = 120;
	
	//size of gap between buttons
	int gapX = (overallSizeX - (buttonSizeX * 2)) / 3; // overall size, minus the size of two button, divided by 3 because there are 3 gaps (one at each border, one between buttons)
	int gapY = (overallSizeY - (buttonSizeY * 2)) / 3; // overall size, minus the size of two button, divided by 3 because there are 3 gaps (one at each border, one between buttons)
		
    ///////main menu buttons
    //resume button
	resumeRect = new Rect(gapX, gapY, buttonSizeX, buttonSizeY);	
    if(GUI.Button(resumeRect, "\"Resume\"") || selectResume)
	{
		Resume ();
    }
	
	//options button
	optionsRect = new Rect(gapX+buttonSizeX+gapX, gapY, buttonSizeX, buttonSizeY);
    if(GUI.Button(optionsRect, "\"Options\"") || selectOptions) 
	{
		Options();
    }
	//help button
	helpRect = new Rect(gapX, gapY+buttonSizeY+gapY, buttonSizeX, buttonSizeY);
	if(GUI.Button(helpRect, "\"Help\"") || selectHelp)
	{
		Help ();
    }	
		
    //exit button
	exitRect = new Rect(gapX+buttonSizeX+gapX, gapY+buttonSizeY+gapY, buttonSizeX, buttonSizeY);
	string buttonText =  "\"Exit Level\"";
	if (worldIndex ==  0) //level is levelSelect
	{
		buttonText = "\"Exit\" to Main Menu";
	}
    if(GUI.Button(exitRect, buttonText) || selectExit) 
	{
		ExitLevel();
    }
		
    //layout end
    GUI.EndGroup();
}
	void Options()
	{
		pMenu.enabled = false;
		opMenu.enabled = true;
	}
	void Help()
	{
		pMenu.enabled = false;
		hMenu.enabled = true;
	}
	
	void Resume()
	{
		pMenu.enabled = false;
		GetComponent<HudController>().enabled = true;
		GetComponent<HudController>().isPaused = false;
		Time.timeScale = 1.0f;
	}
	
	void  ExitLevel()
	{
		Resume ();
		string level = "levelSelect";
		if(worldIndex ==  0)
			level = "mainMenu";
		PlayerPrefs.SetString("loadThis", level);
		PlayerPrefs.Save();
		Application.LoadLevel("loading");
	}
	
	void OnGUI () {
	   Menu(); //execute theFirstMenu function
	}
	
}