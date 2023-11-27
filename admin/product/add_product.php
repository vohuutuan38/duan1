<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm sản phẩm</h4>
        <form action="index.php?act=add_product" enctype="multipart/form-data" method="post">
            <div class="form-group">
              <label for="">Tên sản phẩm</label>
              <input name="product_name" type="text" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Giá</label>
              <input name="price" type="number" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Hình sản phẩm</label>
              <input name="image" multiple="multiple" type="file" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Mô Tả</label>
              <input name="description" type="text" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Số lượng</label>
              <input name="quantity" type="number" class="form-control" required>
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
                <label for="">Danh mục</label>
                <select name="category_id" class="form-select" id="" required>
                  <option value="0">Tất cả</option>
                  <?php
foreach ($result as $result) {
    extract($result);
    echo '<option value="' . $category_id . '">' . $category_name . '</option>';
}

?>
                </select>
              </div>

              <div class="form-group mt-3">
                <input class="btn btn-primary" type="submit" name="themmoi" value="Thêm mới">
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