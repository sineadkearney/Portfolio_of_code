using UnityEngine;
using System.Collections;
using UnityEngine.UI;
using System.Collections.Generic;
using System;

public class PhoneScript : MonoBehaviour {

	public GameObject canvas;
	private CanvasScript cs;
	public TextStringCreation tsc;

	//for creating a text message
	//private string createTextMessageContent = "";

	private string numberOnScreen;
	private string homeScreenTextContentOrig = "TODO: create new contact";//"Welcome";
	private string homeScreenTextContent;

	private TextMessageCollection inboxTexts;
	private string inboxTextsJson = "D:\\Unity Projects\\Phone\\Assets\\savedData\\inboxTexts.json";
	private TextMessageCollection outboxTexts;
	private string outboxTextsJson = "D:\\Unity Projects\\Phone\\Assets\\savedData\\outboxTexts.json";
	public TextMessageCollection draftTexts; //accessed in TextMessageOptions
	private string draftTextsJson = "D:\\Unity Projects\\Phone\\Assets\\savedData\\draftTexts.json";
	public TextMessageCollection newlyWrittenText; //this is for creating a new text only

	//when the user has entered a text message body/contact name/etc.
	public string newlyEnteredString = "";

	public GameObject receptionIcon;
	public Sprite hasReceptionSprite;
	public Sprite noReceptionSprite;
	
	public bool hasUnreadTexts = false;
	public GameObject messageIcon;
	public Sprite hasNewMessageSprite;

	//uses messageIcon object for now
	public Sprite inAlphaMode;
	public Sprite inNumberMode;

	private TextMessageMenu tmm;
	private MainMenu mm;
	public ContactsCollection cc;

	private bool hadRecption = false;
	public bool hasReception = false;
	private float creditAmount = 0.0f;

	private string savedInput = "";

	private bool hasHighlightedCreateANewContact = false;

	// Use this for initialization
	//TurnOnPhone()
	void Start () {

		tsc = gameObject.GetComponent<TextStringCreation>();
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		cs.ResetAllLines ();

		tmm = new TextMessageMenu();
		mm = new MainMenu ();

		inboxTexts = new TextMessageCollection (inboxTextsJson, TextMessageCollection.CollectionType.Inbox);
		outboxTexts = new TextMessageCollection (outboxTextsJson, TextMessageCollection.CollectionType.Outbox);
		draftTexts = new TextMessageCollection (draftTextsJson, TextMessageCollection.CollectionType.Drafts);
		newlyWrittenText = new TextMessageCollection ("", TextMessageCollection.CollectionType.Create);

		cc = new ContactsCollection ();	
		cc.LoadSavedContacts ();

		MainMenu.SetState (MainMenu.MainMenuState.Messages);
		TextMessageMenu.SetState (TextMessageMenu.TextMessageMenuState.Inbox);
		numberOnScreen = "";

		HandleHasUnreadMessages ();
		SetViewToHomeScreen ();

		if (hasReception) 
		{
			receptionIcon.GetComponent<SpriteRenderer> ().sprite = hasReceptionSprite;
		}
		else
		{
			receptionIcon.GetComponent<SpriteRenderer> ().sprite = noReceptionSprite;
		}

		//example of adding a new contact
		//Contact c5 = new Contact ("lisa", "1234567");
		//cc.AddContactToContacts (c5, true);
		
		//example of adding a new inbox text
		//TextMessage txt1 = new TextMessage ("1234", "content txt1");
		//inboxTexts.HandleNewIncomingText(txt1, true);

		//example of adding a new outbox text
		//TextMessage outText = new TextMessage ("me", "my text message");
		//outboxTexts.AddTextToTexts(outText);

	}

