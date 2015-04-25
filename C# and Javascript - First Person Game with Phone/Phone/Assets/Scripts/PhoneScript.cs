using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using System.Collections.Generic;
using System;

public class PhoneScript : MonoBehaviour {

	public GameObject canvas;
	private CanvasScript cs;

	private string numberOnScreen;
	private string homeScreenTextContentOrig = "Welcome";
	private string homeScreenTextContent;

	private TextMessageCollection inboxTexts;

	public bool hasUnreadTexts = false;

	// Use this for initialization
	void Start () {

		inboxTexts = new TextMessageCollection ();

		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		cs.ResetAllLines ();
		HandleHasUnreadMessages ();
		TextMessage txt1 = new TextMessage ("sender1", "content");
		inboxTexts.HandleNewIncomingText(txt1);
		TextMessage txt2 = new TextMessage ("sender2", "content");
		inboxTexts.HandleNewIncomingText(txt2);
	
		/*TextMessage txt3 = new TextMessage ("sender3", "content");
		inboxTexts.HandleNewIncomingText(txt3);
		TextMessage txt4 = new TextMessage ("sender4", "content");
		inboxTexts.HandleNewIncomingText(txt4);
		TextMessage txt5 = new TextMessage ("sender5", "content");
		inboxTexts.HandleNewIncomingText(txt5);
		TextMessage txt6 = new TextMessage ("sender6", "content");
		inboxTexts.HandleNewIncomingText(txt6);*/

		inboxTexts.SetUpperIndexTextInViewToTop();
		SetViewToHomeScreen ();
		numberOnScreen = "\n\n";
	}

	// Update is called once per frame
	void Update () {
	
	}

	[RPC]
	void UpdateText(string content)
	{
		TextMessage text = new TextMessage (content);
		inboxTexts.HandleNewIncomingText(text);
	}

	public void HandleHasUnreadMessages()
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

		if (PhoneState.GetState () == PhoneState.State.HomeScreen)
		{
			SetViewToHomeScreen();
		}
	}

	public void AddToNumberOnScreen(int num)
	{
		numberOnScreen += ""+num;
	}

	public void RemoveEndOfNumberOnScreen()
	{
		numberOnScreen = numberOnScreen.Substring(0, numberOnScreen.Length-1);
	}

	public void UpdateNumberOnScreen()
	{
		if (numberOnScreen == "\n\n")
		{
			SetViewToHomeScreen();
		}
		else
		{
			cs.SetScreenText(numberOnScreen);
			PhoneState.SetState (PhoneState.State.NumberOnScreen);
		}
	}

	void UpdateHomeScreen()
	{
		if (numberOnScreen != "") 
		{
			cs.SetScreenText(numberOnScreen);
		}
	}

	public void SetViewToHomeScreen()
	{
		PhoneState.SetState(PhoneState.State.HomeScreen);
		Debug.Log (homeScreenTextContent);
		cs.SetScreenText("\n" + homeScreenTextContent);
		cs.SetHeadingText("Home");
		cs.SetNavLeftText ("");
		cs.SetNavRightText ("Main Menu");
	}

	public void SetViewToMainMenu()
	{
		PhoneState.SetState(PhoneState.State.MainMenu);
		cs.SetScreenText("\n\nGo to Messages?");
		cs.SetHeadingText("Main Menu");
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Go");
	}

	public void SetViewToTextMessageMenu()
	{
		PhoneState.SetState(PhoneState.State.TextMessageMenu);
		cs.SetScreenText("\n\nGo to Inbox?");
		cs.SetHeadingText("Message Menu");
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Go");
	}

	public void SetViewToTextMessageInbox()
	{
		inboxTexts.SetViewToTextMessageCollection ();
	}

	public void ReadSelectedInboxText()
	{
		inboxTexts.ReadSelectedText ();
	}

	public void DeleteSelectedInboxText()
	{
		inboxTexts.DeleteSelectedText ();
	}

	public void SetViewToInboxTextMessageOptions()
	{
		inboxTexts.SetViewToTextMessageOptions ();
	}

	public void InboxScrollUp()
	{
		inboxTexts.ScrollUp ();
	}

	public void InboxScrollDown()
	{
		inboxTexts.ScrollDown ();
	}
}
