<?php
header("Content-type: text/xml");

$stateCapitals = array(
    "Alabama" => "Montgomery",
    "Alaska" => "Juneau",
    "Arizona" => "Phoenix",
    "Arkansas" => "Little Rock",
    "California" => "Sacramento",
    "Colorado" => "Denver",
    "Connecticut" => "Hartford",
    "Delaware" => "Dover",
    "Florida" => "Tallahassee",
    "Georgia" => "Atlanta",
    "Hawaii" => "Honolulu",
    "Idaho" => "Boise",
    "Illinois" => "Springfield",
    "Indiana" => "Indianapolis",
    "Iowa" => "Des Moines",
    "Kansas" => "Topeka",
    "Kentucky" => "Frankfort",
    "Louisiana" => "Baton Rouge",
    "Maine" => "Augusta",
    "Maryland" => "Annapolis",
    "Massachusetts" => "Boston",
    "Michigan" => "Lansing",
    "Minnesota" => "St. Paul",
    "Mississippi" => "Jackson",
    "Missouri" => "Jefferson City",
    "Montana" => "Helena",
    "Nebraska" => "Lincoln",
    "Nevada" => "Carson City",
    "New Hampshire" => "Concord",
    "New Jersey" => "Trenton",
    "New Mexico" => "Santa Fe",
    "New York" => "Albany",
    "North Carolina" => "Raleigh",
    "North Dakota" => "Bismarck",
    "Ohio" => "Columbus",
    "Oklahoma" => "Oklahoma City",
    "Oregon" => "Salem",
    "Pennsylvania" => "Harrisburg",
    "Rhode Island" => "Providence",
    "South Carolina" => "Columbia",
    "South Dakota" => "Pierre",
    "Tennessee" => "Nashville",
    "Texas" => "Austin",
    "Utah" => "Salt Lake City",
    "Vermont" => "Montpelier",
    "Virginia" => "Richmond",
    "Washington" => "Olympia",
    "West Virginia" => "Charleston",
    "Wisconsin" => "Madison",
    "Wyoming" => "Cheyenne"
);

echo "<?xml version=\"1.0\" ?>\n";
echo "<results>\n";

$query = strtolower($_GET['query']); // Convert query to lowercase for case-insensitive search

foreach ($stateCapitals as $state => $capital) {
    if (stristr($state, $query)) {
        echo "<result><state>$state</state><capital>$capital</capital></result>\n";
    }
}

echo "</results>\n";
?>
