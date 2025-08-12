<?php
require_once './views/admin/header.php';
?>
<div class="main">
    <aside>
        <?php
        require_once './views/admin/sidebar.php';
        ?>
    </aside>
    <main>
    <link rel="stylesheet" href="./views/admin/css/style.css">
    <a href="?mode=admin&act=add_product">Thêm sản phẩm</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Giá khuyến mãi</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
                    foreach ($product as $pro):
                ?>
                <td><?= $pro['id'] ?></td>
                <td><?= $pro['pro_name'] ?></td>
                <td><img src="<?=$pro['img'] ?>" alt=""></td>
                <td><?= $pro['price'] ?></td>
                <td><?= $pro['quantity'] ?></td>
                <td><?= $pro['sale'] ?></td>
                <td>
                    <a href="?mode=">Sửa</a>
                    <a href="?mode=admin&act=detail_product&id=<?= $pro['id'] ?>">Chi tiết</a>
                </td>
                
            </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
        


    </main>
</div>
<?php
require_once './views/admin/footer.php';
?>