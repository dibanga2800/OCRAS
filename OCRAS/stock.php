<?php
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerful.php';
include 'includes/leftbar.php';

$sql ="SELECT * FROM products WHERE featured =1";
$featured=$db->Query($sql);
?>

<!--Main content -->
<div class="col-md-8">
<div class="row">
<h2 class="text-center">Feature Products</h2>
<?php while($products =mysqli_fetch_assoc($featured)) :?>
<div class="col-md-3">

<h4 class="text-center"><?php echo $products['title']; ?></h4>
<img src="<?php echo $products['image']; ?>" alt="<?= $products['title']; ?>" class="img-thumb" />
<p class="List-price text-danger text-center">List Price: <s>£<?= $products['list_price']; ?></s></p>
<p class="price text-center">Our Price: £<?= $products['price']; ?></p>
<button type="button" class=" btn-primary " onclick="detailsmodal(<?=$products['id']; ?>)">Details</button></div>

<?php endwhile; ?>
</div>
</div>

<?php

include 'includes/rightbar.php';
include 'includes/footer.php';
?>
