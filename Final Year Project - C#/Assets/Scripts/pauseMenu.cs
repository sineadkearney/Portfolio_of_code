using UnityEngine;
using System.Collections;

public class pauseMenu : MonoBehaviour {

	
public GUISkin newSkin;				//GUI skin applied to buttons
	
private GameObject handCursor;		//hand cursor icon used when using the Kinect to interact with menu
private Rect resumeRect;
private Rect optionsRect;
private Rect helpRect;
private Rect exitRect;
//private InteractionManager manager; //interaction manager for Kinect
private pauseMenu pMenu;
private optionsMenu opMenu;
private int worldIndex;				//used in pause menu to see if we should go back to the levelSelect scene, or to mainMenu scene
	
private bool selectStart;			//true if player selected "start" with Kinect. Else false
private bool selectQuit;			//true if player selected "quit" with Kinect. Else false
private bool selectCont;			//true if player selected "continue" with Kinect. Else false

public SpeechManager speechManager; //accessed by the options Menu, when using the Kinect

	void Awake()
	{
//		manager = GetComponent<InteractionManager>();
//		handCursor = GameObject.Find("HandCursor");
	}
	
//	void Update()
//	{
//		//get the co-ords of the handCursor, ie, if the actual mouse cursor was  being used (and not the handCursor)
//		Vector3 screenNormalPos = Vector3.zero;
//		Vector3 screenPixelPos = Vector3.zero;
//		//print (startRect.Contains(new Vector2(handCursor.transform.position.x, handCursor.transform.position.y)));
//		screenNormalPos = manager.GetRightHandScreenPos();
//		
//		if(screenNormalPos != Vector3.zero)
//		{
//					// convert the normalized screen pos to pixel pos
//					screenPixelPos.x = (int)(screenNormalPos.x * Camera.mainCamera.pixelWidth);
//					screenPixelPos.y = (int)(screenNormalPos.y * Camera.mainCamera.pixelHeight);
//					print (screenPixelPos); //321, 248
//
//		}
//	
//		Vector2 mousePos = new Vector2(screenPixelPos.x - (Screen.width/4), (Screen.height - screenPixelPos.y) - (Screen.height/10)); //hack.
//		//mousePos = new Vector2(Input.mousePosition.x - (Screen.width/4), (Screen.height - Input.mousePosition.y) - (Screen.height/10)); //hack.
//		selectStart = startRect.Contains(mousePos) && manager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
//		selectQuit = quitRect.Contains(mousePos) && manager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
//		
//	}
	
	void Update ()
	{
		if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				
				switch(sPhraseTag)
				{				
					case "RESUME":
						resume ();
						break;
					case "OPTIONS":
						options();
						break;
					case "HELP":
						help();
						break;
					case "EXIT":
						exitLevel();
						break;
				}

				speechManager.ClearPhraseRecognized();
			}
			
		}
	}
	
	void Start()
	{
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
		worldIndex = GameObject.Find("levelProperties").GetComponent<levelProperties>().worldIndex;
	}
	
void menu() {
		
	//GameObject handCursor = GameObject.Find("HandCursor");	
	pMenu = GetComponent<pauseMenu>();
	opMenu = GetComponent<optionsMenu>();
    //layout start
    GUI.BeginGroup(new Rect(Screen.width / 2 - 150, 50, 300, 300));
   
    //the menu background box
    GUI.Box(new Rect(0, 0, 300, 300), "");
   
    //logo picture
    //GUI.Label(new Rect(15, 10, 300, 68), logoTexture);
   
    ///////main menu buttons
    //resume button
	resumeRect = new Rect(55, 50, 180, 40);		
    if(GUI.Button(resumeRect, "Resume"))
	{
		resume ();
    }
	//options button
	optionsRect = new Rect(55, 100, 180, 40);
    if(GUI.Button(optionsRect, "Options")) //TODO: should only appear when there is a game to be continued
	{
		options();
    }
	//help button
	helpRect = new Rect(55, 150, 180, 40);
	if(GUI.Button(helpRect, "Help"))
	{
			help ();
    }	
		
    //exit button
	exitRect = new Rect(55, 200, 180, 40);
	string buttonText =  "Exit Level";
	if (worldIndex ==  0) //level is levelSelect
	{
		buttonText = "Exit to Main Menu";
	}
    if(GUI.Button(exitRect, buttonText)) 
	{
			exitLevel();
    }
		
    //layout end
    GUI.EndGroup();
}
	void options()
	{
		print("options");
		pMenu.enabled = false;
		opMenu.enabled = true;
	}
	void help()
	{
		print ("help");
	}
	
	void resume()
	{
		print ("resume");
		pMenu.enabled = false;
		GetComponent<hudController>().isPaused = false;
		Time.timeScale = 1.0f;
	}
	
	void  exitLevel()
	{
		print ("exit");
		resume ();
		string level = "levelSelect";
		if(worldIndex ==  0)
			level = "mainMenu";
		PlayerPrefs.SetString("loadThis", level);
		PlayerPrefs.Save();
		Application.LoadLevel("loading");
	}
	
	void OnGUI () {
	    //load GUI skin
	    GUI.skin = newSkin;
	   menu(); //execute theFirstMenu function
	}
}