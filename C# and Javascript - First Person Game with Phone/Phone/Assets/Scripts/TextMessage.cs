using UnityEngine;
using System.Collections;
using System;

public class TextMessage {

	private long m_timestamp = 0;
	private string m_sender = "";
	private string m_recipient = "";
	private string m_message = "";
	private bool m_read = false;
	private bool m_selected = false;
	private bool m_isTraceable = true;

	public TextMessage(string sender, string recipient, string message, string timestamp, bool isRead, bool isTraceable)
	{
		if (timestamp == "")
			m_timestamp = System.DateTime.Now.Ticks;
		else
			m_timestamp = Convert.ToInt64(timestamp);
		m_sender = sender;
		m_recipient = recipient;
		m_message = message;
		m_read = isRead;
		m_isTraceable = isTraceable;
	}

	public TextMessage(string sender, string message)
	{
		m_timestamp = System.DateTime.Now.Ticks;
		m_sender = sender;
		m_message = message;
	}

	//this is when we receive a text, from the first-person game
	public TextMessage(string str)
	{
		Debug.Log ("str: " + str);
        str = str.Substring(str.IndexOf (": ") + 2);
		m_timestamp = long.Parse(str.Substring(0, str.IndexOf (", ")));
        str = str.Substring(str.IndexOf (": ") + 3);
        m_sender = str.Substring(0, str.IndexOf (", ")-1);
        str = str.Substring(str.IndexOf (": ") + 3);
        m_message = str.Substring(0, str.IndexOf ("\"}"));
		m_read = false;
		m_selected = false;
	}

	public long GetTimestamp()
	{
		return m_timestamp;

	}
	public string GetSender()
	{
		return m_sender;
	}

	public string GetRecipient()
	{
		return m_recipient;
	}

	public string GetMessage()
	{
		return m_message;
	}

	public bool HasBeenRead()
	{
		return m_read;
	}

	public bool IsSelected()
	{
		return m_selected;
	}

	public bool IsTraceable()
	{
		return m_isTraceable;
	}

	public void UpdateMessage(string message)
	{
		m_message = message;
	}

	public void SetIsSelected(bool value)
	{
		m_selected = value;
	}

	public void SetHasBeenRead(bool value)
	{
		m_read = value;
	}

	public void SetRecipient(string recipient)
	{
		m_recipient = recipient;
	}

	public string ToString()
	{
		string str = "{\"timestamp\": " + m_timestamp + ", \"sender\": \"" + m_sender + "\", \"message\": \"" + m_message + "\"}";
		return str;
	}

}
