<?php require_once 'header.php'; ?>

<link rel="stylesheet" href="../css/style.css">
<div class="banner" style="height: 300px;">
    <h1 class="title" style="line-height: 300px;">Cart</h1>
</div> 
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
            
            echo "<hr><p class='sumProd'>Total price: \${$sum}</p>";
            
            if ($_GET['delProd']) {
                setcookie($_GET['delProd'], $prod, time()-2000);
            }
            ?>
        </div>
        <div class="cartBlock">
            <form class="cartForm" method="POST" action="../success.php">
                <input type="text" placeholder="Name" name="name"><br>
                <input type="email" placeholder="Email" name="email"><br>
                <input type="hidden" name="sum" value="<?php echo $sum ?>">
                <button type="submit">Order</button>
            </form>
    </div>
</section>

<?php require_once 'footer.php';