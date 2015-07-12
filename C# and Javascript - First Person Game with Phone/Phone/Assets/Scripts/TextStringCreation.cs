using UnityEngine;
using System.Collections;

public class TextStringCreation : MonoBehaviour {

	private CanvasScript cs;
	private PhoneScript ps;

	private string m_textArea; //the Text object in the cavnas that we are writing to

	//for creating a text message
	private string createTextMessageContent = "";

	// Use this for initialization
	void Start () {
		GameObject canvas = GameObject.FindGameObjectWithTag ("PhoneCanvas");
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		
		GameObject phone = GameObject.FindGameObjectWithTag ("Phone");
		ps = (PhoneScript)phone.GetComponent<PhoneScript> ();

		m_textArea = "";
	}
	
	//private bool showingLine = true;
	private float blinkingTime = 0.75f; //seconds.
	private float timeLastBlinked = 0.0f;
	private string cursor = "|";
	private int cursorPos = 0;
	// Update is called once per frame
	void Update () { 
		if (PhoneState.GetState () == PhoneState.State.TextMessageCreate) //TODO: there should be a more general check for this
		{
			float currTime = Time.time;
			if (currTime > timeLastBlinked + blinkingTime)
			{
				timeLastBlinked = currTime;
				UpdateTextMessageContent(cursor);
				//SetTextOfLeftButton(cursor);
				if (cursor == "|") 
					cursor = " ";
				else 
					cursor = "|";
			}
		}
	}

	//////////// create a text, start ////////////////////////
	public void SetTextArea (string textArea)
	{
		m_textArea = textArea;
	}
	public string GetTextArea()
	{
		return m_textArea;
	}
	void WriteToScreen(string text)
	{
	switch (m_textArea) {
		case "SetScreenText()":
			cs.SetScreenText(text);
			break;
		case "SetLineContent(1)":
			cs.SetLineContent(1, text, false);
			break;
		case "SetLineContent(2)":
			cs.SetLineContent(2, text, false);
			break;
		case "SetLineContent(3)":
			cs.SetLineContent(3, text, false);
			break;
		case "SetLineContent(4)":
			cs.SetLineContent(4, text, false);
			break;
		case "SetLineContent(5)":
			cs.SetLineContent(5, text, false);
			break;
		case "SetLineContent(6)":
			cs.SetLineContent(6, text, false);
			break;
		default:
			Debug.Log ("invalid m_textArea: " + m_textArea);
			break;
		}
	}

	//set the initial content
	public void SetInitialContent(string content)
	{
		createTextMessageContent = content;
		cursorPos = createTextMessageContent.Length;
	}

	private string tempLetter = "";
	public void UpdateTextMessageContent(string cursor)
	{
		//I want to set newLetter at index cursorPos
		
		string leftString = "";
		string rightString = "";
		if (createTextMessageContent.Length > 0 && cursorPos >= 0 && cursorPos <= createTextMessageContent.Length)
		{
			//Debug.Log ("cursorPos " + cursorPos);
			if (cursorPos > 0 && createTextMessageContent.Length >= cursorPos)
				leftString = createTextMessageContent.Substring (0, cursorPos);
			rightString = createTextMessageContent.Substring (cursorPos);
		}
		if (tempLetter != "")
		{
			int i = 0;
		}
		//cs.SetScreenText(leftString + tempLetter + cursor + rightString);
		WriteToScreen(leftString + tempLetter + cursor + rightString);
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
	
	public void SetTextOfLeftButton()
	{
		if (createTextMessageContent == "")
			cs.SetNavLeftText("Back");
		else
			cs.SetNavLeftText("Delete");
	}
	
	public void SetNewTextMessageContent(string newLetter)
	{
		tempLetter = newLetter;
		SaveTempLetterInString ();
		cursorPos += 1; //increase cursorPos now that they've added a char to the string
		tempLetter = "";
		SetTextOfLeftButton ();
	}
	
	private void SaveTempLetterInString()
	{
		string leftString = "";
		string rightString = "";
		if (createTextMessageContent.Length > 0 && cursorPos >= 0 && cursorPos <= createTextMessageContent.Length)
		{
			//Debug.Log ("cursorPos " + cursorPos);
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

	public int GetCreationStringLength()
	{
		return createTextMessageContent.Length;
	}

	public void DeleteCharAtCursorPos()
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
		
		SetTextOfLeftButton ();
		UpdateTextMessageContent(cursor);
		ButtonPressManager.ResetAplhaButtonInputs();
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


	
	public string GetCreatedString()
	{
		return createTextMessageContent;
	}

	//when we no longer want to allow user input
	public void FinishInputAndReset()
	{
		cursor = "";
		createTextMessageContent = "";
		ButtonPressManager.ResetAplhaButtonInputs();
		cursorPos = 0;
	}

}
