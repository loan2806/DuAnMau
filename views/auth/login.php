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
      background: linear-gradient(135deg, #2a9d48, #66c26a);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: white;
      padding: 32px;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 380px;
      animation: fadeIn 0.4s ease-in-out;
    }
    .logo {
      text-align: center;
      font-size: 22px;
      font-weight: 700;
      color: #2a9d48;
      margin-bottom: 20px;
    }
    h2 {
      text-align: center;
      margin-bottom: 24px;
      font-weight: 600;
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
      border-color: #2a9d48;
      outline: none;
    }
    .btn {
      width: 100%;
      background: #2a9d48;
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
      background: #23813c;
    }
    .links {
      margin-top: 16px;
      text-align: center;
      font-size: 14px;
    }
    .links a {
      color: #2a9d48;
      text-decoration: none;
    }
    .links a:hover {
      text-decoration: underline;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="login-box">
    <div class="logo">CAS FRUIT</div>
    <h2>Đăng nhập</h2>
     <?php if (!empty($error)): ?>
      <p><?= $error ?></p>
    <?php endif; ?>
    <form action="?act=login" method="POST">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Nhập email của bạn" >
      </div>
      <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" >
      </div>
      <button type="submit" class="btn">Đăng nhập</button>
    </form>
    <div class="links">
      <a href="#">Quên mật khẩu?</a> • <a href="#">Đăng ký</a>
    </div>
  </div>

</body>
</html>
