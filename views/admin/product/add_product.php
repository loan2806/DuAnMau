

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
      <form action="" method="post">
     <label for="pro_name">Tên sản phẩm</label>
      <input type="text" id="pro_name" name="pro_name" >
      <br>
     <label for="price">Giá sản phẩm</label>
      <input type="number" id="price" name="price" >
      <br>
     <label for="img">Hình ảnh </label>
      <input type="file" id="img" name="img" >
      <br>
     <label for="quantity">Số lượng </label>
      <input type="number" id="quantity" name="quantity" >
      <br>
     <label for="sale">Khuyến mãi</label>
      <input type="number" id="sale" name="sale" >
      <br>
     <label for="status">Trạng thái</label>
     <select name="status" id="">
        <option value="0">Không bán</option>
        <option value="1">Bán</option>
     </select>
      <br>
      <label for="cate_id">Danh mục</label>
     <select name="cate_id" id="">
        <option value="0">Vui lòng chọn danh mục</option>
       <?php 
       foreach ($category as $cate):
       ?>
        <option value="<?=$cate['id']?>"><?=$cate['name']?></option>
        <?php endforeach; ?>
     </select>
  </form>
        


    </main>
</div>
<?php
require_once './views/admin/footer.php';
?>