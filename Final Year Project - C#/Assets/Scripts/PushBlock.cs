//Description: Allows the Player to push a rigidBody, in this case a block/crate
//Instructions: attach to the Player's characterController.
//Based on code from: http://docs.unity3d.com/Documentation/ScriptReference/MonoBehaviour.OnControllerColliderHit.html, written by Sinéad Kearney

using UnityEngine;
using System.Collections;

public class PushBlock : MonoBehaviour {
	
	private PointManController kpc;
	private bool useKinect;
	public float pushPower = 6.0f;	//the force at which the Player can push the block
	
	// Use this for initialization
	void Start () {
	
		kpc = GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>();
	}
	
	// Update is called once per frame
	void Update () {
		useKinect = PlayerPrefs.GetInt("useKinect") == 1; //1 = using the Kinect, 0 = not using the Kinect
	}
	
    void OnControllerColliderHit(ControllerColliderHit hit) {
        Rigidbody body = hit.collider.attachedRigidbody;
        if (body == null || body.isKinematic)
            return;
        
        if (hit.moveDirection.y < -0.3F)
            return;
        
		if ((useKinect && kpc.hasBothHandsOutInFront) || !useKinect)
			//if using the Kinect, both hands have to be out, as if "pushing" the block. Else, using keyboard input and can just "walk" to push
		{
        	Vector3 pushDir = new Vector3(hit.moveDirection.x, 0, 0);//hit.moveDirection.z);
        	body.velocity = pushDir * pushPower;
		}
    }
}

