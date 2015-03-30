using UnityEngine;
using System.Collections;

public class TriggerBoxScript : MonoBehaviour {

	public int weight = 0;
	public string sender = "Someone's PC";
	public string message = "test message";

	GameObject player;
	PlayerProperties pp;

	// Use this for initialization
	void Start () {
		player = GameObject.Find ("Player");
		pp = player.GetComponent<PlayerProperties> ();	
	}
	
	// Update is called once per frame
	void Update () {
	
	}

	void OnTriggerEnter () {
		Debug.Log("sender: " + sender + " message: " + message);
		pp.HandleTriggerWeight (weight, sender, "");
	}
}
