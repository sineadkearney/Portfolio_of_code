//Description: the main menu for the game. User can start a new game, continue a saved game (if applicable), play the tutorial, or exit.
//Instructions: attach to an empty gameObject, or camera
//Code based on http://www.moddb.com/groups/unity-devs/tutorials/unity-how-to-create-main-menu, written by Sinéad Kearney

using UnityEngine;
using System.Collections;
using System;

public class MenuMain : MonoBehaviour {
	
public GUISkin minSkin;				//GUI skin applied to buttons
public GUISkin maxSkin;
	
public Texture2D tutorialIntDiagram;		//digram for interaction tutorial
public Texture2D smallTutorialSpeechDiagram;//diagram for speech tutorial, small screen	
public Texture2D largeTutorialSpeechDiagram;//diagram for speech tutorial, large screen
public Texture2D backgroundTexture;			//background

//these rects are assigned the names used in MainMenu(). However, two of them are also used in DateEraseMenu(), where the value is reassigned.
private Rect tutorialRect;			//rectangle containing "tutorial" option
private Rect startRect;				//rectangle containing "start a new game" option
private Rect quitRect;				//rectangle containing "quit" option
private Rect contRect;				//rectangle containing "continue game" option
private InteractionManager intManager; //interaction manager for Kinect
private SpeechManager speechManager; //accessed by the options Menu, when using the Kinect
	
private bool selectTutorial = false;	//true if user selected "start" with Kinect. Else false
private bool selectStart = false;		//true if user selected "start" with Kinect. Else false
private bool selectQuit = false;		//true if user selected "quit" with Kinect. Else false
private bool selectCont = false;		//true if user selected "continue" with Kinect. Else false
private bool prevGameExists = false;	//true if user has a previous game saved

public bool showMainMenu = false;
private bool showDataEraseMenu = false;
public bool showInteractionMenu = true;
private bool showSpeechMenu = false;
	
private double timeStarted;
	
private int overallSizeX = 0;
private int overallSizeY = 0;
private double menuDisplayTimeMs = 6000;
	
	void Start() 
	{
		intManager = GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>();
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();

		prevGameExists = PlayerPrefs.GetInt("previousGameExists") == 1; //0 = false, 1 = true;
		
		TimeSpan t = DateTime.UtcNow - new DateTime(1970, 1, 1);
		timeStarted = t.TotalMilliseconds;
		
//		PlayerPrefs.DeleteAll();
//		PlayerPrefs.Save();
	}
	
