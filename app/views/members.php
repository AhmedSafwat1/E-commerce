
<?php 
 if(!$check)
 {
    echo"<div class=\"alert alert-danger\" role=\"alert\">
        This Not found any data !
      </div>";
      exit();
 }

?>
<div class="container">
<h2 class="h1 text-center mt-2 mb-4 text-capitalize text-muted"> Edit Member </h2>
    <form  class="" method="post" action="?page=members&action=update" enctype="multipart/form-data">
        <input type="hidden" name="userid" value="<?php echo $memberdata['UserID']?>">
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">User Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="username" required  placeholder="User Name Which acces by to" autocomplete='off' value="<?php echo $memberdata['UserName'] ?>">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label col-form-label-lg" >Password</label>
            <div class="col-sm-10">
            <input type="hidden" class="form-control form-control-lg" name="oldPassword" placeholder="Password" autocomplete="new-password" value="<?php echo $memberdata['Password']?>">
            <input type="password" class="form-control form-control-lg" name="newPassword"  placeholder="leave blank if want Password no change" autocomplete="new-password">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control form-control-lg" name="email" required placeholder="User Name" value="<?php echo $memberdata['Email'] ?>">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Full Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="FullName"required placeholder="Full Name" value="<?php echo $memberdata['FullName'] ?>">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">User Avater</label>
            <div class="col-sm-10">
            <input type="File" class="form-control form-control-lg" name="avater" placeholder=" chose The Image">
            </div>
        </div>
        <div class="form-group row justify-content-end ">
            <div class=" col-sm-10 ">
            <?php 
              if(empty($memberdata['Avater']) == FALSE)
              {
                  echo " <img src=".$memberdata['Avater']." width='200' height=\"200\" class=\"img-fluid img-thumbnail preview\">";
              }
              else
              {
                echo " <img src=\"../resource/image/img_avatar3.png\" width='200' height=\"200\" class=\"img-fluid preview img-thumbnail\">";
              }
            ?>
                 
            </div>
        </div>
        <div class="form-group row justify-content-end ">
            <div class=" col-sm-10">
           <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-block btn-lg">
            </div>
      </div>
   </form> 
</div>