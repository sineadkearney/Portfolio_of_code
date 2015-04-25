using UnityEngine;
using System.Collections;
using System;

public class PhoneScript : MonoBehaviour {

	private float btnX;
	private float btnY;
	private float btnWidth;
	private float btnHeight;

	// Use this for initialization
	void Start () {
		btnX = Screen.width * 0.05f;
		btnY = Screen.width * 0.05f;
		btnWidth = Screen.width * 0.1f;
		btnHeight = Screen.width * 0.1f;
	}
	
	// Update is called once per frame
	void Update () {
	
	}

	public void PhoneUpdateText(string str)
	{
		GetComponent<NetworkView>().RPC("UpdateText", RPCMode.AllBuffered, str);
	}

	[RPC]
	void UpdateText(string content)
	{
		Debug.Log(content);
	}
}
