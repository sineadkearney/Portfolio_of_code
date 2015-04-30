using UnityEngine;
using System.Collections;
using System;

public class MainMenu : ScriptableObject {

	public enum MainMenuState
	{
		Messages,
		Contacts,
	};
	private static MainMenuState mainMenuState = MainMenuState.Messages;
	private int enumLength = 0;
	private PhoneScript ps = (PhoneScript)GameObject.FindGameObjectWithTag("Phone").GetComponent<PhoneScript>();
	private CanvasScript cs = (CanvasScript)GameObject.FindGameObjectWithTag ("PhoneCanvas").GetComponent<CanvasScript> ();
	
	public MainMenuState GetState()
	{
		return mainMenuState;
	}
	
	public static void SetState(MainMenuState newState)
	{
		mainMenuState = newState;
	}

	public void SetView()
	{
		PhoneState.SetState(PhoneState.State.MainMenu);
		string name = Enum.GetName (typeof(MainMenuState), (int)mainMenuState);
		cs.SetScreenText("\n\nGo to "+name+"?");
		cs.SetHeadingText("Main Menu");
		cs.SetNavLeftText ("Back");
		cs.SetNavRightText ("Go");
	}
	
	public void ScrollDown()
	{
		enumLength = Enum.GetValues( typeof( MainMenuState ) ).Length;
		int index = (int)mainMenuState;
		index = (index + 1) % enumLength;
		mainMenuState = (MainMenuState)index;
		
		string name = Enum.GetName (typeof(MainMenuState), index);
		cs.SetScreenText("\n\nGo to "+name+"?");
	}
	
	public void ScrollUp()
	{
		enumLength = Enum.GetValues( typeof( MainMenuState ) ).Length;
		int index = (int)mainMenuState;
		index = (index + enumLength - 1) % enumLength;
		mainMenuState = (MainMenuState)index;
		
		string name = Enum.GetName (typeof(MainMenuState), index);
		cs.SetScreenText("\n\nGo to "+name+"?");
	}
}
