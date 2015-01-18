//Description: allows the Player or an emeny to jump up through a platform, but to then land on top of the platform when coming back down
//Instruction: attach to an object whos parent contains a non-trigger boxCollider (which allows the Player to stand on it).
//		the object should contain a trigger boxCollider and this script. The object's order-in-layer determins if Player jumps in front or behind the object.
//code written by Sinéad Kearney, based on http://forum.unity3d.com/threads/71790-layers-collision-and-one-way-platforms-%28a-question%29

using UnityEngine;
using System.Collections;

public class JumpThroughPlatform : MonoBehaviour {
	
	
	private BoxCollider box;
	void Start () {
		box = transform.parent.GetComponent<BoxCollider>();
	}
	
	void OnTriggerEnter(Collider other)
	{
		
		if (other.tag == "Player" || other.tag == "enemy")
			Physics.IgnoreCollision(other.GetComponent<CharacterController>(), box);			
		else if (other.tag == "playerCollisionBoxBody")
			//ignore any collisions, can walk through parent boxCollider
			Physics.IgnoreCollision(GameObject.FindWithTag("Player").GetComponent<CharacterController>(),  box);
	}
	
	void OnTriggerExit(Collider other)
	{
		if (other.tag == "Player" || other.tag == "enemy")
			Physics.IgnoreCollision(other.GetComponent<CharacterController>(), box, false);		
		else if (other.tag == "playerCollisionBoxBody")
			//ignore any collisions, can walk through parent boxCollider
			Physics.IgnoreCollision(GameObject.FindWithTag("Player").GetComponent<CharacterController>(),  box, false);
	}

	
}
