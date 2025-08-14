<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập - MorningFruit</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      margin: 0;
      background: linear-gradient(120deg, #f6d365, #fda085);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: white;
      padding: 25px 30px;
      border-radius: 10px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      width: 400px;
      /* đồng bộ với form đăng ký */
      animation: fadeIn 0.4s ease-in-out;
    }

    .logo {
      text-align: center;
      font-size: 22px;
      font-weight: 700;
      color: #fda085;
      margin-bottom: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 24px;
      font-weight: 600;
      color: #333;
    }

    .form-group {
      margin-bottom: 16px;
    }

    label {
      font-size: 14px;
      color: #555;
      margin-bottom: 6px;
      display: block;
    }

    input {
      width: 100%;
      padding: 10px 14px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    input:focus {
      border-color: #fda085;
      outline: none;
    }

    .btn {
      width: 100%;
      background: #fda085;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #f6d365;
    }

    .links {
      margin-top: 16px;
      text-align: center;
      font-size: 14px;
    }

    .links a {
      color: #fda085;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>

</head>

<body>
  <?php

  $isLogin = $_SESSION['islogin'] ?? null;
  if ($isLogin) {
    header("Location: " . BASE_URL);
    exit();
  }

  ?>
  <div class="login-box">
    <div class="logo">CAS FRUIT</div>
    <h2>Đăng nhập</h2>
    <?php if (!empty($error)): ?>
      <p><?= $error ?></p>
    <?php endif; ?>
    <form action="?act=login" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Nhập email của bạn">
      </div>
      <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu">
      </div>
      <button type="submit" class="btn">Đăng nhập</button>
    </form>
    <div class="links">
      <a href="#">Quên mật khẩu?</a> • <a href="?mode=auth&act=register">Đăng ký</a>
    </div>
  </div>

</body>

</html>