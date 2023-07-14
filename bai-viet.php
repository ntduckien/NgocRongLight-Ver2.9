<?php
include_once 'connect.php';

// Lấy bài viết dựa trên ID được truyền vào từ URL
if (isset($_GET['id'])) {
  $post_id = $_GET['id'];
  $sql = "SELECT * FROM posts WHERE id=".$post_id;
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  } else {
    $error_msg = "Bài viết không tồn tại";
  }
} else {
  $error_msg = "Không có ID bài viết";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $row['title']; ?></title>
  </head>

  <body>
    <?php
    if (isset($error_msg)) {
      echo "<p>" . $error_msg . "</p>";
    } else {
      // Hiển thị thông tin về bài viết
      echo '<h1>' . $row['title'] . '</h1>';
      echo '<p>' . $row['content'] . '</p>';
      echo '<p>bởi ' . $row['author'] . ' vào ngày ' . $row['created_at'] . '</p>';
    }
    ?>
  </body>
</html>
