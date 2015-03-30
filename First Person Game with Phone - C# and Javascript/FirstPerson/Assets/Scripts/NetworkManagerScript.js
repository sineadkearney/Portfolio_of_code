#pragma strict
 
private var btnX:float;
private var btnY:float;
private var btnWidth:float;
private var btnHeight:float;

var gameName:String = "sinead.kearney.network.phoneGame";

private var refreshing:boolean = false;
private var hostData:HostData[];

var playerPrefab:GameObject;
var spawnObject:Transform;
var isUI:boolean;

function Start () {
	btnX = Screen.width * 0.05;
	btnY = Screen.width * 0.05;
	btnWidth = Screen.width * 0.1;
	btnHeight = Screen.width * 0.1;
	
	StartServer();
	
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
	if (!isUI)
	{
		Network.Instantiate(playerPrefab, spawnObject.position, Quaternion.identity, 0);
	}
}

//Messages
function OnServerInitialized()
{
	Debug.Log("server init");
	//SpawnPlayer();
}

function OnConnectedToServer()
{
	//SpawnPlayer();
	Debug.Log("Connected!");
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

	//if (!Network.isClient && !Network.isServer)
	//{
		/*if (GUI.Button(Rect(btnX, btnY, btnWidth, btnHeight), "Start Server"))
		{
			Debug.Log("starting server");
			StartServer();
		}*/
		
		/*if (GUI.Button(Rect(btnX, btnY * 1.2 + btnHeight, btnWidth, btnHeight), "Refresh Host"))
		{
			Debug.Log("refreshing");
			RefreshHostList();
		}*/
		
	/*	if(hostData)
		{
			for(var i:int = 0; i < hostData.length; i++)
			{
				if (GUI.Button(Rect(btnX*1.5 + btnWidth, btnY*1.2 +(btnHeight *i), btnWidth*3, btnHeight * 0.5), hostData[i].gameName))
				{
					Network.Connect(hostData[i]);
					Debug.Log("test");
				}
			}
		}
	}*/
}