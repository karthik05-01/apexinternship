<?php
include "db.php";

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
    $conn->query($sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
</head>
<body>

<h2>➕ Add New Post</h2>

<form method="post">
    <input type="text" name="title" placeholder="Enter title" required><br><br>
    <textarea name="content" placeholder="Enter content" required></textarea><br><br>
    <button name="submit">Save</button>
</form>

</body>
</html>
