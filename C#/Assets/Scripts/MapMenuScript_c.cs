using UnityEngine;
using System.Collections;

public class MapMenuScript_c : MonoBehaviour {

public GUISkin newSkin;
public Texture2D mapTexture;
	
private GameObject handCursor;
private Rect startRect;
private Rect backRect;
private InteractionManager manager;
public SpeechManager speechManager; //accessed by the options Menu, when using the Kinect
	
private Vector2 mousePos;
private bool selectStart;
private bool selectBack;
private MainMenuScript_c script;
private MapMenuScript_c script2;
	
	void Awake()
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
	
		mousePos = new Vector2(screenPixelPos.x - (Screen.width/4), (Screen.height - screenPixelPos.y) - (Screen.height/10)); //hack.
		//mousePos = new Vector2(Input.mousePosition.x - (Screen.width/4), (Screen.height - Input.mousePosition.y) - (Screen.height/10)); //hack.
		selectStart = startRect.Contains(mousePos) && manager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
		selectBack = backRect.Contains(mousePos) && manager.GetRightHandEvent() == InteractionWrapper.InteractionHandEventType.Grip;
		
		//speech interaction
		if(speechManager != null && speechManager.enabled && speechManager.IsSapiInitialized())
		{
			if(speechManager.IsPhraseRecognized())
			{
				string sPhraseTag = speechManager.GetPhraseTagRecognized();
				
				switch(sPhraseTag)
				{				
					case "START":
						startLevel(); 
						break;
					case "BACK":
						back ();
						break;
				}

				speechManager.ClearPhraseRecognized();
			}			
		}
	}
	
void theMapMenu() {
		script = GetComponent<MainMenuScript_c>();
		script2 = GetComponent<MapMenuScript_c>();
		
    //layout start
    GUI.BeginGroup(new Rect(Screen.width / 2 - 200, 50, 400, 300));
   
    //boxes
    GUI.Box(new Rect(0, 0, 400, 300), "");
    GUI.Box(new Rect(96, 20, 200, 200), "");
    GUI.Box(new Rect(96, 222, 200, 20), "Level 1");
   
    //map preview/icon
    GUI.Label(new Rect(100, 20, 198, 198), mapTexture);
   
    //buttons
	startRect = new Rect(15, 250, 180, 40);
    if(GUI.Button(startRect, "Start") || selectStart) 
	{
		startLevel();
    }
	backRect = new Rect(205, 250, 180, 40);
    if(GUI.Button(backRect, "Back to Main Menu") || selectBack) 
	{
    	back ();
    }
   
    //layout end
    GUI.EndGroup();
}
	void back()
	{
		script.enabled = true;
    	script2.enabled = false;
	}
	
	void startLevel()
	{
		PlayerPrefs.SetString("loadThis", "levelSelect");
		PlayerPrefs.Save();
		Application.LoadLevel("loading");
//    	Application.LoadLevel("levelSelect");
		script.enabled = false;
		script2.enabled = false;
	}
	
void OnGUI () {
    //load GUI skin
    GUI.skin = newSkin;
   
    //execute theMapMenu function
    theMapMenu();
}
}
