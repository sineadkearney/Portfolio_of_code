using UnityEngine;
using System.Collections;
using System;

public class SphereScript : MonoBehaviour {

	GameObject phone;
	PhoneScript ps;

	// Use this for initialization
	void Start () {
		phone = GameObject.Find ("Phone");
		ps = phone.GetComponent<PhoneScript> ();
	}
	
	// Update is called once per frame
	void Update () {
	
	}

	void OnTriggerEnter () {
		Debug.Log("hello");
		//var newCol:Vector3 = Vector3(1, 0, 0);
		//networkView.RPC("SetColor", RPCMode.AllBuffered, newCol);
		//buffer means that if sphere set to red, then a new player joins, they'll see the sphere as red, not as white

		DateTime epochStart = new System.DateTime(1970, 1, 1, 8, 0, 0, System.DateTimeKind.Utc);
		double timestamp = (System.DateTime.UtcNow - epochStart).TotalSeconds;
		string str = ""+timestamp;

		ps.PhoneUpdateText (str);
		//networkView.RPC("UpdateText", RPCMode.AllBuffered, str);
		//phone.PhoneUpdateText(str);
	}
}



