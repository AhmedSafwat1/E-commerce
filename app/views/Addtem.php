<div class="container">
<h2 class="h1 text-center mt-2 mb-4 text-capitalize text-muted"> Add New  Items </h2>
    <form  class="" method="post" action="?page=item&action=Add" enctype="multipart/form-data">
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="Name" required  placeholder="Name Of The Items"  >
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label col-form-label-lg" >Description</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg " name="description"   placeholder="Descripe The Items" >
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label col-form-label-lg" >Price</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg " name="price" required  placeholder="Price of The Items" >
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Country Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="country"required placeholder="Country Which Made Of price">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Status</label>
            <div class="col-sm-10">
            <select class="form-control form-control-lg" name="status">
               <option value="0">....</option>
                <option value="1">New</option>
                <option value="2">Like New</option>
                <option value="3">Used</option>
                <option value="4">Old</option>
            </select>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Member</label>
            <div class="col-sm-10">
            <select class="form-control form-control-lg" name="Members">
               <option value="0">....</option>
                <?php 
                  foreach ($datamember as  $member) {
                      # code...
                      $id = $member['UserID'];
                      $name= $member['UserName'];
                      echo "<option value='$id'>$name</option>";
                    //   echo " <option value='$id'>$member['UserName']</option>";
                  }
                ?>
            </select>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Categories</label>
            <div class="col-sm-10">
            <select class="form-control form-control-lg" name="cat">
               <option value="0">....</option>
                <?php 
                  foreach ($datacategories as  $cat) {
                      # code...
                      $id = $cat['ID'];
                      $name= $cat['Name'];
                      try
                      {
                      $datacategories_sub = $getCategories->Get_all_sorting("ID",$sorting='ASC',$cond ="where Parent = $id  ",0 );
                      }
                      catch(Exception $ex)
                      {
                          $error = $ex->getMessage();
                          echo $error;
                      }
                      echo "<option value='$id'>$name</option>";
                      if(empty($datacategories_sub) == FALSE)
                                        {
                                            foreach ($datacategories_sub  as  $valuesub) {
                                                $id_sub = $valuesub['ID'];
                                                $nnn = $valuesub['Name'];
                                                echo  "<option value=' $id_sub'> ------ $nnn</option>";
                                                
                                            } 
                                            
                                        }
                    //   echo " <option value='$id'>$member['UserName']</option>";
                  }
                ?>
            </select>
            </div>
        </div>
  
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Tags</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="tags" placeholder="Separe Tags With Comma (,)">
            </div>
        </div>
         
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Items Image</label>
            <div class="col-sm-10">
            <input type="File" class="form-control form-control-lg" name="avater"required placeholder=" chose The Image">
            </div>
        </div>
        <div class="form-group row justify-content-end ">
            <div class=" col-sm-10 ">
                 <img src="../resource/image/img_avatar3.png" width='200' height="200" class="img-fluid img-thumbnail preview">
            </div>
        </div>

        <div class="form-group row justify-content-end ">
            <div class=" col-sm-10">
           <input type="submit" name="submit"  value="Add" class="btn btn-primary btn-block btn-lg">
         </div>
      </div>
   </form> 
</div>