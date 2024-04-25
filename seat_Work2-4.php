<?php
// Function to calculate factorial
function factorial($n) {
    // Base case: factorial of 0 or 1 is 1
    if ($n == 0 || $n == 1) {
        return 1;
    }
    
    // Initialize the factorial variable to store the result
    $factorial = 1;
    
    // Calculate factorial using a for loop
    for ($i = 2; $i <= $n; $i++) {
        $factorial *= $i;
    }
    
    // Return the factorial
    return $factorial;
}

// Define the maximum number for which factorial needs to be calculated
$maxNumber = 10;

// Calculate and print factorial for numbers from 1 to maxNumber
for ($i = 1; $i <= $maxNumber; $i++) {
    // Calculate factorial
    $result = factorial($i);
    
    // Print the factorial pattern
    echo "$i! = ";
    for ($j = $i; $j >= 1; $j--) {
        echo $j;
        if ($j > 1) {
            echo " * ";
        }
    }
    echo " = $result<br>";
}
?>
