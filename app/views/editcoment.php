<?php 
include_once "../include/function/redirect.php";
 if(!$check)
 {
    $message = "<div class=\"alert alert-danger\" role=\"alert\">
        This Not found any data !
      </div>";
      redirect($message,'back');
      
 }

?>

<div class="container">
<h2 class="h1 text-center mt-2 mb-4 text-capitalize text-muted"> Edit Comments </h2>
<form  class="" method="post" action="?page=comments&action=update">
<input type="hidden" name="id" value="<?php echo $commentdata['C_ID']?>">
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Comment</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="Comment" rows="3"><?php echo $commentdata['Comments']?></textarea>
            </div>
        </div>
       

        <div class="form-group row justify-content-end ">
            <div class=" col-sm-10">
              <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-block btn-lg">
         </div>
      </div>
   </form> 
</div>