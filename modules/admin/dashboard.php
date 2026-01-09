<?php

require_once __DIR__ . '/../products/ProductController.php';

 $app = new productController();
    $app-> handleRequest();
?>

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
        <h3>nhập hàng mới</h3>

        <form method="post" enctype="multipart/form-data">
            <input type="text" name="ten_sp" planceholder="ten san pham" required>
            <input type="number" name="gia" planceholder="gia san pham" required>
            <input type="file" name="hinh_anh">
            <button type="submit" name="btn_add">them</button>
        </form>
    </div>



    <table>
        <thead>
            <tr>
                <th>hinh</th>
                <th>ten sp</th>
                <th>gia</th>
                <th>hanh dong</th>
            </tr>
        </thead>
    </table>
    <tbody>
        <?php foreach($products as $p):?>
        <tr>
            <td>
                <?php if($p['hinh_anh']): ?>
                <img src="<?= $p['hinh_anh']?>">
                <?php endif;?>
            </td>

            <td><?= htmlspecialchars($p['ten_sp']);?></td>
            <td><?= number_format($p['gia'])?>đ</td>
            <td>
                <a href="index.php?action=delete$id<?=$p['id']?>" onclick="return confirm('ban co muon xoa khong')">
                    xóa</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>

</body>

</html>