using UnityEngine;
using System.Collections;

public class ButtonPressManager: MonoBehaviour {

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
	private TextStringCreation tsc;

	void Start () {

		GameObject canvas = GameObject.FindGameObjectWithTag ("PhoneCanvas");
		cs = (CanvasScript) canvas.GetComponent<CanvasScript>();
		cs.ResetAllLines ();

		GameObject phone = GameObject.FindGameObjectWithTag ("Phone");
		ps = (PhoneScript)phone.GetComponent<PhoneScript> ();

		tsc = ps.tsc;
	}

	private void HomeScreenState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
		if (btn >= Button.Zero && btn <= Button.Nine)
		{
			ps.AddToNumberOnScreen((int)btn);
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
	}

	private void NumberOnScreenState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
		if (btn >= Button.Zero && btn <= Button.Nine)
		{
			ps.AddToNumberOnScreen((int)btn);
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
	}

	private void MainMenuState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
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
	}

	private void TextMessageMenuState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
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
	}

	private void TextMessageCreateState(Button btn)
	{
		switch (btn)
		{
		case Button.Enter:
			//Debug.Log("Send");
			ps.SetViewToTextMessageOptions();
			break;
		case Button.Cancel:
			int creationStringLength = tsc.GetCreationStringLength();
			if (creationStringLength == 0)
			{
				tsc.SetTextArea("");
				ps.SetViewToSubMainMenu();
			}
			else
			{
				tsc.DeleteCharAtCursorPos();
			}
			
			break;
		case Button.Zero:
			//Debug.Log (Time.time);
			tsc.HandleAlphaInput(0);
			break;
		case Button.One:
			tsc.HandleAlphaInput(1);
			break;
		case Button.Two:
			tsc.HandleAlphaInput(2);
			break;
		case Button.Three:
			tsc.HandleAlphaInput(3);
			break;
		case Button.Four:
			tsc.HandleAlphaInput(4);
			break;
		case Button.Five:
			tsc.HandleAlphaInput(5);
			break;
		case Button.Six:
			tsc.HandleAlphaInput(6);
			break;
		case Button.Seven:
			tsc.HandleAlphaInput(7);
			break;
		case Button.Eight:
			tsc.HandleAlphaInput(8);
			break;
		case Button.Nine:
			tsc.HandleAlphaInput(9);
			break;
		case Button.HangUp:
			ps.ResetAndSetViewToHomeScreen();
			break;
		case Button.Left:
		case Button.Up:
			//ps
			tsc.MoveCursorPosRight(false);
			break;
		case Button.Right:
		case Button.Down:
			//ps	
			tsc.MoveCursorPosRight(true);
			break;
		case Button.Hash:
			tsc.InverseInAlphaInputMode();
			tsc.SetAlphaNumberIcon();
			break;
		default:
			Debug.Log ("Incorrect state.");
			break;
		}
	}

	private void NumberTextRecipientState(Button btn)
	{
		switch (btn)
		{
		case Button.Enter:
			ps.GetNumberEnteredAndSendText();
			break;
		case Button.Cancel:
			int creationStringLength = tsc.GetCreationStringLength();
			if (creationStringLength == 0)
			{
				tsc.SetTextArea("");
				ps.SetViewToSubMainMenu();
			}
			else
			{
				tsc.DeleteCharAtCursorPos();
			}
			
			break;
		case Button.Zero:
			//Debug.Log (Time.time);
			tsc.HandleAlphaInput(0);
			break;
		case Button.One:
			tsc.HandleAlphaInput(1);
			break;
		case Button.Two:
			tsc.HandleAlphaInput(2);
			break;
		case Button.Three:
			tsc.HandleAlphaInput(3);
			break;
		case Button.Four:
			tsc.HandleAlphaInput(4);
			break;
		case Button.Five:
			tsc.HandleAlphaInput(5);
			break;
		case Button.Six:
			tsc.HandleAlphaInput(6);
			break;
		case Button.Seven:
			tsc.HandleAlphaInput(7);
			break;
		case Button.Eight:
			tsc.HandleAlphaInput(8);
			break;
		case Button.Nine:
			tsc.HandleAlphaInput(9);
			break;
		case Button.HangUp:
			ps.ResetAndSetViewToHomeScreen();
			break;
		case Button.Hash:
			//inAlphaInputMode = !inAlphaInputMode;
			break;
		default:
			Debug.Log ("Incorrect state.");
			break;
		}
	}

	private void TextMessageInboxState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
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
	}

	private void TextMessageOutboxState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
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
			ps.OutboxScrollUp();
		}
		else if (btn == Button.Down)
		{
			ps.OutboxScrollDown();
		}
		else if (btn == Button.HangUp)
		{
			ps.ResetAndSetViewToHomeScreen();
		}
	}

	private void TextMessageDraftsState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
		if (btn == Button.Enter)
		{
			ps.ContinueEditingSelectedDraftText();
		}
		else if ( btn == Button.Cancel)
		{
			ps.SetViewToSubMainMenu();
		}
		else if (btn == Button.Up)
		{
			ps.DraftsScrollUp();
		}
		else if (btn == Button.Down)
		{
			ps.DraftsScrollDown();
		}
		else if (btn == Button.HangUp)
		{
			ps.ResetAndSetViewToHomeScreen();
		}
	}

	private void TextMessageDisplayState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
		if (btn == Button.Cancel)
		{
			ps.SetViewToTextMessageCollection();
		}
		else if (btn == Button.Enter)
		{
			//ps.SetViewToInboxTextMessageOptions();
			ps.SetViewToTextMessageOptions();
		}
		else if (btn == Button.HangUp)
		{
			ps.ResetAndSetViewToHomeScreen();
		}
	}

	private void TextMessageOptionsState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
		if ( btn == Button.Enter)
		{
			TextMessageOptions.SelectEnter();
		}
		else if (btn == Button.Cancel)
		{
			TextMessageOptions.SetViewBackToText();
		}
		else if (btn == Button.HangUp)
		{
			ps.ResetAndSetViewToHomeScreen(); 
		}
		else if (btn == Button.Up)
		{
			TextMessageOptions.ScrollUp();
		}
		else if (btn == Button.Down)
		{
			TextMessageOptions.ScrollDown();
		}
	}

	private void ContactsListState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
		if (btn == Button.Enter)
		{
			Debug.Log ("enter");
			
			if (ps.GetHasHighlightedCreateANewContact())
			{
				
			}
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
	}

	private void CreateNewContactState(Button btn)
	{
		switch (btn)
		{
		case Button.Cancel:
			int creationStringLength = tsc.GetCreationStringLength();
			if (creationStringLength == 0)
			{
				tsc.SetTextArea("");
				ps.SetViewToSubMainMenu();
			}
			else
			{
				tsc.DeleteCharAtCursorPos();
			}
			
			break;
		case Button.Zero:
			//Debug.Log (Time.time);
			tsc.HandleAlphaInput(0);
			break;
		case Button.One:
			tsc.HandleAlphaInput(1);
			break;
		case Button.Two:
			tsc.HandleAlphaInput(2);
			break;
		case Button.Three:
			tsc.HandleAlphaInput(3);
			break;
		case Button.Four:
			tsc.HandleAlphaInput(4);
			break;
		case Button.Five:
			tsc.HandleAlphaInput(5);
			break;
		case Button.Six:
			tsc.HandleAlphaInput(6);
			break;
		case Button.Seven:
			tsc.HandleAlphaInput(7);
			break;
		case Button.Eight:
			tsc.HandleAlphaInput(8);
			break;
		case Button.Nine:
			tsc.HandleAlphaInput(9);
			break;
		case Button.HangUp:
			ps.ResetAndSetViewToHomeScreen();
			break;
		case Button.Up:
			ps.AddNewContactMoveUpDown();
			break;
		case Button.Down:
			ps.AddNewContactMoveUpDown();
			break;
		default:
			Debug.Log ("Incorrect state.");
			break;
		}
	}

	private void ContactsListTextRecipientState(Button btn)
	{
		cs.ResetAllLines ();
		cs.SetScreenText ("");
		
		if (btn == Button.Enter)
		{
			ps.SelectContactAsTextRecipient();
		}
		else if ( btn == Button.Cancel)
		{
			//ps.SetViewToMainMenu();
			Debug.Log ("cancel");
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
	}

	public void ButtonInput(int num)
	{
		//TODO: reset and set screen text for valid inputs only. Ignore invalid inputs

		//use switch by state. Then handle button input in each case
		Button btn = (Button)num;
		//cs.ResetAllLines ();
		//cs.SetScreenText ("");

		PhoneState.State state = PhoneState.GetState ();
		Debug.Log ("state: " + state + " btn: " + btn);
		switch (state)
		{
		
		case PhoneState.State.HomeScreen:
			HomeScreenState (btn);
			break;
			
		case PhoneState.State.NumberOnScreen:
			NumberOnScreenState(btn);
			break;
			
		case PhoneState.State.MainMenu: 
			MainMenuState(btn);
			break;
			
		case PhoneState.State.TextMessageMenu:
			TextMessageMenuState(btn);
			break;

		case PhoneState.State.TextMessageCreate:
			TextMessageCreateState(btn);
			break;

		case PhoneState.State.NumberTextRecipient:
			NumberTextRecipientState(btn);
			break;

		case PhoneState.State.TextMessageInbox:
			TextMessageInboxState(btn);
			break;

		case PhoneState.State.TextMessageOutbox:
			TextMessageOutboxState(btn);
			break;

		case PhoneState.State.TextMessageDrafts:
			TextMessageDraftsState(btn);
			break;

		case PhoneState.State.TextMessageDisplay:	
			TextMessageDisplayState(btn);
			break;
			
		case PhoneState.State.TextMessageOptions:
			TextMessageOptionsState(btn);
			break;

		case PhoneState.State.ContactsList:
			ContactsListState(btn);
			break;

		case PhoneState.State.CreateNewContact:
			CreateNewContactState(btn);
			break;

		case PhoneState.State.ContactsListTextRecipient:
			ContactsListTextRecipientState(btn);
			break;

		case PhoneState.State.ErrorMessage:

			cs.ResetAllLines ();
			cs.SetScreenText ("");

			if (btn == Button.Cancel)
			{
				PhoneState.SetState(PhoneState.GetPrevState());
				ps.SetViewBasedOnState();
			}
			break;
		default:

			cs.ResetAllLines ();
			cs.SetScreenText ("");

			Debug.Log ("Incorrect state.");
			break;
		}
		tsc.SetTimeAtLastInput(Time.time);
	}
}
