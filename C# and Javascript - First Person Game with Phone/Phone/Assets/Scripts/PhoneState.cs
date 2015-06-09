﻿using UnityEngine;
using System.Collections;

public class PhoneState {

	public enum State
	{
		HomeScreen,
		NumberOnScreen,
		MainMenu,
		TextMessageMenu,
		TextMessageInbox,
		TextMessageOutbox,
		TextMessageDisplay, //static disply, no editing text
		//TextMessageInboxDisplay, //displaying a text from the inbox
		//TextMessageOutboxDisplay, // displaying a text from the outbox
		TextMessageCreate,
		TextMessageOptions,
		ContactsList,
		ErrorMessage,
	};

	private static PhoneState.State state;
	private static PhoneState.State prevState;

	// Use this for initialization
	void Start () {
		state = State.HomeScreen;
	}
	
	public static State GetState()
	{
		return state;
	}
	
	public static void SetState(State newState)
	{
		prevState = state;
		state = newState;
	}

	public static State GetPrevState()
	{
		return prevState;
	}

}


