using UnityEngine;
using System.Collections;

public class ButtonPressManager : MonoBehaviour {

	enum Button
	{
		Zero = 0,
		One,
		Two,
		Three,
		Four,
		Five,
		Six,
		Seven,
		Eight,
		Nine,
		Cancel,
		Enter,
		Up,
		Down,
		Left,
		Right,
		Answer,
		HangUp,
		Star,
		Hash,
	}

	private CanvasScript cs;
	private PhoneScript ps;

	//private PhoneState state;
	// Use this for initialization
	void Start () {
		GameObject canvas = GameObject.FindGameObjectWithTag ("PhoneCanvas");
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		cs.ResetAllLines ();

		GameObject phone = GameObject.FindGameObjectWithTag ("Phone");
		ps = (PhoneScript)phone.GetComponent<PhoneScript> ();
	}
	
	public void ButtonInput(int num)
	{
		//use switch by state. Then handle button input in each case
		Button btn = (Button)num;
		cs.ResetAllLines ();
		cs.SetScreenText ("");

		PhoneState.State state = PhoneState.GetState ();
		Debug.Log ("state: " + state + " btn: " + btn);
		switch (state)
		{
		
		case PhoneState.State.HomeScreen:
			
			if (btn >= Button.Zero && btn <= Button.Nine)
			{
				ps.AddToNumberOnScreen(num);
				ps.UpdateNumberOnScreen();
			}
			else if (btn == Button.Enter)
			{
				ps.SetViewToMainMenu();
			}
			else
			{
				ps.SetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.NumberOnScreen:
			
			if (btn >= Button.Zero && btn <= Button.Nine)
			{
				ps.AddToNumberOnScreen(num);
				ps.UpdateNumberOnScreen();
			}
			else if (btn == Button.Cancel)
			{
				ps.RemoveEndOfNumberOnScreen();
				ps.UpdateNumberOnScreen();

			}
			else if (btn == Button.Answer)
			{
				ps.HandleOutGoingCall();
			}
			else if (btn == Button.Enter)
			{
				ps.SaveNumberOnScreenToContacts();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.MainMenu:
			if (btn == Button.Enter)
			{
				ps.SetViewToSubMainMenu();
			}
			else if (btn == Button.Cancel)
			{
				ps.SetViewToHomeScreen();
			}
			else if (btn == Button.Up)
			{
				ps.MainMenuScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.MainMenuScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.TextMessageMenu:
			if (btn == Button.Enter)
			{
				ps.SetViewToTextMessageCollection();
			}
			else if (btn == Button.Cancel)
			{
				ps.SetViewToMainMenu();
			}
			else if (btn == Button.Up)
			{
				ps.TextMessMenuScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.TextMessMenuScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.TextMessageInbox:
			if (btn == Button.Enter)
			{
				ps.ReadSelectedInboxText();
			}
			else if ( btn == Button.Cancel)
			{
				ps.SetViewToSubMainMenu();
			}
			else if (btn == Button.Up)
			{
				ps.InboxScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.InboxScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
		case PhoneState.State.TextMessageOutbox:
			if (btn == Button.Enter)
			{
				ps.ReadSelectedOutboxText();
			}
			else if ( btn == Button.Cancel)
			{
				ps.SetViewToSubMainMenu();
			}
			else if (btn == Button.Up)
			{
				ps.InboxScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.InboxScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.TextMessageDisplay:
			
			if (btn == Button.Cancel)
			{
				ps.SetViewToTextMessageCollection();
			}
			else if (btn == Button.Enter)
			{
				ps.SetViewToInboxTextMessageOptions();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.TextMessageOptions:
			
			if ( btn == Button.Enter)
			{
				ps.DeleteSelectedInboxText();
			}
			else if (btn == Button.Cancel)
			{
				ps.ReadSelectedInboxText();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;

		case PhoneState.State.ContactsList:
			if (btn == Button.Enter)
			{
				//ps.ReadSelectedOutboxText();
				Debug.Log ("enter");
			}
			else if ( btn == Button.Cancel)
			{
				ps.SetViewToMainMenu();
			}
			else if (btn == Button.Up)
			{
				ps.ContactsScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.ContactsScrollDown();
			}
			else if (btn == Button.HangUp)
			{
				ps.ResetAndSetViewToHomeScreen();
			}
			break;
		case PhoneState.State.ErrorMessage:
			if (btn == Button.Cancel)
			{
				PhoneState.SetState(PhoneState.GetPrevState());
				ps.SetViewBasedOnState();
			}
			break;
		default:
			Debug.Log ("Incorrect state.");
			break;
		}
	}
}
