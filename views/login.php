<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>

<body>
    <h2>Đăng Nhập</h2>
    <?php if(isset($error)) echo "<p>$error</p>";?>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="login">
        <input type="text" name="username" required>
        <input type="password" name="password" required>
        <button type="submit"> vao he thong</button>
    </form>


</body>

</html>