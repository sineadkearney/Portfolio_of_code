from sqlalchemy import create_engine
from sqlalchemy import Column, MetaData, Table, func
from sqlalchemy import Integer, String, ForeignKey
from sqlalchemy.orm import mapper, sessionmaker, relationship, backref
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.dialects.mssql import VARCHAR
from sqlalchemy.sql import select, and_, or_, not_, exists
import MySQLdb as mdb
import sys
import hashlib

######################################## Definitions of Classes ####################################################		
class General:

    def createPlayer(self):
        """Allows first-time users to sign up with a unique playerTag and password. Adds the new information to the "players" table in the database
        Returns a type Player"""
		
        existing = True #used to ensure that player tag is unique
        while existing == True:
            print "Please enter your username:"
            playerTag = raw_input()
            print "Please enter your password: "
            password = raw_input()
			
			#check if playerTag is unique
            query = players_table.select()
            query1 = query.where(exists([players_table.c.playerTag],and_(players_table.c.playerTag==playerTag, ))) 
            if(conn.execute(query1).fetchall()): #This player tag has already been created
                print "This player tag has already been chosen. Please chose another"
            else: #the player tag is unique
                existing = False;
				
        #hash the user's password, using sha-512
        hexhash = hashlib.sha512(password).hexdigest()		
		
		#inserts the new information to "players" table in the database
        ins = players_table.insert().values(playerTag=playerTag, password=hexhash)
        conn.execute(ins)
        print "Welcome %s" %playerTag
		
        p = Player(playerTag, hexhash)
        return 	p				
        
		
    def logIn(self):
        """Allows a user to log in, taking their playerTag and password. Returns a Player type, or if the user is an admin of any groups, an Admin"""
        matching = False #used to ensure the user enters the correct playerTag and password
		
        while matching == False:
            print "Log in; Please enter your username:"
            enteredPlayerTag = raw_input()
            print "Please enter your password"
            enteredPassword = raw_input()
	    		
            #hash the user's password, using sha-512
            hexhash = hashlib.sha512(enteredPassword).hexdigest()
			
			 #check if the username and password match
            query = players_table.select()
            query = query.where(exists([players_table.c.playerTag],and_(players_table.c.playerTag==enteredPlayerTag, players_table.c.password==hexhash)))
        
            if(conn.execute(query).fetchall()):
                print "\nHello, %s. Welcome back" % enteredPlayerTag
			
			    #check to see if the Player is a member of any teams
                s1 = select([members_table.c.teamName], members_table.c.playerTag==enteredPlayerTag)
                result = conn.execute(s1).fetchall() #the player is a member of these teams. 
			
			    #check to see if the Player is the admin of any teams
                s2 = select([team_table.c.teamName], team_table.c.admin==enteredPlayerTag)
                adminResult = conn.execute(s2).fetchall() #the player is an admin of these teams. 
		
                if adminResult:
                    return Admin(enteredPlayerTag, hexhash, result, adminResult)
                else:	
			        return Player(enteredPlayerTag, hexhash, result)
                matching = True
            else:
                print "You have entered an incorrect username and/or password"
			

