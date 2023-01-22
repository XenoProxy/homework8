<?php

function getProducts(){
    $ch = curl_init();
    $options = [
        CURLOPT_URL => "https://fakestoreapi.com/products",
        CURLOPT_RETURNTRANSFER => true
    ];

    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);
    $errors = curl_errno($ch);
    if($errors)
    {
        echo 'Errors  (' . $errors . '): ' . curl_error($ch);
    } else {
        return json_decode($result, true);
    }
    curl_close($ch);    
}

function showProducts(){
    $data = getProducts();
    $html = '';
    
    foreach($data as $product){
        $html .= '
            <div class="product">
                <img src="' . $product['image'] . '" alt="' . $product['title'] . '"/>
                <h3>' . $product['title'] . '</h3>
                <div class="product_price">' . $product['price'] . ' $ </div></br>
                <a class="add_to_cart" 
                    href="/?id='. $product['id'] .
                    '&title='. $product['title'] .
                    '&price='. $product['price'] .
                    '">Add to cart
                </a>
                <form action="/" method="POST">
                    <input type="hidden" name="prod_id" value="'. $product['id'] .'">
                    <input name="addProdToCart" type="submit" value="Add to cart" />
                </form>
            </div>            
        ';

    }

    if (!empty($html)) {
        echo '<div class="product_list">'. $html .'</div>';
    }

    //print_r(addProdToCart());
    //echo addProdToCart();
}

function addProdToCart(){
    // $cart = [];
    if (isset($_POST['prod_id'])){
        // array_push($cart, $_POST['prod_id']);
        $n = count($_COOKIE) + 1;
        setcookie('prod' . $n, serialize($_GET['prod_id']), time() + 1200); 
    }
    //return $_COOKIE;






    //$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
    // if ($_GET['id']) {
    //     $n = count($_COOKIE) + 1;
    //     $cookie = setcookie('prod' . $n, $_GET['id'], time() + 1200, '/');        
    // }

    // $html = '';
    // $html .= '
    //         <div class="cart_count">
    //             <span>'. $n .'</span>
    //         </div>
    //     ';

    // if ($cookie) {
    //     echo '<a href="/cart/" class="cart">'. $html .'</a>';
    // }

    
}
