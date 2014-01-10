// C++ Win32 Lesson 8: Tic Tac Toe
// Author: Michael Hall
//
// This program is available for download through our website XoaX.net with no guarantees.
// Disclaimer: While we have made every effort to ensure the quality of our content, all risks associated
// with downloading or using this solution, project and code are assumed by the user of this material.
//
// Copyright 2009 Xoax - For personal use only, not for distribution

// TicTacToe.cpp : Defines the entry point for the application.
//

#include "stdafx.h"
#include "TicTacToe.h"

enum EMarker {keBlank, keX, keO}; //used to define what's in each board square  

#define MAX_LOADSTRING 100

bool colourChangeRB = true;
bool colourChangePG = false; //allows the user to change colour scheme
bool onePlayer = true;
bool twoPlayer = false; //allows user to change the amount of players
bool newMove;

// Global Variables:
HMENU hMenu;									// menu handler
HINSTANCE hInst;								// current instance
TCHAR szTitle[MAX_LOADSTRING];					// The title bar text
TCHAR szWindowClass[MAX_LOADSTRING];			// the main window class name
EMarker gePlayerTurn = keX; //player1 is X, player2 is O
EMarker geaaBoard[3][3] =
	{{keBlank, keBlank, keBlank},
	{keBlank, keBlank, keBlank},
	{keBlank, keBlank, keBlank}}; //defines the game board
const int gkiSqrSz = 200; //defines the width of a square as 200 pixels

// Forward declarations of functions included in this code module:
ATOM				MyRegisterClass(HINSTANCE hInstance);
BOOL				InitInstance(HINSTANCE, int);
LRESULT CALLBACK	WndProc(HWND, UINT, WPARAM, LPARAM);
INT_PTR CALLBACK	About(HWND, UINT, WPARAM, LPARAM);

int APIENTRY _tWinMain(HINSTANCE hInstance,
                     HINSTANCE hPrevInstance,
                     LPTSTR    lpCmdLine,
                     int       nCmdShow)
{
	UNREFERENCED_PARAMETER(hPrevInstance);
	UNREFERENCED_PARAMETER(lpCmdLine);

 	// TODO: Place code here.
	MSG msg;
	HACCEL hAccelTable;

	// Initialize global strings
	LoadString(hInstance, IDS_APP_TITLE, szTitle, MAX_LOADSTRING);
	LoadString(hInstance, IDC_TICTACTOE, szWindowClass, MAX_LOADSTRING);
	MyRegisterClass(hInstance);

	// Perform application initialization:
	if (!InitInstance (hInstance, nCmdShow))
	{
		return FALSE;
	}

	hAccelTable = LoadAccelerators(hInstance, MAKEINTRESOURCE(IDC_TICTACTOE));

	// Main message loop:
	while (GetMessage(&msg, NULL, 0, 0))
	{
		if (!TranslateAccelerator(msg.hwnd, hAccelTable, &msg))
		{
			TranslateMessage(&msg);
			DispatchMessage(&msg);
		}
	}

	return (int) msg.wParam;
}



//
//  FUNCTION: MyRegisterClass()
//
//  PURPOSE: Registers the window class.
//
//  COMMENTS:
//
//    This function and its usage are only necessary if you want this code
//    to be compatible with Win32 systems prior to the 'RegisterClassEx'
//    function that was added to Windows 95. It is important to call this function
//    so that the application will get 'well formed' small icons associated
//    with it.
//
ATOM MyRegisterClass(HINSTANCE hInstance)
{
	WNDCLASSEX wcex;

	wcex.cbSize = sizeof(WNDCLASSEX);

	wcex.style			= CS_HREDRAW | CS_VREDRAW;
	wcex.lpfnWndProc	= WndProc;
	wcex.cbClsExtra		= 0;
	wcex.cbWndExtra		= 0;
	wcex.hInstance		= hInstance;
	wcex.hIcon			= LoadIcon(hInstance, MAKEINTRESOURCE(IDI_TICTACTOE));
	wcex.hCursor		= LoadCursor(NULL, IDC_ARROW);
	wcex.hbrBackground	= (HBRUSH)(COLOR_WINDOW+1);
	wcex.lpszMenuName	= MAKEINTRESOURCE(IDC_TICTACTOE);
	wcex.lpszClassName	= szWindowClass;
	wcex.hIconSm		= LoadIcon(wcex.hInstance, MAKEINTRESOURCE(IDI_SMALL));

	return RegisterClassEx(&wcex);
}

