<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tiem cam do</title>
</head>

<body>
    <div>
        <!-- div header -->
        <h2>Hệ Thông Cầm Đồ</h2>
        <a href="index.php?action-logout"> Đăng Xuất</a>
    </div>


    <div>
        <!-- div tim kiem-->
        <form action="index.php" method="get">
            <input type="text" name="keyword" placeholder="tim kiem"
                value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']): '' ?>">
            <button type="submit">tim</button>
        </form>
    </div>

    <div>

    </div>

</body>

</html>