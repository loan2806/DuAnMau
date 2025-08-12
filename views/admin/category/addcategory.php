<?php
require_once 'views/admin/header.php';
?>
<div class="main">
    <aside>
        <?php
        require_once 'views/admin/sidebar.php';
        ?>
    </aside>
    <main>
        <h1><?= $title ?></h1>

        <form action="<?= BASE_URL . '?mode=admin&act=them-danh-muc' ?>" method="POST">
            <input type="text" placeholder="tên danh mục" name="cat_name" />
            
            <button>Thêm mới</button>
            <?php
    if(isset($err)){
        ?>
        <span style="color:red">Thêm danh mục không thành công</span>
        <?php
    }
            ?>
        </form>
    </main>
</div>
<?php
require_once 'views/admin/footer.php';
?>