using UnityEngine;
using System.Collections;

public class PlayerProperties : MonoBehaviour {

	private int prevTriggerWeight = -1;

	private string[] wrongWay = {"You're going the wrong way", "... what did I just say?", "TURN AROUND!"};
	private int wrongWayIndex = 0;

	private string[] rightWay = {"getting warmer!", "keep going", "getting there", "almost!"};
	private int rightWayIndex = 0;

	private string wrongToRightWay = "That's better! Now keep moving";
	private string rightToWrongWay = "Woops, you took a wrong turn!";
	
	enum PlayerDirection
	{
		//NewlyWalkingInRightDir,
		//NewlyWalkingInWrongDir,
		WalkingInRightDir,
		WalkingInWrongDir
	};
	private PlayerDirection playerDir;

	//////////////////////
	GameObject phone;
	PhoneScript ps;

	// Use this for initialization
	void Start () {
		playerDir = PlayerDirection.WalkingInRightDir;
		phone = GameObject.Find ("Phone");
		ps = phone.GetComponent<PhoneScript> ();
	}
	
	// Update is called once per frame
	void Update () {
	
	}

	public void HandleTriggerWeight(int newTriggerWeight, string textSender, string textMessage)
	{
		Debug.Log ("prevTriggerWeight " + prevTriggerWeight + " newTriggerWeight " + newTriggerWeight);
		Debug.Log ("playerDir " + playerDir);
		bool sendText = true;
		if (prevTriggerWeight == -1 || (prevTriggerWeight > newTriggerWeight && playerDir == PlayerDirection.WalkingInRightDir))
		{
			//you're still walking in the correct direction

			textMessage += rightWay[rightWayIndex];
			rightWayIndex +=1;
			if (rightWayIndex == rightWay.Length)
				rightWayIndex = rightWay.Length-1;
			wrongWayIndex = 0;//reset
			//playerDir = PlayerDirection.WalkingInRightDir
		}
		else if (prevTriggerWeight > newTriggerWeight && playerDir == PlayerDirection.WalkingInWrongDir)
		{
			//you were walking in the wrong direction, but now walking in the correct direction

			textMessage += wrongToRightWay;
			rightWayIndex = 0;
			wrongWayIndex = 0;//reset
			playerDir = PlayerDirection.WalkingInRightDir;
		}
		else if (prevTriggerWeight < newTriggerWeight && playerDir == PlayerDirection.WalkingInRightDir)
		{
			//you were walking in the correct direction, but now walking in the wrong direction

			textMessage += rightToWrongWay;

			rightWayIndex = 0;
			wrongWayIndex = 0;//reset
			playerDir = PlayerDirection.WalkingInWrongDir;
		}
		else if (prevTriggerWeight < newTriggerWeight && playerDir == PlayerDirection.WalkingInWrongDir)
		{
			//you're still walking in the wrong direction

			textMessage += wrongWay[wrongWayIndex];
			wrongWayIndex +=1;
			if (wrongWayIndex == wrongWay.Length)
				wrongWayIndex = wrongWay.Length-1;
			rightWayIndex = 0;//reset
			//playerDir = PlayerDirection.WalkingInWrongDir
		}
		//else you walked into a trigger box with the same weight as you already have. Probably the same trigger box
		else
		{
			sendText = false;
		}

		if (sendText)
		{
			prevTriggerWeight = newTriggerWeight;
			TextMessage txt = new TextMessage (textSender, textMessage);
			string str = txt.ToString();
			ps.PhoneUpdateText (str);
		}
	}
}
