<!DOCTYPE html>
<html>
<head>
    <title>Chess Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
        }
        table {
            width: 400px;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            transform: perspective(800px) rotateX(30deg);
        }
        td {
            height: 30px;
            width: 30px;
            text-align: center;
            font-weight: bold;
            border: 2px solid #1c1d1d;
        }
        .black {
            background-color: #2c2d2d;
            color: #fff;
        }
        .white {
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
    <h1>3D Chess Board</h1>
    <table>
        <?php
            for ($row = 0; $row < 8; $row++) {
                echo "<tr>";
                for ($col = 0; $col < 8; $col++) {
                    if (($row + $col) % 2 == 0) {
                        echo "<td class=\"white\"></td>";
                    } else {
                        echo "<td class=\"black\"></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
