using UnityEngine;
using System.Collections;

public class LoadingScreen : MonoBehaviour {
	
	void OnLevelWasLoaded () //run only when the level is loaded 
	{ 
		string test = "mainMenu";
		if (PlayerPrefs.HasKey("loadThis"))
		{
			test = PlayerPrefs.GetString("loadThis");
		}
		print(test);
		Application.LoadLevel(test);		
	}
	
//	// Use this for initialization
//	void Start () {
//		
//	
//	}
}