class Player(General):
    """"Players are the Users who have an account to access the system"""
	
    def __init__(self, playerTag, password, membership = [], adminStatus = []):
        """creates an instance of the Player class"""
        self.userID = "" #automatically incremented in the database
        self.playerTag = playerTag
        self.password = password
		#the Player is a member of these teams
        s1 = select([members_table.c.teamName], members_table.c.playerTag==self.playerTag)
        result = conn.execute(s1).fetchall()
        self.membership = result
		#all Players are given an adminStatus of "[]"
        self.adminStatus = [] 

	
    def sendFriendRequest(self):
        """allows the current Player (player1) to send a friend request to another Player (player2)
        This adds a row to the Friend table, and sets pending to '1'"""
		#print out all players
        s = select([players_table.c.playerTag])
        result = conn.execute(s) 
        print "\nAll players:"
        for row in result:  
            print row.playerTag
			
        print "\nWho do you want to send a friend request to?"
        answer = raw_input()
				
        s1 = select([players_table], players_table.c.playerTag==answer) 
        result1 = conn.execute(s1).fetchall() 
		
        #check to make sure that the answer is a valid playerTag
        if result1:
            query = friends_table.select()
            query1 = query.where(exists([friends_table.c.player2Tag],and_(friends_table.c.player1Tag==self.playerTag, friends_table.c.player2Tag==answer)))
            query2 = query.where(exists([friends_table.c.player1Tag],and_(friends_table.c.player2Tag==self.playerTag, friends_table.c.player1Tag==answer)))
            if (answer == self.playerTag):
			#if the player selects themselves
                print "You can't send a friend request to yourself"
            elif(conn.execute(query1).fetchall()): 
			#if the user has previously sent this user a friend request
                print "You're already friends with %s, or you are waiting for their response to a previously sent request" %answer
            elif(conn.execute(query2).fetchall()): 
			#if the user has been previously sent friend request by this user
                print "You're already friends with %s" %answer	
            else: 
			#a valid answer. Adds the information to the "friends" table
                ins = friends_table.insert().values(player1Tag=self.playerTag, player2Tag=answer, pending=1)
                conn.execute(ins)
                print "Your friend request was sent to %s" %answer
        else:
        #There is no member with this name
            print "This member does not exist"
				
    def checkForFriendRquest(self):
        """Allows the Player to check if they have recieved any new friend requests from other Players. The Player can then either accept or decline the friend request"""      
        #SELECT * FROM friends WHERE player2Tag = self.playerTag
        s1 = select([friends_table], friends_table.c.player2Tag==self.playerTag) 
        result1 = conn.execute(s1) 
		
        new = False #used to check if there are any new requests
		
        for row1 in result1:
            if row1.pending:
                new = True
                print "\nYou have a friend request from %s. Do you want to accept this request? y/n" % row1.player1Tag
                answer = raw_input()
                if answer == 'y':
                    self.acceptFriendRequest(row1.player1Tag)
                elif answer =='n':
                    self.declineFriendRequest(row1.player1Tag)
                else:
                    print "Error. Try Again"
					
        if new == False:
            print "\nYou have not recieved any new requests"
					
    def acceptFriendRequest(self, player1):
        """The current Player (player2) accepts the friend request from player1. Sets pending in "friends" table from '1' to '0'"""

        stmt = friends_table.update().values(pending='0').where(friends_table.c.player1Tag==player1).where(friends_table.c.player2Tag==self.playerTag)
        conn.execute(stmt)
        #sets "pending" from 1 to 0, to show that the friendship connection has been made

        print "You acccepted the friend request from %s" %player1
				
    def declineFriendRequest(self, player1): 
        """The current Player (player2) declines the friend request from player1. Deletes the entry in the "friends" table"""
		
        conn.execute(friends_table.delete().where(friends_table.c.player1Tag==player1).where(friends_table.c.player2Tag==self.playerTag)) 
        #deletes the entry in friends_table to show that the friendship has been declined

        print "You declined the friend request from %s" %player1
				
    def createTeam(self):
        """Creates a new team and adds the Player as a member, and as the Admin. Adds the new entries to the Member and Team table respectively
        Returns an instance of the Admin class"""
		
        print "\nWhat name do you want to give to your team?\n",
        answer = raw_input()
				
        query = friends_table.select()
        query1 = query.where(exists([team_table.c.teamName],and_(team_table.c.teamName==answer, )))
        if(conn.execute(query1).fetchall()):
		#This team has already been created
            print "This team has already been created"
        else:
            ins = team_table.insert().values(teamName=answer, admin=self.playerTag)
            conn.execute(ins) #add the new team and Admin to "team" table
					
            ins = members_table.insert().values(teamName=answer, playerTag=self.playerTag)
            conn.execute(ins) #add the Admin as a member in the "members" table
				
            print "%s has been created, and you are now the admin" %answer#
			
			#calculate the Player's membership
            s1 = select([members_table.c.teamName], members_table.c.playerTag==self.playerTag)
            result = conn.execute(s1).fetchall() #the player is a member of these teams.
            self.membership = result
			
            #give the Player the status of Admin
            s2 = select([team_table.c.teamName], team_table.c.admin==self.playerTag)
            resultAdmin = conn.execute(s2).fetchall() #the player is an Admin of these teams.
            self.adminStatus = resultAdmin
			
            return Admin(self.playerTag, self.password, result, resultAdmin)
				
    def joinTeam(self):
        """Allows the Player to join a team. Adds the new entry to Members table"""

        conn = engine.connect()
        s = select([team_table.c.teamName])
        result = conn.execute(s) 
        print "\nTeams:"
        for row in result:  
            print row.teamName
            #prints all teams
				
        print "\nWhat team do you want to join?\n",
        answer = raw_input()
				
        s1 = select([team_table], team_table.c.teamName==answer) 
        result1 = conn.execute(s1).fetchall() 
		#check to make sure that the answer is a valid teamName
		
        if result1:
		#a valid teamName
            query = members_table.select()
            query = query.where(exists([members_table.c.teamName],and_(members_table.c.playerTag==self.playerTag, members_table.c.teamName==answer)))
            if(conn.execute(query).fetchall()):
            #the user is already a member
                print "You are already a member this team"
            else:
            #the user is not a member of this team yet
                ins = members_table.insert().values(teamName=answer, playerTag=self.playerTag)
                conn = engine.connect()
                conn.execute(ins)
                print "You are now a member of %s" %answer
				
				#need to recalculate the Player's membership
                s1 = select([members_table.c.teamName], members_table.c.playerTag==self.playerTag)
                result = conn.execute(s1).fetchall() #the player is a member of these teams.
                self.membership = result
        else:
        #not a valid teamName
            print "This team does not exist yet"
			
    def leaveTeam(self):
        """As long as the Player is not an Admin, it allows the Player to leave a team they had previously joined. Deletes the entry in the "members" table"""
		
        print "You are a member of the following teams"
        for row in self.membership:  
            print row.teamName 
            #prints all teams of which the user is a member
	
        print "What team do you want to leave?\n",
        answer = raw_input()
		
        result = False
        for row in self.membership:  
            if answer == row.teamName:
                result = True
		
        if(result):
        #The user is a member of this team
			#check to make sure that the user is not the admin (so as to not leave the team without an admin)
			query = team_table.select()
			query1 = query.where(exists([team_table.c.teamName],and_(team_table.c.teamName==answer, team_table.c.admin==self.playerTag)))
			if(conn.execute(query1).fetchall()):
			#the Player is an Admin of this team
			    print "You are the admin of this team, so you can't leave the team"
			else:
			    conn.execute(members_table.delete().where(members_table.c.playerTag==self.playerTag).where(members_table.c.teamName==answer)) 
			    #deletes the entry for this player, for the team they have chosen, from the "members" table
			    print "You have left Team %s" % answer
			    
			    #need to recalculate the user's membership
			    s1 = select([members_table.c.teamName], members_table.c.playerTag==self.playerTag)
			    result = conn.execute(s1).fetchall() #the player is a member of these teams.
			    if result:
			        self.membership = result
			    else:
			        self.membership = []
			
        else:
        #the user is not a member of the chosen team
            print "You are not a member of this team"
	
    
    
