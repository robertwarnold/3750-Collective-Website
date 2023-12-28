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
}

// Function to check if a number is prime
function isPrime($num) {
    if ($num < 2) return false;
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

// Function to check if a number is Armstrong
function isArmstrong($num) {
    $temp = $num;
    $sum = 0;
    $n = strlen($num);
    while ($temp != 0) {
        $r = $temp % 10;
        $sum += pow($r, $n);
        $temp = floor($temp / 10);
    }
    return $sum == $num;
}

function isPerfectSquare($num) {
    $s = (int)sqrt($num);
    return ($s * $s == $num);
}

function isFibonacci($num) {
    // A number is Fibonacci if and only if one of (5 * n^2 + 4) or (5 * n^2 - 4) is a perfect square
    return isPerfectSquare(5 * $num * $num + 4) || isPerfectSquare(5 * $num * $num - 4);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['numbers'])) {
        $numbers = explode(",", $_POST['numbers']);
        
        foreach ($numbers as $num) {
            $num = trim($num);
            if (is_numeric($num)) {
                $num = (int)$num;
                if (isPrime($num)) {
                    file_put_contents('prime.txt', $num . PHP_EOL, FILE_APPEND);
                } elseif (isArmstrong($num)) {
                    file_put_contents('armstrong.txt', $num . PHP_EOL, FILE_APPEND);
                } elseif (isFibonacci($num)) {
                    file_put_contents('fibonacci.txt', $num . PHP_EOL, FILE_APPEND);
                } else {
                    file_put_contents('none.txt', $num . PHP_EOL, FILE_APPEND);
                }
            }
        }
    }
}
?>
