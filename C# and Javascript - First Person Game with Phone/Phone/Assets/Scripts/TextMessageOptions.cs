using UnityEngine;
using System.Collections;

public static class TextMessageOptions {
	
	private static int textsLength = 0;	//the length of IList<TextMessage> texts
	private static int readTextAtIndex = 0; //read the text at this index in texts
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

	public enum CollectionType
	{
		Inbox,
		Outbox,
	};
	private static CollectionType collectionType; //the type of collection, ie inbox or output

	//display the options menu for a text from the inbox
	public static void SetViewToInboxTextOptions()
	{
		cs.ResetAllLines ();
		cs.SetLineContent (1, "Reply", readTextAtIndex == 0);
		cs.SetLineContent (2, "Delete", readTextAtIndex == 1);
		PhoneState.SetState(PhoneState.State.TextMessageOptions);
		indexOfTextInOptions = readTextAtIndex;
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Select");
		collectionType = CollectionType.Inbox;

		lowerIndexTextInView = 0;
		upperIndexTextInView = 1;
		textsLength = 2;
	}

	//display the options menu for a text from the outbox
	public static void SetViewToOutboxTextOptions()
	{
		cs.ResetAllLines ();
		cs.SetLineContent (1, "Delete", readTextAtIndex == 0);
		PhoneState.SetState(PhoneState.State.TextMessageOptions);
		indexOfTextInOptions = readTextAtIndex;
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Select");
		collectionType = CollectionType.Outbox;

		lowerIndexTextInView = 0;
		upperIndexTextInView = 0;
		textsLength = 1;
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
		textsLength -= 1;
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
	}*/

	//scroll up through a list of texts. With wrap-around
	public static void ScrollUp()
	{
		if (readTextAtIndex == 0) //go back to the bottom
		{
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
		else if (selectedTextIndex == lowerIndexTextInView-1)
		{
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
			readTextAtIndex = readTextAtIndex-1;//(readTextAtIndex + textsLength - 1) % textsLength;
			selectedTextIndex = selectedTextIndex-1;//(selectedTextIndex + textsLength - 1) % textsLength;
			
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
	}
	
	//scroll down through a list of texts. With wrap-around.
	public static void ScrollDown()
	{
		if (readTextAtIndex == textsLength-1) //move back to top
		{
			SetUpperIndexTextInViewToTop();	
			lowerIndexTextInView = 0;
			selectedTextIndex = 0;
			readTextAtIndex = 0;
		}
		else if (selectedTextIndex == upperIndexTextInView) //move all down one
		{
			upperIndexTextInView +=1;
			lowerIndexTextInView +=1;
			readTextAtIndex += 1;
		}
		else //just move read and selected
		{
			readTextAtIndex += 1;
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
	}

	//set the indices needed to display the most recent text at the top of the list
	public static void SetUpperIndexTextInViewToTop()
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

	public static void SelectEnter()
	{
		if (collectionType == CollectionType.Inbox)
		{
			if (readTextAtIndex == 0) //reply
			{
				Debug.Log ("reply");
			}
			else if (readTextAtIndex == 1) //delete
			{
				DeleteTextViaOptions();
			}
		}
		else if (collectionType == CollectionType.Outbox)
		{
			if (readTextAtIndex == 0) //delete
			{
				DeleteTextViaOptions();
			}
		}
	}
}
