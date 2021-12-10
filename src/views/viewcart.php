<div class="container-fluid mt-4">


    <div class="row">
        <div class="col-8">
            <?php
            $cart = new \Application\Classes\Cart();
            $cartValue = $cart->calculateCartValue();

            $overall = $cart->totalCartValue();

            foreach ($cartValue['items'] as $key => $product) {
            ?>

                <div class="col-12 items">
                    <!--1-->
                    <div class="cartItem row align-items-start">
                        <div class="col-5 mb-2">
                            <h6 class=""><?php echo $product['name']; ?></h6>
                            <p class=""><?php echo $product['code']; ?></p>
                        </div>
                        <div class="col-2">
                            <p class="cartItemQuantity p-1 text-center"><?php echo $product['quantity']; ?></p>
                        </div>
                        <div class="col-2">
                            <p id="cartItem1Price"><?php echo $product['currency'] . ' ' . $product['price']; ?></p>
                        </div>
                    </div>
                    <hr>
                </div>

            <?php } ?>
        </div>
        <div class="col-4 p-4 card border-dark mb-3">
            <div class="row m-0">
                <div class="col-sm-8 p-0">
                    <h6>Subtotal</h6>
                </div>
                <div class="col-sm-4 p-0">
                    <p id="subtotal">
                        <?php
                        echo $overall['subtotal'];
                        ?>
                    </p>
                </div>
            </div>
            <?php if (isset($overall['summary']['delivery'])) { ?>
                <div class="row m-0">
                    <div class="col-sm-8 p-0 ">
                        <h6>Delivery</h6>
                    </div>
                    <div class="col-sm-4 p-0">
                        <p id="tax"><?php echo $overall['summary']['delivery']; ?> </p>
                    </div>
                </div>
            <?php } ?>
            <?php if (isset($overall['summary']['offer']) && $overall['summary']['offer'] > 0) { ?>
                <div class="row m-0">
                    <div class="col-sm-8 p-0 ">
                        <h6>Offer</h6>
                    </div>
                    <div class="col-sm-4 p-0">
                        <p id="tax"> - <?php echo $overall['summary']['offer']; ?> </p>
                    </div>
                </div>
            <?php } ?>
            <hr>
            <div class="row mx-0 mb-2">
                <div class="col-sm-8 p-0 d-inline">
                    <h5>Total</h5>
                </div>
                <div class="col-sm-4 p-0">
                    <p id="total">
                        <?php
                        echo $overall['total'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>