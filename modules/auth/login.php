<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Hệ Thống</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f2f5;
        margin: 0;
    }

    .login-box {
        background: white;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        /* Để padding không làm vỡ khung */
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>🔐 Đăng Nhập</h2>

        <?php if(isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="login">

            <input type="text" name="username" placeholder="Tên đăng nhập (admin)" required>
            <input type="password" name="password" placeholder="Mật khẩu (admin123)" required>

            <button type="submit">Vào hệ thống</button>
        </form>
    </div>

</body>

</html>