using UnityEngine;
using System.Collections;

public class TextStringCreation : MonoBehaviour {

	private CanvasScript cs;
	private PhoneScript ps;

	private string m_textArea; //the Text object in the cavnas that we are writing to

	//for creating a text message
	private string createTextMessageContent = "";

	private float timeAtLastInput;
	private float maxTimeBetweenInputs = 3.0f; //seconds.

	static int prevAlphaInputButtonIndex = -1; //0 -> 9
	static int alphaInputButtonIndex = -1; //0 -> 9
	static int alphaInputIndex = -1; // 0-> 3 (4 for pqrs), ~9 for .,?![etc]
	static bool alphaInputPressed = false;
	static bool inAlphaInputMode = true; //can we write letters & numbers (true), or just numbers (false) 
	static bool lastInputWasInNumberMode = false; //true if we have just moved from number only inpu to alpha input mode
	string[][] alphaInput = new string[10][];
	//selected using alphaInput[alphaInputButtonIndex][alphaInputIndex]


	// Use this for initialization
	void Start () {

		alphaInput[0] = new string[] {" "};
		alphaInput [1] = new string[] {".", ",", "'", "\"", "?", "!", ":", ";", "-", "_", "(", ")", "1" };
		alphaInput [2] = new string[] {"a", "b", "c", "A", "B", "C", "2"};
		alphaInput [3] = new string[]{"d", "e", "f", "D", "E", "F", "3"};
		alphaInput [4] = new string[]{"g", "h", "i", "G", "H", "I", "4"};
		alphaInput [5] = new string[]{"j", "k", "l", "J", "K", "L", "5"};
		alphaInput [6] = new string[]{"m", "n", "o", "M", "N", "O", "6"};
		alphaInput [7] = new string[]{"p", "q", "r", "s", "P", "Q", "R", "S", "7"};
		alphaInput [8] = new string[]{"t", "u", "v", "T", "U", "V", "8"};
		alphaInput [9] = new string[]{"w", "x", "y", "z", "W", "X", "Y", "Z", "9"};

		GameObject canvas = GameObject.FindGameObjectWithTag ("PhoneCanvas");
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		
		GameObject phone = GameObject.FindGameObjectWithTag ("Phone");
		ps = (PhoneScript)phone.GetComponent<PhoneScript> ();

		m_textArea = "";
		this.enabled = false;
	}

	private float blinkingTime = 0.75f; //seconds.
	private float timeLastBlinked = 0.0f;
	private string cursor = "|";
	private int cursorPos = 0;
	// Update is called once per frame
	void Update () { 

		float currTime = Time.time;

		//blink the cursor
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


		//save the temp letter to the string
		if (alphaInputPressed && inAlphaInputMode && currTime > timeAtLastInput + maxTimeBetweenInputs)
		{
			//save the temp letter to the string. We do not need to do this when not in alpha input mode, because we automatically save numbers
			alphaInputPressed = false;
			SetNewTextMessageContent(alphaInput[alphaInputButtonIndex][alphaInputIndex]);//save the letter
			alphaInputIndex = -1;
			prevAlphaInputButtonIndex = -1;
		}

	}



	public void HandleAlphaInput(int buttonNum)
	{
		alphaInputButtonIndex = buttonNum;
		
		if (inAlphaInputMode)
		{
			if (lastInputWasInNumberMode)
			{
				alphaInputIndex = 0; //reset
				AddTempLetterToText(alphaInput[alphaInputButtonIndex][alphaInputIndex]);
				lastInputWasInNumberMode = false;
			}
			else
			{
				if (prevAlphaInputButtonIndex != -1 && alphaInputButtonIndex != prevAlphaInputButtonIndex) //prevAlphaInputButtonIndex value handled in Update()
				{
					// if we are in alpha input mode, and the last input was also in input mode, save the temp letter.
					
					SetNewTextMessageContent(alphaInput[prevAlphaInputButtonIndex][alphaInputIndex]); //save the prev letter
					alphaInputIndex = 0;
				}
				else
				{
					//we are cycling through the letters
					alphaInputIndex = (alphaInputIndex + 1 ) % alphaInput[alphaInputButtonIndex].Length;
					
				}
				AddTempLetterToText(alphaInput[alphaInputButtonIndex][alphaInputIndex]);
				lastInputWasInNumberMode = false;
			}
		}
		else
		{
			lastInputWasInNumberMode = true;
			//we will need to save any temp letter
			SaveTempLetterInString();
			
			//we automatically save a number as soon as the button is pressed, when we're in number-only mode
			alphaInputIndex = alphaInput[alphaInputButtonIndex].Length-1; //get the last index, because we want to input the number
			AddTempLetterToText(alphaInput[alphaInputButtonIndex][alphaInputIndex]);
			SetNewTextMessageContent(alphaInput[alphaInputButtonIndex][alphaInputIndex]);
		}
		prevAlphaInputButtonIndex = alphaInputButtonIndex;
		alphaInputPressed = true;
	}
	
