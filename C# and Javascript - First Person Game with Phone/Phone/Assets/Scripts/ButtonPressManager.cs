﻿using UnityEngine;
using System.Collections;

public class ButtonPressManager: MonoBehaviour {

	enum Button
	{
		Zero = 0,
		One,
		Two,
		Three,
		Four,
		Five,
		Six,
		Seven,
		Eight,
		Nine,
		Cancel,
		Enter,
		Up,
		Down,
		Left,
		Right,
		Answer,
		HangUp,
		Star,
		Hash,
	}

	private CanvasScript cs;
	private PhoneScript ps;

	private float timeAtLastInput;
	private float maxTimeBetweenInputs = 3.0f; //seconds.

	int prevAlphaInputButtonIndex = -1; //0 -> 9
	int alphaInputButtonIndex = -1; //0 -> 9
	int alphaInputIndex = -1; // 0->...
	bool alphaInputPressed = false;
	//string[][] alphaInput = new string [0][0];
	string[][] alphaInput = new string[10][];

		/*{" "}, 
		{".", ",", "'", "\"", "?", "!", ":", ";", "-", "_", "(", ")" }, 
		{"a", "b", "c", "A", "B", "C"},
		{"d", "e", "f", "D", "E", "F"},
		{"g", "h", "i", "G", "H", "I"},
		{"j", "k", "l", "J", "K", "L"},
		{"m", "n", "o", "M", "N", "O"},
		{"p", "q", "r", "s", "P", "Q", "R", "S"},
		{"t", "u", "v", "T", "U", "V"},
		{"w", "x", "y", "z", "W", "X", "Y", "Z"}};*/


	//private PhoneState state;
	// Use this for initialization
	void Start () {
		alphaInput[0] = new string[] {" "};
		alphaInput [1] = new string[] {".", ",", "'", "\"", "?", "!", ":", ";", "-", "_", "(", ")" };
		alphaInput [2] = new string[] {"a", "b", "c", "A", "B", "C"};
		alphaInput [3] = new string[]{"d", "e", "f", "D", "E", "F"};
		alphaInput [4] = new string[]{"g", "h", "i", "G", "H", "I"};
		alphaInput [5] = new string[]{"j", "k", "l", "J", "K", "L"};
		alphaInput [6] = new string[]{"m", "n", "o", "M", "N", "O"};
		alphaInput [7] = new string[]{"p", "q", "r", "s", "P", "Q", "R", "S"};
		alphaInput [8] = new string[]{"t", "u", "v", "T", "U", "V"};
		alphaInput [9] = new string[]{"w", "x", "y", "z", "W", "X", "Y", "Z"};

		/*for (int i = 0; i < alphaInput.Length; i++)
		{
			for (int j = 0; j < alphaInput[i].Length; j++)
			{
				Debug.Log (alphaInput[i][j]);
			}
		}*/

		GameObject canvas = GameObject.FindGameObjectWithTag ("PhoneCanvas");
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		cs.ResetAllLines ();

		GameObject phone = GameObject.FindGameObjectWithTag ("Phone");
		ps = (PhoneScript)phone.GetComponent<PhoneScript> ();
	}

	void Update()	{

		float currTime = Time.time;
		if (alphaInputPressed && currTime > timeAtLastInput + maxTimeBetweenInputs)
		{
			alphaInputPressed = false;
			ps.SetNewTextMessageContent(alphaInput[alphaInputButtonIndex][alphaInputIndex]);//save the letter
			alphaInputIndex = -1;
			prevAlphaInputButtonIndex = -1;
		}
	
	}

	private void HandleAlphaInput(int buttonNum)
	{
		alphaInputButtonIndex = buttonNum;

		if (prevAlphaInputButtonIndex != -1 && alphaInputButtonIndex != prevAlphaInputButtonIndex) //prevAlphaInputButtonIndex value handled in Update()
		{
			ps.SetNewTextMessageContent(alphaInput[prevAlphaInputButtonIndex][alphaInputIndex]); //save the prev letter
			alphaInputIndex = 0;
		}
		else
		{
			alphaInputIndex = (alphaInputIndex + 1 ) % alphaInput[alphaInputButtonIndex].Length;

		}
		ps.SetViewToTextMessageCreate(alphaInput[alphaInputButtonIndex][alphaInputIndex]);
		ps.ChangeCursorPos (true);
		//else
		prevAlphaInputButtonIndex = alphaInputButtonIndex;
		alphaInputPressed = true;
	}
	
