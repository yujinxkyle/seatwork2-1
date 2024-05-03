<!DOCTYPE html>
<html>
<head>
    <title>Search Word in Timeline.txt File</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #333;
        }

        h1, h2 {
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .file-content {
            overflow: auto;
            max-height: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .highlight {
            background-color: yellow;
        }

        p {
            margin-bottom: 5px;
            font-style: italic;
        }

        .not-found {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Search Word in Text File</h1>

    <form method="post">
        <input type="text" name="searchWord" placeholder="Enter a word">
        <input type="submit" value="Search">
    </form>
    <br>        
    <h2>Timeline.txt</h2>
    <div class="file-content">
        <?php
        $filename = "C:\Users\yujin\OneDrive\Desktop\PIXELS/timeline.txt"; // Change to your text file path

        // Read the file
        $fileContent = file_get_contents($filename);
        if ($fileContent === false) {
            echo "An error occurred while reading the file.";
        } else {
            // Highlight searched word if submitted with a non-empty search query
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["searchWord"]) && !empty(trim($_POST["searchWord"]))) {
                $searchWord = $_POST["searchWord"];

                // Highlight the searched word
                $highlightedContent = preg_replace('/(' . preg_quote($searchWord, '/') . ')/i', '<span class="highlight">$1</span>', $fileContent);

                // Check if any matches were found
                if ($highlightedContent === $fileContent) {
                    // No matches found, keep the original content
                    $highlightedContent = $fileContent;
                }

                // Display search results
                echo nl2br($highlightedContent); // Preserve line breaks
            } else {
                // Display the file content without highlighting
                echo nl2br(htmlspecialchars($fileContent));
            }
        }
        ?>
    </div>

    <?php
    // Display the "Word not found in the file." message if applicable
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["searchWord"]) && !empty(trim($_POST["searchWord"])) && $highlightedContent === $fileContent) {
        echo "<p class='not-found'>Word '$searchWord' not found in the file.</p>";
    }

    if (isset($highlightedContent) && $highlightedContent !== $fileContent) {
        $lines = explode("\n", $fileContent);
        foreach ($lines as $index => $line) {
            if (stripos($line, $searchWord) !== false) {
                echo "<p>Word '$searchWord' found on line " . ($index + 1) . ".</p>";
            }
        }
    }

    ?>

</body>
</html>
