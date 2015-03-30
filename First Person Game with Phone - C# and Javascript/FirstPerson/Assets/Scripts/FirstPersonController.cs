using UnityEngine;
using System.Collections;

public class FirstPersonController : MonoBehaviour {

	public float movementSpeed = 7.0f;
	public float mouseSensivity = 2.0f;
	public float upDownRange = 60.0f; //60 degrees. Cap up/down at this value
	private CharacterController cc;
	float verticalRotation = 0.0f;

	private Transform cam;
	// Use this for initialization
	void Start () {
		cc = GetComponent<CharacterController> ();
		//Screen.lockCursor = true;
		cam = transform.Find ("Main Camera");
	}
	
	// Update is called once per frame
	void Update () {
		//if (networkView.isMine) { //extra from the network tutorial. Only the server controls the player
			//rotation
			float rotLeftRight = Input.GetAxis ("Horizontal") * mouseSensivity;
			transform.Rotate (0, rotLeftRight, 0);
			//up down rotation should be in a script on the camera itself. This is because the cc doens't lean forward/backwards, so we can't use it's rotation
			verticalRotation -= Input.GetAxis ("Vertical") * mouseSensivity * 0.75f;
			//verticalRotation = 0.0f;
			verticalRotation = Mathf.Clamp (verticalRotation, -upDownRange, upDownRange);
//			Camera.main.transform.localRotation = Quaternion.Euler (verticalRotation, 0, 0);
			cam.transform.localRotation = Quaternion.Euler (verticalRotation, 0, 0);
			//Camera.main.transform.Rotate (-rotUpDown, 0, 0);//input axis

			//movement
			//float forwardSpeed = Input.GetAxis ("Vertical") *movementSpeed;
			float forwardSpeed = Input.GetAxis ("Jump") * movementSpeed;
			//float sideSpeed = Input.GetAxis ("Horizontal") *movementSpeed;
			float sideSpeed = 0.0f;
			Vector3 speed = new Vector3 (sideSpeed, 0, forwardSpeed);

			speed = transform.rotation * speed;
			cc.SimpleMove (speed);
		/*} 
		else {
			enabled = false;
		}*/

	}
}