class Admin(Player):
    """Players are given the status of Admin when they have created a team. This lets them removes any other Players from the teams they have created"""
	
    def __init__ (self, playerTag, password, membership, adminStatus):
        """creates an instance of the Admin class"""
        Player.__init__(self, playerTag, password, membership, adminStatus)
        self.membership = membership 
        self.adminStatus = adminStatus
		
    def removeMember(self):
        """Allows the Admin of a team to delete any members from the team, besides itself"""

        print "You are the admin of the following teams"
        for row1 in self.adminStatus:
            print row1.teamName
        #prints all the teams the user is the admin of		
		
        print "From which team do you want to remove a member?\n",
        answerTeam = raw_input()
				
		#check if the Player is the Admin of the chosen team
        query = team_table.select()
        query = query.where(exists([team_table.c.teamName],and_(team_table.c.teamName==answerTeam, team_table.c.admin==self.playerTag)))

        if(conn.execute(query).fetchall()):
		#the user is the admin of this team, and can remove players
            s2 = select([members_table.c.playerTag], members_table.c.teamName==answerTeam) #SELECT * FROM members WHERE teamName = answerTeam
            result2 = conn.execute(s2)
            print "These are the members of %s" %answerTeam
            for row2 in result2:
                print row2.playerTag
			#prints all the members belonging to the team
			
            print "What member do you want to remove?\n",
            answerMember = raw_input()
			
            if answerMember == self.playerTag:
			#An Admin cannot remove themselves from the team
                print "You cannot remove yourself from the team, as you are the admin"
            else:
                query2 = members_table.select()
                query2 = query2.where(exists([members_table.c.playerTag],and_(members_table.c.playerTag==answerMember, members_table.c.teamName==answerTeam)))
                if(conn.execute(query2).fetchall()):
                #The selected player is a member of a team, which the user is the admin of
                    conn.execute(members_table.delete().where(members_table.c.playerTag==answerMember).where(members_table.c.teamName==answerTeam)) 
                    #deletes the entry for this player, for the team they have chosen
                    print "You have removed %s from Team %s" %(answerMember, answerTeam)
                else:
                #The selected player is not a member of the chosen team
                    print "This member is not in the team"
        else:
            #the user is not the admin
            print "You are not the admin of this team, and cannot remove players"
			

