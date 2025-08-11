<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL . 'views/client/css/style.css' ?>">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="container flex" style="align-items: center;">
            <div class="logo">
                <a style="display: block; min-width: max-content;" href="<?= BASE_URL ?>">CAS FRUIT</a>
            </div>
            <div class="right-header flex">
                <nav>
                    <ul class="flex">
                        <li>
                            <a href="#">Trang chủ</a>
                        </li>
                        <li>
                            <a href="#">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="#">Tin tức</a>
                        </li>
                        <li>
                            <a href="#">Liên hệ</a>
                        </li>
                </nav>
                <form>
                    <input type="text" placeholder="search" required />
                    <button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z" />
                        </svg></button>
                </form>
            </div>
            <div style="display:flex; align-items:center; gap:10px; font-family:sans-serif; font-size:14px;">
                <?php
                $isLogin = $_SESSION['islogin'] ?? null;
                if ($isLogin) {
                    echo "<span style='color:#333; font-weight:bold;'>" . ($_SESSION['name'] ?? "khongbiet") . "</span>";
                    echo "<a href='?act=logout' style='color:#fff; background:#e74c3c; padding:6px 10px; text-decoration:none; border-radius:4px;'>Đăng Xuất</a>";
                } else {
                    echo "<a href='?act=login' style='display:flex;min-width: max-content;   color:#fff; background:#3498db; padding:6px 10px; text-decoration:none; border-radius:4px;'>Đăng nhập</a>";
                }
                ?>
            </div>

        </div>
    </header>