	public static void ResetAplhaButtonInputs()
	{
		prevAlphaInputButtonIndex = -1;
		alphaInputButtonIndex = -1;
		alphaInputIndex = -1;
		alphaInputPressed = false;
	}
	
	/*public void SetAlphaNumberIcon()
	{
		SetInAplhaInputMode (inAlphaInputMode);
		SetAlphaNumberIcon ();
	}*/

	public void SetTimeAtLastInput(float newValue)
	{
		timeAtLastInput = newValue;
	}

	public void InverseInAlphaInputMode()
	{
		inAlphaInputMode = !inAlphaInputMode;	
	}
	//////////// create a text, start ////////////////////////
	public void Enable()
	{
		this.enabled = true;
	}
	public void Disable()
	{
		this.enabled = false;
	}

	public void SetInAplhaInputMode(bool newValue)
	{
		inAlphaInputMode = newValue;
	}

	public bool GetInAplhaInputMode()
	{
		return inAlphaInputMode;
	}

	public void SetAlphaNumberIcon()
	{
		if (inAlphaInputMode)
		{
			ps.messageIcon.GetComponent<SpriteRenderer> ().sprite = ps.inAlphaMode;
		}
		else
		{
			ps.messageIcon.GetComponent<SpriteRenderer> ().sprite = ps.inNumberMode;
		}
	}

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
		SetTextOfLeftButton (); //set whether the text over the left button should say "back" or "delete"
	}

	private string tempLetter = "";
	//TODO: I don't think that I need to be passing in "cursor" here
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
		//cursorPos += 1; //increase cursorPos now that they've added a char to the string
		tempLetter = "";
		SetTextOfLeftButton ();
	}
	
	public void SaveTempLetterInString()
	{
		if (tempLetter != "")
		{
			string leftString = "";
			string rightString = "";
			if (createTextMessageContent.Length > 0 && cursorPos >= 0 && cursorPos <= createTextMessageContent.Length)
			{
				if (cursorPos > 0 && createTextMessageContent.Length >= cursorPos)
					leftString = createTextMessageContent.Substring (0, cursorPos);
				rightString = createTextMessageContent.Substring (cursorPos);
			}
			createTextMessageContent = leftString + tempLetter + rightString;
			//TODO: the next two linea are new, make sure that it doesn't break anything
			tempLetter = "";

			//TODO: don't increase cursorPos when in number-only mode
			cursorPos += 1;
		}
	}

	public int GetCreationStringLength()
	{
		return createTextMessageContent.Length;
	}

	public void DeleteCharAtCursorPos()
	{
		if (tempLetter != "")
		{
			tempLetter = "";
		}
		else if (cursorPos > 0)
		{
			string leftString = "";
			string rightString = "";
			leftString = createTextMessageContent.Substring (0, cursorPos-1);
			rightString = createTextMessageContent.Substring (cursorPos);
			createTextMessageContent = leftString+rightString;
			cursorPos -= 1;
		}
		
		SetTextOfLeftButton ();
		UpdateTextMessageContent(cursor);
		ResetAplhaButtonInputs();
	}

	public void MoveCursorPosRight(bool moveRight)
	{
		//if (moveRight && cursorPos <= createTextMessageContent.Length)
		if (moveRight)
		{
			if (tempLetter != "")
			{
				SaveTempLetterInString();
				//this includes:
				//	cursorPos += 1;
				//	tempLetter = "";
				UpdateTextMessageContent(cursor);
				ResetAplhaButtonInputs();
			}
			else if (cursorPos >= createTextMessageContent.Length)
			{
				createTextMessageContent += " ";
				cursorPos += 1;
			}
			else //just moving through letters, no temp letter
			{
				cursorPos += 1;
			}
			//otherwise just move the cursor right one index
			ForceCursorOn();
		}
		else if (cursorPos > 0)
		{
			if (tempLetter != "")
			{
				SaveTempLetterInString();
				tempLetter = "";
				UpdateTextMessageContent(cursor);
				ResetAplhaButtonInputs();
				//save temp letter at cursor pos, but don't move the cursor along one index
			}
			cursorPos -= 1;
			ForceCursorOn();
		}
	}


	//get the inputted string. Here we added any tempLetter to createTextMessageContent and set tempLetter back to ""
	public string GetCreatedString()
	{
		if (tempLetter != "")
		{
			SaveTempLetterInString (); 
			tempLetter = "";
		}
		return createTextMessageContent;
	}

	//when we no longer want to allow user input
	public void FinishInputAndReset()
	{
		tempLetter = "";
		cursor = "";
		createTextMessageContent = "";
		ResetAplhaButtonInputs();
		cursorPos = 0;
	}

}
