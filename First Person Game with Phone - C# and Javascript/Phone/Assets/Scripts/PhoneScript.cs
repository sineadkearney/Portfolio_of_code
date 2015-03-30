using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using System.Collections.Generic;
using System;

public class PhoneScript : MonoBehaviour {

	public GameObject canvas;
	private CanvasScript cs;
	
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
		Star,
		Hash,
	}

	enum PhoneState
	{
		HomeScreen,
		NumberOnScreen,
		MainMenu,
		TextMessageMenu,
		TextMessageInbox,
		TextMessageDisplay,
	}

	private PhoneState state;
	private string numberOnScreen;
	
	public IList<TextMessage> texts = new List<TextMessage>();
	private int textsLength = 0;
	private int readTextAtIndex = 0;

	// Use this for initialization
	void Start () {
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		cs.ResetAllLines ();

		SetViewToHomeScreen ();
		numberOnScreen = "\n\n";

		/*TextMessage txt1 = new TextMessage ("sender1", "content");
		AddTextToTexts(txt1);
		TextMessage txt2 = new TextMessage ("sender2", "content");
		AddTextToTexts(txt2);
		TextMessage txt3 = new TextMessage ("sender3", "content");
		AddTextToTexts(txt3);*/
	}
	
	// Update is called once per frame
	void Update () {
	
	}

	[RPC]
	void UpdateText(string content)
	{
		//cs.SetTextMessageContent (content);
		TextMessage text = new TextMessage (content);
		AddTextToTexts(text);
	}

	void AddTextToTexts(TextMessage text)
	{
		texts.Insert (0, text);
		textsLength += 1;
	}

	void RemoveTextFromTexts(TextMessage text)
	{
		texts.Remove (text);
		textsLength -= 1;
	}

	void UpdateNumberOnScreen()
	{
		cs.SetScreenText(numberOnScreen);
		state = PhoneState.NumberOnScreen;
	}

	void UpdateHomeScreen()
	{
		if (numberOnScreen != "") 
		{
			cs.SetScreenText(numberOnScreen);
		}
	}

	void SetViewToHomeScreen()
	{
		state = PhoneState.HomeScreen;
		cs.SetScreenText("\n\nGo to Main Menu?");
		cs.SetHeadingText("Home");
	}

	void SetViewToMainMenu()
	{
		state = PhoneState.MainMenu;
		cs.SetScreenText("\n\nGo to Messages?");
		cs.SetHeadingText("Main Menu");
	}

	void SetViewToTextMessageMenu()
	{
		state = PhoneState.TextMessageMenu;
		cs.SetScreenText("\n\nGo to Inbox?");
		cs.SetHeadingText("Message Menu");
	}

	void SetViewToTextMessageInbox()
	{
		state = PhoneState.TextMessageInbox;


		int index = 1;
		foreach (TextMessage text in texts)
		{
			string str = "";
			//Debug.Log ("foreach " + text.GetSender() + " index: " + index);
			DateTime dt = new DateTime (text.GetTimestamp());
			string date = dt.Day + "/" + dt.Month + "/" + dt.Year + " " + dt.Hour + ":" + dt.Minute + ":" + dt.Second;
			str += date + " " + text.GetSender() + "\n";
			text.selected = index == readTextAtIndex+1;
			cs.SetLineContent(index, str, text.selected);
			index += 1;

		}

		//cs.SetScreenText ("");
		cs.SetHeadingText("Message Inbox");
	}

	void SetViewToTextMessage(TextMessage txt)
	{
		txt.read = true;
		state = PhoneState.TextMessageDisplay;
		string str = "From: " + txt.GetSender () + "\n";

		DateTime dt = new DateTime (txt.GetTimestamp());
		string date = dt.Day + "/" + dt.Month + "/" + dt.Year + " " + dt.Hour + ":" + dt.Minute + ":" + dt.Second;
		str += "Time: " + date + "\n";
		str += txt.GetMessage ();
		cs.SetScreenText(str);
		cs.SetHeadingText("Message");
	}

	public void ButtonInput(int num)
	{
//use switch by state. Then handle button input in each case
		Button btn = (Button)num;
		cs.ResetAllLines ();
		cs.SetScreenText ("");

		switch (state)
		{
			case PhoneState.HomeScreen:

				if (btn >= Button.Zero && btn <= Button.Nine)
				{
					numberOnScreen += ""+num;
					UpdateNumberOnScreen();
				}
				else if (btn == Button.Enter)
				{
					SetViewToMainMenu();
				}
				break;

			case PhoneState.NumberOnScreen:
				
				if (btn >= Button.Zero && btn <= Button.Nine)
				{
					numberOnScreen += ""+num;
					UpdateNumberOnScreen();
				}
				else if (btn == Button.Cancel)
				{
					numberOnScreen = numberOnScreen.Substring(0, numberOnScreen.Length-1);
					UpdateNumberOnScreen();
					if (numberOnScreen == "\n\n")
					{
						SetViewToHomeScreen();
					}
				}
				break;

			case PhoneState.MainMenu:
				if (btn == Button.Enter)
				{
					SetViewToTextMessageMenu();
				}
				else if (btn == Button.Cancel)
				{
					SetViewToHomeScreen();
				}
				break;

			case PhoneState.TextMessageMenu:
				if (btn == Button.Enter)
				{
					SetViewToTextMessageInbox();
				}
				else if (btn == Button.Cancel)
				{
					SetViewToMainMenu();
				}
				break;

			case PhoneState.TextMessageInbox:
				if (btn == Button.Enter)
				{
					SetViewToTextMessage(texts[readTextAtIndex]);
				}
				else if ( btn == Button.Cancel)
				{
					SetViewToTextMessageMenu();
				}
				else if (btn == Button.Up)
				{
					readTextAtIndex = (readTextAtIndex -1) % textsLength;
					SetViewToTextMessageInbox();
				}
				else if (btn == Button.Down)
				{
					readTextAtIndex = (readTextAtIndex +1) % textsLength;
					SetViewToTextMessageInbox();
				}
				break;

			case PhoneState.TextMessageDisplay:

				if (btn == Button.Cancel)
				{
					SetViewToTextMessageInbox();
				}
				break;

			default:
				print ("Incorrect state.");
				break;
		}
	}
}
