<div class="container">
<h2 class="h1 text-center mt-2 mb-4 text-capitalize text-muted"> Add New  Categories </h2>
    <form  class="" method="post" action="?page=Categories&action=Add" >
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="name" required  placeholder="Name Of The Categories" autocomplete='off' >
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label col-form-label-lg" >Description</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg " name="description"   placeholder="Descripe The Categories" >
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Ordering</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="ordering" placeholder="Number Of The Arrange Categories" >
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

                      echo "<option value='$id'>$na</option>";
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
                        <input class="form-check-input" type="radio" name="visible" id="RadiosYes" value="0" checked>
                         Yes
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="visible" id="RadiosNo" value="0"  >
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
                        <input class="form-check-input" type="radio" name="commenting" id="RadiosYes" value="0" checked>
                         Yes
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="commenting" id="RadiosNo" value="0"  >
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
                        <input class="form-check-input" type="radio" name="ads" id="RadiosYes" value="0" checked>
                         Yes
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="ads" id="RadiosNo" value="0"  >
                         No
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-end ">
            <div class=" col-sm-10">
              <input type="submit" name="submit"  value="Add" class="btn btn-primary btn-block btn-lg">
         </div>
      </div>
   </form> 
</div>