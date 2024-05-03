<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>File Size Information</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333333;
    }

    .info {
        margin-top: 20px;
    }

    .info p {
        margin: 10px 0;
        color: #666666;
    }

    .icon {
        color: #666666;
        margin-right: 10px;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>File Size Information</h1>
        <div class="info">
            <?php
            function formatFileSize($filename) {
                $size = filesize($filename);

                $units = array('B', 'KB', 'MB', 'GB', 'TB');
                $formattedSize = $size;

                for ($i = 0; $size >= 1024 && $i < count($units) - 1; $i++) {
                    $size /= 1024;
                    $formattedSize = round($size, 2);
                }

                return $formattedSize . ' ' . $units[$i];
            }


            $filename = 'E:\NBA.2K23.v2023.02.06\NBA.2K23.v2023.02.06\3O';
            $appname = '3O';
            $fileSize = formatFileSize($filename);
            echo '<p><i class="fas fa-file"></i> ' . $appname . '<br><i class="fas fa-hdd"></i> File size: ' . $fileSize . '</p>';
            ?>
        </div>
    </div>
</body>
</html>
