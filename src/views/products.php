<div class="container mt-4">
    <div class="row">
        <?php
        $productClass = new \Application\Models\Products();
        foreach ($productClass->getProducts() as $key => $product) {
        ?>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <a>
                        <img src="<?php echo "../../assets/" . $product->code . ".png" ?>" class="card-img-top" alt="Product">
                    </a>
                    <div class="card-body px-2 pb-2 pt-1">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="h4 text-primary"><?php echo $product->currency . ' ' . $product->price  ?></p>
                            </div>
                            <div>
                                <a class="text-secondary lead" data-toggle="tooltip" data-placement="left" title="Compare">
                                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                        <p class="mb-0">
                            <strong>
                                <a class="text-secondary"><?php echo $product->name ?></a>
                            </strong>
                        </p>
                        <p class="mb-1">
                            <small>
                                <a class="text-secondary"><?php echo $product->code ?></a>
                            </small>
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="col px-0">
                                <form method="post" action="../classes/Cart.php">
                                    <input type="hidden" name="code" value="<?php echo $product->code; ?>" />
                                    <input type="hidden" name="type" value="add" />                                                                   
                                    <button class="btn btn-outline-primary btn-block">
                                        Add To Cart
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

