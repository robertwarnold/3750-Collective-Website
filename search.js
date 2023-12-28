// Perform the search on each input change
function liveSearch() {
   // assemble the PHP filename
   var query = document.getElementById("searchlive").value;
   var filename = "search.php?query=" + query;
   // DisplayResults will handle the Ajax response
   ajaxCallback = displayResults;
   // Send the Ajax request
   ajaxRequest(filename);
}

// Display search results
function displayResults() {
   // remove old list
   var ul = document.getElementById("list");
   var div = document.getElementById("results");
   div.removeChild(ul);

   // make a new list
   ul = document.createElement("ul");
   ul.id = "list";
   var results = ajaxreq.responseXML.getElementsByTagName("result");
   for (var i = 0; i < results.length; i++) {
       var li = document.createElement("li");
       var state = results[i].getElementsByTagName("state")[0].firstChild.nodeValue;
       var capital = results[i].getElementsByTagName("capital")[0].firstChild.nodeValue;
       var text = document.createTextNode(state + " - " + capital);
       li.appendChild(text);
       ul.appendChild(li);
   }
   if (results.length === 0) {
       var li = document.createElement("li");
       li.appendChild(document.createTextNode("No results"));
       ul.appendChild(li);
   }

   // display the new list
   div.appendChild(ul);
}

// set up event handler
var obj = document.getElementById("searchlive");
obj.oninput = liveSearch; // Use oninput to capture input changes
