using UnityEngine;
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
		TextMessageCreate,
		TextMessageDrafts,
		TextMessageOptions,
		ContactsList, 				//contacts list, just as normal
		ContactsListTextRecipient, //contact list, when we're sending a text
		ContactsOptions,			//the options for the contact when viewing from the list
		ContactsNewOptions,			// the options for the contact when we are creating a contact
		CreateNewContact,
		NumberTextRecipient, //manually entering a number, when we're sending a text
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


