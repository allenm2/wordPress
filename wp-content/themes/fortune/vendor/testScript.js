/* testScript.js - functions used in WordPress theme awd
		Written by:  Matt Allen - allenm2@csp.edu
		Written:  07-23-2016
*/

function favBeer() {
  var result;
  var beer = document.getElementById("beer").value;

  switch(beer) {
    case "0000":
      result = "Select one of these amazing beers.";
      break;
    case "1100":
      result = "You have chosen wisely!";
      break;
    case "1200":
      result = "A great beer, but I don't think it's your favorite.";
      break;
     case "1300":
      result = "Hoppy choice, but try again.";
      break;
     case "1400":
      result = "Another flavorful choice, but not quite there.";
      break;
    default:
      result = "Not even close.";
  }
  document.getElementById("userInput").innerHTML = result;
}

function beerArray()
{
      var beer = new Array();
      beer[0]="Surly Furious";
      beer[1]="Summit Extra Pale Ale";
      beer[2]="Indeed Day Tripper Ale";
      beer[3]="612 Brew Six";  

         for(var myCounter = 0; myCounter < 4; myCounter++)
         {
            document.write("Beer: " + beer[myCounter] +"<br />");
         }
}