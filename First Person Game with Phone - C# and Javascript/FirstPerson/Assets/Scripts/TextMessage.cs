using UnityEngine;
using System.Collections;
using System;

public class TextMessage {

	private long m_timestamp = 0;
	private string m_sender = "";
	private string m_message = "";

	public TextMessage(string sender, string message)
	{
		m_timestamp = System.DateTime.Now.Ticks;
		m_sender = sender;
		m_message = message;
	}

	public TextMessage(string str)
	{
		Debug.Log ("TEST");
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
