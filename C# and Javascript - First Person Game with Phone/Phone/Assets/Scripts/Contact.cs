using UnityEngine;
using System.Collections;

public class Contact : ScriptableObject {

	private string name;
	private string number;

	public Contact(string newName, string newNumber)
	{
		name = newName;
		number = newNumber;
	}

	public string GetName()
	{
		return name;
	}

	public void SetName(string newName)
	{
		name = newName;
	}

	public string GetNumber()
	{
		return number;
	}

	public void SetNumber(string newNumber)
	{
		number = newNumber;
	}

}
