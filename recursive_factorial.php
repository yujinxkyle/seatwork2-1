<!DOCTYPE html>
<html>
<head>
    <title>Factorial Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            color: #007bff;
        }
        input[type="text"] {
            padding: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Factorial Calculator</h1>
    <form method="post">
        <label for="number">Enter a positive integer:</label>
        <input type="text" name="number" id="number" pattern="[0-9]+" required>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = intval($_POST["number"]);

        function factorial_recursive($n) {
            if ($n == 0) {
                return 1;
            } else {
                return $n * factorial_recursive($n - 1);
            }
        }

        if ($num >= 0) {
            $result = factorial_recursive($num);
            echo "<p>The factorial of $num is $result.</p>";
            echo "<p>Step-by-step calculation:</p>";
            echo "$num! = ";
            for ($i = $num; $i > 1; $i--) {
                echo "$i * ";
            }
            echo "1 = $result";
        } else {
            echo "<p>Please enter a positive integer.</p>";
        }
    }
    ?>
</body>
</html>
