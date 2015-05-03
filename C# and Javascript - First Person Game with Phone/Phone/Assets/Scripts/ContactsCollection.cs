using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using System;
using System.Text;
using System.IO;
using SimpleJSON;

public class ContactsCollection : MonoBehaviour {

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

	//contacts data file
	// System.IO.File.WriteAllText("C:\blahblah_yourfilepath\yourtextfile.txt", "This is text that goes into the text file");
	private string fileName = "C:\\Users\\Sinead\\Documents\\Phone\\Assets\\savedData\\contacts.json";
	private string fileData = "";
	private JSONNode savedContacts;
 
	public ContactsCollection()
	{
		Load ();
	}

	public bool Load() //TODO: public for now
	{

		// Handle any problems that might arise when reading the text
		try
		{
			string line;
			// Create a new StreamReader, tell it which file to read and what encoding the file
			// was saved as
			StreamReader theReader = new StreamReader(fileName, Encoding.Default);
			
			// Immediately clean up the reader after this block of code is done.
			// You generally use the "using" statement for potentially memory-intensive objects
			// instead of relying on garbage collection.
			// (Do not confuse this with the using directive for namespace at the 
			// beginning of a class!)
			using (theReader)
			{
				// While there's lines left in the text file, do this:
				do
				{
					line = theReader.ReadLine();
					
					if (line != null)
					{
						// Do whatever you need to do with the text line, it's a string now
						// In this example, I split it into arguments based on comma
						// deliniators, then send that array to DoStuff()
//						string[] entries = line.Split(',');
//						if (entries.Length > 0)
//							DoStuff(entries);
						fileData += line;
					}
				}
				while (line != null);
				
				// Done reading, close the reader and return true to broadcast success    
				theReader.Close();
				Debug.Log ("fileData " + fileData);
				return true;
			}

		}
		
		// If anything broke in the try block, we throw an exception with information
		// on what didn't work
		catch (Exception e)
		{
			Debug.Log(e.Message);
			return false;
		}
	}

	public void LoadSavedContacts()
	{
		savedContacts = JSONNode.Parse (fileData);
		JSONArray array = (JSONArray)savedContacts ["contacts"];
		for (int i = 0; i < array.Count; i++)
		{
			Debug.Log("name: " + array[i]["name"]);
			Debug.Log("number: " + array[i]["number"]);
			Contact c = new Contact(array[i]["name"], array[i]["number"]);
			AddContactToContacts(c, false);
		}
		//contactsLength = array.Count; // length set in AddContactToContacts
	}



	public bool AddContactToContacts(Contact contact, bool rewriteFile)
	{
		bool added = false;
		bool alreadyExists = false;
		int insertedIndex = 0;

		if (contactsLength == 0)
		{
			contacts.Insert (0, contact);
			added = true;
			//savedContacts[0]["name"] = contact.GetName();
			//savedContacts[0]["number"] = contact.GetNumber();
		}
		else
		{

			for (int i = 0; i < contactsLength; i ++)
			{
				if (string.Compare(contact.GetName(), contacts[i].GetName()) == 0) //this name already exists
				{
					Debug.Log ("contact info for " + contact.GetName() + " already exists");
					alreadyExists = true;
				}
				else if (string.Compare(contact.GetName(), contacts[i].GetName()) <= 0 && !added)
				{
					insertedIndex = i;
					contacts.Insert (i, contact);
					added = true;
				}
			}
			if (!added && !alreadyExists)
			{
				insertedIndex = contactsLength;
				contacts.Add(contact); //add to end
				added = true;
			}
		}
		if (added)
		{
			contactsLength += 1;
		}

		if (rewriteFile) 
		{
			JSONArray array = (JSONArray)savedContacts ["contacts"];
			for (int i = contactsLength-1; i > insertedIndex; i --) //move all contacts up an index in the array
			{
				array[i]["name"] = array[i-1]["name"];
				array[i]["number"] = array[i-1]["number"];
			}
			array[insertedIndex]["name"] = contact.GetName(); //add the new contact
			array[insertedIndex]["number"] = contact.GetNumber();
			savedContacts ["contacts"] = array;
			System.IO.File.WriteAllText(fileName, savedContacts.ToString());
		}

		return added;
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
