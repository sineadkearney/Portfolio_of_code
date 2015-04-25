//TODO: lots of clean-up required

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
		TextMessageOptions,
	}

	private PhoneState state;
	private string numberOnScreen;
	private string homeScreenTextContentOrig = "Go to Main Menu?";
	private string homeScreenTextContent;
	
	public IList<TextMessage> texts = new List<TextMessage>();
	private int textsLength = 0;
	private int readTextAtIndex = 0;
	private int selectedTextIndex = 0;
	private int maxTextsDisplayAmount = 5;
	private int lowerIndexTextInView = 0;
	private int upperIndexTextInView = 4;
	private int indexOfTextInOptions = -1;

	private bool hasUnreadTexts = false;

	// Use this for initialization
	void Start () {
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		cs.ResetAllLines ();
		HandleHasUnreadMessages ();
		/*TextMessage txt1 = new TextMessage ("sender1", "content");
		HandleNewIncomingText(txt1);
		TextMessage txt2 = new TextMessage ("sender2", "content");
		HandleNewIncomingText(txt2);
	
		TextMessage txt3 = new TextMessage ("sender3", "content");
		HandleNewIncomingText(txt3);
		TextMessage txt4 = new TextMessage ("sender4", "content");
		HandleNewIncomingText(txt4);
		TextMessage txt5 = new TextMessage ("sender5", "content");
		HandleNewIncomingText(txt5);
		TextMessage txt6 = new TextMessage ("sender6", "content");
		HandleNewIncomingText(txt6);*/


		SetUpperIndexTextInViewToTop();
		SetViewToHomeScreen ();
		numberOnScreen = "\n\n";
	}

	void SetUpperIndexTextInViewToTop()
	{
		if (textsLength > maxTextsDisplayAmount) 
		{
			upperIndexTextInView = maxTextsDisplayAmount - 1;
		}
		else
		{
			upperIndexTextInView = textsLength -1;
		}
	}

	void SetUpperIndexTextInViewToBottom()
	{
		upperIndexTextInView = textsLength - 1;
	}

	// Update is called once per frame
	void Update () {
	
	}

	[RPC]
	void UpdateText(string content)
	{
		//cs.SetTextMessageContent (content);
		TextMessage text = new TextMessage (content);
		HandleNewIncomingText(text);
	}

	void HandleNewIncomingText(TextMessage text)
	{
		AddTextToTexts(text);
		Debug.Log ("textsLength: " + textsLength);
		hasUnreadTexts = true;
		HandleHasUnreadMessages();
		SetUpperIndexTextInViewToTop ();
	}

	void HandleHasUnreadMessages()
	{
		if (hasUnreadTexts)
		{
			cs.SetMessageIconText ("Δ");
			homeScreenTextContent = homeScreenTextContentOrig + "\nNew Message!";
		}
		else
		{
			cs.SetMessageIconText("");
			homeScreenTextContent = homeScreenTextContentOrig + "\nNo New Messages";
		}

		if (state == PhoneState.HomeScreen)
		{
			SetViewToHomeScreen();
		}
	}

	void AddTextToTexts(TextMessage text)
	{
		texts.Insert (0, text);
		textsLength += 1;
	}

	void DeleteTextFromTexts(int indexOfTextToDel)
	{
		texts.RemoveAt (indexOfTextToDel);
		textsLength -= 1;
		Debug.Log ("indexOfTextToDel: " + indexOfTextToDel);
		//handle text inbox display

		if (indexOfTextToDel >= lowerIndexTextInView && indexOfTextToDel <= upperIndexTextInView) 
		{
			if (lowerIndexTextInView > 0)
			{
				lowerIndexTextInView -= 1;
			}

			if (upperIndexTextInView > textsLength-1)
			{
				upperIndexTextInView = textsLength-1;
			}
		}
		if (selectedTextIndex > textsLength-1)
		{
			selectedTextIndex = textsLength-1;
		}
		if (readTextAtIndex > textsLength-1)
		{
			readTextAtIndex = textsLength-1;
		}
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
		Debug.Log (homeScreenTextContent);
		cs.SetScreenText("\n" + homeScreenTextContent);
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
		int count = 0;
		hasUnreadTexts = false;

		if (textsLength == 0) 
		{
			cs.SetLineContent(index, "No messages", false);
		}
		else
		{
			foreach (TextMessage text in texts)
			{
				if (count >= lowerIndexTextInView && count <= upperIndexTextInView)
				{
					hasUnreadTexts = hasUnreadTexts || !text.m_read;
					string str = "";
					//Debug.Log ("foreach " + text.GetSender() + " index: " + index);
					DateTime dt = new DateTime (text.GetTimestamp());
					string date = dt.Day + "/" + dt.Month + "/" + dt.Year + " " + dt.Hour + ":" + dt.Minute + ":" + dt.Second;
					str += date + " " + text.GetSender() + "\n";
					text.m_selected = index == selectedTextIndex+1;
					//text.m_selected = index == readTextAtIndex+1;
					cs.SetLineContent(index, str, text.m_selected);
					index += 1;
				}
				count += 1;

			}
		}
		HandleHasUnreadMessages ();

		cs.SetHeadingText("Message Inbox");
	}

	void SetViewToTextMessage(TextMessage txt)
	{
		txt.m_read = true;
		state = PhoneState.TextMessageDisplay;
		string str = "From: " + txt.GetSender () + "\n";

		DateTime dt = new DateTime (txt.GetTimestamp());
		string date = dt.Day + "/" + dt.Month + "/" + dt.Year + " " + dt.Hour + ":" + dt.Minute + ":" + dt.Second;
		str += "Time: " + date + "\n";
		str += txt.GetMessage ();
		cs.SetScreenText(str);
		cs.SetHeadingText("Message");
	}

	void SetViewToTextMessageOptions()
	{
		cs.ResetAllLines ();
		cs.SetLineContent (1, "Delete?", true);
		state = PhoneState.TextMessageOptions;
		indexOfTextInOptions = readTextAtIndex;
	}

	public void ButtonInput(int num)
	{
		Debug.Log ("button input");
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
				else
				{
					SetViewToHomeScreen();
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
				//Debug.Log ("Up before selectedTextIndex " + selectedTextIndex + " readTextAtIndex " + readTextAtIndex + " textsLength: " + textsLength + " upperIndexTextInView: " + upperIndexTextInView + " lowerIndexTextInView: " + lowerIndexTextInView);

					//readTextAtIndex = readTextAtIndex-1;//(readTextAtIndex + textsLength - 1) % textsLength;
					//selectedTextIndex = selectedTextIndex-1;//(selectedTextIndex + textsLength - 1) % textsLength;

						if (readTextAtIndex == 0) //go back to the bottom
						//if (upperIndexTextInView >= textsLength-1) //go back to the top
						{
							//Debug.Log ("if2 go back to bottom");
							upperIndexTextInView = textsLength-1; //5
							lowerIndexTextInView = textsLength-maxTextsDisplayAmount;//1
							if (lowerIndexTextInView < 0)
							{
								lowerIndexTextInView = 0;
							}

							if (textsLength < maxTextsDisplayAmount)
							{
								selectedTextIndex = textsLength-1;
							}
							else
							{
								selectedTextIndex = maxTextsDisplayAmount-1;//4
							}
							readTextAtIndex = textsLength-1; //5
						}
						//else if (selectedTextIndex == 0) //move all texts up
				else if (selectedTextIndex == lowerIndexTextInView-1)
						{
							//Debug.Log ("else2 move all up");
							if (upperIndexTextInView >= textsLength-1)
							{
								upperIndexTextInView -=1;
							}
							if (lowerIndexTextInView > 0)
							{
								lowerIndexTextInView -=1;
							}
							readTextAtIndex = readTextAtIndex-1;//(readTextAtIndex + textsLength - 1) % textsLength;
						}
						else //just move selected and read up
						{
							//Debug.Log ("else2 move read/selected up");
							readTextAtIndex = readTextAtIndex-1;//(readTextAtIndex + textsLength - 1) % textsLength;
							selectedTextIndex = selectedTextIndex-1;//(selectedTextIndex + textsLength - 1) % textsLength;

						}
				//Debug.Log ("Up after selectedTextIndex " + selectedTextIndex + " readTextAtIndex " + readTextAtIndex + " textsLength: " + textsLength + " upperIndexTextInView: " + upperIndexTextInView + " lowerIndexTextInView: " + lowerIndexTextInView);

					SetViewToTextMessageInbox();
				}
				else if (btn == Button.Down)
				{
				//Debug.Log ("Down abefore selectedTextIndex " + selectedTextIndex + " readTextAtIndex " + readTextAtIndex + " textsLength: " + textsLength + " upperIndexTextInView: " + upperIndexTextInView + " lowerIndexTextInView: " + lowerIndexTextInView);

					if (readTextAtIndex == textsLength-1) //move back to top
					{
					//Debug.Log ("if move back to top");
						SetUpperIndexTextInViewToTop();	
						//upperIndexTextInView = 4;
						lowerIndexTextInView = 0;
						selectedTextIndex = 0;
						readTextAtIndex = 0;
					}
				else if (selectedTextIndex == upperIndexTextInView) //move all down one
				{
					//Debug.Log ("else 1 move all down one");
					upperIndexTextInView +=1;
					lowerIndexTextInView +=1;
					readTextAtIndex += 1;
				}
				else //just move read and selected
				{
					//Debug.Log ("else 2 just move read and selected");
					readTextAtIndex += 1;
					selectedTextIndex += 1;
				}
				//Debug.Log ("Down after selectedTextIndex " + selectedTextIndex + " readTextAtIndex " + readTextAtIndex + " textsLength: " + textsLength + " upperIndexTextInView: " + upperIndexTextInView + " lowerIndexTextInView: " + lowerIndexTextInView);

					SetViewToTextMessageInbox();
				}
				break;

			case PhoneState.TextMessageDisplay:

				if (btn == Button.Cancel)
				{
					SetViewToTextMessageInbox();
				}
				else if (btn == Button.Enter)
				{
					SetViewToTextMessageOptions();
				}
				break;

			case PhoneState.TextMessageOptions:

				if ( btn == Button.Enter)
				{
					DeleteTextFromTexts(indexOfTextInOptions);
					SetViewToTextMessageInbox();
				}
				else if (btn == Button.Cancel)
				{
				SetViewToTextMessage(texts[readTextAtIndex]);
				}
				break;

			default:
				print ("Incorrect state.");
				break;
		}
	}
}