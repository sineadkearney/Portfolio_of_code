//Description: Used as a starting point for the Player in the level, and/or to  kill the Player once they fall off the world stage
//Instruction: attach to the Player's characterController.
//Based on code from http://walkerboystudio.com/html/unity_course_lab_4.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class SpawnSaveSetup : MonoBehaviour {
	
	public Transform startPoint;
	public Vector3 curSavePos = Vector3.zero; //accessed by PlayerProperties.cs
	
	private PlayerProperties pProp;
	
	void OnTriggerEnter(Collider other)
	{
		//if (other.gameObject.name  ==  "savePoint")
		if (other.tag ==  "save_point")
		{
			curSavePos = this.transform.position; //or can write without "this." The player's pos
			Destroy(other.gameObject);
		}
		//else if (other.gameObject.name == "killbox")
		else if (other.tag ==  "kill_box")
		{
			pProp.playerState = PlayerProperties.PlayerState.PlayerDead;
			pProp.changePlayer = true;
			pProp.isDead = true;
		}
	}
	
	// Use this for initialization
	void Start () {
	
		if (startPoint != null) //if there's an object in startPoint transform
		{
			this.transform.position = startPoint.position;
		}
		pProp = GetComponent<PlayerProperties>();
	}
}
