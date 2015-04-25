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
			break;
			
		case PhoneState.State.MainMenu:
			if (btn == Button.Enter)
			{
				ps.SetViewToTextMessageMenu();
			}
			else if (btn == Button.Cancel)
			{
				ps.SetViewToHomeScreen();
			}
			break;
			
		case PhoneState.State.TextMessageMenu:
			if (btn == Button.Enter)
			{
				ps.SetViewToTextMessageInbox();
			}
			else if (btn == Button.Cancel)
			{
				ps.SetViewToMainMenu();
			}
			break;
			
		case PhoneState.State.TextMessageInbox:
			if (btn == Button.Enter)
			{
				ps.ReadSelectedInboxText();
			}
			else if ( btn == Button.Cancel)
			{
				ps.SetViewToTextMessageMenu();
			}
			else if (btn == Button.Up)
			{
				ps.InboxScrollUp();
			}
			else if (btn == Button.Down)
			{
				ps.InboxScrollDown();
			}
			break;
			
		case PhoneState.State.TextMessageDisplay:
			
			if (btn == Button.Cancel)
			{
				ps.SetViewToTextMessageInbox();
			}
			else if (btn == Button.Enter)
			{
				ps.SetViewToInboxTextMessageOptions();
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
			break;
			
		default:
			print ("Incorrect state.");
			break;
		}
	}
}