//
//   FUNCTION: InitInstance(HINSTANCE, int)
//
//   PURPOSE: Saves instance handle and creates main window
//
//   COMMENTS:
//
//        In this function, we save the instance handle in a global variable and
//        create and display the main program window.
//
BOOL InitInstance(HINSTANCE hInstance, int nCmdShow)
{
   HWND hWnd;

   hInst = hInstance; // Store instance handle in our global variable

   hWnd = CreateWindow(szWindowClass, szTitle, WS_CAPTION | WS_SYSMENU | WS_MINIMIZEBOX,
      CW_USEDEFAULT, 0, 605, 640, NULL, NULL, hInstance, NULL);
   hMenu = GetMenu(hWnd);
   if(colourChangeRB)
	{
		CheckMenuItem(hMenu, IDM_CHANGE_COLOUR_RB, MF_CHECKED);
		CheckMenuItem(hMenu, IDM_CHANGE_COLOUR_PG, MF_UNCHECKED);
		//highlights which option is currently selected, when the game window is first opened
	}
   if(onePlayer)
	{					
		CheckMenuItem(hMenu, IDM_1PLAYER, MF_CHECKED);
		CheckMenuItem(hMenu, IDM_2PLAYER, MF_UNCHECKED);
		//highlights which option is currently selected, when the game window is first opened
	}


   if (!hWnd)
   {
      return FALSE;
   }

   ShowWindow(hWnd, nCmdShow);
   UpdateWindow(hWnd);

   return TRUE;
}

void DrawBoard(HDC hdc)
{
	HPEN hPenOld;
	// Draw the board lines
	HPEN hLinePen;
	COLORREF qLineColor;
	qLineColor = RGB(0, 0, 0);
	hLinePen = CreatePen(PS_SOLID, 7, qLineColor);
	hPenOld = (HPEN)SelectObject(hdc, hLinePen);

	// Draw two vertical lines
	for (int iX = gkiSqrSz; iX < 3*gkiSqrSz; iX += gkiSqrSz) {
		MoveToEx(hdc, iX, 0, NULL);
		LineTo(hdc, iX, 3*gkiSqrSz);
	}
	// Draw two horizontal lines
	for (int iY = gkiSqrSz; iY < 3*gkiSqrSz; iY += gkiSqrSz) {
		MoveToEx(hdc, 0, iY, NULL);
		LineTo(hdc, 3*gkiSqrSz, iY);
	}

	SelectObject(hdc, hPenOld);
	DeleteObject(hLinePen);
}

void DrawX(HDC hdc, int iX, int iY)
{
	HPEN hPenOld;
	HPEN hLinePen;
	COLORREF qLineColor;
	if(colourChangePG)
	{
		qLineColor = RGB(200, 20, 255);
	}
	else
	{
		qLineColor = RGB(255, 0, 0);
	}
	const int kiPenWidth = 10;
	hLinePen = CreatePen(PS_SOLID, kiPenWidth, qLineColor);
	hPenOld = (HPEN)SelectObject(hdc, hLinePen);

	// Get bounds
	const int kiLowX	= iX*gkiSqrSz + 2*kiPenWidth;
	const int kiHighX	= (iX + 1)*gkiSqrSz - 2*kiPenWidth;
	const int kiLowY	= iY*gkiSqrSz + 2*kiPenWidth;
	const int kiHighY	= (iY + 1)*gkiSqrSz - 2*kiPenWidth;

	MoveToEx(hdc, kiLowX, kiLowY, NULL);
	LineTo(hdc, kiHighX, kiHighY);
	MoveToEx(hdc, kiLowX, kiHighY, NULL);
	LineTo(hdc, kiHighX, kiLowY);

	SelectObject(hdc, hPenOld);
	DeleteObject(hLinePen);
}

