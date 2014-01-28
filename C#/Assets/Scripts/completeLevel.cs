using UnityEngine;
using System.Collections;
//using PlayerPrefsX;


public class completeLevel : MonoBehaviour {
	
	public Sprite open;
	public Sprite closed;
	
	public string levelName;
	public bool requireAction;
	public bool isOpen;
	
	private levelProperties lProp;
	private playerProperties pProp;
	private bool isCompleted; //if the level has been completed
	private int levelIndex;
	
	private bool isInBox = false; //true when player is in collision box, else false
	
	void OnLevelWasLoaded () //run only when the level is loaded 
	{ 
		Start ();		
	}
	
	void Start() //set the sprite to "open" or "closed"
	{ 
		lProp = GameObject.Find("levelProperties").GetComponent<levelProperties>();
		pProp = GameObject.Find("hero").GetComponent<playerProperties>();
		
		if (isOpen)
		{
			GetComponent<SpriteRenderer>().sprite = open;
			print (levelIndex +" open");
		}
		else
		{
			GetComponent<SpriteRenderer>().sprite = closed;
			print (levelIndex + " closed");
		}
	}
	
	void OnTriggerEnter (Collider other)
	{
		if (other.tag == "Player")
		{
				isInBox = true;
//			print ("open: " + isOpen);
		}
		
	}
	void OnTriggerExit (Collider other)
	{
		if (other.tag == "Player")
		{
				isInBox = false;
//			print ("open: " + isOpen);
		}
		
	}
	
	void Update() {
        if (isInBox && requireAction && Input.GetButtonDown("Jump") && isOpen)
            Debug.Log("levelIndex: " + levelIndex  + " open");
		else if (isInBox && requireAction && Input.GetButtonDown("Jump") && !isOpen)
            Debug.Log("levelIndex: " + levelIndex  + " closed");
		else if (isInBox && !requireAction)
		{
			save ();
            Debug.Log("levelIndex: " + levelIndex + " no action");
			PlayerPrefs.SetString("loadThis", "levelSelect");
			PlayerPrefs.Save();
			Application.LoadLevel("loading");
//    		Application.LoadLevel("levelSelect");
		}
//		Debug.Log ("levelIndex: " + levelIndex+", isInBox: " + isInBox + ", isOpen: "+ isOpen + ", requireAction: " + requireAction + ", button: "+ Input.GetButtonDown("Jump"));
        
    }
	
	void save()
	{
		PlayerPrefs.SetInt("playerLives", pProp.lives);
		PlayerPrefs.SetInt("playerCoins", pProp.coins);
		//set only if this is the new highest level, and not a replay
		if (lProp.worldIndex > PlayerPrefs.GetInt("worldOfHighestLevelCompleted") || lProp.levelIndex > PlayerPrefs.GetInt("HighestLevelCompleted"))
		{
			PlayerPrefs.SetInt("worldOfHighestLevelCompleted", lProp.worldIndex);
			PlayerPrefs.SetInt("HighestLevelCompleted", lProp.levelIndex);
			print ("saved level");
		}
		else
			print ("replay - don't save level");
		PlayerPrefs.Save();
	}
//	void Update()
//	{
//		//print (Input.GetButtonDown("Jump"));
//		print (Input.anyKeyDown);
//
//		//print ("levelIndex: " + levelIndex+", isInBox: " + isInBox + ", isOpen: "+ isOpen + ", requireAction: " + requireAction + ", button: "+ Input.GetButtonDown("Jump"));
//
////		if (isInBox && !isOpen && requireAction && Input.GetButtonDown("Jump"))
////		{
////			print("can't go in here");
////		}
////		else 
////			if (isInBox && !requireAction && isOpen)
////		{
////			//Application.LoadLevel(levelName);
////			print (levelIndex + " open:" + isOpen);
////		}
////		else if (isInBox && requireAction && Input.GetButtonDown("Jump") && isOpen)
////		{
////			//Application.LoadLevel(levelName);	
////			print (levelIndex + " open:" + isOpen);
////		}
////		else
////		{
////			print ("");
////		}
//	}
	
}
