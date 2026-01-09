<?php
// Đảm bảo đường dẫn này đúng với cấu trúc thư mục của bạn
require_once __DIR__ . '/../Controller/ProductController.php';

$controller = new ProductController();
$products = $controller->handleRequest();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cầm Đồ Tiết Kiệm</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background: #f4f4f4;
    }

    .box {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    h2 {
        text-align: center;
        color: #333;
    }

    input,
    button {
        display: block;
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        box-sizing: border-box;
    }

    button {
        background: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
    }

    button:hover {
        background: #218838;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    th,
    td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background: #007bff;
        color: white;
    }

    img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .btn-del {
        color: white;
        background: #dc3545;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 12px;
    }
    </style>
</head>

<body>
    <h2>💎 Cầm Đồ Tiết Kiệm</h2>

    <div class="box">
        <h3>Thêm sản phẩm</h3>
        <form method="post" enctype="multipart/form-data">
            <label>Tên sản phẩm</label>
            <input type="text" name="ten_sp" required placeholder="Nhập tên sản phẩm">

            <label>Giá sản phẩm</label>
            <input type="number" name="gia" required placeholder="Nhập giá sản phẩm">

            <label>Hình ảnh</label>
            <input type="file" name="hinh_anh">

            <button type="submit" name="btn_add">Thêm sản phẩm</button>
        </form>
    </div>

    <div>
        <h3>Kho hàng tiện lợi</h3>
        <table>
            <thead>
                <tr>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)): ?>
                <?php foreach($products as $p): ?>
                <tr>
                    <td>
                        <?php if($p['hinh_anh']): ?>
                        <img src="./<?= $p['hinh_anh'] ?>">
                        <?php else: ?>
                        <span>Ko có hình</span>
                        <?php endif; ?>
                    </td>

                    <td><?= htmlspecialchars($p['ten_sp']) ?></td>
                    <td><?= number_format($p['gia']) ?> đ</td>

                    <td>
                        <a href="index.php?action=delete&id=<?= $p['id'] ?>" class="btn-del"
                            onclick="return confirm('Bạn có chắc muốn xóa?');">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="4">Chưa có sản phẩm nào.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>