void DrawO(HDC hdc, int iX, int iY) {
	HPEN hPenOld;
	HPEN hLinePen;
	COLORREF qLineColor;
	if(colourChangePG)
	{
		qLineColor = RGB(100, 200, 100);
	}
	else
	{
		qLineColor = RGB(0, 0, 255);
	}
	const int kiPenWidth = 10;
	hLinePen = CreatePen(PS_SOLID, kiPenWidth, qLineColor);
	hPenOld = (HPEN)SelectObject(hdc, hLinePen);

	// Get bounds
	const int kiLowX	= iX*gkiSqrSz + 2*kiPenWidth;
	const int kiHighX	= (iX + 1)*gkiSqrSz - 2*kiPenWidth;
	const int kiLowY	= iY*gkiSqrSz + 2*kiPenWidth;
	const int kiHighY	= (iY + 1)*gkiSqrSz - 2*kiPenWidth;

	Arc(hdc, kiLowX, kiLowY, kiHighX, kiHighY, 0, 0, 0, 0);

	SelectObject(hdc, hPenOld);
	DeleteObject(hLinePen);
}

bool PlaceX(LPARAM lParam)
{
	int iPosX = LOWORD(lParam); 
	int iPosY = HIWORD(lParam); //gets click location, in pixels
	int iSqX = (iPosX/gkiSqrSz);
	int iSqY = (iPosY/gkiSqrSz); //divides by the size of the square, in pixels, and so gets the location of the click on the board

	if ((gePlayerTurn == keX) && //check that it's player1's turn
		(iSqX < 3) && (iSqY < 3) && //check the click is in the board 
		(geaaBoard[iSqY][iSqX]) == keBlank) //check the square is empty
	{
		geaaBoard[iSqY][iSqX] = keX;
		return true; //indicates a valid move
	}


	return false;
}

bool PlaceO(LPARAM lParam)
{
	int iPosX = LOWORD(lParam);
	int iPosY = HIWORD(lParam);
	int iSqX = (iPosX/gkiSqrSz);
	int iSqY = (iPosY/gkiSqrSz);

	if ((gePlayerTurn == keO) && twoPlayer && //it's player 2's turn, and 2 people are playing
		(iSqX < 3) && (iSqY < 3) &&
		(geaaBoard[iSqY][iSqX]) == keBlank)
	{
		geaaBoard[iSqY][iSqX] = keO;
		return true;
	}

	return false;
}

