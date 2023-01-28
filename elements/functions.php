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
                <div class="product_info">
                    <h3>' . $product['title'] . '</h3>
                    <div class="product_price">' . $product['price'] . ' $ </div></br>
                    <form action="/" method="POST">
                        <input type="hidden" name="id" value="'. $product['id'] .'">
                        <input type="hidden" name="title" value="'. $product['title'] .'">
                        <input type="hidden" name="price" value="'. $product['price'] .'">
                        <input class ="add" name="addProdToCart" type="submit" value="Add to cart" />
                    </form>
                </div>                
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
        $cookie_val = array('id' => $_POST['id'], 'title' => $_POST['title'], 'price' => $_POST['price']);
        $cookie = setcookie('prod' . $n, json_encode($cookie_val), time() + 120);        
    }

    $html = '';
    $html .= '            
            <img src="../img/shopping-cart.png">
            <div class="cart_count">
                <span>'. $n .'</span>
            </div>
        ';
        
    if ($cookie) {
        echo '<a href="/cart/" class="cart">'. $html .'</a>';
    }
}
