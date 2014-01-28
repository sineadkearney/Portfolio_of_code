using UnityEngine;
using System.Collections;

public class levelProperties : MonoBehaviour {
	
	public bool isCompleted = false;
	public int worldIndex = 0;
	public int levelIndex = 0;
	//public int mostCoinsCollectedInARun  = 0;
	

	void Start()
	{
		bool useKinect = PlayerPrefs.GetInt("useKinect") == 1;
		//speech
		GameObject.FindWithTag("kinect-speech").GetComponent<SpeechManager>().enabled = useKinect;
		//pointMan
		//GameObject.FindWithTag("Player").GetComponent<playerControls>().kpc = GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>();
		GameObject.FindWithTag("kinect-pointMan").GetComponent<PointManController>().enabled = useKinect;
		//kinect Manager
		GameObject.FindWithTag("kinect-gesture").GetComponent<KinectManager>().enabled = useKinect;
	}
	
	void OnLevelWasLoaded () 
	{
		Start();
	}
}
