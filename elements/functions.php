<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://fakerapi.it/api/v1/products?_quantity=1&_taxes=12&_categories_type=uuid");

var_dump(curl_exec($ch));

curl_close($ch);
