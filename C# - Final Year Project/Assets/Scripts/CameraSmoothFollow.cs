//Camera Smooth Follow  2d
//Desription: Smoothly follows a cameraTarget on the x-axis, y-axis, or both.
//Instruction: Assign to a camera an choose either player or focus pont for camera cameraTarget
//Based on code from http://walkerboystudio.com/html/unity_course_lab_4.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class CameraSmoothFollow : MonoBehaviour {
	
	public GameObject cameraTarget; 			//object to  look at or follow
	public GameObject player; 					// player object for moving
	
	public float smoothTime			= 0.1f; 	//time for camera dampen
	public bool cameraFollowX		= true; 	//true if camera follows target horizontally, else false
	public bool cameraFollowY  		= true;  	//true if camera follows target vertically, else false
	public bool cameraFollowHeight	= false; 	//camera  follow  cameraTarget  oject height, not the Y
	public float cameraHeight 		=  2.5f; 	//arbitary, is adjustable in inspector
	public Vector2 velocity ;					//speed of camera movement
	
	private Transform thisTransform; 			//camera's transform
	private InteractionManager intManager; 		//interaction manager for Kinect	
	private float cameraWidthPx;				//the width of the camera in pixels
	private float cameraHeightPx;				//the height of the camera in pixels
	
	private float initialTargetX	= 0.0f;		//the initial x-xis value of the camera's target
	private float initialTargetY	= 0.0f;		//the initial y-xis value of the camera's target
	
	void Start()
	{
		cameraWidthPx = Camera.main.pixelWidth;
		cameraHeightPx = Camera.main.pixelHeight;
		initialTargetX = cameraTarget.transform.position.x;
		initialTargetY = cameraTarget.transform.position.y;
		
		thisTransform = this.transform;
		intManager = GameObject.FindWithTag("kinect-interaction").GetComponent<InteractionManager>();
	}
	
	void Update ()
	{
		float transX = thisTransform.position.x;
		float transY = thisTransform.position.y;
		float transCamX = cameraTarget.transform.position.x;
		float transCamY = cameraTarget.transform.position.y;
		
		//max values, to impose a restriction on camera movement (ie, that it won't move past a certain point, these values)
		float maxX = 7.0f;
		float maxY = 3.0f;
		
		bool isHandGripped = intManager.isGripped;
		bool isUsingRightHand = intManager.IsRightHandPrimary();
		bool displayHandCursor = GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>().displayHandCursor;
		
		//move camera manually, by clicking down on the mouse
		if(Input.GetMouseButton(0)) //left click
		{
			
    		Vector3 mousePos = camera.ScreenToWorldPoint(Input.mousePosition);
			//check for  x-axis, y-axis extremes and impose caps if neccessary. Means that the camera can only be moved to a certain extent
			if (mousePos.x > transCamX + maxX) {
				mousePos.x  = transCamX + maxX;				
			}
			else if (mousePos.x < transCamX - maxX) {
				mousePos.x  = transCamX - maxX;
			}
			if (mousePos.y > transCamY + maxY) {
				mousePos.y  = transCamY + maxY;
			}
			else if (mousePos.y < transCamY - (maxY*1.5f)){ //allow for more of a "pull" on the camera when looking down
				mousePos.y  = transCamY - (maxY*1.5f);
			}
			//increasing the value of smoothTime means that the camera moves slower
			thisTransform.position  = new Vector3 (Mathf.SmoothDamp(transX, mousePos.x, ref velocity.x, smoothTime*6), Mathf.SmoothDamp(transY, mousePos.y, ref  velocity.y, smoothTime*6), thisTransform.position.z);
    	}
		else if (displayHandCursor && isUsingRightHand && isHandGripped) //moving the camera with right hand					
		{
			//get the co-ords of the handCursor, ie, if the actual mouse cursor was  being used (and not the handCursor)
			Vector3 screenNormalPosR = Vector3.zero;
			Vector3 screenPixelPosR = Vector3.zero;
			screenNormalPosR = intManager.GetRightHandScreenPos();
			if(screenNormalPosR != Vector3.zero)
			{
				// convert the normalized screen pos to pixel pos
				screenPixelPosR.x = (int)(screenNormalPosR.x * Camera.main.pixelWidth);
				screenPixelPosR.y = (int)(screenNormalPosR.y * Camera.main.pixelHeight);
			}
			Vector2 mousePos = new Vector2(screenPixelPosR.x, screenPixelPosR.y);
			
			//pulling down moves camera down, pulling right moves camera right
			float differenceX = mousePos.x - cameraWidthPx/2; //the difference in x-axis between the center of the screen, and the current position of the handCursor
			float differenceY = mousePos.y - cameraHeightPx/2; //the difference in y-axis between the center of the screen, and the current position of the handCursor
			
			//pulling up moves camera down, pulling right moves camera left
//			float differenceX = cameraWidthPx/2 - mousePos.x; //the difference in x-axis between the center of the screen, and the current position of the handCursor
//			float differenceY = cameraHeightPx/2 - mousePos.y; //the difference in y-axis between the center of the screen, and the current position of the handCursor
						
			differenceX /= cameraWidthPx/2;
			differenceY /= cameraHeightPx/2;
				
			if (transX < 0){//x-coordinate of camera is negative
			
				mousePos.x =  transX - (differenceX*transX);
			} else {
				mousePos.x = transX * (1 + differenceX);
			}
			if (transY < 0) { //y-coordinate of camera is negative
			
				mousePos.y =  transY - (differenceY*transY);
			} else {
				mousePos.y = transY * (1 + differenceY);
			}
			
			//check for  x-axis, y-axis extremes and impose caps if neccessary. Means that the camera can only be moved to a certain extent
			if (mousePos.x > transCamX + maxX) {
				mousePos.x  = transCamX + maxX;				
			}
			else if (mousePos.x < transCamX - maxX) {
				mousePos.x  = transCamX - maxX;
			}
			if (mousePos.y > transCamY + maxY) {
				mousePos.y  = transCamY + maxY;
			}
			else if (mousePos.y < transCamY - (maxY*1.5f)){ //allow for more of a "pull" on the camera when looking down
				mousePos.y  = transCamY - (maxY*1.5f);
			}
			
			//increasing the value of smoothTime means that the camera moves slower
			thisTransform.position  = new Vector3 (Mathf.SmoothDamp(transX, mousePos.x, ref velocity.x, smoothTime*6), Mathf.SmoothDamp(transY, mousePos.y, ref  velocity.y, smoothTime*6), thisTransform.position.z);   	
		}
		else if (displayHandCursor && !isUsingRightHand && isHandGripped) //moving the camera with left hand					
		{
			//get the co-ords of the handCursor, ie, if the actual mouse cursor was  being used (and not the handCursor)
			Vector3 screenNormalPosR = Vector3.zero;
			Vector3 screenPixelPosR = Vector3.zero;
			screenNormalPosR = intManager.GetLeftHandScreenPos();
			if(screenNormalPosR != Vector3.zero)
			{
				// convert the normalized screen pos to pixel pos
				screenPixelPosR.x = (int)(screenNormalPosR.x * Camera.main.pixelWidth);
				screenPixelPosR.y = (int)(screenNormalPosR.y * Camera.main.pixelHeight);
			}
			Vector2 mousePos = new Vector2(screenPixelPosR.x, screenPixelPosR.y);
			
			//pulling down moves camera down, pulling right moves camera right
			float differenceX = mousePos.x - cameraWidthPx/2; //the difference in x-axis between the center of the screen, and the current position of the handCursor
			float differenceY = mousePos.y - cameraHeightPx/2; //the difference in y-axis between the center of the screen, and the current position of the handCursor
			
			//pulling up moves camera down, pulling right moves camera left
//			float differenceX = cameraWidthPx/2 - mousePos.x; //the difference in x-axis between the center of the screen, and the current position of the handCursor
//			float differenceY = cameraHeightPx/2 - mousePos.y; //the difference in y-axis between the center of the screen, and the current position of the handCursor
						
			differenceX /= cameraWidthPx/2;
			differenceY /= cameraHeightPx/2;
				
			if (transX < 0){//x-coordinate of camera is negative
			
				mousePos.x =  transX - (differenceX*transX);
			} else {
				mousePos.x = transX * (1 + differenceX);
			}
			if (transY < 0) { //y-coordinate of camera is negative
			
				mousePos.y =  transY - (differenceY*transY);
			} else {
				mousePos.y = transY * (1 + differenceY);
			}
			

			//check for  x-axis, y-axis extremes and impose caps if neccessary. Means that the camera can only be moved to a certain extent
			if (mousePos.x > transCamX + maxX) {
				mousePos.x  = transCamX + maxX;				
			}
			else if (mousePos.x < transCamX - maxX) {
				mousePos.x  = transCamX - maxX;
			}
			if (mousePos.y > transCamY + maxY) {
				mousePos.y  = transCamY + maxY;
			}
			else if (mousePos.y < transCamY - (maxY*1.5f)){ //allow for more of a "pull" on the camera when looking down
				mousePos.y  = transCamY - (maxY*1.5f);
			}
			
			//increasing the value of smoothTime means that the camera moves slower
			thisTransform.position  = new Vector3 (Mathf.SmoothDamp(transX, mousePos.x, ref velocity.x, smoothTime*6), Mathf.SmoothDamp(transY, mousePos.y, ref  velocity.y, smoothTime*6), thisTransform.position.z);   	
		}
		else //move camera automatically, by following the target
		{
			if (cameraFollowX)
				thisTransform.position  = new Vector3 (Mathf.SmoothDamp(transX, transCamX, ref velocity.x, smoothTime), Mathf.SmoothDamp(transY, initialTargetY, ref  velocity.y, smoothTime), thisTransform.position.z);

			if (cameraFollowY)
				thisTransform.position  = new Vector3 (Mathf.SmoothDamp(transX, initialTargetX, ref  velocity.x, smoothTime), Mathf.SmoothDamp(transY, transCamY, ref  velocity.y, smoothTime), thisTransform.position.z);

			else if (cameraFollowHeight) // && !cameraFollowY
				camera.transform.position = new Vector3(camera.transform.position.x, cameraHeight, camera.transform.position.z);
		}
	}
}