	public void ButtonInput(int num)
	{


		//use switch by state. Then handle button input in each case
		Button btn = (Button)num;
		cs.ResetAllLines ();
		cs.SetScreenText ("");

		PhoneState.State state = PhoneState.GetState ();
		Debug.Log ("state: " + state + " btn: " + btn);
		switch (state)
		{
		
		case PhoneState.State.HomeScreen:
			
			if (btn >= Button.Zero && btn <= Button.Nine)
			{
				ps.AddToNumberOnScreen(num);
				ps.UpdateNumberOnScreen();
			}
			else if (btn == Button.Enter)
			{
				ps.SetViewToMainMenu();
			}
			else
			{
				ps.SetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.NumberOnScreen:
			
			if (btn >= Button.Zero && btn <= Button.Nine)
			{
				ps.AddToNumberOnScreen(num);
				ps.UpdateNumberOnScreen();
			}
			else if (btn == Button.Cancel)
			{
				ps.RemoveEndOfNumberOnScreen();
				ps.UpdateNumberOnScreen();

			}
			else if (btn == Button.Answer)
			{
				ps.HandleOutGoingCall();
			}
			else if (btn == Button.Enter)
			{
				ps.SaveNumberOnScreenToContacts();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.MainMenu:
			if (btn == Button.Enter)
			{
				ps.SetViewToSubMainMenu();
			}
			else if (btn == Button.Cancel)
			{
				ps.SetViewToHomeScreen();
			}
			else if (btn == Button.Up)
			{
				ps.MainMenuScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.MainMenuScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.TextMessageMenu:
			if (btn == Button.Enter)
			{
				ps.SetViewToTextMessageCollection();
			}
			else if (btn == Button.Cancel)
			{
				ps.SetViewToMainMenu();
			}
			else if (btn == Button.Up)
			{
				ps.TextMessMenuScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.TextMessMenuScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;

		case PhoneState.State.TextMessageCreate:
			switch (btn)
			{
				case Button.Enter:
					Debug.Log("Send");
					break;
				case Button.Cancel:
					ps.TextMessageCreateHandleCancel();
					break;
				case Button.Zero:
					//Debug.Log (Time.time);
					HandleAlphaInput(0);
					break;
				case Button.One:
					HandleAlphaInput(1);
					break;
				case Button.Two:
					HandleAlphaInput(2);
					break;
				case Button.Three:
					HandleAlphaInput(3);
					break;
				case Button.Four:
					HandleAlphaInput(4);
					break;
				case Button.Five:
					HandleAlphaInput(5);
					break;
				case Button.Six:
					HandleAlphaInput(6);
					break;
				case Button.Seven:
					HandleAlphaInput(7);
					break;
				case Button.Eight:
					HandleAlphaInput(8);
					break;
				case Button.Nine:
					HandleAlphaInput(9);
					break;
				case Button.HangUp:
					ps.ResetAndSetViewToHomeScreen();
					break;
				case Button.Left:
				case Button.Up:
					ps.ChangeCursorPos(true);
					break;
				case Button.Right:
				case Button.Down:
					ps.ChangeCursorPos(false);
					break;
				default:
					Debug.Log ("Incorrect state.");
					break;
			}
			break;
			
		case PhoneState.State.TextMessageInbox:
			if (btn == Button.Enter)
			{
				ps.ReadSelectedInboxText();
			}
			else if ( btn == Button.Cancel)
			{
				ps.SetViewToSubMainMenu();
			}
			else if (btn == Button.Up)
			{
				ps.InboxScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.InboxScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
		case PhoneState.State.TextMessageOutbox:
			if (btn == Button.Enter)
			{
				ps.ReadSelectedOutboxText();
			}
			else if ( btn == Button.Cancel)
			{
				ps.SetViewToSubMainMenu();
			}
			else if (btn == Button.Up)
			{
				ps.OutboxScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.OutboxScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		//case PhoneState.State.TextMessageInboxDisplay:
		case PhoneState.State.TextMessageDisplay:	
			if (btn == Button.Cancel)
			{
				ps.SetViewToTextMessageCollection();
			}
			else if (btn == Button.Enter)
			{
				//ps.SetViewToInboxTextMessageOptions();
				ps.SetViewToTextMessageOptions();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.TextMessageOptions:
			
			if ( btn == Button.Enter)
			{
				//ps.DeleteSelectedInboxText(); //TODO: inbox, outbox, etc
				//TextMessageOptions.DeleteTextViaOptions();
				TextMessageOptions.SelectEnter();
			}
			else if (btn == Button.Cancel)
			{
				//ps.ReadSelectedInboxText(); //TODO: inbox, outbox, etc
				TextMessageOptions.SetViewBackToText();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen(); 
			}
			else if (btn == Button.Up)
			{
				TextMessageOptions.ScrollUp();
			}
			else if (btn == Button.Down)
			{
				TextMessageOptions.ScrollDown();
			}
			break;

		case PhoneState.State.ContactsList:
			if (btn == Button.Enter)
			{
				//ps.ReadSelectedOutboxText();
				Debug.Log ("enter");
			}
			else if ( btn == Button.Cancel)
			{
				ps.SetViewToMainMenu();
			}
			else if (btn == Button.Up)
			{
				ps.ContactsScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.ContactsScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
		case PhoneState.State.ErrorMessage:
			if (btn == Button.Cancel)
			{
				PhoneState.SetState(PhoneState.GetPrevState());
				ps.SetViewBasedOnState();
			}
			break;
		default:
			Debug.Log ("Incorrect state.");
			break;
		}
		timeAtLastInput = Time.time;
		Debug.Log (timeAtLastInput);
	}
}
