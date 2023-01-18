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
                <div class="product_price">' . $product['price'] . '</div>
            </div>
        ';
    }

    if (!empty($html)) {
        echo '<div class="product_list">'. $html .'</div>';
    }
    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';       
}
