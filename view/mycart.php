<!-- End Header Area -->

<!-- back to top-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/back_to_top.png" title='lên đầu trang' width='20px' height="20px" /></button>
<!--end back to top-->
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Giỏ hàng của tôi</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?act=cart">Giỏ hàng của tôi</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Size</th>
                            <th scope="col">Tổng</th>
                            <th scope="col">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_img_cart as $value) {
                            extract($value);
                            $image = "./upload/" . $image;
                        ?>

                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="<?= $image ?>" alt="" width="100">
                                        </div>
                                        <div class="media-body">
                                            <p><?= $product_name ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>$<?= $price ?></h5>
                                </td>
                                <td>
                                    <h5><?= $amount ?></h5>
                                </td>
                                <td>
                                    <h5>
                                        <?= $size ?>
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        <?= $color ?>
                                    </h5>
                                </td>

                                <td>
                                    <h5>
                                        $<?= $total_money  ?>
                                        <!-- tổng -->
                                    </h5>
                                </td>
                                <td>
                                    <?php

                                    if ($status == 0) {
                                        $status = "Đơn hàng mới";
                                    } elseif ($status == 1) {
                                        $status  = "Đang xử lý";
                                    } elseif ($status == 2) {
                                        $status = "Đang giao";
                                    } else {
                                        $status = "Đã giao hàng";
                                    }
                                    ?>
                                    <h5> <?= $status ?></h5>
                                </td>
                                <?php
                                if ($status == 'Đã giao hàng') {
                                ?>
                                    <td style="width: 15%;"><a style="border-radius: .5rem;" class="primary-btn" href="index.php?act=detail&product_id=<?= $product_id ?>">Đánh giá</a></td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

</body>