	void Update()
	{
		if (intManager != null && intManager.enabled && intManager.IsInteractionInited())
		{
			//RIGHT HAND interaction
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
		
			Vector2 mousePosRight = new Vector2(screenPixelPosR.x - (Screen.width/4), (Screen.height - screenPixelPosR.y) - (Screen.height/10)); //hack.
			//mousePos = new Vector2(Input.mousePosition.x - (Screen.width/4), (Screen.height - Input.mousePosition.y) - (Screen.height/10)); //hack.
			selectStart = startRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
			selectCont = contRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
			selectQuit = quitRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
			selectTutorial = tutorialRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
				
			//LEFT HAND interaction
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
		
			Vector2 mousePosLeft = new Vector2(screenPixelPosL.x - (Screen.width/4), (Screen.height - screenPixelPosL.y) - (Screen.height/10)); //hack.
			selectStart = selectStart || (startRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
			selectCont = selectCont || (contRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
			selectQuit = selectQuit || (quitRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);	
			selectTutorial = selectTutorial || (tutorialRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
		}
		
		//speech interaction
		if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				
				switch(sPhraseTag)
				{				
					case "NEW GAME":
						if (showMainMenu) //ensure that the main menu is showing
							ChooseNewGame();
						break;
					case "CONTINUE":
						if (showMainMenu) //ensure that the main menu is showing
							ChooseContinue();
						break;
					case "QUIT":
						if (showMainMenu) //ensure that the main menu is showing
							ChooseQuit();
						break;
					case "TUTORIAL":
						if (showMainMenu) //ensure that the main menu is showing
							ChooseTutorial();
						break;
					case "YES":
						if (showDataEraseMenu) //ensure that the data erase menu is showing
							ChooseYes();
						break;
					case "NO":
						if (showDataEraseMenu) //ensure that the data erase menu is showing
							ChooseNo();
						break;
				}

				speechManager.ClearPhraseRecognized();
			}			
		}
	}
	
void MainMenu() {

	
	//background image	
	//GUI.DrawTexture (new Rect (0, 0, Screen.width, Screen.height), backgroundTexture);
	//the above line found at  http://answers.unity3d.com/questions/220291/drawtexture-background-fit-screen.html
   
	//size of overall Menu box
	overallSizeX = Screen.width/2;
	overallSizeY = (Screen.height/5)*3; 
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
	//GUI.depth = -2;//handCursor is at -1. Ensure menu is behind handCursor	
		
	//the menu background box
	GUI.Box(new Rect(0, 0, overallSizeX, overallSizeY), "");
	
	//size of buttons
	int buttonSizeX = (int)(overallSizeX/2.5);
	int buttonSizeY = (int)(overallSizeY/2.5);

	//size of gap between buttons
	int gapX = (overallSizeX - (buttonSizeX * 2)) / 3; // overall size, minus the size of two button, divided by 3 because there are 3 gaps (one at each border, one between buttons)
	int gapY = (overallSizeY - (buttonSizeY * 2)) / 3; // overall size, minus the size of two button, divided by 3 because there are 3 gaps (one at each border, one between buttons)
		
		
	
	if (prevGameExists)
	{
		//new game button
		startRect = new Rect(gapX, gapY, buttonSizeX, buttonSizeY);	
	    if(GUI.Button(startRect, "\"New Game\"") //returns true if  button pressed
				|| selectStart)
		{
			ChooseNewGame();
	    }
						
		//continue button
		contRect = new Rect(gapX+buttonSizeX+gapX, gapY, buttonSizeX, buttonSizeY);	
	    if(GUI.Button(contRect, "\"Continue\" Game") //only appears when there is a game to be continued
				|| selectCont)
		{
	 		ChooseContinue();
	    }			
	}
	else
	{
		//new game button
		startRect = new Rect(gapX, gapY, buttonSizeX+gapX+buttonSizeX, buttonSizeY);	
	    if(GUI.Button(startRect, "\"New Game\"") //returns true if  button pressed
				|| selectStart)
		{
			ChooseNewGame();			
	    }	
	}
		
	tutorialRect = new Rect(gapX, gapY+buttonSizeY+gapY, buttonSizeX, buttonSizeY);	
    if(GUI.Button(tutorialRect, "\"Tutorial\"") //returns true if  button pressed
			|| selectTutorial) //working
	{
		ChooseTutorial();
    }
		
		
    //quit button		
	quitRect = new Rect(gapX+buttonSizeX+gapX, gapY+buttonSizeY+gapY, buttonSizeX, buttonSizeY);
    if(GUI.Button(quitRect, "\"Quit\"") || selectQuit) 
	{
   		ChooseQuit ();
    }
   
    //layout end
    GUI.EndGroup();
}
	
	
void DataEraseMenu() {

	//size of overall Menu box, already assigned in MainMenu()
	//load GUI skin
	if (overallSizeX <  500) 
		GUI.skin = minSkin; //larger font size
	else  
		GUI.skin = maxSkin; //smaller font size
	
	GUI.BeginGroup(new Rect((Screen.width-overallSizeX)/2, (Screen.height-overallSizeY)/3, overallSizeX, overallSizeY));	
	//GUI.depth = -2;//handCursor is at -1. Ensure menu is behind handCursor	
		
	//the menu background box
	GUI.Box(new Rect(0, 0, overallSizeX, overallSizeY), "");
	
	int buttonSizeX = (int)(overallSizeX/1.5);
	int buttonSizeY = (int)(overallSizeY/3.5);

   	int gapX = (overallSizeX - buttonSizeX ) / 2; // overall size, minus the size of two button, divided by 3 because there are 3 gaps (one at each border, one between buttons)
	int gapY = (overallSizeY - (buttonSizeY * 3)) / 4; // overall size, minus the size of three button, divided by 4 because there are 4 gaps (one at each border, one between buttons)
	
		
    //main menu buttons
    //game start button
	startRect = new Rect(gapX, gapY, buttonSizeX, buttonSizeY);	
    GUI.Label(startRect, "All data will be lost. Proceed?"); 

	contRect = new Rect(gapX, gapY+buttonSizeY+gapY, buttonSizeX, buttonSizeY);	
	if(GUI.Button(contRect, "\"Yes\"")) //only appears when there is a game to be continued
	{
		ChooseYes();
	}	


    //quit button		
	quitRect = new Rect(gapX, gapY+buttonSizeY+gapY+buttonSizeY+gapY, buttonSizeX, buttonSizeY);
    if(GUI.Button(quitRect, "\"No\"") || selectQuit) 
	{
		ChooseNo();
    }
   
    //layout end
    GUI.EndGroup();
}

//displays a label and diagram showing how to move and interact with the handCursor
void InteractionMenu()
{		
	//size of overall Menu box
	overallSizeX = Screen.width/2;
	overallSizeY = (Screen.height/5)*3; 
	if (overallSizeX < 300)overallSizeX = 300; //impose min size restrictions
	else if (overallSizeX > 840) overallSizeX = 840; //impose max size restrictions
	if (overallSizeY < 300) overallSizeY = 300; //impose min size restrictions
	else if (overallSizeY > 560) overallSizeY = 560; //impose max size restrictions
		
		
	if (overallSizeX <  500) 
		GUI.skin = minSkin; //larger font size
	else  
		GUI.skin = maxSkin; //smaller font size
	
	GUI.BeginGroup(new Rect((Screen.width-overallSizeX)/2, (Screen.height-overallSizeY)/3, overallSizeX, overallSizeY));
	//GUI.depth = -2;//handCursor is at -1. Ensure menu is behind handCursor	
		
    //the menu background box
    GUI.Box(new Rect(0, 0, overallSizeX, overallSizeY), "");
   
	int gapX = overallSizeX/20; //5% of overallSizeX gap
	int gapY = overallSizeY/20; //5% of overallSizeY gap
	
   	int sizeXLabel = overallSizeX-(gapX*2); //90% of overallSizeX
	int sizeYLabel = overallSizeY/10*2; //20% of overallSizeY
		
	int sizeXDiagram = sizeXLabel;
	int sizeYDiagram = overallSizeY - (gapY*3 + sizeYLabel);
	
	GUI.Label(new Rect(gapX, gapY, sizeXLabel, sizeYLabel), "Use your hand to move the cursor. Grab to select button");	
	GUI.DrawTexture (new Rect (gapX, gapY+sizeYLabel+gapY, sizeXDiagram, sizeYDiagram), tutorialIntDiagram);
		
	TimeSpan t = DateTime.UtcNow - new DateTime(1970, 1, 1);
	double timeNow = t.TotalMilliseconds;	
	
	if(timeNow > timeStarted + menuDisplayTimeMs)
	{
		showSpeechMenu = true;
		showInteractionMenu = false;
	}
    GUI.EndGroup();
}

//displays a label and diagram to show how to interact with the speech recogniser	
void SpeechMenu() 
{		
	//size of overall Menu box
	overallSizeX = Screen.width/2;
	overallSizeY = (Screen.height/5)*3; 
	if (overallSizeX < 300)overallSizeX = 300; //impose min size restrictions
	else if (overallSizeX > 840) overallSizeX = 840; //impose max size restrictions
	if (overallSizeY < 300) overallSizeY = 300; //impose min size restrictions
	else if (overallSizeY > 560) overallSizeY = 560; //impose max size restrictions
		
	Texture2D speechDiagram;	
	if (overallSizeX <  500) 
	{
		GUI.skin = minSkin; //smaller font size
		speechDiagram = smallTutorialSpeechDiagram;
	}
	else  
	{
		GUI.skin = maxSkin; //larger font size
		speechDiagram = largeTutorialSpeechDiagram;
	}
	
	GUI.BeginGroup(new Rect((Screen.width-overallSizeX)/2, (Screen.height-overallSizeY)/3, overallSizeX, overallSizeY));
	//GUI.depth = -2;//handCursor is at -1. Ensure menu is behind handCursor	
		
    //the menu background box
    GUI.Box(new Rect(0, 0, overallSizeX, overallSizeY), "");
   
	int gapX = overallSizeX/20; //5% of overallSizeX gap
	int gapY = overallSizeY/20; //5% of overallSizeY gap
	
   	int sizeXLabel = overallSizeX-(gapX*2); //90% of overallSizeX
	int sizeYLabel = overallSizeY/10*2; //20% of overallSizeY
		
	int sizeXDiagram = sizeXLabel;
	int sizeYDiagram = overallSizeY - (gapY*3 + sizeYLabel);
	
	GUI.Label(new Rect(gapX, gapY, sizeXLabel, sizeYLabel), "Buttons also selected by saying the word(s) in \"\"");	
	GUI.DrawTexture (new Rect (gapX, gapY+sizeYLabel+gapY, sizeXDiagram, sizeYDiagram), speechDiagram);
		
	TimeSpan t = DateTime.UtcNow - new DateTime(1970, 1, 1);
	double timeNow = t.TotalMilliseconds;	
	
	if(timeNow > timeStarted + (menuDisplayTimeMs*2))
	{
		showMainMenu = true;
		showSpeechMenu = false;
	}
    GUI.EndGroup();
}
	
void OnGUI () {
	GUI.DrawTexture (new Rect (0, 0, Screen.width, Screen.height), backgroundTexture);		
	GUI.depth = 2;//handCursor is at -1, other menus at -2. Ensure menu is behind handCursor and other menus.
	
	if (showMainMenu)
   		MainMenu();		
	else if (showDataEraseMenu)
		DataEraseMenu();		
	else if (showInteractionMenu)
		InteractionMenu();
	else if (showSpeechMenu)
		SpeechMenu();
}

void ChooseNewGame()
{
	if (!prevGameExists)
	{
		SetUpNewGame();
		StartLevel("levelSelect");
	}
	else// if (prevGameExists)
	{
		showMainMenu = false;
		showDataEraseMenu = true;
	}
}

void ChooseContinue()
{
	StartLevel("levelSelect");
}

void ChooseTutorial()
{
	if (!prevGameExists) //we need to set up defaults for the tutorial
		SetUpNewGame();
	StartLevel("tutorialLevel");
}

void ChooseQuit()
{
	print ("quit");
	Application.Quit();
}
	
void ChooseYes()
{
	showDataEraseMenu = false;
	SetUpNewGame();
	StartLevel("levelSelect");
}

void ChooseNo()
{
	showMainMenu = true;
	showDataEraseMenu = false;
}

void SetUpNewGame()
{
	int useKinect = 0; //by default, do not use the kinect when starting a new game
	if (prevGameExists)
		useKinect = PlayerPrefs.GetInt("useKinect"); //get the previous value for useKinect
				
	PlayerPrefs.DeleteAll();
	PlayerPrefs.SetInt("previousGameExists", 1);
	PlayerPrefs.SetInt("useKinect", useKinect); //perserve the previous value for useKinect
	PlayerPrefs.SetInt("playerLives", 3);
	PlayerPrefs.SetInt("playerCoins", 0);
	PlayerPrefs.SetInt ("playerState", (int)PlayerProperties.PlayerState.PlayerLarge);
	PlayerPrefs.SetInt("highestLevelCompleted", 0);
	PlayerPrefs.SetInt("worldOfHighestLevelCompleted", 0);
	PlayerPrefs.SetString("loadThis", "");
	PlayerPrefs.Save();
}

	
void StartLevel(string levelName)
{
	PlayerPrefs.SetString("loadThis", levelName);
	PlayerPrefs.Save();
	Application.LoadLevel("loading");
}
}