bool ChooseOWin() 
{ //all if statements work only if the square to be selected is blank
	if (((geaaBoard[0][1] == keO && geaaBoard[0][2] == keO) || (geaaBoard[1][1] == keO && geaaBoard[2][2] == keO) || (geaaBoard[2][0] == keO && geaaBoard[1][0] == keO)) && geaaBoard[0][0]==keBlank ) 
	{
	//choose [0][0] if ([0][1]=O && [0][2]=O) || ([1][1]=O && [2][2]=O) || ([2][0]=O && [1][0]=O)
		geaaBoard[0][0] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keO && geaaBoard[0][2] == keO) || (geaaBoard[1][1] == keO && geaaBoard[2][1] == keO))  && geaaBoard[0][1]==keBlank)
	{
	//choose [0][1] if ([0][0]=O && [0][2]=O) || ([1][1]=O && [2][1]=O))
		geaaBoard[0][1] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][2] == keO && geaaBoard[0][1] == keO) || (geaaBoard[1][1] == keO && geaaBoard[2][0] == keO) || (geaaBoard[1][2] == keO && geaaBoard[2][2] == keO)) && geaaBoard[0][2]==keBlank)
	{
	//choose [0][2] if ([0][0]=O && [0][1]=O) || ([1][1]=O && [2][0]=O) || ([1][2]=O && [2][2]=O)
		geaaBoard[0][2] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keO && geaaBoard[2][0] == keO) || (geaaBoard[1][1] == keO && geaaBoard[1][2] == keO)) && geaaBoard[1][0]==keBlank)
	{
	//choose [1][0] if ([0][0]=O && [2][0]=O) || ([1][1]=O && [1][2]=O)
		geaaBoard[1][0] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keO && geaaBoard[2][2] == keO) || (geaaBoard[0][1] == keO && geaaBoard[2][1] == keO) || (geaaBoard[0][2] == keO && geaaBoard[2][0] == keO) || (geaaBoard[1][0] == keO && geaaBoard[1][2] == keO)) && geaaBoard[1][1]==keBlank)
	{
	//choose [1][1] if ([0][0]=O && [2][2]=O) || ([0][1]=O && [2][1]=O) || ([0][2]=O && [2][0]=O) || ([1][0]=O && [1][2]=O)
		geaaBoard[1][1] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][2] == keO && geaaBoard[2][2] == keO) || (geaaBoard[1][0] == keO && geaaBoard[1][1] == keO)) && geaaBoard[1][2]==keBlank)
	{
	//choose [1][2] if ([0][2]=O && [2][2]=O) || ([1][0]=O && [1][1]=O)
		geaaBoard[1][2] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keO && geaaBoard[1][0] == keO) || (geaaBoard[0][2] == keO && geaaBoard[1][1] == keO) || (geaaBoard[2][1] == keO && geaaBoard[2][2] == keO)) && geaaBoard[2][0]==keBlank)
	{
	//choose [2][0] if ([0][0]=O && [1][0]=O) || ([0][2]=O && [1][1]=O) || ([2][1]=O && [2][2]=O)
		geaaBoard[2][0] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][1] == keO && geaaBoard[1][1] == keO) || (geaaBoard[2][0] == keO && geaaBoard[2][2] == keO)) && geaaBoard[2][1]==keBlank)
	{
	//choose [2][1] if ([0][1]=O && [1][1]=O) || ([2][0]=O && [2][2]=O)
		geaaBoard[2][1] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keO && geaaBoard[1][1] == keO) || (geaaBoard[0][2] == keO && geaaBoard[1][2] == keO) || (geaaBoard[2][0] == keO && geaaBoard[2][1] == keO)) && geaaBoard[2][2]==keBlank) 
	{
	//choose [2][2] if ([0][0]=O && [1][1]=O) || ([0][2]=O && [1][2]=O) || ([2][0]=O && [2][1]=O)
		geaaBoard[2][2] = keO;
		newMove = true;
		return true;
	}
	else
	{
		return false;
	}
}

bool StopXWin() 
{
	//all if statements only work if square to be chosen is blank
	if (((geaaBoard[0][1] == keX && geaaBoard[0][2] == keX) || (geaaBoard[1][1] == keX && geaaBoard[2][2] == keX) || (geaaBoard[1][0] == keX && geaaBoard[2][0] == keX)) && geaaBoard[0][0]==keBlank)
	{
	//choose [0][0] if ([0][1]=X && [0][2]=X) || ([1][1]=X && [2][2]=X) || ([1][0]=X && [1][0]=X)
		geaaBoard[0][0] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keX && geaaBoard[0][2] == keX) || (geaaBoard[1][1] == keX && geaaBoard[2][1] == keX)) && geaaBoard[0][1]==keBlank)
	{
	//choose [0][1] if ([0][0]=X && [0][2]=X) || ([1][1]=X && [2][1]=X))
		geaaBoard[0][1] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keX && geaaBoard[0][1] == keX) || (geaaBoard[1][1] == keX && geaaBoard[2][0] == keX) || (geaaBoard[1][2] == keX && geaaBoard[2][2] == keX)) && geaaBoard[0][2]==keBlank)
	{
	//choose [0][2] if ([0][0]=X && [0][1]=X) || ([1][1]=X && [2][0]=X) || ([1][2]=X && [2][2]=X)
		geaaBoard[0][2] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keX && geaaBoard[2][0] == keX) || (geaaBoard[1][1] == keX && geaaBoard[1][2] == keX)) && geaaBoard[1][0]==keBlank)
	{
	//choose [1][0] if ([0][0]=X && [2][0]=X) || ([1][1]=X && [1][2]=X)
		geaaBoard[1][0] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keX && geaaBoard[2][2] == keX) || (geaaBoard[0][1] == keX && geaaBoard[2][1] == keX) || (geaaBoard[0][2] == keX && geaaBoard[2][0] == keX) || (geaaBoard[1][0] == keX && geaaBoard[1][2] == keX)) && geaaBoard[1][1]==keBlank)
	{
	//choose [1][1] if ([0][0]=X && [2][2]=X) || ([0][1]=X && [2][1]=X) || ([0][2]=X && [2][0]=X) || ([1][0]=X && [1][2]=X)
		geaaBoard[1][1] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][2] == keX && geaaBoard[2][2] == keX) || (geaaBoard[1][0] == keX && geaaBoard[1][1] == keX)) && geaaBoard[1][2]==keBlank)
	{
	//choose [1][2] if ([0][2]=X && [2][2]=X) || ([1][0]=X && [1][1]=X)
		geaaBoard[1][2] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keX && geaaBoard[1][0] == keX) || (geaaBoard[0][2] == keX && geaaBoard[1][1] == keX) || (geaaBoard[2][1] == keX && geaaBoard[2][2] == keX)) && geaaBoard[2][0]==keBlank)
	{
	//choose [2][0] if ([0][0]=X && [1][0]=X) || ([0][2]=X && [1][1]=X) || ([2][1]=X && [2][2]=X)
		geaaBoard[2][0] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][1] == keX && geaaBoard[1][1] == keX) || (geaaBoard[2][0] == keX && geaaBoard[2][2] == keX)) && geaaBoard[2][1]==keBlank)
	{
	//choose [2][1] if ([0][1]=X && [1][1]=X) || ([2][0]=X && [2][2]=X)
		geaaBoard[2][1] = keO;
		newMove = true;
		return true;
	}
	else if (((geaaBoard[0][0] == keX && geaaBoard[1][1] == keX) || (geaaBoard[0][2] == keX && geaaBoard[1][2] == keX) || (geaaBoard[2][0] == keX && geaaBoard[2][1] == keX)) && geaaBoard[2][2]==keBlank)
	{
	//choose [2][2] if ([0][0]=X && [1][1]=X) || ([0][2]=X && [1][2]=X) || ([2][0]=X && [2][1]=X)
		geaaBoard[2][2] = keO;
		newMove = true;
		return true;
	}
	else
	{
		return false;
	}
}

