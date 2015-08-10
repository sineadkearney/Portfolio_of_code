using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using System;
using SimpleJSON;

public class TextMessageCollection {

	public IList<TextMessage> texts = new List<TextMessage>();
	private int textsLength = 0;	//the length of IList<TextMessage> texts
	private int readTextAtIndex = 0; //read the text at this index in texts
	private int selectedTextIndex = 0;	//the index of the currently selected text
	private int maxTextsDisplayAmount = 5;	//the max amount of texts that can be listed at the same time
	private int lowerIndexTextInView = 0;	//the lower index of the texts currently being displayed (or will be displayed)
	private int upperIndexTextInView = 4;	//the upper index of the texts currently being displayed (or will be display)
	private int indexOfTextInOptions = -1;	//the index of the text that we are currently in the Option menu for (ie, to use with Delete)

	private string fileName = "";	//the full path to the .json file that contains all saved texts
	private string fileData = "";	//the data in fileName
	private JSONNode savedTexts;	//the jsonObject of the saved texts

	private PhoneScript ps = (PhoneScript)GameObject.FindGameObjectWithTag("Phone").GetComponent<PhoneScript>();
	private CanvasScript cs = (CanvasScript)GameObject.FindGameObjectWithTag ("PhoneCanvas").GetComponent<CanvasScript> ();
	private ContactsCollection cc; //have access to the Contact list
	
	public enum CollectionType
		{
		Inbox,
		Outbox,
		Drafts,
		Create,
	};
	private CollectionType collectionType; //the type of collection, ie inbox or output

	//private TextMessageOptions.CollectionType collectionType;

	//constructor
	public TextMessageCollection(string incomingFileName, CollectionType type)
	{
		fileName = incomingFileName;

		//int intType = (int)type;
		collectionType = type;
		cc = ps.cc;

		if (fileName != "")
		{
			fileData = FileManager.Load (fileName);
			LoadSavedTexts ();
			SetUpperIndexTextInViewToTop ();
		}
	}

	//take a json string, parse it, populate IList<TextMessage> texts with those texts in the json
	public void LoadSavedTexts()
	{
		savedTexts = JSONNode.Parse (fileData);
		JSONArray array = (JSONArray)savedTexts ["texts"];
		if (collectionType == CollectionType.Inbox)
		{
			bool hasUnreadTexts = false;
			for (int i = array.Count-1; i >= 0; i--) //add the oldest text first
			{
				bool isRead = array[i]["isRead"].AsBool;
				TextMessage t = CreateTextfromJson(array[i]);

				texts.Insert (0, t);
				textsLength += 1;

				hasUnreadTexts |= !isRead;
			}
			ps.hasUnreadTexts = hasUnreadTexts;
		}
		else
		{	
			for (int i = array.Count-1; i >= 0; i--) //add the oldest text first
			{
				TextMessage t = CreateTextfromJson(array[i]);
				Debug.Log("sender: " + array[i]["sender"]);
				Debug.Log("message: " + array[i]["message"]);

				texts.Insert (0, t);
				textsLength += 1;
			}

		}
	}

	//given a jsonObject (ie, JSONNode), return a TextMessage
	private TextMessage CreateTextfromJson(JSONNode json)
	{
		TextMessage t = new TextMessage(json["sender"], json["recipient"], json["message"], json["timestamp"], 
		                                json["isRead"].AsBool, json["isTraceable"].AsBool);
		return t;
	}

	//inbox, only
	//set up all vars for a new inbox text
	public void HandleNewIncomingText(TextMessage text, bool rewriteFile)
	{
		if (collectionType == CollectionType.Inbox)
		{
			AddTextToTexts(text, rewriteFile);
			ps.hasUnreadTexts = true;
			ps.HandleHasUnreadMessages();
			SetUpperIndexTextInViewToTop ();
			
			if (PhoneState.GetState () == PhoneState.State.TextMessageInbox) 
			{
				SetViewToTextMessageCollection();//refresh
			}
		}
	}

