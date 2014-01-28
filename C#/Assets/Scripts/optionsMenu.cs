using UnityEngine;
using System.Collections;

public class optionsMenu : MonoBehaviour {

	
public GUISkin newSkin;				//GUI skin applied to buttons
	
private GameObject handCursor;		//hand cursor icon used when using the Kinect to interact with menu
private Rect kinectRect;
private Rect backRect;
//private InteractionManager manager; //interaction manager for Kinect
	
private bool selectStart;			//true if player selected "start" with Kinect. Else false
private bool selectQuit;			//true if player selected "quit" with Kinect. Else false
private bool selectCont;			//true if player selected "continue" with Kinect. Else false
private optionsMenu opMenu;
private pauseMenu pMenu;
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
					case "USE KINECT":
						toggleKinect ();
						break;
					case "BACK":
						back();
						break;
				}

				speechManager.ClearPhraseRecognized();
			}
			
		}
	}
	
	void Start()
	{
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
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
	//options button
	kinectRect = new Rect(55, 50, 180, 40);
    if(GUI.Button(kinectRect, "Using Kinect - "+ (PlayerPrefs.GetInt("useKinect") == 1))) //true if currently using the Kinect. Else false. We want to toggle this.
	{
		toggleKinect();		
    }
    //back button
	backRect = new Rect(55, 100, 180, 40);
    if(GUI.Button(backRect, "Back")) 
	{
		back ();
    }
		
    //layout end
    GUI.EndGroup();
}
	void toggleKinect()
	{
		bool useKinect = (PlayerPrefs.GetInt("useKinect")+1)%2 == 1; //true if we are now using the Kinect. Else false.
		//GameObject.Find("allKinectComponents").SetActive(useKinect);
		//speech
		GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>().enabled = useKinect;
		//pointMan
		//GameObject.FindWithTag("Player").GetComponent<playerControls>().kpc = GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>();
		GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>().enabled = useKinect;
		//kinect Manager
		GameObject.FindWithTag("kinect-gesture").GetComponent<KinectManager>().enabled = useKinect;		
			
		PlayerPrefs.SetInt("useKinect", (PlayerPrefs.GetInt("useKinect")+1)%2); //toggle useKinect
		PlayerPrefs.Save ();
		print ("set prefs  useKinect " + (PlayerPrefs.GetInt("useKinect")+1)%2);
	}
	void back()
	{
		print ("back");
		opMenu.enabled = false;
		pMenu.enabled = true;
	}
	void OnGUI () {
	    //load GUI skin
	    GUI.skin = newSkin;
	   menu(); //execute theFirstMenu function
	}
}