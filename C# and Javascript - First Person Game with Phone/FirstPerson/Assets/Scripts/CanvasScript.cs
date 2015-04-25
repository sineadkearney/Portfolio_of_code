using UnityEngine;
using System.Collections;

using UnityEngine.UI;

public class CanvasScript : MonoBehaviour {

	public Text instruction;

	// Use this for initialization
	void Start () {

		instruction.text = "test";

	}
	
	// Update is called once per frame
	void Update () {
	
	}

	[RPC]
	public void UpdateText(string content)
	{
		instruction.text = content;
	}
}