bool HasWon() {
	// Check for win through upper left
	if (geaaBoard[0][0] != keBlank) {
		if (geaaBoard[0][1] == geaaBoard[0][0] &&
			geaaBoard[0][2] == geaaBoard[0][0])
		{
			return true;
		}
		if (geaaBoard[1][0] == geaaBoard[0][0] &&
			geaaBoard[2][0] == geaaBoard[0][0])
		{
			return true;
		}
	}
	// Check for win through center
	if (geaaBoard[1][1] != keBlank) {
		if (geaaBoard[0][0] == geaaBoard[1][1] &&
			geaaBoard[2][2] == geaaBoard[1][1])
		{
			return true;
		}
		if (geaaBoard[0][2] == geaaBoard[1][1] &&
			geaaBoard[2][0] == geaaBoard[1][1])
		{
			return true;
		}
		if (geaaBoard[1][0] == geaaBoard[1][1] &&
			geaaBoard[1][2] == geaaBoard[1][1])
		{
			return true;
		}
		if (geaaBoard[0][1] == geaaBoard[1][1] &&
			geaaBoard[2][1] == geaaBoard[1][1])
		{
			return true;
		}
	}
	// Check for win through lower right
	if (geaaBoard[2][2] != keBlank) {
		if (geaaBoard[2][0] == geaaBoard[2][2] &&
			geaaBoard[2][1] == geaaBoard[2][2])
		{
			return true;
		}
		if (geaaBoard[0][2] == geaaBoard[2][2] &&
			geaaBoard[1][2] == geaaBoard[2][2])
		{
			return true;
		}
	}
	return false;
}

bool IsBoardFull()
{
	for (int iX = 0; iX < 3; ++iX) 
{
		for (int iY = 0; iY < 3; ++iY) 
		{
			if (geaaBoard[iY][iX] == keBlank) 
			{
				return false;
			}
		}
	}
	return true;
}

void ResetGame() //resets board squares to blank, puts player turn back to 1
{
	for (int iX = 0; iX < 3; ++iX) {
		for (int iY = 0; iY < 3; ++iY) {
			geaaBoard[iY][iX] = keBlank;
		}
	}
	gePlayerTurn = keX;
}

