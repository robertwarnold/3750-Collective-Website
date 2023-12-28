<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['file'])) {
        $filename = $_GET['file'];

        if (file_exists($filename)) {
            $contents = file_get_contents($filename);
            echo nl2br($contents); // Display contents with line breaks
        } else {
            echo 'File not found.';
        }
    }
}
?>
