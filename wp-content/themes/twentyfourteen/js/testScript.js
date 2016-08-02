/* testScript.js - functions used in WordPress theme awd
		Written by:  Matt Allen - allenm2@csp.edu
		Written:  07-23-2016
*/

function getLogin(userName)
	{
		// document.write("DEBUG: Your username is: " + userName + "<br />");
		switch(userInput)
		{
			// admin login
			case "admin":
				document.write("You're logged in as an Admin.<br />");
				break;
			// guest login
			case "guest":
				document.write("You're logged in as a Guest.<br />");
				break;
			default:
				document.write("Sorry, Please login under admin or guest.")
		} // end of swith
	} // end of function getLogin

function getBeer( )
	{
		//set up variables and array
		var topFiveBeers = new Array();
		var defaultInput = "Surly Furious";
		var nameInput = "";
		
		// ****** GET USER INPUT **********
		// allow user to enter up to 5 Beers
		// user can type 'exit' to Quit
		for(var x=0; x<5; x++)
		{
			defaultInput = "Surly Furious" + x;
			nameInput = prompt("Type in a favorite beer. \n [exit to Quit]", defaultInput);
			if(nameInput == "exit")
			{
				break;
			}
			else
			{
				document.write("Saving: " + nameInput + "<br />");
				topFiveBeers[x] = nameInput;
			}
		}
		
		// ******* DISPLAY USER INPUT *********
		document.write("<hr />");
		document.write("Your Top Five Favorite Beers.<br />");
		for(var y=0; y<topFiveBeers.length; y++)
		{
			document.write("Beer #" + y + ": " + topFiveBeers[y] + "<br />");
		}
		document.write("<hr />");
	} // end of getBeer( )	