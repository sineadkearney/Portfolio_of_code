using UnityEngine;
using System.Collections;

public class spawnSaveSetup : MonoBehaviour {
	
	public Transform startPoint;
	public AudioClip soundDie;
	public Vector3 curSavePos = new Vector3(0,0,0); //accessed by PlayerProperties_c.cs
	
	private float soundRate = 0.0f;
	private float soundDelay = 0.0f;
	
	private bool loseLife = false;
	
	void OnTriggerEnter(Collider other)
	{
		//if (other.gameObject.name  ==  "savePoint")
		if (other.tag ==  "save_point")
		{
			curSavePos = this.transform.position; //or can write without "this." The player's pos
		}
		//else if (other.gameObject.name == "killbox")
		else if (other.tag ==  "kill_box")
		{
//			PlaySound(soundDie, 0); //play audio clip for death
			loseLife = true;
//			WaitForSeconds (3);
			
			//change Mario state to MarioSmall.  Trun off  rendering, sothat wedon't see the change happening
//			renderer.enabled = false;
//			pProp.playerState = PlayerState.MarioSmall;
//			pProp.changeMario =  true;
//			if (pProp.lives ==  0)
//			{
//				print("return");
//				return;
//			}
//			else
//			{
//				print("else");
//			}
//			renderer.enabled = true;
			transform.position = curSavePos; //just switch around
			
		}
	}
	
	// Use this for initialization
	void Start () {
	
		if (startPoint != null) //if there's an object in startPoint transform
		{
			this.transform.position = startPoint.position;
		}
	}
	
	// Update is called once per frame
	void Update () {
	
		if (loseLife)
		{
			//pProp.lives -= 1; //subtract a life
			loseLife = false;
		}
	}
}
