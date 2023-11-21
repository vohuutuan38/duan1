<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật loại hàng</h4>

        <form class="forms-sample" action="index.php?act=updatedm" method="post">
          <div class="form-group">
            <label for="">Mã loại</label>
            <input disabled name="category_id" value="<?php echo $category_one['category_id'] ?>" type="text" class="form-control">
            <input type="hidden" name="category_id" value="<?php echo $categori_one['category_id'] ?>">
          </div>
          <div class="form-group">
            <label for="">Tên loại</label>
            <input name="category_name" type="text" value="<?php echo $category_one['category_name'] ?>" class="form-control" required>
          </div>
          <div class="form-group mt-3">
            <input class="btn btn-gradient-primary me-2" type="submit" name="capnhat" value="Cập nhật">
            <input class="btn btn-secondary" type="reset" value="Nhập lại">
            <a href="index.php?act=list_category"><input class="btn btn-gradient-primary me-2" type="button" value="Danh sách"></a>
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