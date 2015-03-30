//Description: resets the PlayerPrefs to default, waits for 1 second, then loads up the main menu
//Instructions: attach to an empty gameobject in a scene used to display the "game over" screen
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class GameOver : MonoBehaviour {

	void Start () {
		StartCoroutine(DoThis());
	}

	
	IEnumerator DoThis()
    {
    	PlayerPrefs.SetInt("playerLives", 3);
		PlayerPrefs.SetInt("playerCoins", 0);
		PlayerPrefs.SetInt("playerState", (int)PlayerProperties.PlayerState.PlayerLarge);
		PlayerPrefs.Save ();
    	yield return new WaitForSeconds(1);
   		Application.LoadLevel("MainMenu");
		
    }
}