	//TODO: allows me to add to output. Find a better way to do this.
	//rewriteFile: add the text to the json file. False during the initial read of the json file.
	public void AddTextToTexts(TextMessage text, bool rewriteFile)
	{
		if (rewriteFile) 
		{
			JSONArray array = (JSONArray)savedTexts ["texts"];
			for (int i = textsLength; i > 0; i --) //move all contacts up an index in the array
			{
				array[i]["sender"] = array[i-1]["sender"];
				Debug.Log ("recipient: '" + array[i-1]["recipient"] + "'");
				array[i]["recipient"] = array[i-1]["recipient"];
				array[i]["message"] = array[i-1]["message"];
				array[i]["timestamp"] = array[i-1]["timestamp"];
				array[i]["isRead"] = array[i-1]["isRead"];
				array[i]["isTraceable"] = array[i-1]["isTraceable"];
			}
			array[0]["sender"] = text.GetSender(); //add the new text at the top
			array[0]["recipient"] = text.GetRecipient();
			array[0]["message"] = text.GetMessage();
			array[0]["timestamp"] = ""+text.GetTimestamp();
			array[0]["isRead"] = ""+text.HasBeenRead();
			array[0]["isTraceable"] = ""+text.IsTraceable();

			savedTexts ["texts"] = array;
			SaveJson();
		}

		texts.Insert (0, text);
		textsLength += 1;
	}

	//set the indices needed to display the most recent text at the top of the list
	public void SetUpperIndexTextInViewToTop()
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

	//set the indices needed to display the oldest text at the bottom of the list
	void SetUpperIndexTextInViewToBottom()
	{
		upperIndexTextInView = textsLength - 1;
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
	}

	private void SaveTextsToFile()
	{
		System.IO.File.WriteAllText(fileName, savedTexts.ToString());
	}

	//display a list of the texts on the screen
	//texts are shown as "date time sender (inbox)/recipient (outbox)"
	public void SetViewToTextMessageCollection()
	{
		cc = ps.cc; //update it in case Contacts has been changed
		int index = 1;
		int count = 0;
		
		if (textsLength == 0) 
		{
			cs.SetLineContent(index, "No messages", false);
			cs.SetNavRightText ("");
		}
		else
		{
			foreach (TextMessage text in texts)
			{
				if (count >= lowerIndexTextInView && count <= upperIndexTextInView)
				{
					//ps.hasUnreadTexts = ps.hasUnreadTexts || !text.m_read;
					string senderNumber = "";
					if (collectionType == CollectionType.Inbox)
					{
						senderNumber = text.GetSender();
					}
					else
					{
						senderNumber = text.GetRecipient();
					}
					string str = GetDateTimeFromTimestamp(text.GetTimestamp()) + " " + GetContactFromNumber(senderNumber, text.IsTraceable());
					bool selected = index == selectedTextIndex+1;
					text.SetIsSelected(selected);
					cs.SetLineContent(index, str, selected);
					index += 1;
				}
				count += 1;
				
			}
			if (collectionType != CollectionType.Drafts)
				cs.SetNavRightText ("Read");
			else
				cs.SetNavRightText ("Edit");
		}
		ps.HandleHasUnreadMessages ();
		
		cs.SetHeadingText("Message Inbox");
		cs.SetNavLeftText ("Back");
		if (collectionType == CollectionType.Inbox)
		{
			PhoneState.SetState (PhoneState.State.TextMessageInbox);
		}
		else if (collectionType == CollectionType.Outbox)
		{
			PhoneState.SetState (PhoneState.State.TextMessageOutbox);
		}
		else if (collectionType == CollectionType.Drafts)
		{
			PhoneState.SetState(PhoneState.State.TextMessageDrafts);
		}
	}

	private string GetContactFromNumber( string number, bool isTraceable)
	{
		string str = ""; //TODO: for draft texts, this will be what is returned. Is empty string or "empty" better?
		if (number != null) //is null for draft texts
		{
			if (isTraceable)
				str = cc.GetSenderFromNumber(number);
			else
				str = "unknown";
		}
		return str;
	}

