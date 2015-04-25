using UnityEngine;
using System.Collections;

public class PhoneState: ScriptableObject {

	public enum State
	{
		HomeScreen,
		NumberOnScreen,
		MainMenu,
		TextMessageMenu,
		TextMessageInbox,
		TextMessageDisplay,
		TextMessageOptions,
	};

	private static PhoneState.State state;
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
		state = newState;
	}
}


