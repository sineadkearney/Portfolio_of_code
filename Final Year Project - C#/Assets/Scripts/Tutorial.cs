//Description: Used in the tutorial level to show the User how to control the Player. Plays the selected tutorial animtion while the Player is 
//		in the trigger box.
//Instruction: Attach to a gameObject which contains: an animator, a trigger boxCollier, and a child SpriteRenderer.
//		Select the tutorial from TutorialType.
//written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class Tutorial : MonoBehaviour {
	
public enum TutorialType  
{ 
	Walk 		= 0, 
	Run			= 1, 	
	JumpAcross  = 2,  
	PointLeft	= 3,	
	PointRight 	= 4,
	CrouchStop 	= 5,
	CrouchWalk 	= 6,
	PushBox 	= 7,
	JumpUp 		= 8,
	StepForward = 9
}
	
	public TutorialType tutorialType;
	
	private Animator anim;					
	private SpriteRenderer spriteRend;
	private GameObject player;

	void Start () {
	
		anim = GetComponent<Animator>();	
		spriteRend = transform.GetChild(0).GetComponent<SpriteRenderer>(); //the transform only has one child, which is a sprite renderer, so is indexed directly using "0"
		spriteRend.enabled = false;
		
		player = GameObject.FindWithTag("Player");
	}

	void OnTriggerEnter(Collider other)
	{
		if (other.tag == "Player" || other.transform.IsChildOf(player.transform))
			//other.transform.parent.tag == "Player") <- causes an error when "other" has no parent
		{			
			anim.SetInteger("tutorialNum", (int)tutorialType);//tutorialNumber);
			spriteRend.enabled = true;
		}
	}
	
	void OnTriggerExit(Collider other)
	{
		if (other.tag == "Player" || other.transform.IsChildOf(player.transform))
		{			
			spriteRend.enabled = false;
			anim.SetInteger("tutorialNum", -1);
		}
	}
}
