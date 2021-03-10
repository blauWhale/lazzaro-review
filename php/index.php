<?php
$host = "localhost";
$username = "lazzarodb_user";
$password = "12345";
$database = "lazzarodb";
$connection = new MySQLi($host, $username, $password, $database);
if ($connection->connect_error) {
    echo "Failed to connect to MySQL: ("
        . $connection->connect_errno . ") "
        . $connection->connect_error;
}
$connection->set_charset('utf8');


$query = 'INSERT INTO user (email, username, password, moderator) VALUES ("test", "test", "1234", 1)';
$statement = $connection->prepare($query); // can fail because of syntax errors, missing privileges
if (false === $statement) { throw new Exception($connection->error); }
// can fail because the number of parameter doesn't match the placeholders or type conflict
$rc = $statement->bind_param('sssi', $email, $username, $kennwort, $moderator);
if (false === $rc) { throw new Exception($statement->error); }
if (!$statement->execute()) { throw new Exception($statement->error); }
return $statement->insert_id;
