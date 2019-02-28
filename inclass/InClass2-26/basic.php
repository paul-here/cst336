<?php

$otterId = "good9016<br>"; // oooo I guessed with that br bro
echo "My otter id is: " . $otterId;

$newArray = array("one", "two", "three");

// ways to add to arrays: btw we probably can't mix types
$weeddays = array();

$weeddays[]="Monday"; // puts it in the last spot in the array
$weeddays[] = "Tuesday";


array_push($weeddays, "Wednesday", "Thursday", "Friday");

// How do we print it? how do we access indexes?

print_r($weeddays);

// the in_array func
echo "<br>";
echo in_array("Smooozday", $weeddays); // Seems to print nothing if not true

// Now, lab 5 shenanigans
// It will be bold....

// Wait, first....



?>
