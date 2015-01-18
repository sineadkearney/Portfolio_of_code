//Description: accessed through MenuPause.cs. Returns to MenuPause.cs. Contains the option to turn on/off Kinect input
//Instruction: attach to the hud gameObject, which contains the other in-game menus
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class MenuOptions : MonoBehaviour {
	
public GUISkin minSkin;				//GUI skin applied to buttons
public GUISkin maxSkin;
	
private Rect kinectRect;
private Rect backRect;
private bool selectKinect = false;	//true if player selected "use kinect" with Kinect. Else false
private bool selectBack = false;	//true if player selected "back" with Kinect. Else false
	
private MenuOptions opMenu;
private MenuPause pMenu;

private InteractionManager intManager; //interaction manager for Kinect
private SpeechManager speechManager; //accessed by the options Menu, when using the Kinect
	
	void Start()
	{
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
		intManager = GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>();
		pMenu = GetComponent<MenuPause>();
		opMenu = GetComponent<MenuOptions>();
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
			Vector2 mousePosRight = new Vector2(screenPixelPosR.x - (Screen.width/4), (Screen.height - screenPixelPosR.y) - (Screen.height/10)); //hack.
			selectKinect 	= kinectRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
			selectBack 		= backRect.Contains(mousePosRight) && intManager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;

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
			selectKinect 	= selectKinect || (kinectRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
			selectBack	 	= selectBack || (backRect.Contains(mousePosLeft) && intManager.GetLeftHandEvent() == InteractionWrapper.InteractionHandEventType.Grip);
		}
		
		//SPEECH RECOGNITION
		if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				
				switch(sPhraseTag)
				{				
					case "USE KINECT":
						ToggleKinect ();
						break;
					case "BACK":
						Back();
						break;
				}
				speechManager.ClearPhraseRecognized();
			}			
		}
	}
	
void Menu() {
	//layout start
	int overallSizeX = Screen.width/2;
	int overallSizeY = (Screen.height/5)*3; 
	if (overallSizeX < 300) overallSizeX = 300; //impose min size restrictions
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
   
   	int buttonSizeX = (int)(overallSizeX/1.5);
	int buttonSizeY = (int)(overallSizeY/3.5);

   	int gapX = (overallSizeX - buttonSizeX ) / 2; // overall size, minus the size of two button, divided by 3 because there are 3 gaps (one at each border, one between buttons)
	int gapY = (overallSizeY - (buttonSizeY * 3)) / 4; // overall size, minus the size of three button, divided by 4 because there are 4 gaps (one at each border, one between buttons)
	
	kinectRect = new Rect(gapX, gapY+buttonSizeY+gapY, buttonSizeX, buttonSizeY);
    ///////main menu buttons
	//options button
 
	if (PlayerPrefs.GetInt("useKinect") == 1) //using the Kinect
	{
		GUI.Label(new Rect(gapX, gapY, buttonSizeX, buttonSizeY), "You are using the Kinect");
		//GUI.Label(new Rect(gapX, gapY, buttonSizeX, buttonSizeY), "You are using the Kinect", myStyle);
		if(GUI.Button(kinectRect, "Stop using the \"Kinect\"") || selectKinect) //true if currently using the Kinect. Else false. We want to toggle this.
			ToggleKinect();		
	}
	else {
		GUI.Label(new Rect(gapX, gapY, buttonSizeX, buttonSizeY), "You are not using the Kinect");
		//GUI.Label(new Rect(gapX, gapY, buttonSizeX, buttonSizeY), "You are not using the Kinect", myStyle);
		if(GUI.Button(kinectRect, "Start using the \"Kinect\"") || selectKinect) //true if currently using the Kinect. Else false. We want to toggle this.
			ToggleKinect();	
		}

    //back button
	backRect = new Rect(gapX, gapY+buttonSizeY+gapY+buttonSizeY+gapY, buttonSizeX, buttonSizeY);
	//backRect = new Rect(55, 170, 180, 100);
    if(GUI.Button(backRect, "\"Back\"")  || selectBack) 
	{
		Back ();
    }
		
    //layout end
    GUI.EndGroup();
}
	void ToggleKinect()
	{
		bool useKinect = (PlayerPrefs.GetInt("useKinect")+1)%2 == 1; //true if we are now using the Kinect. Else false.
		//GameObject.Find("allKinectComponents").SetActive(useKinect);
		//speech
		GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>().enabled = useKinect;
		//pointMan
		GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>().enabled = useKinect;
		//kinect Manager
		GameObject.FindWithTag("kinect-gesture").GetComponent<KinectManager>().enabled = useKinect;		
		//interaction Manager
		GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>().enabled = useKinect;	
		
		PlayerPrefs.SetInt("useKinect", (PlayerPrefs.GetInt("useKinect")+1)%2); //toggle useKinect
		PlayerPrefs.Save ();
	}
	
	void Back()
	{
		opMenu.enabled = false;
		pMenu.enabled = true;
	}
	void OnGUI () {
	   Menu();
	}
}