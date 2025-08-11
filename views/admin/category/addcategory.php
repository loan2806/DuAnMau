<?php
    require_once 'header.php';
?>
<div class="main">
    <aside>
        <?php
        require_once 'sidebar.php';
        ?>
    </aside>
    <main>
        <h1><?=$title?></h1>
        <form action="<?=BASE_URL.'?mode=admin&act=them-danh-muc' ?>" method="POST">
            <input type="text" placeholder="tên danh mục" name="name" />
            <select name="type" >
                <option value="0">Tin tức</option>
                <option value="0">Sản phẩm</option>
            </select>
            <button>Thêm mới</button>
        </form>
    </main>
</div>
<?php
    require_once 'footer.php';
?>