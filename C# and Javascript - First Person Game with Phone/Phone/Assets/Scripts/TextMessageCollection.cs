using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using System;

public class TextMessageCollection : ScriptableObject {

	public IList<TextMessage> texts = new List<TextMessage>();
	private int textsLength = 0;
	private int readTextAtIndex = 0;
	private int selectedTextIndex = 0;
	private int maxTextsDisplayAmount = 5;
	private int lowerIndexTextInView = 0;
	private int upperIndexTextInView = 4;
	private int indexOfTextInOptions = -1;

	private PhoneScript ps = (PhoneScript)GameObject.FindGameObjectWithTag("Phone").GetComponent<PhoneScript>();
	private CanvasScript cs = (CanvasScript)GameObject.FindGameObjectWithTag ("PhoneCanvas").GetComponent<CanvasScript> ();
	// Use this for initialization
	void Start () {
	
	}
	
	// Update is called once per frame
	void Update () {
	
	}

	//inbox, only
	public void HandleNewIncomingText(TextMessage text)
	{
		AddTextToTexts(text);
		ps.hasUnreadTexts = true;
		ps.HandleHasUnreadMessages();
		SetUpperIndexTextInViewToTop ();
		
		if (PhoneState.GetState () == PhoneState.State.TextMessageInbox) 
		{
			SetViewToTextMessageCollection();//refresh
		}
	}

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
	
	void SetUpperIndexTextInViewToBottom()
	{
		upperIndexTextInView = textsLength - 1;
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

	public void SetViewToTextMessageCollection()
	{
		int index = 1;
		int count = 0;
		ps.hasUnreadTexts = false;
		
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
					ps.hasUnreadTexts = ps.hasUnreadTexts || !text.m_read;
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
			cs.SetNavRightText ("Read");
		}
		ps.HandleHasUnreadMessages ();
		
		cs.SetHeadingText("Message Inbox");
		cs.SetNavLeftText ("Back");
		
	}

	void SetViewToTextMessage(TextMessage txt)
	{
		txt.m_read = true;
		PhoneState.SetState(PhoneState.State.TextMessageDisplay);
		string str = "From: " + txt.GetSender () + "\n";
		
		DateTime dt = new DateTime (txt.GetTimestamp());
		string date = dt.Day + "/" + dt.Month + "/" + dt.Year + " " + dt.Hour + ":" + dt.Minute + ":" + dt.Second;
		str += "Time: " + date + "\n";
		str += txt.GetMessage ();
		cs.SetScreenText(str);
		cs.SetHeadingText("Message");
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Options");
	}

	public void SetViewToTextMessageOptions()
	{
		cs.ResetAllLines ();
		cs.SetLineContent (1, "Delete?", true);
		PhoneState.SetState(PhoneState.State.TextMessageOptions);
		indexOfTextInOptions = readTextAtIndex;
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Select");
	}

	public void ReadSelectedText()
	{
		SetViewToTextMessage(texts[readTextAtIndex]);
	}
	
	public void DeleteSelectedText()
	{
		DeleteTextFromTexts(indexOfTextInOptions);
		SetViewToTextMessageCollection();
	}

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

}
