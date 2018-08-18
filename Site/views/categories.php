<?php if($check != FALSE) 
{
 ?>
 <div class="container">
  <h2 class="h1 text-capitalize text-center mt-4 mb-4 text-muted">Welcom In The <?php echo $namecat ;?> Categories </h2>
  <div class="row">
    <?php 
     foreach ($data as  $value) {
     
    ?>
    <div class="col-lg-4 col-md-6 h-100">
            <div class="card h-100 items" >
                 <span class="items-price"> <i class=' fa text-danger'> $</i> <?php echo $value['Price']?></span>
                <img class="card-img-top" src="image/img_avatar3.png" alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title"><a href="?page=profile&action=view&id=<?php echo $value['Item_ID']?>"><?php echo $value['Name']?> </a></h4>
                    <p class="card-text"><?php echo $value['Description']?>.</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
                <div class="card-footer text-muted text-right">
                     <?php echo $value['Add_Date']?>
                </div>
                </div>
            </div>
  

    <?php } ?>
   </div>
 </div>
   

 <?php 
}else
{
    echo "<div class='container'><div class=\"alert alert-danger mt-4 text-muted text-center\" role=\"alert\">
    Not Have Item To show in This $namecat Categories  !!
    </div>
    </div>";
}
 ?>