<!DOCTYPE html>
<html>
<head>
    <title>Search Word in Timeline.txt File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            text-align: center;
            margin: 20px auto;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h1>Search Word in Text File</h1>
    <form method="post">
        <input type="text" name="searchWord" placeholder="Enter a word">
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $filename = "C:\Users\yujin\OneDrive\Desktop\PIXELS/timeline.txt"; // Change to your text file path
        $searchWord = $_POST["searchWord"];

        try {
            $fileHandle = fopen($filename, 'r');
            if ($fileHandle === false) {
                throw new Exception("Error opening the file.");
            }

            $lineNumber = 1;
            $found = false;

            echo "<h2>Search results for: " . htmlspecialchars($searchWord) . "</h2>";

            while (($line = fgets($fileHandle)) !== false) {
                if (stripos($line, $searchWord) !== false) {
                    echo "Word found on line " . $lineNumber . ": " . htmlspecialchars($line) . "<br>";
                    $found = true;
                }
                $lineNumber++;
            }

            if (!$found) {
                echo "Word not found in the timeline.txt file.";
            }

            fclose($fileHandle);
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    }
    ?>

</body>
</html>
