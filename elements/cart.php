<?php require_once 'header.php'; ?>

<section class="main">
    <div class="cartFlex">
        <div class="prodBlock">
        
        <?php 
        $sum = 0;
        foreach($_COOKIE as $key => $prod){       
            $prodCart = json_decode($prod, true);
            echo '<p class="prodCart">' . $prodCart['title'] . ': $' . $prodCart['price'] . '</p>';
            
            $sum += $prodCart['price'];
            
        }
        echo "<hr><p class='sumProd'>\${$sum}</p>";
        
        if ($_GET['delProd']) {
            setcookie($_GET['delProd'], $prod, time()-2000);
        }
        ?>

        </div>
    </div>
</section>

<?php require_once 'footer.php';