//
//  FUNCTION: WndProc(HWND, UINT, WPARAM, LPARAM)
//
//  PURPOSE:  Processes messages for the main window.
//
//  WM_COMMAND	- process the application menu
//  WM_PAINT	- Paint the main window
//  WM_DESTROY	- post a quit message and return
//
//
LRESULT CALLBACK WndProc(HWND hWnd, UINT message, WPARAM wParam, LPARAM lParam)
{
	int wmId, wmEvent;
	PAINTSTRUCT ps;
	HDC hdc;

	switch (message)
	{
	case WM_LBUTTONDOWN:
		{
			bool bValidMove = PlaceX(lParam);
			if (bValidMove) {
				gePlayerTurn = keO;
			} else {
				::MessageBox(hWnd, _T("Invalid Move"), _T("Error"), MB_OK | MB_ICONEXCLAMATION);
			}

			// Repaint the window after the update
			InvalidateRect(hWnd, 0, TRUE);

			int emptySquare = 0;
			for (int iX = 0; iX < 3; ++iX) 
					{
						for (int iY = 0; iY < 3; ++iY) 
						{
							if (geaaBoard[iY][iX] == keBlank) 
							{
								emptySquare++; //keeps track of total number of empty squares, ie the remaing squares
							}
						}
					}
			
			if (onePlayer && (!HasWon()) && bValidMove && emptySquare > 1)//if Player 1 is playing against the computer, and they have made a valid move, and player 1 has not made the final move in a "draw" game
			{
				gePlayerTurn = keO;
				newMove = false;

				if (onePlayer && (!HasWon()))//if Player 1 is playing against the computer, and player 1 has not made the finishing move
				{
					gePlayerTurn = keO;
					newMove = false;
					int i, j;

					if(!(ChooseOWin()))
					{
						if(!(StopXWin()))
						{
							while(newMove == false)
							{
								i = rand() % 3; //choose a random horiztonal square, 0-2
								j = rand() % 3; //choose a random vertical square, 0-2
								if(geaaBoard[i][j] == keBlank) //checks if square is blank
								{	
									geaaBoard[i][j] = keO;
									newMove = true;
								}						
							}
						}
					}
			
					gePlayerTurn = keX;
					InvalidateRect(hWnd, 0, TRUE);
				}
			}
		    break;
		}
	case WM_RBUTTONDOWN:
		{
			if(twoPlayer) //only allows right-click option when two people are playing
			{
				bool bValidMove = PlaceO(lParam);
				if (bValidMove) {
					gePlayerTurn = keX;
				} else {
					::MessageBox(hWnd, _T("Invalid Move"), _T("Error"), MB_OK | MB_ICONEXCLAMATION);
				}
				// Repaint the window after the update
				InvalidateRect(hWnd, 0, TRUE);
				break;
			}
			
		}
	case WM_COMMAND:
		wmId    = LOWORD(wParam);
		wmEvent = HIWORD(wParam);
		hMenu = GetMenu(hWnd);
		// Parse the menu selections:
		switch (wmId)
		{
			case IDM_ABOUT:
				DialogBox(hInst, MAKEINTRESOURCE(IDD_ABOUTBOX), hWnd, About);
				break;
			case IDM_CHANGE_COLOUR_RB: 
				colourChangeRB = true;
				colourChangePG = false;
				if(colourChangeRB)
				{
					CheckMenuItem(hMenu, IDM_CHANGE_COLOUR_RB, MF_CHECKED);
					CheckMenuItem(hMenu, IDM_CHANGE_COLOUR_PG, MF_UNCHECKED);
					//highlights which option is currently selected
				}
				InvalidateRect(hWnd, 0, TRUE); //changes the colours of all X's and O's currently on the board
				break;
			case IDM_CHANGE_COLOUR_PG:
				colourChangePG = true;
				colourChangeRB = false;
				if(colourChangePG)
				{					
					CheckMenuItem(hMenu, IDM_CHANGE_COLOUR_PG, MF_CHECKED);
					CheckMenuItem(hMenu, IDM_CHANGE_COLOUR_RB, MF_UNCHECKED);
					//highlights which option is currently selected
				}
				InvalidateRect(hWnd, 0, TRUE); //changes the colours of all X's and O's currently on the board
				break;
			case IDM_1PLAYER:
				onePlayer = true;
				twoPlayer = false;
				if(onePlayer)
				{					
					CheckMenuItem(hMenu, IDM_1PLAYER, MF_CHECKED);
					CheckMenuItem(hMenu, IDM_2PLAYER, MF_UNCHECKED);
					//highlights which option is currently selected
				}
				ResetGame();
				InvalidateRect(hWnd, 0, TRUE); //resets game
				break;
			case IDM_2PLAYER:
				twoPlayer = true;
				onePlayer = false;
				if(twoPlayer)
				{					
					CheckMenuItem(hMenu, IDM_2PLAYER, MF_CHECKED);
					CheckMenuItem(hMenu, IDM_1PLAYER, MF_UNCHECKED);
					//highlights which option is currently selected
				}
				ResetGame();
				InvalidateRect(hWnd, 0, TRUE); //resets game
				break;
			case IDM_NEW_GAME:
				ResetGame();
				// Repaint the window after the update
				InvalidateRect(hWnd, 0, TRUE);
				break;
			case IDM_EXIT:
				DestroyWindow(hWnd);
				break;
			default:
				return DefWindowProc(hWnd, message, wParam, lParam);
		}
		break;
	case WM_PAINT:
		{
		hdc = BeginPaint(hWnd, &ps);
		// Draw the board lines
		DrawBoard(hdc);

		// Draw Xs and Os
		for (int iX = 0; iX < 3; ++iX) {
			for (int iY = 0; iY < 3; ++iY) {
				if (geaaBoard[iY][iX] == keX) {
					DrawX(hdc, iX, iY);
				} else if (geaaBoard[iY][iX] == keO) {
					DrawO(hdc, iX, iY);
				}
			}
		}

		// Check for end of game conditions
		if (HasWon()) {
			if (gePlayerTurn == keO) 
			{
				if(MessageBoxA(hWnd, "Player 1 Won! \nPlay Another Game?", "Game Over", MB_YESNO | MB_ICONQUESTION) == IDNO)
				{
					DestroyWindow(hWnd);
				}
				else
				{
					ResetGame();
					InvalidateRect(hWnd, 0, TRUE); // Repaint the window after the update
				}
			} 
			else 
			{
				if(onePlayer)
				{
						if(MessageBoxA(hWnd, "The Computer Won! \nPlay Another Game?", "Game Over", MB_YESNO | MB_ICONQUESTION) == IDNO)
					{
						DestroyWindow(hWnd);
					}
					else
					{
						ResetGame();
						InvalidateRect(hWnd, 0, TRUE);
					}
				}
				else
				{
					if(MessageBoxA(hWnd, "Player 2 Won! \nPlay Another Game?", "Game Over", MB_YESNO | MB_ICONQUESTION) == IDNO)
					{
						DestroyWindow(hWnd);
					}
					else
					{
						ResetGame();
						InvalidateRect(hWnd, 0, TRUE);
					}
				}
			}
			ResetGame();
			InvalidateRect(hWnd, 0, TRUE);
		} else {
			// If there is no win, check for a draw
			if (IsBoardFull()) 
			{
				if(MessageBoxA(hWnd, "It's A Draw \nPlay Another Game?", "Game Over", MB_YESNO | MB_ICONQUESTION) == IDNO)
				{
					DestroyWindow(hWnd);
				}
				else
				{
					ResetGame();
					InvalidateRect(hWnd, 0, TRUE);
				}
			}
		}
		EndPaint(hWnd, &ps);
		}
		break;
	case WM_DESTROY:
		PostQuitMessage(0);
		break;
	default:
		return DefWindowProc(hWnd, message, wParam, lParam);
	}
	return 0;
}

// Message handler for about box.
INT_PTR CALLBACK About(HWND hDlg, UINT message, WPARAM wParam, LPARAM lParam)
{
	UNREFERENCED_PARAMETER(lParam);
	switch (message)
	{
	case WM_INITDIALOG:
		return (INT_PTR)TRUE;

	case WM_COMMAND:
		if (LOWORD(wParam) == IDOK || LOWORD(wParam) == IDCANCEL)
		{
			EndDialog(hDlg, LOWORD(wParam));
			return (INT_PTR)TRUE;
		}
		break;
	}
	return (INT_PTR)FALSE;
}
