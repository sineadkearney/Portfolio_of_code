// Description: Used to complete a level
// Instruction: attach to gateway/door at the end of a level, and assign a level to load next
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;


public class CompleteLevel : MonoBehaviour {
	
	public bool requireAction = true;	//true if the player must perform some action to enter the door. Else false
	public string levelName;			//the level to load upon completing the current level
	
	private bool isInBox = false; 		//true when player is in collision box, else false
	private bool useKinect = false;
	
	private PointManController pmc;
	private GameObject player;
	private LevelProperties lProp;
	private PlayerProperties pProp;
	
	void Start()
	{ 
		pmc = GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>();
		player = GameObject.FindWithTag("Player");
		
		lProp = GameObject.Find("levelProperties").GetComponent<LevelProperties>();
		pProp = GameObject.Find("hero").GetComponent<PlayerProperties>();	
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
			&& isInBox && requireAction) //if we are in the box, the door requires an action to be performed, the door is open, and we are either (not using the Kinect, press "return") or (using the kinect, with two hands out)
			LoadWorldMap();
		else if (isInBox && !requireAction) //we are in the box, we don't need an action, and the door is open
           LoadWorldMap();

    }
	
	void LoadWorldMap()
	{
		int worldIndexHighest = PlayerPrefs.GetInt("worldOfHighestLevelCompleted"); 
		int levelIndexHighest = PlayerPrefs.GetInt("highestLevelCompleted");
		
		if (lProp.worldIndex > 0) //ensures the world index is at least 1. False for any tutorial level
		{
			//save coin amount, lives amount, playerState
			PlayerPrefs.SetInt("playerLives", pProp.lives);
			PlayerPrefs.SetInt("playerCoins", pProp.coins);
			PlayerPrefs.SetInt("playerState", (int)pProp.playerState);
	
			//Update the values for the highest world and level completed, only if this is the new highest level, and not a replay
			
			
			if ((lProp.worldIndex == worldIndexHighest && lProp.levelIndex > levelIndexHighest) //the world index is the same, level index is greater, ie moving from level 1.4 to 1.5
				|| lProp.worldIndex > worldIndexHighest) //the world index is greater, ignore the level index (ie, moving from level 1.5 to 2.1
			{
				PlayerPrefs.SetInt("worldOfHighestLevelCompleted", lProp.worldIndex);
				PlayerPrefs.SetInt("highestLevelCompleted", lProp.levelIndex);
			}
			
			
		}
		//else we are in a tutorial level/
		//There are two following possibilities: 
		//1. we are playing this tutorial without having started a game: worldIndexHighest == 0 && levelIndexHighest == 0. 
		//	- The current PlayerPrefs can be overwritten, so set previousGameExits = 0
		//2. we are playing this tutorial after already finishing a level in the game. worldIndexHighest != 0 && levelIndexHighest != 0
		//  - The current PlayerPrefs can't be overwritten, so leave previousGameExits = 1
		else if (worldIndexHighest == 0 && levelIndexHighest == 0) 
		{
			PlayerPrefs.SetInt("previousGameExists", 0); //no previous game exists
		}
		
		PlayerPrefs.SetString("loadThis", levelName);
		PlayerPrefs.Save();
		Application.LoadLevel("loading"); //move to the loading screen
	}
}
