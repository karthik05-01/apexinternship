<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
$result = $conn->query("SELECT * FROM posts ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
</head>
<body>

<h2>📝 My Blog</h2>

<a href="create.php">➕ Add New Post</a>
<p>Welcome, <?php echo $_SESSION['user']; ?> |
<a href="logout.php">Logout</a></p>
<hr>

<?php while($row = $result->fetch_assoc()) { ?>
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['content']; ?></p>
    <small>Posted on: <?php echo $row['created_at']; ?></small><br>
    <a href="edit.php?id=<?php echo $row['id']; ?>">✏️ Edit</a> |
    <a href="delete.php?id=<?php echo $row['id']; ?>">❌ Delete</a>

    <hr>
<?php } ?>

</body>
</html>
