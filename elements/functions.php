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
    if($errors) {
        echo 'Errors  (' . $errors . '): ' . curl_error($ch);
    } else {
        return json_decode($result, true);
    }
       
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
                <form action="/" method="POST">
                    <input type="hidden" name="id" value="'. $product['id'] .'">
                    <input type="hidden" name="title" value="'. $product['title'] .'">
                    <input type="hidden" name="price" value="'. $product['price'] .'">
                    <input name="addProdToCart" type="submit" value="Add to cart" />
                </form>                
            </div>            
        ';
    }

    if (!empty($html)) {
        echo '<div class="product_list">'. $html .'</div>';
    }
}

function addProdToCart(){

    if ($_POST['id']) {
        $n = count($_COOKIE) + 1;
        $cookie_val = array('id' => $_GET['id'], 'title' => $_GET['title'], 'price' => $_GET['price']);
        $cookie = setcookie('prod' . $n, serialize($cookie_val), time() + 120);        
    }

    if ($cookie) {
        echo '<a href="/cart/" class="cart">Cart</a>';
    }

    
}
