//Description: accessed through MenuPause.cs. Returns to MenuPause.cs. Contains short instructions for the User on how to interact with the game.
//Instruction: attach to the hud gameObject, which contains the other in-game menus
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class MenuHelp : MonoBehaviour {

	
public GUISkin minSkin;				//GUI skin applied to buttons
public GUISkin maxSkin;
	
private Rect backRect;
private bool selectBack = false;	//true if player selected "back" with Kinect. Else false
	
private MenuPause pMenu;
private MenuHelp hMenu;

private InteractionManager intManager; //interaction manager for Kinect
private SpeechManager speechManager; //accessed by the options Menu, when using the Kinect

	 public Vector2 scrollPosition = Vector2.zero;
	
	void Start()
	{
		speechManager = GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>();
		intManager = GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>();
		
		pMenu = GetComponent<MenuPause>();
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
			//Vector2 mousePosRight = new Vector2(screenPixelPosR.x,Screen.height - screenPixelPosR.y);
			Vector2 mousePosRight = new Vector2(screenPixelPosR.x - (Screen.width/4), (Screen.height - screenPixelPosR.y) - (Screen.height/10)); //hack.
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
					case "BACK":
						Back();
						break;
				}

				speechManager.ClearPhraseRecognized();
			}
			
		}
	}
	
void Menu() {
	
	//TODO: make size of menu related to size of screen
	GUI.skin = minSkin; //larger font size	
		
    //layout start
    GUI.BeginGroup(new Rect(Screen.width / 2 - 200, 0, 500, 430));
		
    //the menu background box
    GUI.Box(new Rect(0, 0, 500, 430), "");
   

	GUI.Label(new Rect(10, 10, 120, 40), "Change direction:");
	GUI.Label(new Rect(140, 10, 350, 40), "Move you hand out to your right or left");
	
	GUI.Label(new Rect(10, 40, 120, 40), "Jump:");
	GUI.Label(new Rect(140, 40, 350, 40), "Jump straight up");
		
	GUI.Label(new Rect(10, 70, 120, 40), "Walk:");
	GUI.Label(new Rect(140, 70, 350, 40), "walk on the spot");
		
	GUI.Label(new Rect(10, 100, 120, 40), "Run:");
	GUI.Label(new Rect(140, 100, 350, 40), "Run on the spot");
		
	GUI.Label(new Rect(10, 130, 120, 40), "Crouch:");
	GUI.Label(new Rect(140, 130, 350, 40), "Crouch");
		
	GUI.Label(new Rect(10, 160, 120, 40), "Go through arch:");
	GUI.Label(new Rect(140, 160, 350, 40), "Step forward");
		
	GUI.Label(new Rect(10, 200, 120, 60), "Move camera:");
	GUI.Label(new Rect(140, 200, 350, 60), "Hand out in front of you, make a fist, drag the screen around");
	
	GUI.Label(new Rect(10, 255, 120, 60), "Press button:");
	GUI.Label(new Rect(140, 255, 350, 60), "move a hand out in front of you, move cursor over button, make a fist");
	
    //back button
	backRect = new Rect(100, 310, 180, 100);
    if(GUI.Button(backRect, "Back")  || selectBack) 
	{
		Back ();
    }
		
    //layout end
    GUI.EndGroup();
}

	void Back()
	{
		hMenu.enabled = false;
		pMenu.enabled = true;
	}
	
	void OnGUI () {
		Menu();
	}
}