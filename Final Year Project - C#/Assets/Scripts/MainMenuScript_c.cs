using UnityEngine;
using System.Collections;

public class MainMenuScript_c : MonoBehaviour {

//http://www.moddb.com/groups/unity-devs/tutorials/unity-how-to-create-main-menu
	
public GUISkin newSkin;				//GUI skin applied to buttons
public Texture2D logoTexture;		//logo for menu
public SpeechManager speechManager; //accessed by the options Menu, when using the Kinect
	
private GameObject handCursor;		//hand cursor icon used when using the Kinect to interact with menu
private Rect startRect;				//rectangle containing "start a new game" option
private Rect quitRect;				//rectangle containing "quit" option
private Rect contRect;				//rectangle containing "continue game" option
private InteractionManager manager; //interaction manager for Kinect
	
private bool selectStart;			//true if player selected "start" with Kinect. Else false
private bool selectQuit;			//true if player selected "quit" with Kinect. Else false
private bool selectCont;			//true if player selected "continue" with Kinect. Else false

private MainMenuScript_c script;
private MapMenuScript_c script2;	
	void Awake() //TODO vs Start()???
	{
		manager = GetComponent<InteractionManager>();
		handCursor = GameObject.Find("HandCursor");
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
	}
	
	void Update()
	{
		//hand interaction
		//get the co-ords of the handCursor, ie, if the actual mouse cursor was  being used (and not the handCursor)
		Vector3 screenNormalPos = Vector3.zero;
		Vector3 screenPixelPos = Vector3.zero;
		//print (startRect.Contains(new Vector2(handCursor.transform.position.x, handCursor.transform.position.y)));
		screenNormalPos = manager.GetRightHandScreenPos();
		
		if(screenNormalPos != Vector3.zero)
		{
					// convert the normalized screen pos to pixel pos
					screenPixelPos.x = (int)(screenNormalPos.x * Camera.mainCamera.pixelWidth);
					screenPixelPos.y = (int)(screenNormalPos.y * Camera.mainCamera.pixelHeight);
					print (screenPixelPos); //321, 248

		}
	
		Vector2 mousePos = new Vector2(screenPixelPos.x - (Screen.width/4), (Screen.height - screenPixelPos.y) - (Screen.height/10)); //hack.
		//mousePos = new Vector2(Input.mousePosition.x - (Screen.width/4), (Screen.height - Input.mousePosition.y) - (Screen.height/10)); //hack.
		selectStart = startRect.Contains(mousePos) && manager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
		selectQuit = quitRect.Contains(mousePos) && manager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
		
		//speech interaction
		if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				
				switch(sPhraseTag)
				{				
					case "NEW GAME":
						setUpNewGame(); 
						break;
					case "CONTINUE":
						goToNextMenu();
						break;
					case "QUIT":
						quit();
						break;
				}

				speechManager.ClearPhraseRecognized();
			}			
		}
	}
	
void theFirstMenu() {
		
	GameObject handCursor = GameObject.Find("HandCursor");	
	script = GetComponent<MainMenuScript_c>();
	script2 = GetComponent<MapMenuScript_c>();
		
    //layout start
    GUI.BeginGroup(new Rect(Screen.width / 2 - 150, 50, 300, 300));
   
    //the menu background box
    GUI.Box(new Rect(0, 0, 300, 300), "");
   
    //logo picture
    GUI.Label(new Rect(15, 10, 300, 68), logoTexture);
   
    ///////main menu buttons
    //game start button
	startRect = new Rect(55, 100, 180, 40);		
    if(GUI.Button(startRect, "Start a New Game") //returns true if  button pressed
			|| selectStart) //working
	{
		setUpNewGame();    	
    }
	//continue button
	contRect = new Rect(55, 150, 180, 40);
    if(GUI.Button(contRect, "Continue a Game")) //TODO: should only appear when there is a game to be continued
	{
 		goToNextMenu();
    }	
    //quit button
	quitRect = new Rect(55, 200, 180, 40);
    if(GUI.Button(quitRect, "Quit") || selectQuit) 
	{
   		quit ();
    }
   
    //layout end
    GUI.EndGroup();
}
	
	void setUpNewGame()
	{
		PlayerPrefs.DeleteAll();
		PlayerPrefs.SetInt("useKinect", 0);
		PlayerPrefs.SetInt("PlayerLives", 3);
		PlayerPrefs.Save();
		goToNextMenu();
	}
	
	void goToNextMenu()
	{
		script.enabled = false;
    	script2.enabled = true;
	}
	
	void quit()
	{
		print ("quit");
		Application.Quit();
	}
void OnGUI () {
    //load GUI skin
    GUI.skin = newSkin;
   theFirstMenu(); //execute theFirstMenu function
		
		//for future reference. This doesn't work
//		if (menuRect.Contains(Event.current.mousePosition))
//		{
//		// Whatever you want
//		print("Mouse inside " + Event.current.mousePosition);
//		}
		
		
    
    
//		or this
//			if(startRect != null && GUILayoutUtility.GetRect(startRect).Contains(Event.current.mousePosition)) {
//			GUILayout.Label( "Mouse over!" );
//		} else {
//			GUILayout.Label( "Mouse somewhere else" );
//		}
		
		//look  into  http://kinectandunity.blogspot.ie/2012/07/week-4-gui-stuff.html
}
}
