<div class="container">
    <div class="card mt-5">
        <h2 class="card-header h1 text-light bg-primary text-center">New Ads</h2>
        <div class="card-body">
           <div class="row">
               <div class="col-lg-8 order-lg-1 order-2 mt-4">
                        <form  class="items" method="post" action="?page=ads&action=Add"  enctype="multipart/form-data">
                            <div class="form-group row justify-content-center ">
                                <label for="name" class="col-md-3 col-form-label col-form-label-lg">Name</label>
                                <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg live-name" name="Name" required  placeholder="Name Of The Items"  >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="password" class="col-md-3 col-form-label col-form-label-lg" >Description</label>
                                <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg live-desc " name="description"   placeholder="Descripe The Items" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="password" class="col-md-3 col-form-label col-form-label-lg" >Price</label>
                                <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg live-price " name="price" required  placeholder="Price of The Items" >
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-md-3 col-form- col-form-label-lg">Country Name</label>
                                <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg" name="country"required placeholder="Country Which Made Of price">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-md-3 col-form- col-form-label-lg">Status</label>
                                <div class="col-md-9">
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
                                <label for="name" class="col-md-3 col-form- col-form-label-lg">Categories</label>
                                <div class="col-md-9">
                                <select class="form-control form-control-lg" name="cat">
                                <option value="0">....</option>
                                    <?php 
                                    foreach ($datacategories as  $cat) {
                                        # code...
                                        $id = $cat['ID'];
                                        $name= $cat['Name'];
                                        echo "<option value='$id'>$name</option>";
                                        try
                                        {
                                        $datacategories_sub = $getCategories->Get_all_sorting("ID",$sorting='ASC',$cond ="where Parent = $id  ",0 );
                                        }
                                        catch(Exception $ex)
                                        {
                                            $error = $ex->getMessage();
                                            echo $error;
                                        }
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
                                <label for="name" class="col-md-3 col-form- col-form-label-lg">Tags</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control form-control-lg" name="tags" placeholder="Separe Tags With Comma (,)">
                                </div>
                            </div>
                           
                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-sm-3 col-form- col-form-label-lg">Items Image</label>
                                <div class="col-sm-9">
                                <input type="File" class="form-control form-control-lg" name="avater"required placeholder=" chose The Image">
                                </div>
                            </div>

                            <div class="form-group row justify-content-end ">
                                <div class=" col-md-9">
                                 <input type="submit" name="submit"  value="Add" class="btn btn-primary btn-block btn-lg">
                                </div>
                            </div>
                        </form>


               </div>
               <div class="col-lg-4 order-lg-2 order-1">
                <div class="card h-100 items" >
                    <span class="items-price"><i class=' fa text-danger'> $</i> 0 </span>
                    <img class="card-img-top preview" src="image/img_avatar3.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title item-title"> Title </h4>
                        <p class="card-text item-desc"> Description </p>
                        
                    </div>
                    </div>
                </div>
               </div>
           </div>
        </div>
    </div>
</div>