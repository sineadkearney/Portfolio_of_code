using UnityEngine;
using System.Collections;

public static class TextMessageOptions {
	
	private static int optionsAmount = 0;	//the amount of options available
	private static int selectOptionAtIndex = 0; //read the text at this index in texts
	private static int selectedTextIndex = 0;	//the index of the currently selected text
	private static int maxTextsDisplayAmount = 5;	//the max amount of texts that can be listed at the same time
	private static int lowerIndexTextInView = 0;	//the lower index of the texts currently being displayed (or will be displayed)
	private static int upperIndexTextInView = 4;	//the upper index of the texts currently being displayed (or will be display)
	private static int indexOfTextInOptions = -1;	//the index of the text that we are currently in the Option menu for (ie, to use with Delete)
	
	//private string fileName = "";	//the full path to the .json file that contains all saved texts
	//private string fileData = "";	//the data in fileName
	//private JSONNode savedTexts;	//the jsonObject of the saved texts
	
	private static PhoneScript ps = (PhoneScript)GameObject.FindGameObjectWithTag("Phone").GetComponent<PhoneScript>();
	private static CanvasScript cs = (CanvasScript)GameObject.FindGameObjectWithTag ("PhoneCanvas").GetComponent<CanvasScript> ();
	private static ContactsCollection cc; //have access to the Contact list

	private static TextMessageCollection.CollectionType m_collectionType;

	private static string m_newTextMessageContent = "";
	private static string m_newTextMessageRecipient = "";

	private static TextMessage savedText;

	public static void SetViewToTextOptions(TextMessageCollection.CollectionType collectionType)
	{
		if (collectionType == TextMessageCollection.CollectionType.Inbox)
		{
			cs.ResetAllLines ();
			cs.SetLineContent (1, "Reply", selectOptionAtIndex == 0);
			cs.SetLineContent (2, "Delete", selectOptionAtIndex == 1);
			PhoneState.SetState(PhoneState.State.TextMessageOptions);
			indexOfTextInOptions = selectOptionAtIndex;
			cs.SetNavLeftText ("Back");
			cs.SetNavRightText ("Select");
			m_collectionType = TextMessageCollection.CollectionType.Inbox;
			
			lowerIndexTextInView = 0;
			upperIndexTextInView = 1;
			optionsAmount = 2;
		}
		else if (collectionType == TextMessageCollection.CollectionType.Outbox)
		{
			cs.ResetAllLines ();
			cs.SetLineContent (1, "Delete", selectOptionAtIndex == 0);
			PhoneState.SetState(PhoneState.State.TextMessageOptions);
			indexOfTextInOptions = selectOptionAtIndex;
			cs.SetNavLeftText ("Back");
			cs.SetNavRightText ("Select");
			m_collectionType = TextMessageCollection.CollectionType.Outbox;
			
			lowerIndexTextInView = 0;
			upperIndexTextInView = 0;
			optionsAmount = 1;
		}
		else if (collectionType == TextMessageCollection.CollectionType.Drafts)
		{
			cs.ResetAllLines ();
			cs.SetLineContent (1, "Enter contact", selectOptionAtIndex == 0);
			cs.SetLineContent (2, "Enter number", selectOptionAtIndex == 1);
			cs.SetLineContent (3, "Save draft and quit", selectOptionAtIndex == 2);
			cs.SetLineContent (4, "Back to drafts menu", selectOptionAtIndex == 3);
			cs.SetLineContent (5, "Delete draft", selectOptionAtIndex == 4);
			PhoneState.SetState(PhoneState.State.TextMessageOptions);
			indexOfTextInOptions = selectOptionAtIndex;
			cs.SetNavLeftText ("Back");
			cs.SetNavRightText ("Select");
			//m_collectionType = CollectionType.Create;
			m_collectionType = TextMessageCollection.CollectionType.Drafts;

			lowerIndexTextInView = 0;
			upperIndexTextInView = 0;
			optionsAmount = 5;
		}
		else if (collectionType == TextMessageCollection.CollectionType.Create)
		{
			cs.ResetAllLines ();
			cs.SetLineContent (1, "Select from contacts", selectOptionAtIndex == 0);
			cs.SetLineContent (2, "Enter number", selectOptionAtIndex == 1);
			cs.SetLineContent (3, "Save to drafts and quit", selectOptionAtIndex == 2);
			cs.SetLineContent (4, "Back to message", selectOptionAtIndex == 3);
			PhoneState.SetState(PhoneState.State.TextMessageOptions);
			indexOfTextInOptions = selectOptionAtIndex;
			cs.SetNavLeftText ("Back");
			cs.SetNavRightText ("Select");
			m_collectionType = TextMessageCollection.CollectionType.Create;
			
			lowerIndexTextInView = 0;
			upperIndexTextInView = 0;
			optionsAmount = 4;
		}
	}

