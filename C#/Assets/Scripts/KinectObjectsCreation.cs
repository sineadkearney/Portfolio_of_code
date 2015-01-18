//code written by Sinéad Kearney, based on http://answers.unity3d.com/questions/34185/dontdestroyonload-is-it-intended-behavior.html
//causes the object to presist when a level is loaded. Also helps to cut down on load times

using UnityEngine;
using System.Collections;

public class KinectObjectsCreation : MonoBehaviour {

	private static bool created = false;

	void Awake() 
	{
		if (!created) 
		{
			// this is the first instance - make it persist
			DontDestroyOnLoad(this.gameObject);
			created = true;
		} 
		else 
		{
			// this must be a duplicate from a scene reload - DESTROY!
			Destroy(this.gameObject);
		}
	}
}
