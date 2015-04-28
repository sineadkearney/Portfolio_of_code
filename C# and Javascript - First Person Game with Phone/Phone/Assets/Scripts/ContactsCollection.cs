using UnityEngine;
using System.Collections;
using System.Collections.Generic;
using System;

public class ContactsCollection : ScriptableObject {

	private int contactsLength = 0;	
	public IList<Contact> contacts = new List<Contact>();
	
	// Use this for initialization
	void Start () {
		
	}
	
	// Update is called once per frame
	void Update () {
		
	}
	
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

	public void Print()
	{
		string str = "";
		for (int i = 0; i < contactsLength; i++)
		{
			str += contacts[i].GetName() + "\n";
		}
		Debug.Log (str);
	}
	
}
