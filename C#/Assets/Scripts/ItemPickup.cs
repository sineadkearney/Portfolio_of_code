//Item Pickup Component
//Description:  Set the pickup "type" and "value" for an item.
//Instructions: Assign type, particle and sound for/to each pickup item
//Based on code from http://walkerboystudio.com/html/unity_course_lab_4.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class ItemPickup : MonoBehaviour {


public enum PickupType		
{
	Grow		= 0, //changes playerState from Small to Large
	Coin		= 1, //adds an extra coin
	ExtraLife 	= 2, //adds an extra life
}

public PickupType pickupType		= PickupType.Grow;	//set starting value for pickup type
public int pickupValue				= 1;				//set value for each pickup type selected
public AudioClip soundItemPickup;						//sound file played after pickup

private	PlayerProperties pProp;

void Start ()
{
	pProp = GameObject.FindWithTag("Player").GetComponent<PlayerProperties>();	
}


void OnTriggerEnter (Collider other)
{
	if (other.tag == "Player") 
	{
		ApplyPickup (pProp);
		if (soundItemPickup)
		{
			AudioSource.PlayClipAtPoint(soundItemPickup, transform.position);
		}
		Destroy (gameObject);
	}
}

void ApplyPickup (PlayerProperties playerStatus) //apply pickup to Player
{
	switch (pickupType)
	{
		case PickupType.Grow:
			if ((int)playerStatus.playerState == (int)PlayerProperties.PlayerState.PlayerSmall)
			{
				playerStatus.playerState = PlayerProperties.PlayerState.PlayerLarge; //change playerState to large if Player small
				playerStatus.changePlayer = true;				//enable Player to change states
			}
			break;
		case PickupType.Coin:
			playerStatus.AddCoin(pickupValue);	//add a coin to the current coin count
			break;
		case PickupType.ExtraLife:
			playerStatus.lives +=  pickupValue; //add a life to the current life amount
			break;
	}
}
}
