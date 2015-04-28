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
	private TextMessageCollection outboxTexts;

	public bool hasUnreadTexts = false;

	private TextMessageMenu tmm;
	private MainMenu mm;

	// Use this for initialization
	void Start () {

		tmm = new TextMessageMenu();
		mm = new MainMenu ();

		inboxTexts = new TextMessageCollection ();
		outboxTexts = new TextMessageCollection ();

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
		MainMenu.SetState (MainMenu.MainMenuState.Messages);
		TextMessageMenu.SetState (TextMessageMenu.TextMessageMenuState.Inbox);
		SetViewToHomeScreen ();
		numberOnScreen = "\n\n";

		ContactsCollection cc = new ContactsCollection ();

		Contact c5 = new Contact ("name5", "1234");
		cc.AddContactToContacts (c5);
		Contact c1 = new Contact ("name2", "1234");
		cc.AddContactToContacts (c1);
		Contact c4 = new Contact ("name4", "1234");
		cc.AddContactToContacts (c4);
		Contact c2 = new Contact ("name1", "1234");
		cc.AddContactToContacts (c2);
		Contact c3 = new Contact ("abc", "1234");
		cc.AddContactToContacts (c3);
		Contact c7 = new Contact ("name7", "1234");
		cc.AddContactToContacts (c7);
		Contact c6 = new Contact ("name6", "1234");
		cc.AddContactToContacts (c6);
		cc.Print ();
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
		cs.SetScreenText("\n" + homeScreenTextContent);
		cs.SetHeadingText("Home");
		cs.SetNavLeftText ("");
		cs.SetNavRightText ("Main Menu");
	}

	public void SetViewToMainMenu()
	{
		mm.SetView ();
		//PhoneState.SetState(PhoneState.State.MainMenu);
		//cs.SetScreenText("\n\nGo to Messages?");
		//cs.SetHeadingText("Main Menu");
		//cs.SetNavLeftText ("Back");
		//cs.SetNavRightText ("Go");
	}

	public void MainMenuScrollUp()
	{
		mm.ScrollUp ();
	}

	public void MainMenuScrollDown()
	{
		mm.ScrollDown ();
	}

	public void SetViewToTextMessageMenu()
	{
		tmm.SetView ();
	}

	public void TextMessMenuScrollUp()
	{
		tmm.ScrollUp ();
	}

	public void TextMessMenuScrollDown()
	{
		tmm.ScrollDown ();
	}

	public void SetViewToTextMessageCollection()
	{
		if (TextMessageMenu.GetState() == TextMessageMenu.TextMessageMenuState.Inbox)
		{
			PhoneState.SetState (PhoneState.State.TextMessageInbox);
			inboxTexts.SetViewToTextMessageCollection ();
		}
		else if (TextMessageMenu.GetState () == TextMessageMenu.TextMessageMenuState.Outbox)
		{
			PhoneState.SetState (PhoneState.State.TextMessageOutbox);
			outboxTexts.SetViewToTextMessageCollection ();
		}
	}

	public void ReadSelectedInboxText()
	{
		inboxTexts.ReadSelectedText ();
	}

	public void ReadSelectedOutboxText()
	{
		outboxTexts.ReadSelectedText ();
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
