using UnityEngine;
using System.Collections;

public class item_pickup : MonoBehaviour {


//Item Pickup Component
//Description:  Set the pickup "type" and "value" for an object
//Instructions: Assign type, particle and sound for/to each pickup item

public enum PickupType		 //list of pickup items
{
	Grow		= 0, //grows  Marios
	Key			= 1, //key for objects (undefined)
	Coin		= 2, //coins for  hud use
	Fireball  	= 3, //changes mario to fireball-mario
	ExtraLife 	= 4, //adds an extra life to hud
	GameTime 	= 5	 //increases the amount of time in game
}

public PickupType pickupType		= PickupType.Grow;	//set starting value for pickup type
public int pickupValue				= 1;			//set value for each pickup type selected
//var soundItemPickup	: AudioClip;		//sound file played after pickup
//var soundDelay		: float = 0.0;		//amount of time to delay before playing sound again
//var soundRate		: float = 0.0;		//variable holds current time & delay amount

private GameObject playerGameObject;		//store playerGameObeject -> Player	
//private GameObject hudGameObjectt;		//store hudGameObject -> Hud
private bool extraLifeEnabled		= false;	//toggle for extra life

void Start ()
{
	playerGameObject = GameObject.FindWithTag("Player"); 	//get gameObject with "Player" tag
//	hudGameObject = GameObject.FindWithTag("hud");		//get gameObject with "hud" tag
}


void OnTriggerEnter (Collider other)
{
	if (other.tag == "Player") //collision box around player character's body, or their feet (from landing on it)
	{
		playerProperties pProp = playerGameObject.GetComponent<playerProperties>();
		ApplyPickup (pProp);
		
//		renderer.enabled = false; //just removes onscreen as soon as collision occurs
		
//		if (soundItemPickup)
//		{
//			PlaySound(soundItemPickup, 0);
//		}
//		yield WaitForSeconds (audio.clip.length); //sound doesn't play if this line is in PlaySound()
		if (extraLifeEnabled)
		{
			pProp.lives +=  pickupValue;
			extraLifeEnabled = false;
		}
		Destroy (gameObject); //coin, key, etc. removes in heirarcy after sound has played
	}
	else{print (other.tag);}
}

void ApplyPickup (playerProperties playerStatus) //apply pickup to player
{
//	var hudConnect = hudGameObject.GetComponent (hudController); //get the hud  controller
	
	//different response for each pickup type
	switch (pickupType)
	{
		case PickupType.Grow:
//			if (playerStatus.playerState != PlayerState.PlayerFire)
//			{
//				playerStatus.playerState = PlayerState.PlayerLarge; //change to large if Mario small
//				playerStatus.changeMario = true;				//enable Mario change
//			}
			break;
		case PickupType.Key:
			playerStatus.AddKeys(pickupValue);
			break;
		case PickupType.Coin:
			playerStatus.AddCoin(pickupValue);	//add a coin to the current coin count
//			hudConnect.coin += pickupValue;		//add a coin to the hud
			break;
		case PickupType.Fireball:
//			playerStatus.playerState = PlayerState.PlayerFire;	//change to fire state
//			playerStatus.hasFire = true;						//fire ability = true
//			playerStatus.changePlayer = true;					//enable Mario change
			break;
		case PickupType.ExtraLife:
			extraLifeEnabled = true;
			break;
		case PickupType.GameTime:
			//playerStatus.addTime(pickupValue);
			break;
	}
}

//function PlaySound (soundName, soundDelay)
//{
//	if (!audio.isPlaying && Time.time > soundRate) 
//	{
//		soundRate = Time.time + soundDelay;
//		audio.clip = soundName;
//		audio.Play();
//	}
//}
//
//@script AddComponentMenu ("WalkerBoys/Interactive/Pickup Script"); //assign this script to the menu
}
