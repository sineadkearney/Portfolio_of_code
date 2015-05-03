using UnityEngine;
using System.Collections;
using System;

public class TextMessageMenu {

	public enum TextMessageMenuState
	{
		Inbox,
		Outbox,
	};
	private static TextMessageMenuState textMessageMenuState = TextMessageMenuState.Inbox;
	private int enumLength = 0;
	private PhoneScript ps = (PhoneScript)GameObject.FindGameObjectWithTag("Phone").GetComponent<PhoneScript>();
	private CanvasScript cs = (CanvasScript)GameObject.FindGameObjectWithTag ("PhoneCanvas").GetComponent<CanvasScript> ();
	
	public static TextMessageMenuState GetState()
	{
		return textMessageMenuState;
	}

	public static void SetState(TextMessageMenuState newState)
	{
		textMessageMenuState = newState;
	}

	public void SetView()
	{
		PhoneState.SetState(PhoneState.State.TextMessageMenu);
		string name = Enum.GetName (typeof(TextMessageMenuState), (int)textMessageMenuState);
		cs.SetScreenText("\n\nGo to "+name+"?");
		cs.SetHeadingText("Message Menu");
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Go");
	}

	public void ScrollDown()
	{
		enumLength = Enum.GetValues( typeof( TextMessageMenuState ) ).Length;
		int index = (int)textMessageMenuState;
		index = (index + 1) % enumLength;
		textMessageMenuState = (TextMessageMenuState)index;

		string name = Enum.GetName (typeof(TextMessageMenuState), index);
		cs.SetScreenText("\n\nGo to "+name+"?");
	}

	public void ScrollUp()
	{
		enumLength = Enum.GetValues( typeof( TextMessageMenuState ) ).Length;
		int index = (int)textMessageMenuState;
		index = (index + enumLength - 1) % enumLength;
		textMessageMenuState = (TextMessageMenuState)index;

		string name = Enum.GetName (typeof(TextMessageMenuState), index);
		cs.SetScreenText("\n\nGo to "+name+"?");
	}
}
