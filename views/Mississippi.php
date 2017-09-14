<?php include ('header.php');?>
    
<main>
    <br><br><br>
    <ul>
        <?php foreach($_SESSION['products'] as $product): ?>
        <li><a href="?action=view_product&product=<?php echo htmlspecialchars($product['ProductID']) ?>"><img src="<?php echo htmlspecialchars($product['Image']); ?>" width="200" height="200"></a></li>
        <?php endforeach; ?>
    </ul>
    <p style="clear:both">We deliver only the best produce!</p>
    <br><br><br>
</main>

<?php include ('footer.php');?>
