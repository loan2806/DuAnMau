<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #f6d365, #fda085);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
            width: 400px;
        }
        .register-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .register-container form {
            display: flex;
            flex-direction: column;
        }
        .register-container label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .register-container input {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }
        .register-container input:focus {
            border-color: #fda085;
        }
        .register-container button {
            background: #fda085;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .register-container button:hover {
            background: #f6d365;
        }
        .register-container .link {
            text-align: center;
            margin-top: 10px;
        }
        .register-container .link a {
            color: #fda085;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Đăng ký</h2>
        <?php if (!empty($error)): ?>
      <p><?= $error ?></p>
    <?php endif; ?>
        <form action="" method="POST">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Xác nhận mật khẩu</label>
            <input type="password" id="confirm" name="confirm" required>

            <button type="submit">Đăng ký</button>
        </form>
        <div class="link">
            Đã có tài khoản? <a href="?mode=auth&act=login">Đăng nhập</a>
        </div>
    </div>
</body>
</html>
