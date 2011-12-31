#!/bin/bash

#You can create an link to this in ~/bin to execute it from the command line as part of your $PATH variable

# change {username} to your user name with no curly brackets.
#Create the ~/linkapp directory and make sure link.txt is in there.
link=`cat /home/{username}/linkapp/link.txt`

firefox "$link" 
