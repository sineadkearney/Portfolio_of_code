using UnityEngine;
using System.Collections;

public class Contact : ScriptableObject {

	private string m_name;
	private string m_number;
	private bool m_selected = false;

	public Contact(string newName, string newNumber)
	{
		m_name = newName;
		m_number = newNumber;
	}

	public string GetName()
	{
		return m_name;
	}

	public void SetName(string newName)
	{
		m_name = newName;
	}

	public string GetNumber()
	{
		return m_number;
	}

	public void SetNumber(string newNumber)
	{
		m_number = newNumber;
	}

	public bool IsSelected()
	{
		return m_selected;
	}

	public void SetSelected(bool selected)
	{
		m_selected = selected;
	}
}
