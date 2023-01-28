<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/scripts.js"></script>
    <title>MockyMarket</title>    
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php require_once 'functions.php'; ?>
    <header class="header">
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
            <h1>MockyMarket</h1>
        </div>        
        <?php addProdToCart() ?>
    </header>