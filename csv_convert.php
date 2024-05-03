<!DOCTYPE html>
<html>
<head>
    <title>Display CSV Data</title>
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
    <h1>CSV Data</h1>
    <table>
        <thead>
            <tr>
                <?php
                $filename = 'C:\xampp\htdocs\customers-100.csv'; // Change to your CSV file name
                if (($handle = fopen($filename, 'r')) !== false) {
                    $headers = fgetcsv($handle);
                    foreach ($headers as $header) {
                        echo '<th>' . htmlspecialchars($header) . '</th>';
                    }
                    fclose($handle);
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if (($handle = fopen($filename, 'r')) !== false) {
                // Skip the header row
                fgetcsv($handle);
                while (($data = fgetcsv($handle)) !== false) {
                    echo '<tr>';
                    foreach ($data as $value) {
                        echo '<td>' . htmlspecialchars($value) . '</td>';
                    }
                    echo '</tr>';
                }
                fclose($handle);
            }
            ?>
        </tbody>
    </table>
</body>
</html>
