<!-- End Header Area -->
<style>
    #paypal-button {
        display: none;
    }
</style>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Giỏ hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.php">Giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="returning_customer">
            <div class="billing_details">
                <div class="row">
                    <?php
                    extract($_SESSION['username']);
                    ?>
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="user" name="username" value="<?= $username ?>">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone">
                                <span class="placeholder" data-placeholder="<?= $phone ?>"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email">
                                <span class="placeholder" data-placeholder="<?= $email ?>"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="user" name="address" value="<?= $address ?>">
                            </div>
                        </form>
                        <section class="cart_area">
                            <h3>Your Order</h3>
                            <?php
                            if (!empty($_SESSION['fake_cart'])) {
                            ?>
                                <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Color</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $total_price = 0;
                                        $i = 0;
                                        foreach ($_SESSION['fake_cart'] as $value) {
                                            // echo '<pre>';
                                            // print_r($value);
                                            $total = $value[2] * $value[4];
                                            $total_price = $total_price + $total;
                                        ?>
                                            <tr>
                                                <td><?= $value[1] ?></td>
                                                <td><img width="70px" src="<?= $value[3] ?>" alt="anh"></td>
                                                <td><?= $value[2] ?></td>
                                                <td><?= $value[4] ?></td>
                                                <td><?= $value[5] ?></td>
                                                <td><?= $value[5] ?></td>
                                                <td><a onclick="return confirm('Bạn muốn xóa sản phẩm')" href="index.php?act=delete_checkout&cart_id=<?= $i++ ?>">xóa</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    </form>
                                </table>
                            <?php
                            } else {
                            ?>
                                <h5 class="text-center">Chưa có sản phẩm nào</h5>
                            <?php
                            }
                            ?>
                        </section>
                    </div>
                    <div class="col-lg-4">
                        <form action="index.php?act=confirmation" method="POST">
                            <div class="order_box">
                                <h2>Your Order</h2>

                                <ul class="list">
                                    <li><a>Product <span>Total</span></a></li>
                                    <?php
                                    $total_price = 0;
                                    foreach ($_SESSION['fake_cart'] as $value) {
                                        // extract($value);
                                        // echo '<pre>';
                                        // print_r($value);
                                        // echo 'hello';
                                        $total = $value[2] * $value[4];
                                        $total_price = $total_price + $total;
                                    ?>
                                        <li><a><?= $value[1] ?> <span class="middle">x <?= $value[4] ?></span> <span class="last">$ <?= $total ?></span></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>

                                <ul class="list list_2">
                                    <li><a>Subtotal <span>$ <?= $total_price ?></span></a></li>
                                    <li><a>Shipping <span>Flat rate: $50.00</span></a></li>
                                    <li><a>Total <span>$ <?= $total_price + 50 ?></span></a></li>
                                </ul>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" class="payment" checked id="f-option5" name="pttt" value="0">
                                        <label for="f-option5">Check payments</label>
                                        <div class="check"></div>
                                    </div>
                                </div>
                                <div class="payment_item active mt-2 ">
                                    <div class="radion_btn">
                                        <input type="radio" class="paypal" id="f-option6" name="pttt" value="1">
                                        <label for="f-option6">Paypal </label>
                                        <div class="check"></div>
                                    </div>
                                    <div id="paypal-button"></div>
                                </div>
                                <div class="d-flex flex-column form-group">
                                    <input type="hidden" id="total_paypal" value="<?= $total_price + 50 ?>">
                                    <a href="index.php"><input class="btn primary-btn form-control" value="Shopping"></a>
                                    <?php
                                    if (isset($_SESSION['fake_cart']) && count($_SESSION['fake_cart']) > 0) {
                                    ?>
                                        <a href=""><input class="btn primary-btn form-control mt-2" type="submit" name="order_bill" value="Hoàn tất đặt hàng"></a>
                                        <a href="index.php?act=delete_all_checkout" onclick="return confirm('Xóa giỏ hàng')"><input class="btn btn-close-white form-control mt-2" value="Xóa giỏ hàng"></a>
                                    <?php
                                    }
                                    ?>

                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</section>
<!--================End Checkout Area =================-->

<!-- start footer Area -->

<!-- End footer Area -->



</body>
<!-- paypal -->
<script src="https://www.paypal.com/sdk/js?client-id=AaX1fuJ8q5PrvEQaUb6nJ-cFFKigmQgcx1VtkPnLP21nLMiEtK3qaiq761vPjIgR54g_xkbygoMIcFny&currency=USD"></script>
<script>
    let total_paypal = document.getElementById("total_paypal").value;
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total_paypal // Can also reference a variable or function
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                const transaction = orderData.purchase_units[0].payments.captures[0];
                alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button');

    $(".paypal").click(function() {
        $("#paypal-button").show();
    });
    $(".payment").click(function() {
        $("#paypal-button").hide();
    });
    $("#paypal-button").css({
        'position': 'relative',
        'z-index': '1'
    });
    // $(".paypal").css('z-index','-1');
</script>