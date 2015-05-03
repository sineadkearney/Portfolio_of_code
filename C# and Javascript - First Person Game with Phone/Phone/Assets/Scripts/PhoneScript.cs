﻿using UnityEngine;
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
	private string inboxTextsJson = "C:\\Users\\Sinead\\Documents\\Phone\\Assets\\savedData\\inboxTexts.json";
	private TextMessageCollection outboxTexts;
	private string outboxTextsJson = "C:\\Users\\Sinead\\Documents\\Phone\\Assets\\savedData\\outboxTexts.json";

	public bool hasUnreadTexts = false;

	private TextMessageMenu tmm;
	private MainMenu mm;
	public ContactsCollection cc;

	// Use this for initialization
	//TurnOnPhone()
	void Start () {

		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		cs.ResetAllLines ();

		tmm = new TextMessageMenu();
		mm = new MainMenu ();

		inboxTexts = new TextMessageCollection (inboxTextsJson, TextMessageCollection.CollectionType.Inbox);
		outboxTexts = new TextMessageCollection (outboxTextsJson, TextMessageCollection.CollectionType.Outbox);

		cc = new ContactsCollection ();	
		cc.LoadSavedContacts ();

		//example of adding a new contact
		//Contact c5 = new Contact ("lisa", "1234567");
		//cc.AddContactToContacts (c5, true);

		//example of adding a new inbox text
		//TextMessage txt1 = new TextMessage ("1234", "content txt1");
		//inboxTexts.HandleNewIncomingText(txt1, true);

		MainMenu.SetState (MainMenu.MainMenuState.Messages);
		TextMessageMenu.SetState (TextMessageMenu.TextMessageMenuState.Inbox);
		numberOnScreen = "";

		HandleHasUnreadMessages ();
		SetViewToHomeScreen ();

		//example of adding a new outbox text
		//TextMessage outText = new TextMessage ("me", "my text message");
		//outboxTexts.AddTextToTexts(outText);

	}

	// Update is called once per frame
	//void Update () {
	
	//}

	[RPC]
	void UpdateText(string content)
	{
		TextMessage text = new TextMessage (content);
		inboxTexts.HandleNewIncomingText(text, true);
	}

	//if in the main menu, show a message that we have a new text/have no new texts
	//show "Δ" in the top right of the screen if we have unread texts
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
			SetViewToHomeScreen();//refresh
		}
	}

	//add a digit to the number being entered on the screen
	public void AddToNumberOnScreen(int num)
	{
		numberOnScreen += ""+num;
	}

	//remove a digit from the number being entered on the screen
	public void RemoveEndOfNumberOnScreen()
	{
		numberOnScreen = numberOnScreen.Substring(0, numberOnScreen.Length-1);
	}

	public void UpdateNumberOnScreen()
	{
		if (numberOnScreen == "")
		{
			SetViewToHomeScreen();
		}
		else
		{
			cs.SetHeadingText("Home");
			cs.SetLineContent(2, numberOnScreen, false);
			cs.SetScreenText("");
			cs.SetNavLeftText("Delete");
			cs.SetNavRightText("Save");
			PhoneState.SetState (PhoneState.State.NumberOnScreen);
		}
	}

	public void SaveNumberOnScreenToContacts()
	{
		string name = "test"; //TODO: hardcoded for now
		SaveNewContact (name, numberOnScreen);
		numberOnScreen = "";
		UpdateNumberOnScreen ();
	}

	private void SaveNewContact (string name, string number)
	{
		Contact c = new Contact (name, number);
		cc.AddContactToContacts (c, true);
	}

	void UpdateHomeScreen()
	{
		if (numberOnScreen != "") 
		{
			cs.SetScreenText(numberOnScreen);
		}
	}

	public void ResetAndSetViewToHomeScreen()
	{
		numberOnScreen = "";
		SetViewToHomeScreen ();
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
	}

	public void MainMenuScrollUp()
	{
		mm.ScrollUp ();
	}

	public void MainMenuScrollDown()
	{
		mm.ScrollDown ();
	}

	public void SetViewToSubMainMenu()
	{
		if (mm.GetState() == MainMenu.MainMenuState.Messages)
		{
			tmm.SetView ();
		}
		else if (mm.GetState() == MainMenu.MainMenuState.Contacts)
		{
			cc.SetViewToContactCollection();
		}
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

	public void ContactsScrollUp()
	{
		cc.ScrollUp ();
	}

	public void ContactsScrollDown()
	{
		cc.ScrollDown ();
	}

	public void HandleOutGoingCall()
	{
		ShowErrorMessage("You have no credit");
	}

	public void ShowErrorMessage(string content)
	{
		PhoneState.SetState(PhoneState.State.ErrorMessage);
		cs.SetScreenText("\n" + content);
		cs.SetHeadingText("Error");
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("");
	}

	//used after clicking cancel from an error message
	public void SetViewBasedOnState()
	{
		PhoneState.State state = PhoneState.GetState ();
		Debug.Log (state);
		switch (state)
		{
			
		case PhoneState.State.HomeScreen:
				SetViewToHomeScreen();
			break;			
		case PhoneState.State.NumberOnScreen:
			UpdateNumberOnScreen();
			break;
			
		case PhoneState.State.MainMenu:
			SetViewToMainMenu();
			break;
			
		case PhoneState.State.TextMessageMenu:
			SetViewToSubMainMenu();
			break;
			
		case PhoneState.State.TextMessageInbox:
		case PhoneState.State.TextMessageOutbox:
			SetViewToTextMessageCollection();
			break;
			
		case PhoneState.State.TextMessageDisplay:
		//either outbox or inbox...
			break;
			
		case PhoneState.State.TextMessageOptions:
			//either outbox or inbox SetViewToInboxTextMessageOptions()
			break;
			
		case PhoneState.State.ContactsList:
			SetViewToSubMainMenu();
			break;
		case PhoneState.State.ErrorMessage:
			break;
		default:
			print ("Incorrect state.");
			break;
		}
	}


}
