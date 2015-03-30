using UnityEngine;
using System.Collections;

public class EndTriggerBoxScript : MonoBehaviour {

	GameObject phone;
	PhoneScript ps;

	public string sender = "Someone's PC";
	public string message = "You win!";

	// Use this for initialization
	void Start () {
		phone = GameObject.Find ("Phone");
		ps = phone.GetComponent<PhoneScript> ();;
	}
	
	// Update is called once per frame
	void Update () {
	
	}

	
	void OnTriggerEnter () {
		Debug.Log("trigger");	
		ps.PhoneUpdateText (message);

		TextMessage txt = new TextMessage (sender, message);
		string str = txt.ToString();
		ps.PhoneUpdateText (str);
	}
}