############################################### Setting up the connection to the database ################################################

Base = declarative_base()
# create a connection to a mysql database
engine = create_engine("mysql://root:@localhost/python", echo=False)
global conn
conn = engine.connect()
# this is used to keep track of tables and their attributes
metadata = MetaData()
# database engine that is passed
metadata.create_all(engine)
		
Session = sessionmaker(bind=engine)
session = Session()

#declare the tables used in the database
players_table = Table('players', Base.metadata,
    Column('userID', Integer, primary_key=True), #automatically increments
    Column('playerTag', VARCHAR(40, collation='utf8_bin'), primary_key=True),
    Column('password', VARCHAR(130))
    )
							
members_table = Table('members', Base.metadata,
    Column('playerTag', VARCHAR(40, collation='utf8_bin'), primary_key=True),
    Column('teamName', VARCHAR(100, collation='utf8_bin'), primary_key=True),
    )

friends_table = Table('friends', Base.metadata,
    Column('player1Tag', VARCHAR(40, collation='utf8_bin'), primary_key=True),
    Column('player2Tag', VARCHAR(40, collation='utf8_bin'), primary_key=True),
    Column('pending', Integer)
    )
						   
team_table = Table('team', Base.metadata,
    Column('teamID', Integer, primary_key=True), #automatically increments
    Column('teamName', VARCHAR(100, collation='utf8_bin'), primary_key=True),
    Column('admin', VARCHAR(40))
    )

######################################################## Main method ######################################################

user = General()
print "Do you want to sign up? y/n"
answer = raw_input()
if answer == 'y':
    user.createPlayer()	
				
p = user.logIn()
if p:
    exit = 'y'				
    while exit != 'n':

        print "\nDo you want to: (Enter the corresponding number)\n(1) Check if you've recieved a friend request\
            \n(2) Send a friend request \n(3) Create a team \n(4) Join a team \n(5) Leave a team \n(6) Remove a member from a team\n(7) Log out"
        answer = raw_input()		
					
        if answer == '1':
            p.checkForFriendRquest()
        elif answer == '2':
            p.sendFriendRequest()
        elif answer == '3':
            p = p.createTeam()
        elif answer == '4':
            p.joinTeam()
        elif (answer == '5'):
            if p.membership:
                p.leaveTeam()
            else:
                print "You are not a member of any teams"
        elif (answer == '6'):
            if p.adminStatus:
                p.removeMember()
            else:
                print "You are not the admin of any teams, and so you cannot remove a member from a team"
        elif answer == '7':
            exit = 'y'
            break
        else:
            print "That isn't a valid option"
					
        print "\nChoose another operation? y/n"
        exit = raw_input()
        if exit =='n':
		    break
        elif exit !='y':
            print "error"
print "You have logged out"		

