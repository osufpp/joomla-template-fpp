/*
 * Load a feed via the Google Feeds API and build a table from the feed.
 * Send the feed to a page element (such as a div) with the id CLASS_NAME.
 *
 * USAGE INSTRUCTIONS:
 * Import the Google Feeds library before importing this script, as below:
 *
 *    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 *    <script type="text/javascript" src="/path/to/newsfeed.js"></script>
 *
 * Create a <div> with the id CLASS_NAME where the feed should be displayed.
 * Any content inside the div will be erased before the feed is added. A valid
 * div is shown below:
 *
 *    <div id=CLASS_NAME>Loading...</div>
 *
 * The CSS class used in this script is newsfeed.
 */

// Set the number of entries to load.
var NUM_ENTRIES = 4;

// Set the maximum number of rows.
var MAX_NUM_ROWS = 2;

// Set the minimum width of the table header.
var MIN_HEADER_WIDTH = 2;

// Set the preferred number of columns per row.
// This will grow or shrink as the feedlength
// and maximum number of rows demand.
var PREFERRED_NUM_COLUMNS = 2;

// Set the classname.
// This is also the ID for the container.
var CLASS_NAME = "newsfeed";

google.load("feeds", "1");

// Our callback function, for when a feed is loaded.
function feedLoaded(result) 
{
   if (!result.error)
   {
      // Grab the container we will put the results into.
      var container = document.getElementById(CLASS_NAME);
      container.innerHTML = '';

      // Determine the size of the feed table.
      // Remember that the feed length is limited
      // by NUM_ENTRIES.
      var feedLength = result.feed.entries.length;

      // Set the number of rows and columns.
      // Use the preferred number of columns per row until the
      // maximum number of rows has been reached.
      var numRows;
      if (Math.ceil(feedLength / PREFERRED_NUM_COLUMNS) < MAX_NUM_ROWS)
      {
         numRows = Math.ceil(feedLength / PREFERRED_NUM_COLUMNS);
      }
      else
      {
         numRows = MAX_NUM_ROWS;
      }

      // We have to have at least enough columns to fit the header.
      var numColumns = Math.max(Math.ceil(feedLength / numRows), MIN_HEADER_WIDTH);

      // Use this array to store entries in the order we want,
      // which is top-to-bottom and then left-to-right.
      var tableData = [];

      // This should be a 2D array to represent the whole table.
      for (var i = 0; i < numRows; i++)
      {
         tableData[i] = [];
      }

      // Create the table...
      var table = document.createElement("table");
      var header = document.createElement("th");

      // Set necessary attributes...
      table.className = CLASS_NAME;
      header.colspan = numColumns;
      header.className = CLASS_NAME;
      
      // Append children.
      header.appendChild(document.createTextNode("Trending Now"));
      table.appendChild(header);

      // Loop through the feeds, putting the titles and links onto the page.
      for (var i = 0; i < feedLength; i++)
      {
         // Initialize the elements, get the feed entry.
         var td = document.createElement("td");
         var a = document.createElement("a");
         var entry = result.feed.entries[i];

         // Set necessary attributes.
         a.href = entry.link;
         a.className = CLASS_NAME;
         td.className = CLASS_NAME;
         
         // Append children, number the entries.
         a.appendChild(document.createTextNode(entry.title));
         td.appendChild(document.createTextNode(i + 1 + " "));
         td.appendChild(a);

         // Add this cell to the appropriate part of the array.
         tableData[i%numRows][Math.floor(i/numRows)] = td;
      }

      // Finally, add all the rows to the table.
      for (var i = 0; i < numRows; i++)
      {
         var tr = document.createElement("tr");
         tr.className = CLASS_NAME;

         for (var j = 0; j < numColumns; j++)
         {
            // This test prevents errors with
            // odd numbers of entries.
            if (i*numColumns + j < feedLength)
            {
               tr.appendChild(tableData[i][j]);
            }
         }

         table.appendChild(tr);
      }

      container.appendChild(table);
   }
}

function OnLoad()
{
   // Create a feed instance that will grab the feed.
   var feed = new google.feeds.Feed("http://rss.cnn.com/rss/cnn_tech.rss");

   // Set the number of entries to retrieve.
   feed.setNumEntries(NUM_ENTRIES);

   // Calling load sends the request off. It requires a callback function.
   feed.load(feedLoaded);
}

google.setOnLoadCallback(OnLoad);
