using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using System;
using System.Diagnostics;

public class CanvasScript : MonoBehaviour {
	
	public Text screenText;
	public Text receptionText;
	public Text headingText;
	public Text messageIconText;
	public Text timeText;

	public Text LineText1;
	public Text LineText2;
	public Text LineText3;
	public Text LineText4;
	public Text LineText5;
	public Text LineText6;

	public Text navTextLeft;
	public Text navTextRight;

	private string senderStart = "";
	private string timeStart = "";




	// Use this for initialization
	void Start () {
		Screen.SetResolution(420, 600, false);
	}
	
	// Update is called once per frame
	void Update () {
		DateTime date = new DateTime ();
		date = DateTime.Now;

		string min = "" +date.Minute;
		if (date.Minute < 10)
		{
			min = "0" + min;
		}
		string hour = "" + date.Hour;
		if (date.Hour < 10)
		{
			hour = "0" + hour;
		}
		timeText.text = hour + ":" + min;
	}

	public void ResetAllLines()
	{
		LineText1.text = "";
		LineText2.text = "";
		LineText3.text = "";
		LineText4.text = "";
		LineText5.text = "";
		LineText6.text = "";
	}

	public void SetLineContent(int index, string str, bool isSelected)
	{
		//Debug.Log ("SetLineContent() index: " + index + " str: " + str + " isSelected: " + isSelected);
		switch (index)
		{
			case 1:
				LineText1.text = str;
				SetLineSelected(LineText1, isSelected);
				break;
			case 2:
				LineText2.text = str;
				SetLineSelected(LineText2, isSelected);
				break;
			case 3:
				LineText3.text = str;
				SetLineSelected(LineText3, isSelected);
				break;
			case 4:
				LineText4.text = str;
				SetLineSelected(LineText4, isSelected);
				break;
			case 5:
				LineText5.text = str;
				SetLineSelected(LineText5, isSelected);
				break;
			case 6:
				LineText6.text = str;
				SetLineSelected(LineText6, isSelected);
				break;

		}
	}

	public void SetNavLeftText(string str)
	{
		navTextLeft.text = str;
	}

	public void SetNavRightText(string str)
	{
		navTextRight.text = str;
	}

	void SetLineSelected(Text text, bool isSelected)
	{
		if(isSelected) 
			text.color = new Color(1,1,1,1);
		else
			text.color = new Color(0,0,0,1);
	}

	public void SetTextMessageContent(string content)
	{
		string str = "";

		TextMessage txt = new TextMessage (content);
		str = "From: " + txt.GetSender () + "\n";
		//senderText.text = senderStart + txt.GetSender();

		DateTime dt = new DateTime (txt.GetTimestamp());
		string date = dt.Day + "/" + dt.Month + "/" + dt.Year + " " + dt.Hour + ":" + dt.Minute + ":" + dt.Second;
		str += "Time: " + date + "\n";
		str += txt.GetMessage ();

		//ResetAllLines();
		SetScreenText (str);
		//timestampText.text = timeStart +date;
		//messageText.text = txt.GetMessage();
	}

	public void SetHeadingText(string content)
	{
		headingText.text = content;
	}

	public void SetScreenText(string content)
	{
		StackFrame fr = new StackFrame(1,true);
		StackTrace st = new StackTrace(fr);
		UnityEngine.Debug.Log (st.ToString ());
		UnityEngine.Debug.Log ("SetScreenText, content: " + content);
		//ResetAllLines();
		screenText.text = content;
		//screenText.color = new Color (0, 0, 1, 1);
	}

	public void SetMessageIconText(string content)
	{
		messageIconText.text = content;
	}
}
