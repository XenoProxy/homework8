<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://fakerapi.it/api/v1/products?");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

if(curl_errno($ch))
{
    echo 'Ошибка curl: ' . curl_error($ch);
}

curl_close($ch);

$data = json_decode($result, true);

echo "<pre>";
print_r($data);
echo "</pre>";
