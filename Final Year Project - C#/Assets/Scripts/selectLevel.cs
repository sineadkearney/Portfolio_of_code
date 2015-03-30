//Description: used to select an individual level from a "level selection" area
//Instruction: attach to a gameObject of a door/archway/etc, that contains a triggerBox.
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class SelectLevel : MonoBehaviour {

	public Sprite open;					//the sprite to be used when the door is open
	public Sprite closed;				//the sprite to be used when the door is closed
	
	public string levelName;			//the name of the level be loaded by using this door
	public bool requireAction = false;	//true if the player must perform some action to enter the door. Else false
	public bool isOpen = false;			//true if the door is open.  Else false
	
	public int linkToWorldIndex = 1;	//the index of the world, to which levelName belongs
	public int linkToLevelIndex = 1;	//the index of the level, to which levelName belongs
	
	private bool isInBox = false; 		//true when player is in collision box, else false
	private bool useKinect = false;		//true if using the Kinect. Else false
	private PointManController pmc;
	private MenuConfirmation conMen;
	private GameObject player;
	
	void Start() 
	{ 
		pmc = GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>();
		
		isOpen = linkToLevelIndex == 1 || linkToLevelIndex <= PlayerPrefs.GetInt("highestLevelCompleted")+1;
		//level 1 is open by default, as if we were starting a new game. Level is open if we have completed the previous level
		//TODO: Note: this currently does not take different "worlds" into account
		
		player = GameObject.FindWithTag("Player");
		conMen = GetComponent<MenuConfirmation>();
		conMen.enabled = false;
		
		//set the sprite to "open" or "closed"
		if (isOpen)
			GetComponent<SpriteRenderer>().sprite = open;
		else
			GetComponent<SpriteRenderer>().sprite = closed;

	}
	
	void OnTriggerEnter (Collider other)
	{
		if (other.tag == "Player" || other.transform.IsChildOf(player.transform))
			isInBox = true;	
	}
	
	void OnTriggerExit (Collider other)
	{
		if (other.tag == "Player" || other.transform.IsChildOf(player.transform))
			isInBox = false;		
	}
	
	void Update() 
	{
		useKinect = PlayerPrefs.GetInt("useKinect") == 1; //1 = using the Kinect, 0 = not using the Kinect
		
		
		if (((!useKinect && Input.GetKeyDown(KeyCode.Return)) || (useKinect && pmc.tookStepForward)) 
			&& isInBox && requireAction  && isOpen) //if we are in the box, the door requires an action to be performed, the door is open, and we are either (not using the Kinect, press "return") or (using the kinect, with two hands out)
			ConfirmChoice(levelName);
		else if (isInBox && !requireAction  && isOpen) //we are in the box, we don't need an action, and the door is open
            ConfirmChoice(levelName);

    }
	
	void ConfirmChoice(string level)
	{
		GameObject.FindWithTag("hud").GetComponent<HudController>().enabled = false; 
		//the hudController is listening for a "pause" to be spoken by the user. 
		//Disable this, because the confirmation menu must be accessible via voice.
		PlayerPrefs.SetString("loadThis", level);
		PlayerPrefs.Save();
		Time.timeScale = 0.00000001f; //pause game
		conMen.enabled = true;
	}
}
