<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm sản phẩm</h4>
        <form action="index.php?act=add_product" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <!-- <label for="">Mã sản phẩm</label>
            <input disabled name="product_id" type="text" class="form-control">
          </div> -->
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
              <label for="">So luong</label>
              <input name="quantity" type="number" class="form-control" required>
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