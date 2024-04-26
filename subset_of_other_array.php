<!DOCTYPE html>
<html>
<head>
    <title>Array Subset Checker</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Array Subset Checker</h1>
    <form method="post">
        <label for="large_array">Enter the large array (comma-separated numeric values):</label>
        <input type="text" name="large_array" id="large_array" pattern="[0-9,]+" required><br>
        <label for="small_array">Enter the small array (comma-separated numeric values):</label>
        <input type="text" name="small_array" id="small_array" pattern="[0-9,]+" required><br>
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $large_array = explode(",", $_POST["large_array"]);
        $small_array = explode(",", $_POST["small_array"]);

        function is_subset($small_array, $large_array) {
            // Compute the difference between the large array and the small array
            $diff = array_diff($small_array, $large_array);
            
            // If the difference is empty, the small array is a subset of the large array
            return empty($diff);
        }

        // Display the input arrays
        echo "<p>Large Array: " . implode(", ", $large_array) . "</p>";
        echo "<p>Small Array: " . implode(", ", $small_array) . "</p>";
    

        if (is_subset($small_array, $large_array)) {
            echo "<p>The second array is a subset of the first array.</p>";
        } else {
            echo "<p>The second array is not a subset of the first array.</p>";
        }

        }
    ?>
</body>
</html>
