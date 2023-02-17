<?php require_once 'header.php'; ?>

<link rel="stylesheet" href="../css/style.css">
<div class="banner" style="height: 300px;">
    <h1 class="title" style="line-height: 300px;">Cart</h1>
</div> 
<section class="main">
    <div class="prod_block">        
        <?php 
        $sum = 0;
        foreach($_COOKIE as $key => $prod){       
            $prodCart = json_decode($prod, true);
            echo '
                <p class="prod_cart">' . $prodCart['title'] . ': 
                    <span>$' . $prodCart['price'] . '</span>
                    <a href="cart.php?delProd='. $key . '">X</a>
                </p>';
            
            $sum += $prodCart['price'];
            
        }
        
        echo "</br></br>
              <p class='sum_prod'>Total price:" . "<span> \${$sum} </span></p>";
            
        
        if ($_GET['delProd']) {
            setcookie($_GET['delProd'], $prod, time()-2000);
        }
        ?>
    </div>
</section>

<?php require_once 'footer.php';