<?php
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerpartial.php';
include 'includes/leftbar.php';

if(isset($_GET['cat'])){
  $cat_id=sanitize($_GET['cat']);
}else{
  $cat_id ='';
}
$sql = "SELECT * FROM products WHERE categories ='$cat_id'";
$productQ =$db->query($sql);
$category =get_category($cat_id);
?>


    <!--Main content -->
    <div class="col-md-8">
    <div class="row">
    <h2 class="text-center"><?=$category['parent'].' '.$category['child'];?></h2>
     <?php while($products =mysqli_fetch_assoc($productQ)) :?>
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
