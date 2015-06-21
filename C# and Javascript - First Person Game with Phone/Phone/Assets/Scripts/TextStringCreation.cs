using UnityEngine;
using System.Collections;

public class TextStringCreation : MonoBehaviour {

	private CanvasScript cs;
	private PhoneScript ps;

	//for creating a text message
	private string createTextMessageContent = "";

	// Use this for initialization
	void Start () {
		GameObject canvas = GameObject.FindGameObjectWithTag ("PhoneCanvas");
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		
		GameObject phone = GameObject.FindGameObjectWithTag ("Phone");
		ps = (PhoneScript)phone.GetComponent<PhoneScript> ();
	}
	
	//private bool showingLine = true;
	private float blinkingTime = 0.75f; //seconds.
	private float timeLastBlinked = 0.0f;
	private string cursor = "|";
	private int cursorPos = 0;
	private int insertAtIndex = 0;
	// Update is called once per frame
	void Update () { //TODO: working on
		if (PhoneState.GetState () == PhoneState.State.TextMessageCreate)
		{
			float currTime = Time.time;
			if (currTime > timeLastBlinked + blinkingTime)
			{
				timeLastBlinked = currTime;
				UpdateTextMessageContent(cursor);
				//SetViewToTextMessageCreate(cursor);
				if (cursor == "|") 
					cursor = "";
				else 
					cursor = "|";
			}
		}
	}

	//////////// create a text, start ////////////////////////
	/// //TODO: should probably move to its own class
	private string tempLetter = "";
	public void UpdateTextMessageContent(string cursor)
	{
		//I want to set newLetter at index cursorPos
		
		string leftString = "";
		string rightString = "";
		if (createTextMessageContent.Length > 0 && cursorPos >= 0 && cursorPos <= createTextMessageContent.Length)
		{
			Debug.Log ("cursorPos " + cursorPos);
			if (cursorPos > 0 && createTextMessageContent.Length >= cursorPos)
				leftString = createTextMessageContent.Substring (0, cursorPos);
			rightString = createTextMessageContent.Substring (cursorPos);
		}
		if (tempLetter != "")
		{
			int i = 0;
		}
		cs.SetScreenText(leftString + tempLetter + cursor + rightString);
	}
	
	private void ForceCursorOn()
	{
		cursor = "|";
		timeLastBlinked = Time.time - 0.5f; //it feels like the cursor stays like "|" for too long
		UpdateTextMessageContent (cursor);
	}
	
	public void AddTempLetterToText(string newLetter)
	{
		tempLetter = newLetter;
		UpdateTextMessageContent(cursor);
	}
	
	public void SetViewToTextMessageCreate()
	{
		cs.SetHeadingText("Create");
		
		//cs.SetScreenText(createTextMessageContent + newLetter);
		
		if (createTextMessageContent == "")
			cs.SetNavLeftText("Back");
		else
			cs.SetNavLeftText("Delete");
		cs.SetNavRightText("Send");
	}
	
	public void SetNewTextMessageContent(string newLetter)
	{
		tempLetter = newLetter;
		SaveTempLetterInString ();
		cursorPos += 1; //increase cursorPos now that they've added a char to the string
		tempLetter = "";
		SetViewToTextMessageCreate ();
	}
	
	private void SaveTempLetterInString()
	{
		string leftString = "";
		string rightString = "";
		if (createTextMessageContent.Length > 0 && cursorPos >= 0 && cursorPos <= createTextMessageContent.Length)
		{
			Debug.Log ("cursorPos " + cursorPos);
			if (cursorPos > 0 && createTextMessageContent.Length >= cursorPos)
				leftString = createTextMessageContent.Substring (0, cursorPos);
			rightString = createTextMessageContent.Substring (cursorPos);
		}
		if (tempLetter != "")
		{
			int i = 0;
		}
		createTextMessageContent = leftString + tempLetter + rightString;
	}
	
	public void TextMessageCreateHandleCancel()
	{
		if (createTextMessageContent == "")
		{
			ps.SetViewToSubMainMenu();
		}
		else //delete the char behind the cursor
		{
			if (tempLetter != "")
			{
				//SaveTempLetterInString();
				tempLetter = "";
				//cursorPos -= 1;
			}
			else if (cursorPos > 0)
			{
				//createTextMessageContent = createTextMessageContent.Substring (0, createTextMessageContent.Length - 1);
				string leftString = "";
				string rightString = "";
				leftString = createTextMessageContent.Substring (0, cursorPos-1);
				rightString = createTextMessageContent.Substring (cursorPos);
				createTextMessageContent = leftString+rightString;
				cursorPos -= 1;
			}
			
			SetViewToTextMessageCreate ();
			UpdateTextMessageContent(cursor);
			ButtonPressManager.ResetAplhaButtonInputs();
		}
	}
	
	
	public void MoveCursorPosRight(bool moveRight)
	{
		//if (moveRight && cursorPos <= createTextMessageContent.Length)
		if (moveRight)
		{
			if (tempLetter != "")
			{
				SaveTempLetterInString();
				tempLetter = "";
				UpdateTextMessageContent(cursor);
				ButtonPressManager.ResetAplhaButtonInputs();
			}
			else if (cursorPos >= createTextMessageContent.Length)
			{
				createTextMessageContent += " ";
			}
			//otherwise just move the cursor right one index
			cursorPos += 1;
			ForceCursorOn();
		}
		else if (cursorPos > 0)
		{
			if (tempLetter != "")
			{
				SaveTempLetterInString();
				tempLetter = "";
				UpdateTextMessageContent(cursor);
				ButtonPressManager.ResetAplhaButtonInputs();
				//save temp letter at cursor pos, but don't move the cursor along one index
			}
			else
			{
				cursorPos -= 1;
			}
			ForceCursorOn();
		}
	}
	////////////// create a text, end ////////////////////////

}
