using UnityEngine;
using System.Collections;

public class selectLevel : MonoBehaviour {

	public Sprite open;			//the sprite to be used when the door is open
	public Sprite closed;		//the sprite to be used when the door is closed
	
	public string levelName;	//the name of the level be loaded by using this door
	public bool requireAction;	//true if the player must perform some action to enter the door. Else false
	public bool isOpen;			//true if the door is open.  Else false
	
	public int linkToWorldIndex;		//the index of the world, to which levelName belongs
	public int linkTolevelIndex;		//the index of the level, to which levelName belongs
	
	private bool isInBox = false; //true when player is in collision box, else false
	
	
	void OnLevelWasLoaded () //run only when the level is loaded 
	{ 
		Start ();		
	}
	
	void Start() //set the sprite to "open" or "closed"
	{ 
		// the door isOpen iff
		// levelIndex is 1 ||
		// levelIndex (eg 3) is in the range [1 -> PlayerPrefs.GetInt("HighestLevelCompleted") (eg 2) +1 ]
		//		&& worldIndex (eg 1) is in the range [1 -> PlayerPrefs.GetInt("worldOfHighestLevelCompleted") (eg 2)]
		// 		TODO: work on "world" later
		
		isOpen = linkTolevelIndex == 1 || linkTolevelIndex <= PlayerPrefs.GetInt("HighestLevelCompleted")+1;
		
		if (isOpen)
		{
			GetComponent<SpriteRenderer>().sprite = open;
			print (linkTolevelIndex +" open " + isOpen);
		}
		else
		{
			GetComponent<SpriteRenderer>().sprite = closed;
			print (linkTolevelIndex + " closed " + isOpen);
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
		if (isInBox && requireAction && Input.GetButtonDown("Jump") && isOpen && levelName.Equals("quitToMenu"))
		{
//            Debug.Log("delete all playerPrefs and go to main menu");
//			PlayerPrefs.DeleteAll();
			Application.LoadLevel("mainMenu");
		}
        else if (isInBox && requireAction && Input.GetButtonDown("Jump") && isOpen)
		{
            Debug.Log("load: " + levelName  + " open");
			//Application.LoadLevel(levelName);
			loadLevel (levelName);
		}
		else if (isInBox && requireAction && Input.GetButtonDown("Jump") && !isOpen)
            Debug.Log("load: " + levelName  + " closed");
		else if (isInBox && !requireAction)
		{
            Debug.Log("load: " + levelName  + " no action");
			//Application.LoadLevel(levelName);
			loadLevel (levelName);
		}
//		Debug.Log ("levelIndex: " + levelIndex+", isInBox: " + isInBox + ", isOpen: "+ isOpen + ", requireAction: " + requireAction + ", button: "+ Input.GetButtonDown("Jump"));
        
    }
	
	void loadLevel(string level)
	{
		PlayerPrefs.SetString("loadThis", level);
		PlayerPrefs.Save();
		Application.LoadLevel("loading");
	}

}
