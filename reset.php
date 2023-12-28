<?php
// Check if this is the user's first visit
if (!isset($_COOKIE['first_visit'])) {
    // Create the cookie to indicate the first visit
    setcookie('first_visit', '1', time() + 365 * 24 * 3600); // Expires in 1 year

    // Create the four text files
    $files = ['prime.txt', 'armstrong.txt', 'fibonacci.txt', 'none.txt'];
    foreach ($files as $file) {
        file_put_contents($file, "");
    }

    echo 'Data reset successfully.';
} else {
    echo 'Cookie not set.';
}
?>
