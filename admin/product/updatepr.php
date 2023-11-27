<?php
if (is_array($product_one)) {
  extract($product_one);
}
$hinh = "../upload/" . $image;
if (is_file($hinh)) {
  $anh = "<img src='" . $hinh . " 'width='100'>";
} else {
  $anh = "không có hình";
}
?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật sản phẩm</h4>
        <form action="index.php?act=updatepr" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="">Danh mục</label>
            <select name="category_id" class="form-select" id="">
              <option value="0">Tất cả</option>
              <?php

              foreach ($result as $result) {
                extract($result);

                if ($category_id == $product_id) $s = "selected";
                else $s = "";
                echo '<option value=" ' . $category_id . '"' . $s . '>' . $category_name . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input name="product_name" type="text" value="<?= $product_name ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Giá</label>
            <input name="price" type="text" value="<?= $price ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <div class="form-control mb-2" style="width:147px">
              <?= $anh ?>
            </div>
            <input class="form-control" type="file" name="image" class="form-control" id="">
          </div>
          <div class="form-group">
            <label for="">Mô tả</label>
            <textarea name="description" id="" cols="" rows="" class="form-control"" ><?= $description ?></textarea>
          </div>
          <div class=" form-group">
              <label for="">Chọn màu</label>
              <div class="color d-flex align-items-center" style="gap: 15px;">
                <div class="">
                  <p>Trắng <input name="color[]" type="checkbox" value="Trắng"></p>
                </div>
                <div class="">
                  <p>Xanh Dương <input name="color[]" type="checkbox" value="Xanh Dương"></p>
                </div>
                <div class="">
                  <p>Đen <input name="color[]" type="checkbox" value="Đen"></p>
                </div>
            </div>
            <div class="form-group">
              <label for="">Chọn size</label>
              <div class="size d-flex align-items-center" style="gap: 15px;">
                <div class="">
                  <p>S <input name="size[]" type="checkbox" value="S"></p>
                </div>
                <div class="">
                  <p>M <input name="size[]" type="checkbox" value="M"></p>
                </div>
                <div class="">
                  <p>L <input name="size[]" type="checkbox" value="L"></p>
                </div>
              </div>
              <div class="form-group">
              <label for="">Số lượng</label>
              <input name="quantity" type="number" class="form-control" required>
            </div>

          <div class=" form-group mt-3">
            <input type="hidden" name="product_id" value="<?= $product_id ?>">
            <input class="btn btn-primary" type="submit" name="capnhatpr" value="Cập nhật">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="index.php?act=list_product"><input class="btn btn-primary" type="button" value="Danh sách"></a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
  }
  ?>