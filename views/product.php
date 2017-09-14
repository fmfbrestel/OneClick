<?php include ('header.php');?>
    
<main>
    <br><br><br>
    <p><?php echo htmlspecialchars($prodInfo['Name'])?></p>
    <img src="<?php echo htmlspecialchars($prodInfo['Image']); ?>" width="200" height="200">
    <p><?php echo htmlspecialchars($prodInfo['Description']) ?></p>
    <p><?php echo htmlspecialchars('$'.$prodInfo['Price']) ?></p>
    <form id="cart" action="./index.php" method="post">
        <?php if (isset($_SESSION['userInfo']['userName'])): ?>
            <input type="hidden" name="action" value="one_click">
            <input type="hidden" name="product" value="<?php echo htmlspecialchars($prodInfo['ProductID']) ?>">
            <input type="submit" value="Checkout with One Click">
        </form>    
        <?php endif ?>
        <form id="cart" action="./index.php" method="post">            
            <input type="hidden" name="action" value="cart">
            <input type="hidden" name="product" value="<?php echo htmlspecialchars($prodInfo['ProductID']) ?>">
            <input type="submit" value="Add to Cart">
                    
        
    </form>
    <p>Products viewed by people who also viewed this item.</p>
    <ul>
        <?php foreach($viewRelates as $key => $value): ?>
        <?php if ($key != 'ViewID'): ?>
            <li><a href="?action=view_product&product=<?php echo htmlspecialchars($key) ?>"><img src="<?php echo htmlspecialchars(get_prod_image($key)['Image']); ?>" width="200" height="200"></a></li>
        <?php endif ?>
        <?php endforeach; ?>
    </ul>
    <form style="clear: both" action="./index.php" method="post"> 
            <input type="hidden" name="product" value="<?php echo htmlspecialchars($prodInfo['ProductID']) ?>">
            <input type="hidden" name="action" value="save_mississippi">
            <input type="submit" value="Return to Home">
                    
        
    </form>
    <br><br><br>
</main>

<?php include ('footer.php');?>
