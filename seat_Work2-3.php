<?php
// Define the number of rows
$rows = 5;

// Upper half of the pattern
for ($i = 1; $i <= $rows; $i++) {
    // Inner loop for columns
    for ($j = 1; $j <= $i; $j++) {
        // Print asterisk
        echo "*";
    }
    // Move to the next line after each row
    echo "<br>";
}

// Lower half of the pattern
for ($i = $rows - 1; $i >= 1; $i--) {
    // Inner loop for columns
    for ($j = 1; $j <= $i; $j++) {
        // Print asterisk
        echo "*";
    }
    // Move to the next line after each row
    echo "<br>";
}
?>
