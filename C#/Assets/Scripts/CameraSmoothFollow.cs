using UnityEngine;
using System.Collections;

public class CameraSmoothFollow : MonoBehaviour {


	//Camera Smooth Follow  2d
	//Desription: Smoothly follows a cameraTarget with the ability to zoom  in/out based on player jumping
	//Instruction: Assign to a camera an choose ither player or focus pont for camera cameraTarget
	
	public GameObject cameraTarget; //objet to  look at or follow
	public GameObject player; // player object for moving
	
	public float smoothTime			= 0.1f; 	//time for camera dampen
	public bool cameraFollowX		= true; 	//camera follows horizontally
	public bool cameraFollowY  		= true;  	//camera follows verticaly
	public bool cameraFollowHeight	= false; 	//camera  follow  cameraTarget  bject height, not the Y
	public float cameraHeight 		=  2.5f; 	//arbitary, is adjustable in inspector
	public bool cameraZoom			= false; 	//toggle for zoom in and out in ortho size
	public float cameraZoomMax		= 4.0f; 	//min amount camera can zoom in
	public float cameraZoomMin		= 2.6f; 	//max amount camera can pull out
	public float cameraZoomTime		= 0.03f; 	//zoom speed
	public Vector2 velocity ;			//speed of camera movement
	
	private Transform thisTransform; //camera's transform
	private float curPos			= 0.0f; //current position of player (cameraTarget)
	private float playerJumpHeight 	= 0.0f; //distance the camera zooms out relies on jump height
	
	
	void Start()
	{
		thisTransform = this.transform; //==  this.transform
		
	}
	
	void Update ()
	{
		float transX = thisTransform.position.x;
		float transY = thisTransform.position.y;
		float transCamX = cameraTarget.transform.position.x;
		float transCamY = cameraTarget.transform.position.y;
		if (cameraFollowX)
		{
			//thisTransform.position.x  =  Mathf.SmoothDamp(transX, transCamX, ref velocity.x, smoothTime);	
			thisTransform.position  = new Vector3 (Mathf.SmoothDamp(transX, transCamX, ref velocity.x, smoothTime), thisTransform.position.y, thisTransform.position.z);
			//    transform.position = new Vector3 (transform.position.x, 0, transform.position.z);
		}
		
		if (cameraFollowY)
		{
			//thisTransform.position.y  =  Mathf.SmoothDamp(transY, transCamY, ref  velocity.y, smoothTime);	
			thisTransform.position  = new Vector3 (thisTransform.position.x, Mathf.SmoothDamp(transY, transCamY, ref  velocity.y, smoothTime), thisTransform.position.z);
			
		}
		else if (cameraFollowHeight) //!cameraFollowY
		{
			//camera.transform.position.y = cameraHeight;
			camera.transform.position = new Vector3(camera.transform.position.x, cameraHeight, camera.transform.position.z);
		}
		
		playerControls playerControl =  player.GetComponent<playerControls>();
		
		if (cameraZoom)
		{
			//get current position of player's current Y position (getComponent -> where's  player)
			curPos = player.transform.position.y; //will change even even moving through the air
			playerJumpHeight = curPos - playerControl.startPos; //startPos does no update once Mario is in the air
			//subtract current height from playerControl position
			
			//check for player's position and how it relates to the curPos and cur jump height position
			if  (playerJumpHeight < 0) //negative
			{
				playerJumpHeight *= -1;
			}
			if (playerJumpHeight > cameraZoomMax)
			{
				playerJumpHeight = cameraZoomMax;
			}
			
			//adjust the orthograhic size from camera to equal height jump distance (Lerp)
			this.camera.orthographicSize = Mathf.Lerp(this.camera.orthographicSize,  playerJumpHeight + cameraZoomMin, Time.time * cameraZoomTime);
			//
		}
	}
		
}