	//TODO: make texts scroll-able
	//display the sender (inbox)/recipient (output), date time, and content of message
	void SetViewToTextMessage(TextMessage txt)
	{
		//update the json file that this text has been read
		if (!txt.HasBeenRead())
		{
			Debug.Log ("-\n-\n");
			JSONArray array = (JSONArray)savedTexts["texts"];
			for (int i = 0; i < array.Count; i++)
			{
				//setting to strings, because otherwise a "==" comparision always returns false, even when it should return true
				string sender = array[i]["sender"];
				string timestamp = array[i]["timestamp"];
				string message = array[i]["message"];
				if (sender == txt.GetSender() && timestamp == (""+txt.GetTimestamp()) && message == txt.GetMessage())
				{
					array[i]["isRead"] = "True";
					break;
				}
			}
			savedTexts["texts"] = array;
			SaveJson();
			txt.SetHasBeenRead(true);
		}

		//need to check for unread texts here, in case the user presses the "red" button, to go back to the main menu.
		//this would bypass going back to the lists of texts which previously checked for unread texts
		if (ps.hasUnreadTexts && collectionType == CollectionType.Inbox)
		{
			bool newHasUnreadTexts = false;
			for (int i = 0; i < textsLength; i++)
			{
				if (!texts[i].HasBeenRead())
				{
					newHasUnreadTexts = true;
					break;
				}
			}
			ps.hasUnreadTexts = newHasUnreadTexts;
		}
		ps.HandleHasUnreadMessages ();
		PhoneState.SetState(PhoneState.State.TextMessageDisplay);

		string str = "";
		if (collectionType == CollectionType.Inbox)
		{
			//PhoneState.SetState(PhoneState.State.TextMessageInboxDisplay);
			string senderNumber = txt.GetSender();
			str = "From: " + GetContactFromNumber(senderNumber, txt.IsTraceable()) + "\n";
		}
		else
		{
			//PhoneState.SetState(PhoneState.State.TextMessageOutboxDisplay);
			string recipNumber = txt.GetRecipient();
			str = "To: " + GetContactFromNumber(recipNumber, true) + "\n";
		}

		str += "Time: " + GetDateTimeFromTimestamp(txt.GetTimestamp()) +"\n";

		str += txt.GetMessage ();
		cs.SetScreenText(str);
		cs.SetHeadingText("Message");
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Options");
	}

	//return a human readable string from a timestamp
	private string GetDateTimeFromTimestamp(long tmstmp)
	{
		DateTime dt = new DateTime (tmstmp);
		int hour = dt.Hour;

		//make sure time is in format hh:mm:ss
		string strHour = ""+hour;
		if (hour < 10)
		{
			strHour = "0" + strHour;
		}
		int min = dt.Minute;
		string strMin = ""+min;
		if (min < 10)
		{
			strMin = "0" + strMin;
		}
		int sec = dt.Second;
		string strSec = ""+sec;
		if (sec < 10)
		{
			strSec = "0" + strSec;
		}

		string date = dt.Day + "/" + dt.Month + "/" + dt.Year + " " + strHour + ":" + strMin + ":" + strSec;
		return date;
	}

	//display the options menu for the text message
	public void SetViewToTextMessageOptions()
	{
		indexOfTextInOptions = readTextAtIndex;
		TextMessageOptions.SetViewToTextOptions (collectionType);
	}

	public void SetViewToEnterRecipient()
	{
		Debug.Log ("SetViewToEnterRecipient()");
	}

	public void SetViewToTextMessageCreate(bool setLeftToBack)
	{
		cs.SetHeadingText("Create");
		cs.SetNavRightText("Options");

		if (setLeftToBack) 
		{
			cs.SetNavLeftText("Back");
		}
	}

	//display the selected text
	public void ReadSelectedText()
	{
		SetViewToTextMessage(texts[readTextAtIndex]);
	}

	public string GetBodyOfSelectedDraftText()
	{
		if (collectionType == CollectionType.Drafts)
			return texts [readTextAtIndex].GetMessage ();
		else
			return "";
	}

	//delete the selected text
	public void DeleteSelectedText()
	{
		DeleteTextFromTexts(indexOfTextInOptions);
		SetViewToTextMessageCollection();
	}

	//scroll up through a list of texts. With wrap-around
	public void ScrollUp()
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

		SetViewToTextMessageCollection();
	}

	//scroll down through a list of texts. With wrap-around.
	public void ScrollDown()
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

		SetViewToTextMessageCollection();
	}

	private void SaveJson()
	{
		System.IO.File.WriteAllText(fileName, savedTexts.ToString());
	}

}
