using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using System;

public class ContactsCollection : ScriptableObject {

	private PhoneScript ps = (PhoneScript)GameObject.FindGameObjectWithTag("Phone").GetComponent<PhoneScript>();
	private CanvasScript cs = (CanvasScript)GameObject.FindGameObjectWithTag ("PhoneCanvas").GetComponent<CanvasScript> ();
	
	private static int contactsLength = 0;	
	private static IList<Contact> contacts = new List<Contact>();

	private int readContactAtIndex = 0;
	private int selectedContactIndex = 0;
	private int maxContactsDisplayAmount = 5;
	private int lowerIndexContactInView = 0;
	private int upperIndexContactInView = 4;
	private int indexOfContactInOptions = -1;

	
	public void AddContactToContacts(Contact contact)
	{
		if (contactsLength == 0)
		{
			contacts.Insert (0, contact);
		}
		else
		{
			bool added = false;
			for (int i = 0; i < contactsLength; i ++)
			{
				if (string.Compare(contact.GetName(), contacts[i].GetName()) <= 0 && !added)
				{
					contacts.Insert (i, contact);
					added = true;
				}
			}
			if (!added)
				contacts.Add(contact); //add to end
		}
		contactsLength += 1;
	}

	public void RemoveContactFromContacts(Contact contact)
	{
		contacts.Remove (contact);
		contactsLength -= 1;
	}

	public void Print()
	{
		string str = "";
		for (int i = 0; i < contactsLength; i++)
		{
			str += contacts[i].GetName() + "\n";
		}
		Debug.Log (str);
	}

	public static int GetLength()
	{
		return contactsLength;
	}

	public static IList<Contact> GetContacts()
	{
		return contacts;
	}

	public void SetViewToContactCollection()
	{
		PhoneState.SetState (PhoneState.State.ContactsList);
		int index = 1;
		int count = 0;
		ps.hasUnreadTexts = false;
		
		if (contactsLength == 0) 
		{
			cs.SetLineContent(index, "No Contacts", false);
			cs.SetNavRightText ("");
		}
		else
		{
			foreach (Contact contact in contacts)
			{
				if (count >= lowerIndexContactInView && count <= upperIndexContactInView)
				{
					contact.SetSelected (index == selectedContactIndex+1);
					string str = contact.GetName () + ": "+ contact.GetNumber();
					cs.SetLineContent(index, str, contact.IsSelected());
					index += 1;
				}
				count += 1;
				
			}
			cs.SetNavRightText ("Read");
		}
		//ps.HandleHasUnreadMessages ();
		
		cs.SetHeadingText("Contacts");
		cs.SetNavLeftText ("Back");
		
	}

	public void SetUpperIndexContactInViewToTop()
	{
		if (contactsLength > maxContactsDisplayAmount) 
		{
			upperIndexContactInView = maxContactsDisplayAmount - 1;
		}
		else
		{
			upperIndexContactInView = contactsLength -1;
		}
	}

	public void ScrollUp()
	{
		if (readContactAtIndex == 0) //go back to the bottom
		{
			upperIndexContactInView = contactsLength-1; //5
			lowerIndexContactInView = contactsLength-maxContactsDisplayAmount;//1
			if (lowerIndexContactInView < 0)
			{
				lowerIndexContactInView = 0;
			}
			
			if (contactsLength < maxContactsDisplayAmount)
			{
				selectedContactIndex = contactsLength-1;
			}
			else
			{
				selectedContactIndex = maxContactsDisplayAmount-1;//4
			}
			readContactAtIndex = contactsLength-1; //5
		}
		else if (selectedContactIndex == lowerIndexContactInView-1)
		{
			if (upperIndexContactInView >= contactsLength-1)
			{
				upperIndexContactInView -=1;
			}
			if (lowerIndexContactInView > 0)
			{
				lowerIndexContactInView -=1;
			}
			readContactAtIndex = readContactAtIndex-1;//(readTextAtIndex + textsLength - 1) % textsLength;
		}
		else //just move selected and read up
		{
			readContactAtIndex = readContactAtIndex-1;//(readTextAtIndex + textsLength - 1) % textsLength;
			selectedContactIndex = selectedContactIndex-1;//(selectedTextIndex + textsLength - 1) % textsLength;
			
		}
		
		SetViewToContactCollection();
	}
	
	public void ScrollDown()
	{
		if (readContactAtIndex == contactsLength-1) //move back to top
		{
			SetUpperIndexContactInViewToTop();	
			lowerIndexContactInView = 0;
			selectedContactIndex = 0;
			readContactAtIndex = 0;
		}
		else if (readContactAtIndex == upperIndexContactInView) //move all down one
			//else if (selectedContactIndex == upperIndexContactInView) //move all down one
		{
			upperIndexContactInView +=1;
			lowerIndexContactInView +=1;
			readContactAtIndex += 1;
		}
		else //just move read and selected
		{
			readContactAtIndex += 1;
			selectedContactIndex += 1;
		}
		
		SetViewToContactCollection();
	}

	public string GetSenderFromNumber(string number)
	{
		string sender = "unknown";
		foreach (Contact contact in contacts)
		{
			if (contact.GetNumber() == number)
			{
				sender = contact.GetName();
				break;
			}
		}

		return sender;
	}
}
