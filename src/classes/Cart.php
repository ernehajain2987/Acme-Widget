<?php

namespace Application\Classes;

class Cart
{

    public $cartItems = [];

    private $deliveryChargesLookup = [
        'ALPHA' => 4.95,
        'BETA' => 2.95,
        'GAMMA' => 0
    ];

    private $offerProduct = "R01";

    /**
     * AccountController constructor.
     * @param AccountRepository $accountRepository
     */
    public function __construct()
    {
        if (isset($_POST["type"]) && $_POST["type"] == 'add') {
            $this->addItem($_POST);
        }
    }


    public function getCartItemsCount()
    {
        if (isset($_SESSION['session_cart_item'])) {
            return count($_SESSION['session_cart_item']);
        } else {
            return 0;
        }
    }

    public function addItem($postItem)
    {
        $productCode = $postItem['code'];
        if (isset($_SESSION["session_cart_item"][$productCode])) //check item exist in products array
        {
            $_SESSION["session_cart_item"][$productCode]['quantity'] = $_SESSION["session_cart_item"][$productCode]['quantity'] + 1;
        } else {
            $_SESSION["session_cart_item"][$productCode] = $postItem;
            $_SESSION["session_cart_item"][$productCode]['quantity'] = 1;
        }

        header('location: /');
    }

    public function calculateCartValue()
    {
        if (isset($_SESSION["session_cart_item"])) {
            return $this->cartItemWithPrice();
        } else {
            header('location: /');
        }
    }

    public function totalCartValue()
    {

        $this->calculateOffers();
        $this->calculateDeliveryFees();
        $this->cartItems['total'] = $this->cartItems['subtotal'] + $this->cartItems['summary']['delivery'];
        return $this->cartItems;
    }

    protected function cartItemWithPrice()
    {
        $computationForCart = [
            'subtotal' => 0,
            'total' => 0,
            'items' => [],
            'summary' => [
                'delivery' => 0,
                'offer' => 0
            ],
        ];

        $cartItems = $_SESSION["session_cart_item"];

        $productClass = new \Application\Models\Products();
        foreach ($productClass->getProducts() as $pkey => $product) {
            foreach ($cartItems as $key => $item) {
                if ($item['code'] === $product->code) {
                    $price = $item['quantity'] *  $product->price;
                    $computationForCart['items'][] = [
                        "code" => $product->code,
                        "currency" => $product->currency,
                        "name" => $product->name,
                        "price" => $price,
                        "quantity" => $item['quantity']
                    ];
                    $computationForCart['subtotal'] = $computationForCart['subtotal']  + $price;
                }
            }
        }

        $this->cartItems = $computationForCart;

        return $computationForCart;
    }

    protected function calculateDeliveryFees()
    {
        $this->deliveryChargesLookup;
        if ($this->cartItems['subtotal'] < 50) {
            $this->cartItems['summary']['delivery'] = $this->deliveryChargesLookup['ALPHA'];
        } else if ($this->cartItems['subtotal'] < 90) {
            $this->cartItems['summary']['delivery'] = $this->deliveryChargesLookup['BETA'];
        } else {
            $this->cartItems['summary']['delivery'] = $this->deliveryChargesLookup['GAMMA'];
        }
    }

    protected function calculateOffers()
    {
        foreach ($this->cartItems['items'] as $pkey => $product) {
            if ($this->offerProduct === $product['code'] && $product['quantity'] > 1) {
                $singleProductHalf = $product['price'] / $product['quantity'];
                $this->cartItems['summary']['offer'] = $singleProductHalf / 2;
                $this->cartItems['subtotal']  -= $this->cartItems['summary']['offer'];
            }
        }
    }
}
