<?php
$dbname = getenv('MYSQL_DATABASE');
$dbuser = getenv('MYSQL_USER');
$dbpass = getenv('MYSQL_ROOT_PASSWORD');
$dbhost = getenv('MYSQL_HOST');

// Establish the connection
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully\n";

// Execute a test query
$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($connect, $test_query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}

// Fetch and display the tables
while ($row = mysqli_fetch_row($result)) {
    echo "Table: " . $row[0] . "\n";
}

// Close the connection
mysqli_close($connect);
?>
