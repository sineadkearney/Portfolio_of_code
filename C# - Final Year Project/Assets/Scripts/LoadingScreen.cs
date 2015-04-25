// Description: used as a loading screen inbetween loading different levels
// Instructions: attach to an empty gameObject in a level which is used in a level with a loading screen
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class LoadingScreen : MonoBehaviour {
	
	// Use this for initialization
	void Start () 
	{
		StartCoroutine(DoThis());	
	}
	
	IEnumerator DoThis()
    {
		string test = PlayerPrefs.GetString("loadThis");
		
		if (test == "") //PlayerPrefs.GetString failed
			test = "mainMenu";
		
    	yield return new WaitForSeconds(0.5f);
   		Application.LoadLevel(test);
		
    }
}
