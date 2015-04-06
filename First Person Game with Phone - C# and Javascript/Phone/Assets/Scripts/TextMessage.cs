using UnityEngine;
using System.Collections;
using System;

public class TextMessage {

	private long m_timestamp = 0;
	private string m_sender = "";
	private string m_message = "";
	public bool m_read = false;
	public bool m_selected = false;

	public TextMessage(string sender, string message)
	{
		m_timestamp = System.DateTime.Now.Ticks;
		m_sender = sender;
		m_message = message;
	}

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

	public string GetMessage()
	{
		return m_message;
	}

	public void UpdateMessage(string message)
	{
		m_message = message;
	}

	public string ToString()
	{
		string str = "{\"timestamp\": " + m_timestamp + ", \"sender\": \"" + m_sender + "\", \"message\": \"" + m_message + "\"}";
		return str;
	}
}
