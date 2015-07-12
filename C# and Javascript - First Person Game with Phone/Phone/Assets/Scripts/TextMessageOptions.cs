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

	//TODO: have this enum as the enum in TextMessageCollection. I don't want to have two instances
	public enum CollectionType
	{
		Inbox,
		Outbox,
		//Create,
		Drafts
	};

	private static CollectionType collectionType; //the type of collection, ie inbox or output

	//display the options menu for a text from the inbox
	public static void SetViewToInboxTextOptions()
	{
		cs.ResetAllLines ();
		cs.SetLineContent (1, "Reply", selectOptionAtIndex == 0);
		cs.SetLineContent (2, "Delete", selectOptionAtIndex == 1);
		PhoneState.SetState(PhoneState.State.TextMessageOptions);
		indexOfTextInOptions = selectOptionAtIndex;
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Select");
		collectionType = CollectionType.Inbox;

		lowerIndexTextInView = 0;
		upperIndexTextInView = 1;
		optionsAmount = 2;
	}

	//display the options menu for a text from the outbox
	public static void SetViewToOutboxTextOptions()
	{
		cs.ResetAllLines ();
		cs.SetLineContent (1, "Delete", selectOptionAtIndex == 0);
		PhoneState.SetState(PhoneState.State.TextMessageOptions);
		indexOfTextInOptions = selectOptionAtIndex;
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Select");
		collectionType = CollectionType.Outbox;

		lowerIndexTextInView = 0;
		upperIndexTextInView = 0;
		optionsAmount = 1;
	}

	//display the options menu for a text from the draft/currently bring written text
	public static void SetViewToDraftTextOptions()
	{
		cs.ResetAllLines ();
		cs.SetLineContent (1, "Enter contact", selectOptionAtIndex == 0);
		cs.SetLineContent (2, "Enter number", selectOptionAtIndex == 1);
		cs.SetLineContent (3, "Save and quit", selectOptionAtIndex == 2);
		cs.SetLineContent (4, "Quit without saving", selectOptionAtIndex == 3);
		PhoneState.SetState(PhoneState.State.TextMessageOptions);
		indexOfTextInOptions = selectOptionAtIndex;
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Select");
		//collectionType = CollectionType.Create;
		collectionType = CollectionType.Drafts;
		
		lowerIndexTextInView = 0;
		upperIndexTextInView = 0;
		optionsAmount = 4;
	}

	public static void EnterTextRecipient()
	{
	
	}

	public static void SetViewBackToText()
	{
		if (collectionType == CollectionType.Inbox)
		{
			ps.ReadSelectedInboxText();
		}
		else if (collectionType == CollectionType.Outbox)
		{
			ps.ReadSelectedOutboxText();
		}
	}

	public static void DeleteTextViaOptions()
	{
		if (collectionType == CollectionType.Inbox)
		{
			ps.DeleteSelectedInboxText();
		}
		else if (collectionType == CollectionType.Outbox)
		{
			ps.DeleteSelectedOutboxText();
		}
	}
	//delete the selected text
	/*public void DeleteSelectedText()
	{
		DeleteTextFromTexts(indexOfTextInOptions);
		SetViewToTextMessageCollection();
	}

	//TODO: deleting from outbox seems to delete the correspondin inbox text instead
	//delete a text from texts, and from the json file storing the texts
	void DeleteTextFromTexts(int indexOfTextToDel)
	{
		JSONArray array = (JSONArray)savedTexts ["texts"];
		array.Remove (indexOfTextToDel);
		savedTexts ["texts"] = array;
		SaveTextsToFile ();
		
		texts.RemoveAt (indexOfTextToDel);
		optionsAmount -= 1;
		//handle text inbox display
		
		if (indexOfTextToDel >= lowerIndexTextInView && indexOfTextToDel <= upperIndexTextInView) 
		{
			if (lowerIndexTextInView > 0)
			{
				lowerIndexTextInView -= 1;
			}
			
			if (upperIndexTextInView > optionsAmount-1)
			{
				upperIndexTextInView = optionsAmount-1;
			}
		}
		if (selectedTextIndex > optionsAmount-1)
		{
			selectedTextIndex = optionsAmount-1;
		}
		if (selectOptionAtIndex > optionsAmount-1)
		{
			selectOptionAtIndex = optionsAmount-1;
		}
	}*/

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

		int test = (int)collectionType;
		if (collectionType == CollectionType.Inbox)
		{
			SetViewToInboxTextOptions();
		}
		else if (collectionType == CollectionType.Outbox)
		{
			SetViewToOutboxTextOptions();
		}
		//else if (collectionType == CollectionType.Create)
		else if (collectionType == CollectionType.Drafts)
		{
			SetViewToDraftTextOptions();
		}
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

		int test = (int)collectionType;
		if (collectionType == CollectionType.Inbox)
		{
			SetViewToInboxTextOptions();
		}
		else if (collectionType == CollectionType.Outbox)
		{
			SetViewToOutboxTextOptions();
		}
		//else if (collectionType == CollectionType.Create)
		else if (collectionType == CollectionType.Drafts)
		{
			SetViewToDraftTextOptions();
		}
	}

	//set the indices needed to display the most recent text at the top of the list
	public static void SetUpperIndexTextInViewToTop()
	{
		if (optionsAmount > maxTextsDisplayAmount) 
		{
			upperIndexTextInView = maxTextsDisplayAmount - 1;
		}
		else
		{
			upperIndexTextInView = optionsAmount -1;
		}
	}

	public static void SelectEnter()
	{
		if (collectionType == CollectionType.Inbox)
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
		else if (collectionType == CollectionType.Outbox)
		{
			if (selectOptionAtIndex == 0) //delete
			{
				DeleteTextViaOptions();
			}
		}
		else if (collectionType == CollectionType.Drafts)
			//else if (collectionType == CollectionType.Create)
		{
			if (selectOptionAtIndex == 0) //enter contact
			{
				Debug.Log ("enter contact");
			}
			else if (selectOptionAtIndex == 1) //enter number
			{
				Debug.Log ("enter number");
			}
			else if (selectOptionAtIndex == 2) //save and quit
			{
				Debug.Log ("save and quit");
			}
			else if (selectOptionAtIndex == 3) //quit without saving
			{
				Debug.Log ("quit without saving");
				ps.SetViewToSubMainMenu();
			}
		}
	}
}
