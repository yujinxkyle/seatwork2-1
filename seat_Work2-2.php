<?php
// Define the number of rows
$rows = 5;

// Outer loop for rows
for ($i = 1; $i <= $rows; $i++) {
    // Inner loop for columns
    for ($j = 1; $j <= $i; $j++) {
        // Print asterisk
        echo "*";
    }
    // Move to the next line after each row
    echo "<br>";
}
?>
