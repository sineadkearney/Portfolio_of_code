#pragma strict
 
private var btnX:float;
private var btnY:float;
private var btnWidth:float;
private var btnHeight:float;

var gameName:String = "sinead.kearney.network.phoneGame";

private var refreshing:boolean = false;
private var hostData:HostData[];

function Start () {
	btnY = Screen.width * 0.05;
	btnWidth = Screen.width * 0.3;
	btnHeight = Screen.width * 0.1;
	btnX = (Screen.width - btnWidth)/2;
}

function Update () {
	if (refreshing)
	{
		if (MasterServer.PollHostList().Length > 0)
		{
			refreshing = false;
			Debug.Log(MasterServer.PollHostList().Length);
			hostData = MasterServer.PollHostList();
			
			Debug.Log("hostData.length " + hostData.length );
			for(var i:int = 0; i < hostData.length; i++)
			{
				//Debug.Log("gameType " + hostData[i].gameType);
				if (hostData[i].gameType == gameName)
				{
					Debug.Log("game names match");
					Network.Connect(hostData[i]);
					break;
				}
				else
				{
					Debug.Log("game names don't match " + hostData[i].gameType);
				}
			}
		}
	}
}

function StartServer()
{
	Network.InitializeServer(2, 25002, !Network.HavePublicAddress);
	MasterServer.RegisterHost(gameName, "Tutorial GameName", "this is a tutorial game");
}

function RefreshHostList()
{
	MasterServer.RequestHostList(gameName);
	yield WaitForSeconds(1.5);
	refreshing = true;
	
}

function SpawnPlayer()
{
	Debug.Log("Spawn Player");
	//Network.Instantiate(playerPrefab, spawnObject.position, Quaternion.identity, 0);
}

//Messages
function OnServerInitialized()
{
	Debug.Log("server init");
	//SpawnPlayer();
}

function OnConnectedToServer()
{
	Debug.Log("OnConnectedToServer");
	//SpawnPlayer();
}

function OnMasterServerEvent(mse:MasterServerEvent)
{
	if(mse == MasterServerEvent.RegistrationSucceeded)
	{
		Debug.Log("registered server");
	}
}

//GUI
function OnGUI(){
//this has a lot of overhead. Not good for mobiles

	if (!Network.isClient && !Network.isServer)
	{
		
		if (GUI.Button(Rect(btnX, btnY * 1.2 + btnHeight, btnWidth, btnHeight), "Connect to Host"))
		{
			Debug.Log("refreshing");
			RefreshHostList();
		}
	}
}