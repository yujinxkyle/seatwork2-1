<?php
// Function to check eligibility for voting
function checkEligibility($age) {
    // Minimum voting age
    $votingAge = 18;

    // Checking if age is greater than or equal to the minimum voting age
    if ($age >= $votingAge) {
        return "You are eligible to vote.";
    } else {
        return "You are not eligible to vote. Minimum age required is $votingAge.";
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the age entered by the user
    $age = intval($_POST["age"]);

    // Check if age is a positive integer
    if ($age < 0) {
        $result = "Please enter a positive age.";
    } else {
        // Check eligibility based on the provided age
        $result = checkEligibility($age);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Voter Eligibility Checker</title>
</head>
<body>
    <h2>Voter Eligibility Checker</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Enter your age: <input type="text" pattern="[0-9]*" name="age" required>
        <input type="submit" value="Check Eligibility">
    </form>
    <?php if (isset($result)) { ?>
        <p><?php echo $result; ?></p>
    <?php } ?>
</body>
</html>
