<!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<div class="pd-wrap">
  <link rel="stylesheet" href="./view/assets/css/detail_product.css">
  <script src="https://kit.fontawesome.com/cd29af7a45.js" crossorigin="anonymous"></script>
  <style>
    .detail-comment {
      background: rgb(216, 214, 214);
      padding: .5rem;
      padding-left: .7rem;
      border-radius: .5rem;
      position: relative;
    }

    .detail-comment::before {
      position: absolute;
      top: 20px;
      right: auto;
      bottom: auto;
      left: -12px;
      content: "";
      width: 0;
      height: 0;
      border-left: 8px solid transparent;
      border-right: 8px solid transparent;
      border-bottom: 8px solid rgb(216, 214, 214);
      -webkit-transform: translatey(-50%) rotate(-90deg);
      transform: translatey(-50%) rotate(-90deg);

    }

    a:hover {
      text-decoration: none;
    }
  </style>
  <div class="container">

    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <nav class="d-flex align-items-center">
          <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="index.php?act=detail">Chi tiết sản phẩm</a>
        </nav>
      </div>
    </div>

    <div class="heading-section">
      <h2>Product Details</h2>
    </div>
    <div class="row">
      <?php
      extract($oneproduct);
      ?>
      <div class="col-md-6">
        <div id="slider" class="owl-carousel product-slider">

          <div class="item">
            <?php
            $anh = "upload/" . $image;
            echo '
             <img class="img-fluid" src="' . $anh . '" alt="">
            ';
            ?>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="product-dtl">
          <div class="product-info">
            <div class="product-name"><?= $product_name ?></div>
            <div class="reviews-counter">
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" checked />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" checked />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" checked />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
              </div>
              <span>3 Reviews</span>
            </div>
            <?php
            echo '
            <div class="product-price-discount"><span>$ ' . $price . '</span></div>   
          </div>
          <p>' . $description . '</p>
          ';
            ?>
            <form action="index.php?act=checkout" method="post">
              <div class="row">
                <div class="col-md-6">
                  <label for="size">Size</label>
                  <select name="size" class="form-control">
                    <option value="0">Chọn size</option>
                    <?php
                    $sizes = array_unique(array_column($list_variant, 'size')); // Lấy danh sách các size duy nhất
                    foreach ($sizes as $size) {
                      echo '<option value="' . $size . '">' . $size . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label for="color">Color</label>
                  <select name="color" class="form-control">
                    <option value="0">Chọn màu</option>
                    <?php
                    $colors = array_unique(array_column($list_variant, 'color')); // Lấy danh sách các màu duy nhất
                    foreach ($colors as $color) {
                      echo '<option value="' . $color . '">' . $color . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="product-count">
                <label for="size">Quantity</label>
                <input style="border-color: #dee2e6;width: 100px;border-radius: 5px;" value="0" id="product_amount" name="product_amount" type="number" min="1" max="10">

                <br>
                <div class="checkout_btn_inner d-flex align-items-center">
                  <input type="hidden" name="product_name" value="<?= $product_name ?>">
                  <input type="hidden" name="product_price" value="<?= $price ?>">
                  <input type="hidden" name="product_img" value="<?= $anh ?>">
                  <input type="hidden" name="product_id" value="<?= $product_id ?>">
                  <?php
                  if (isset($_SESSION['username'])) {
                  ?>
                    <input type="submit" class="primary-btn btn mt-2" value="Thêm vào giỏ hàng" name="fake_bill">
                  <?php
                  } else {
                  ?>
                    <a href="index.php?act=login" class="btn primary-btn mt-2">Đăng nhập để mua hàng</a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
      <?php
      $product_id = $_GET['product_id'];
      $dsbl = load_all_cmt($product_id);
      $count_cmt = count($dsbl);
      // echo "<pre>";
      // print_r($dsbl);
      ?>
      <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (<?= $count_cmt ?>)</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <?php echo ($description); ?>
          </div>
          <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="review-heading">REVIEWS</div>
            <!-- <p class="mb-20">There are no reviews yet.</p> -->
            <?php
            if (!empty($dsbl)) {
            ?>


              <div class="group-comment d-flex flex-column mb-3" style="margin-left: 3%;">
                <?php
                foreach ($dsbl as $bl) {
                  extract($bl);
                  $avatar1 = substr($avatar, 1);
                ?>
                  <div class="item-comment mt-4">
                    <div class="avatar">
                      <img src="<?= $avatar1 ?>" style="width: 50px;height: 50px; border-radius: 50%;" alt="">
                    </div>
                    <div class="detail-comment d-flex flex-column">
                      <div class="detail d-flex flex-column">
                        <div class="username" style="color: #000000;font-weight: bold;"><?= $bl['username']  ?></div>
                        <div style="font-size: 14px;" class="time"><?= $date_comment ?></div>
                      </div>
                      <hr>
                      <div class="content"><?= $content ?></div>
                    </div>
                  </div>

                <?php
                }
                ?>
              </div>

            <?php
            } else {
            ?>
              <h5 class="text-center mt-2">No comment</h5>
            <?php
            }
            ?>

            <!-- start form comment -->
            <?php
            if (!empty($list_img_cart)) {
              foreach ($list_img_cart as $cart) {
                extract($cart);
                // echo '<pre>';
                // print_r($cart);
                if ($oneproduct['product_id'] == $cart['4'] && $status == 3) {
            ?>
                  <form class="review-form" method="POST" action="index.php?act=insert_commnet">

                    <div class="form-group">
                      <label>Your message</label>
                      <textarea class="form-control" rows="10" name="content_comment" required></textarea>
                      <input type="hidden" name="product_id" value="<?= $product_id ?>">

                    </div>
          </div>
          <div class="checkout_btn_inner d-flex align-items-center">

            <button type="submit" class="btn primary-btn" name="btn_submit_comment">Submit Review
              <!-- <a class="btn primary-btn" href="">Submit Review</a> -->
            </button>
      <?php
                  break;
                }
              }
            }
      ?>
          </div>
          </form>
        </div>
      </div>
      <!-- single product slide -->
      <div class="single-product-slider">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center mt-5">
              <div class="section-title mt-5">
                <h1>Sản phẩm cùng loại</h1>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- single product -->
            <?php
            foreach ($product_cung_loai as $product_cung_loai) {
              extract($product_cung_loai);
              $linksp = "index.php?act=detail&product_id=" . $product_id;
              $anh = "upload/" . $image;
              echo '
          <div class="col-lg-3 col-md-6">
          <a  href="' . $linksp . '">
          <div class="single-product">
          <img class="img-fluid" src="' . $anh . '" alt="">
          <div class="product-details">
            <h6 style="color:black">' . $product_name . '</h6>
            <div class="price">
              <h6 style="color:black" >$ ' . $price . '</h6>
              <h6 class="l-through">$ ' . $price + 50 . '.00</h6>
            </div>
          </div>
        </div>
          </a>
          </div>
          ';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>