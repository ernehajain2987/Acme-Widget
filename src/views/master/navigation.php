<?php
  $cart = new \Application\Classes\Cart();
  $itemAddedToCartCount = $cart->getCartItemsCount();
?>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php">Acme Widget Corp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSection" aria-controls="navbarSection" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSection">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">
          View Cart
          <?php echo ($itemAddedToCartCount > 0 ?  '('. $itemAddedToCartCount .')' : "") ?>
        </a>
      </li>
    </ul>
  </div>
</nav>