	void Update()
	{
		if (hasReception && !hadRecption) 
		{
			//we newly have reception
			receptionIcon.GetComponent<SpriteRenderer> ().sprite = hasReceptionSprite;
		}
		else if (!hasReception && hadRecption)
		{
			//newly lost reception
			receptionIcon.GetComponent<SpriteRenderer> ().sprite = noReceptionSprite;
		}
		hadRecption = hasReception;

		string state = Enum.GetName (typeof(PhoneState.State), PhoneState.GetState ());
		cs.SetDebugPhoneState (state);
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// This is the function that is called from the first person game, when the player walks into a trigger box
	/// 
	//////////////////////////////////////////////////////////////////
	[RPC]
	void UpdateText(string content)
	{
		TextMessage text = new TextMessage (content);
		inboxTexts.HandleNewIncomingText(text, true);
	}

	//if in the main menu, show a message that we have a new text/have no new texts
	public void HandleHasUnreadMessages()
	{
		SetHasMessagesIcon ();

		if (hasUnreadTexts)
		{
			homeScreenTextContent = homeScreenTextContentOrig + "\nNew Message!";
		}
		else
		{
			homeScreenTextContent = homeScreenTextContentOrig + "\nNo New Messages";
		}

		if (PhoneState.GetState () == PhoneState.State.HomeScreen)
		{
			SetViewToHomeScreen();//refresh
		}
	}

	//sets the icon to an envelope or to nothing
	public void SetHasMessagesIcon()
	{
		if (hasUnreadTexts)
		{
			messageIcon.GetComponent<SpriteRenderer> ().sprite = hasNewMessageSprite;
		}
		else
		{
			messageIcon.GetComponent<SpriteRenderer> ().sprite = null;
		}
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// The user is entering a number into the phone, when they were on the home screen
	/// 
	//////////////////////////////////////////////////////////////////
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
		//TODO: do I want to be able to do this?

		/*string name = "test"; //TODO: hardcoded for now
		SaveNewContact (name, numberOnScreen);
		numberOnScreen = "";
		UpdateNumberOnScreen ();*/
	}

	private void SaveNewContact (string name, string number)
	{
		Contact c = new Contact (name, number);
		cc.AddContactToContacts (c, true);
	}

	public void SetHasHighlightedCreateANewContact(bool newValue)
	{
		hasHighlightedCreateANewContact = newValue;
	}

	public bool GetHasHighlightedCreateANewContact()
	{
		return hasHighlightedCreateANewContact;
	}

	public void SetViewToAddNewContact()
	{
		PhoneState.SetState (PhoneState.State.CreateNewContact);
		cs.SetHeadingText ("Create a new contact");
		cs.SetNavLeftText ("Options");
		cs.SetNavRightText ("Delete");
		cs.SetLineContent(1, "Enter name:", false);
		cs.SetLineContent(3, "Enter number:", false);
		tsc.Enable ();

		tsc.SetTextArea("SetLineContent(2)");
		tsc.SetInAplhaInputMode (true); //we are in number-only mode
		//tsc.SetAlphaNumberIcon ();
		tsc.SetInitialContent ("");

		tempContact = new Contact("", "");
		//enteringName = true;
	}

	private Contact tempContact;
	private bool enteringName = true;
	public void AddNewContactMoveUpDown()
	{
		enteringName = !enteringName;

		if (!enteringName) //we are entering the number
		{
			string nameEntered = tsc.GetCreatedString ();
			cs.SetLineContent(2, nameEntered, false);
			tempContact.SetName (nameEntered);

			tsc.SetTextArea("SetLineContent(4)");
			tsc.SetInAplhaInputMode (false); //we are in number mode.
			tsc.SetInitialContent (tempContact.GetNumber());
		}
		else //we are entering the name
		{
			string numberEntered = tsc.GetCreatedString();
			cs.SetLineContent (4, numberEntered, false); //gets rid of the cursor
			tempContact.SetNumber(numberEntered);

			//set up entering the name (or going back to edit i)
			tsc.SetTextArea("SetLineContent(2)");
			tsc.SetInAplhaInputMode (true); //we are in alpha mode. 
			tsc.SetInitialContent (tempContact.GetName());
		}
	}

	public void SetViewToNewContactOptions()
	{
		bool inAplhaInputMode = tsc.GetInAplhaInputMode();

		if (inAplhaInputMode) 
		{
			string nameEntered = tsc.GetCreatedString ();
			tempContact.SetName (nameEntered);
		}
		else
		{
			string numberEntered = tsc.GetCreatedString();
			tempContact.SetNumber(numberEntered);
		}

		cs.SetHeadingText ("Options");
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Select");
	}

	void UpdateHomeScreen()
	{
		if (numberOnScreen != "") 
		{
			cs.SetScreenText(numberOnScreen);
		}
	}

	//the user has pressed the "hang up" button. Quit whatever they were doing and send the user back to the home screen
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

	//////////////////////////////////////////////////////////////////
	/// 
	/// If we selected to go to Inbox, Outbox or Drafts, set the view to the list of these texts
	/// If we selected to go to Create, set up the phone to allow the user to create a text
	/// 
	//////////////////////////////////////////////////////////////////
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
		else if (TextMessageMenu.GetState () == TextMessageMenu.TextMessageMenuState.Create)
		{
			PhoneState.SetState (PhoneState.State.TextMessageCreate);
			tsc.Enable();
			tsc.SetTextArea("SetScreenText()");
			tsc.SetAlphaNumberIcon();
			newlyWrittenText.SetViewToTextMessageCreate(true);
		}
		else if (TextMessageMenu.GetState () == TextMessageMenu.TextMessageMenuState.Drafts)
		{
			PhoneState.SetState (PhoneState.State.TextMessageDrafts);
			draftTexts.SetViewToTextMessageCollection ();
		}
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// Set the screen view to the selected inbox or outbox text
	/// 
	//////////////////////////////////////////////////////////////////
	public void ReadSelectedInboxText()
	{
		inboxTexts.ReadSelectedText ();
	}

	public void ReadSelectedOutboxText()
	{
		outboxTexts.ReadSelectedText ();
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// Resume writing a text. Either a draft, or we went into the "Options" menu but then returned to writing the text
	/// 
	//////////////////////////////////////////////////////////////////
	public void ContinueEditingSelectedDraftText()
	{
		string draftContent = draftTexts.GetBodyOfSelectedDraftText ();
		PhoneState.SetState (PhoneState.State.TextMessageCreate);
		tsc.Enable();
		tsc.SetTextArea("SetScreenText()");
		tsc.SetAlphaNumberIcon ();
		tsc.SetInitialContent (draftContent);
	
		draftTexts.SetViewToTextMessageCreate(false);

	}

	public void GoBackToEditingNewMessageOrDraft(bool isDraft)
	{
		PhoneState.SetState (PhoneState.State.TextMessageCreate);
		tsc.Enable();
		tsc.SetTextArea("SetScreenText()");
		tsc.SetInitialContent (savedInput);

		//TODO: probably don't need this if checks
		if (isDraft)
			draftTexts.SetViewToTextMessageCreate(false);
		else
			newlyWrittenText.SetViewToTextMessageCreate(false);
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// Delete a text
	/// 
	//////////////////////////////////////////////////////////////////
	public void DeleteSelectedInboxText()
	{
		inboxTexts.DeleteSelectedText ();
	}

	public void DeleteSelectedOutboxText()
	{
		outboxTexts.DeleteSelectedText ();
	}
	public void DeleteSelectedDraftsText()
	{
		draftTexts.DeleteSelectedText ();
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// Set the view to options for the selected text message
	/// 
	//////////////////////////////////////////////////////////////////
	public void SetViewToTextMessageOptions()
	{
		if (TextMessageMenu.GetState() == TextMessageMenu.TextMessageMenuState.Inbox)
		{
			inboxTexts.SetViewToTextMessageOptions();
		}
		else if (TextMessageMenu.GetState () == TextMessageMenu.TextMessageMenuState.Outbox)
		{
			outboxTexts.SetViewToTextMessageOptions();
		}
		else if (TextMessageMenu.GetState () == TextMessageMenu.TextMessageMenuState.Create)
		{
			savedInput = tsc.GetCreatedString();
			
			//temporarily save the string in case we are sending it, or saving it to drafts
			TextMessageOptions.SetNewTextContent(savedInput); 
			
			tsc.FinishInputAndReset();
			tsc.UpdateTextMessageContent("");//clear whatever text area that we were writing to
			tsc.Disable();
			newlyWrittenText.SetViewToTextMessageOptions();
		}
		else if (TextMessageMenu.GetState () == TextMessageMenu.TextMessageMenuState.Drafts)
		{
			savedInput = tsc.GetCreatedString();

			//temporarily save the string in case we are sending it, or saving it to drafts
			TextMessageOptions.SetNewTextContent(savedInput); 

			tsc.FinishInputAndReset();
			tsc.UpdateTextMessageContent("");//clear whatever text area that we were writing to
			tsc.Disable();
			draftTexts.SetViewToTextMessageOptions();
		}
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// Functions for sending a text to a contact or a manually entered number
	/// 
	//////////////////////////////////////////////////////////////////
	// show the list of contacts to the user, so they can see who they can send a text who
	public void ShowAllContactsForPossibleTextRecipient()
	{
		cc.ShowAllContactsForPossibleTextRecipient();
	}
	
	public void SelectContactAsTextRecipient()
	{
		Contact textRecipient = cc.SelectContactAsTextRecipient ();
		TextMessage savedText = TextMessageOptions.GetSavedText ();

		savedText.SetRecipient (textRecipient.GetNumber());
		SendText (savedText);
		SetViewToMainMenu ();
	}

	//set up the screen to allow the user to type in the number of the person who they want to text
	public void EnterNumberAsTextRecipient()
	{
		PhoneState.SetState (PhoneState.State.NumberTextRecipient);
		cs.SetHeadingText ("Enter Number");
		tsc.Enable ();
		tsc.SetTextArea("SetScreenText()");
		tsc.SetInAplhaInputMode (false); //we are in number-only mode
		tsc.SetAlphaNumberIcon ();
		tsc.SetInitialContent ("");
	}

	//The user entered the number of the person who they want to text. They have pressed "Send" to send the text. Get the number entered, and send the text
	public void GetNumberEnteredAndSendText()
	{
		string numberEntered = tsc.GetCreatedString ();
		Debug.Log ("send text to " + numberEntered);

		TextMessage savedText = TextMessageOptions.GetSavedText ();
		savedText.SetRecipient (numberEntered);
		SendText (savedText);
		SetViewToMainMenu ();

	}

	public void SendText(TextMessage textMessage)
	{
		//TODO: check has credit, check has reception

		Debug.Log ("send text");

	}
	
	//////////////////////////////////////////////////////////////////
	/// 
	/// Functions for scrolling through various menus
	/// 
	//////////////////////////////////////////////////////////////////
	public void MainMenuScrollUp()
	{
		mm.ScrollUp ();
	}
	
	public void MainMenuScrollDown()
	{
		mm.ScrollDown ();
	}

	public void InboxScrollUp()
	{
		inboxTexts.ScrollUp ();
	}

	public void InboxScrollDown()
	{
		inboxTexts.ScrollDown ();
	}

	public void OutboxScrollUp()
	{
		outboxTexts.ScrollUp ();
	}
	
	public void OutboxScrollDown()
	{
		outboxTexts.ScrollDown ();
	}

	public void DraftsScrollUp()
	{
		draftTexts.ScrollUp ();
	}

	public void DraftsScrollDown()
	{
		draftTexts.ScrollDown ();
	}

	public void ContactsScrollUp()
	{
		cc.ScrollUp ();
	}

	public void ContactsScrollDown()
	{
		cc.ScrollDown ();
	}

	public void TextMessMenuScrollUp()
	{
		tmm.ScrollUp ();
	}
	
	public void TextMessMenuScrollDown()
	{
		tmm.ScrollDown ();
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// Functions for making outgoing calls
	/// 
	//////////////////////////////////////////////////////////////////
	public void HandleOutGoingCall()
	{
		ShowErrorMessage("You have no credit");
	}

	//////////////////////////////////////////////////////////////////
	/// 
	/// Functions for handling unexpected errors
	/// 
	//////////////////////////////////////////////////////////////////
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
