<!DOCTYPE html>
<html>
<head>
    <title>Search Word in Timeline.txt File</title>
    <style>
        /* Existing CSS styles */
        .file-content {
            overflow: auto;
            max-height: 300px; /* Adjust the height as needed */
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        .highlight {
            background-color: yellow; /* Customize the highlight color */
        }
    </style>
</head>
<body>
    <h1>Search Word in Text File</h1>

    <form method="post">
        <input type="text" name="searchWord" placeholder="Enter a word">
        <input type="submit" value="Search">
    </form>

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
        echo "<p>Word not found in the file.</p>";
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