	public static void SelectEnter()
	{
		savedText = new TextMessage("me", "", m_newTextMessageContent, "", true, true);

		if (m_collectionType == TextMessageCollection.CollectionType.Inbox)
		{
			if (selectOptionAtIndex == 0) //reply
			{
				Debug.Log ("reply");
			}
			else if (selectOptionAtIndex == 1) //delete
			{
				DeleteTextViaOptions();
			}
		}
		else if (m_collectionType == TextMessageCollection.CollectionType.Outbox)
		{
			if (selectOptionAtIndex == 0) //delete
			{
				DeleteTextViaOptions();
			}
		}
		else if (m_collectionType == TextMessageCollection.CollectionType.Drafts)
		{
			if (selectOptionAtIndex == 0) //enter contact
			{
				Debug.Log ("Select from contacts");
				ps.ShowAllContactsForPossibleTextRecipient();
			}
			else if (selectOptionAtIndex == 1) //enter number
			{
				Debug.Log ("enter number");
				//ps.EnterNumberAsTextRecipient();
			}
			else if (selectOptionAtIndex == 2)
			{
				Debug.Log ("Save draft and quit");

				//public TextMessage(string sender, string recipient, string message, string timestamp, bool isRead, bool isTraceable)
				
				//TODO: what if we are over-writing an old draft text? This will just add a new one
				ps.draftTexts.AddTextToTexts(savedText, true);
				ps.SetViewToTextMessageCollection();
			}
			else if (selectOptionAtIndex == 3)
			{
				Debug.Log ("Back to drafts menu");
				ps.SetViewToTextMessageCollection();
			}
			else if (selectOptionAtIndex == 4)
			{
				Debug.Log ("delete draft");
				DeleteTextViaOptions();
			}
		}
		else if (m_collectionType == TextMessageCollection.CollectionType.Create)
		{

			if (selectOptionAtIndex == 0)
			{
				Debug.Log ("Select from contacts");
				ps.ShowAllContactsForPossibleTextRecipient();
			}
			else if (selectOptionAtIndex == 1)
			{
				Debug.Log ("enter number");
				ps.EnterNumberAsTextRecipient();
			}
			else if (selectOptionAtIndex == 2) //save and quit
			{
				Debug.Log ("save to drafts and quit");
				//public TextMessage(string sender, string recipient, string message, string timestamp, bool isRead, bool isTraceable)
				
				//TODO: what if we are over-writing an old draft text? This will just add a new one
				ps.draftTexts.AddTextToTexts(savedText, true);
				ps.SetViewToSubMainMenu();
			}
			else if (selectOptionAtIndex == 3) //Back to message
			{
				Debug.Log ("Quit to message menu");
				ps.SetViewToSubMainMenu();
			}
		}
	}

	public static TextMessage GetSavedText()
	{
		return savedText;
	}

	public static void SetViewBackToText()
	{
		if (m_collectionType == TextMessageCollection.CollectionType.Inbox)
		{
			ps.ReadSelectedInboxText();
		}
		else if (m_collectionType == TextMessageCollection.CollectionType.Outbox)
		{
			ps.ReadSelectedOutboxText();
		}
		else if (m_collectionType == TextMessageCollection.CollectionType.Create)
		{
			ps.GoBackToEditingNewMessageOrDraft(false);
		}
		else if (m_collectionType == TextMessageCollection.CollectionType.Drafts)
		{
			ps.GoBackToEditingNewMessageOrDraft(true);
		}
	}

	public static void DeleteTextViaOptions()
	{
		if (m_collectionType == TextMessageCollection.CollectionType.Inbox)
		{
			ps.DeleteSelectedInboxText();
		}
		else if (m_collectionType == TextMessageCollection.CollectionType.Outbox)
		{
			ps.DeleteSelectedOutboxText();
		}
		else if (m_collectionType == TextMessageCollection.CollectionType.Drafts)
		{
			ps.DeleteSelectedDraftsText();
		}
	}
	

	//scroll up through a list of texts. With wrap-around
	public static void ScrollUp()
	{
		if (selectOptionAtIndex == 0) //go back to the bottom
		{
			upperIndexTextInView = optionsAmount-1; //5
			lowerIndexTextInView = optionsAmount-maxTextsDisplayAmount;//1
			if (lowerIndexTextInView < 0)
			{
				lowerIndexTextInView = 0;
			}
			
			if (optionsAmount < maxTextsDisplayAmount)
			{
				selectedTextIndex = optionsAmount-1;
			}
			else
			{
				selectedTextIndex = maxTextsDisplayAmount-1;//4
			}
			selectOptionAtIndex = optionsAmount-1; //5
		}
		else if (selectedTextIndex == lowerIndexTextInView-1)
		{
			if (upperIndexTextInView >= optionsAmount-1)
			{
				upperIndexTextInView -=1;
			}
			if (lowerIndexTextInView > 0)
			{
				lowerIndexTextInView -=1;
			}
			selectOptionAtIndex = selectOptionAtIndex-1;//(selectOptionAtIndex + optionsAmount - 1) % optionsAmount;
		}
		else //just move selected and read up
		{
			selectOptionAtIndex = selectOptionAtIndex-1;//(selectOptionAtIndex + optionsAmount - 1) % optionsAmount;
			selectedTextIndex = selectedTextIndex-1;//(selectedTextIndex + optionsAmount - 1) % optionsAmount;
			
		}

		SetViewToTextOptions (m_collectionType);
	}
	
	//scroll down through a list of texts. With wrap-around.
	public static void ScrollDown()
	{
		if (selectOptionAtIndex == optionsAmount-1) //move back to top
		{
			SetUpperIndexTextInViewToTop();	
			lowerIndexTextInView = 0;
			selectedTextIndex = 0;
			selectOptionAtIndex = 0;
		}
		else if (selectedTextIndex == upperIndexTextInView) //move all down one
		{
			upperIndexTextInView +=1;
			lowerIndexTextInView +=1;
			selectOptionAtIndex += 1;
		}
		else //just move read and selected
		{
			selectOptionAtIndex += 1;
			selectedTextIndex += 1;
		}
		SetViewToTextOptions (m_collectionType);
	}

	//set the indices needed to display the most recent text at the top of the list
	public static void SetUpperIndexTextInViewToTop()
	{
				if (optionsAmount > maxTextsDisplayAmount) {
						upperIndexTextInView = maxTextsDisplayAmount - 1;
				} else {
						upperIndexTextInView = optionsAmount - 1;
				}
		}

	public static void SetNewTextContent(string content)
	{
		m_newTextMessageContent = content;
	}

	public static void SetNewTextRecipient(string recipient)
	{
		m_newTextMessageRecipient = recipient;
	}
}
