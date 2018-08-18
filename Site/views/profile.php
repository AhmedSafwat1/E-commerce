<?php if($check != FALSE) 
{
 ?>
<div class="container">
    <h2 class="h1 text-muted text-center mt-4">Welcom Profile</h2>
    <div class='information block mt-4'>
      <div class="card ">
       
       
        <h4 class="card-header bg-primary text-light">My Information </h4>
         
        <?php 
             if(empty($user['Avater']))
             {
                 echo " <img class=\"card-img-top\" src=\"image/img_avatar3.png\" alt=\"Card image cap\" width='200' height= '400'>";
             }
             else
             {
                 $ff= $user['Avater'];
                echo " <img class=\"card-img-top\" src='../app/controller/$ff' alt=\"Card image cap\" width='200' height= '400'>";

             }
        ?>
        <div class="card-body">
        <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item"><span><i class="fa fa-unlock-alt fa-fw"></i></span><span> Name : </span><?php echo $user['FullName']?></li>
            <li class="list-group-item"><span><i class="fa fa-user fa-fw"></i><span> User Name : </span><?php echo $user['UserName']?></li>
            <li class="list-group-item"><span><i class="fa fa-envelope fa-fw"></i><span> Email : </span><?php echo $user['Email']?></li>
            <li class="list-group-item"><span><i class="fa fa-calendar fa-fw"></i><span> Regiser Date : </span><?php echo $user['Date']?></li>
            <li class="list-group-item"><span><i class="fa fa-tag fa-fw"></i><span> Favourit Categories : </span><?php echo $user['Email']?></li>
            <div class="card-footer  text-right">
            <a href="#" class="btn btn-primary btn-block  m-auto btn-lg">Edit Information</a>
            </div>
       
        </ul>
        
        </div>
        
       </div>
    </div>

    <div class='my_ads block mt-4' id="items">
      <div class="card ">
        <h4 class="card-header bg-warning text-light">My Adventiuresment </h4>
        <div class="card-body ">
        
        <?php 
          if(empty($items) == FALSE)
          {
            echo " <div class=\"row  \">";
            foreach ($items as  $value) {
            
            ?>
            <div class="col-lg-4 col-md-6 h-100">
                    <div class="card items" >
                        <span class="items-price"><i class='fa text-primary'> $</i> <?php echo $value['Price']?></span>
                       <?php 
                          if($value['Approve'] == 0)
                          {
                              echo " <span class=\"status\">Waiting Approve</span>";
                          }
                       ?>
                        <img class="card-img-top" src="../app/controller/<?php echo $value['Image']?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="?page=profile&action=view&id=<?php echo $value['Item_ID']?>"><?php echo $value['Name']?> </a></h4>
                            <p class="card-text"><?php echo $value['Description']?>.</p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->

                        </div>
                        <hr>
                        <div class="card-body">
                            <a href="?page=profile&action=edit&id=<?php echo $value['Item_ID']?>" class="card-link">Edit</a>
                            <a href="?page=profile&action=delete&id=<?php echo $value['Item_ID']?>" class="card-link">Delete</a>
                        </div>
                        <div class="card-footer text-muted text-right">
                            <?php echo $value['Add_Date']?>
                        </div>
                        </div>
                    </div>
        

            <?php } 
            echo "</div>";
          } else
          {
            echo  "<li class=\"list-group-item p-2 \" >Empty Items !</li>";
            echo "<li class=\"list-group-item p-2 \" >  <a href=\"?page=ads\" class=\"card-link\">Created New Ads</a></li> ";
          }
            ?>
         
        </div>
       </div>
    </div>

    <div class='my-coments block mt-4'>
      <div class="card">
        <h4 class="card-header bg-success text-light"> Latest Comment  </h4>
        <div class="card-body">
            <?php 
               if(empty($comments) == FALSE)
               { 
                   foreach ($comments as $value) {
                       # code...
                   
                  
            ?>

                
                <p>
                  <?php echo $value['Comments'] ;?>
                </p>

            <?php 
               }}
               else
               {
                     echo  "<li class=\"list-group-item p-2 \" >Empty Comments !</li>";
               }
            ?>
        </div>
       </div>
    </div>

  

</div>

<?php 
}else
{
    $message =  "<div class='container'><div class=\"alert alert-danger mt-4 text-muted text-center\" role=\"alert\">
    Not Have User data To show in This profile !!
    </div>
    </div>";
    redirect($message,'back');
}
 ?>