
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
header('Content-Type: text/html; charset=utf-8');
include '../pasush.php';
$uid=filter_input(INPUT_POST,"uid",FILTER_SANITIZE_SPECIAL_CHARS);
$nameArr = explode(",",$uid);
$sefer = $nameArr[0];
$sofer = $nameArr[1];
$isbn = $nameArr[2];

$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_query($conn, "SET NAMES 'utf8'");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO books (book_name, book_author, book_year, isbn, owner_id)
VALUES ('$sefer','$sofer' , '', '$isbn', '1')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>