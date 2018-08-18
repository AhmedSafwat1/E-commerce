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
<h2 class="h1 text-center mt-2 mb-4 text-capitalize text-muted"> Edit Categories </h2>
<form  class="" method="post" action="?page=Categories&action=update">
<input type="hidden" name="id" value="<?php echo $catdata['ID']?>">
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="name" required  placeholder="Name Of The Categories" autocomplete='off'  value="<?php echo $catdata['Name'] ;?>">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label col-form-label-lg" >Description</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg " name="description"   placeholder="Descripe The Categories"  value="<?php echo $catdata['Description'] ;?>" >
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Ordering</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="ordering" placeholder="Number Of The Arrange Categories" value="<?php echo $catdata['Ordering'] ;?>" >
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Parent ?</label>
            <div class="col-sm-10">
            <select class="form-control form-control-lg" name="parent">
               <option value="0">None</option>
               <?php
                   foreach ($datacategories as $value) {
                       $na = $value['Name'];
                       $id = $value['ID'];
                       $sss = "";
                       if($catdata['Parent'] == $id)
                       {
                        $sss="selected";
                       }
                      echo "<option value='$id' $sss>$na</option>";
                   }
               ?>
            </select>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Visible</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="visible" id="RadiosYes" value="0" <?php if ($catdata['Visiblity'] == 0) {echo 'checked' ;}?> >
                         Yes
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="visible" id="RadiosNo" value="1"  <?php if ($catdata['Visiblity'] == 1) {echo 'checked' ;}?> >
                         No
                    </label>
                </div>
            </div>
        </div>
        
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Allow Commenting</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="commenting" id="RadiosYes" value="0" <?php if ($catdata['Allow_Comments'] == 0) {echo 'checked' ;}?>>
                         Yes
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="commenting" id="RadiosNo" value="1"  <?php if ($catdata['Allow_Comments'] == 1) {echo 'checked' ;}?> >
                         No
                    </label>
                </div>
            </div>
        </div>

         <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Allow Ads</label>
            <div class="col-sm-10">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="ads" id="RadiosYes" value="0"  <?php if ($catdata['Allow_Ads'] == 0) {echo 'checked' ;}?>>
                         Yes
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="ads" id="RadiosNo" value="1"   <?php if ($catdata['Allow_Ads'] == 1) {echo 'checked' ;}?> >
                         No
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-end ">
            <div class=" col-sm-10">
              <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-block btn-lg">
         </div>
      </div>
   </form> 
</div>