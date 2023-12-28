<?php
$mysqli = mysqli_connect("sql109.infinityfree.com", "if0_34994316", "xHO8yxiYL3Q", "if0_34994316_create_db");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
    if (isset($_POST['submit']) && $_POST['submit'] === 'insert') {
        $first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);

        $sql = "INSERT INTO create_table (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
        $res = mysqli_query($mysqli, $sql);

        if ($res === TRUE) {
            echo "A record has been inserted.";
        } else {
            printf("Could not insert record: %s\n", mysqli_error($mysqli));
        }
    }

    // Search functionality
    if (isset($_POST['search_lastname']) && $_POST['search_lastname'] === 'Search') {
        $search_last_name = mysqli_real_escape_string($mysqli, $_POST['search_last_name']);

        $search_query = "SELECT first_name, email FROM create_table WHERE LOWER(last_name) = LOWER('$search_last_name')";
        $result = mysqli_query($mysqli, $search_query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<h2>Search Results:</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Name: " . $row['first_name'] . ", Email: " . $row['email'] . "<br>";
            }
        } else {
            echo "No records found for the last name: " . $search_last_name;
        }
    }

    mysqli_close($mysqli);
}
?>


