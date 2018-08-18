<?php if($check != FALSE) 
{
 ?>
 <div class="container">
  <h2 class="h1 text-capitalize text-center mt-4 mb-4 text-muted">Welcom In The <?php echo $memberdata['Name'] ;?> Items </h2>
  <div class="card mt-5">
        <h2 class="card-header h1 text-light bg-primary text-center">Editing .....</h2>
        <div class="card-body">
           <div class="row">
               <div class="col-lg-8 order-lg-1 order-2 mt-4">
                        <form  class="items" method="post" action="?page=profile&action=update" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo  $memberdata['Item_ID'] ?>">
                            <div class="form-group row justify-content-center ">
                                <label for="name" class="col-md-3 col-form-label col-form-label-lg">Name</label>
                                <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg live-name" name="Name" required  placeholder="Name Of The Items"  value="<?php echo  $memberdata['Name'] ?>">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="password" class="col-md-3 col-form-label col-form-label-lg" >Description</label>
                                <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg live-desc " name="description"   placeholder="Descripe The Items"  value="<?php echo  $memberdata['Description']?>">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="password" class="col-md-3 col-form-label col-form-label-lg" >Price</label>
                                <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg live-price " name="price" required  placeholder="Price of The Items" value="<?php echo  $memberdata['Price']?>">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-md-3 col-form- col-form-label-lg">Country Name</label>
                                <div class="col-md-9">
                                <input type="text" class="form-control form-control-lg" name="country"required placeholder="Country Which Made Of price" value="<?php echo  $memberdata['Country_Made']?>">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-md-3 col-form- col-form-label-lg">Status</label>
                                <div class="col-md-9">
                                <select class="form-control form-control-lg" name="status">
                                <option value="0">....</option>
                                    <option value="1"<?php if($memberdata['Status'] == 1){echo "selected";}?>>New</option>
                                    <option value="2"<?php if($memberdata['Status'] == 2){echo "selected";}?>>Like New</option>
                                    <option value="3"<?php if($memberdata['Status'] == 3){echo "selected";}?>>Used</option>
                                    <option value="4"<?php if($memberdata['Status'] == 4){echo "selected";}?>>Old</option>
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
                                        $sel = "";
                                        if($id == $memberdata['Cat_ID'])
                                        {
                                            $sel = "selected";
                                        }
                                        echo "<option value='$id'  $sel >$name</option>";
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
                                                                  if($id_sub ==$memberdata['Member_ID'] )
                                                                      {
                                                                          $selected3 = 'selected';
                                                                      }
                                                                  echo  "<option value=' $id_sub' $selected3> ------ $nnn</option>";
                                                                  
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
                                <input type="text" class="form-control form-control-lg" name="tags" placeholder="Separe Tags With Comma (,)" value="<?php echo  $memberdata['Tags']?>">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label for="name" class="col-sm-3 col-form- col-form-label-lg">Items Image</label>
                                <div class="col-sm-9">
                                <input type="File" class="form-control form-control-lg" name="avater" placeholder=" chose The Image">
                                </div>
                            </div>
                            <div class="form-group row justify-content-end ">
                                <div class=" col-md-9">
                                 <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-block btn-lg">
                                </div>
                            </div>
                        </form>


               </div>
               <div class="col-lg-4 order-lg-2 order-1">
                <div class="card h-100 items" >
                    <span class="items-price"><i class=' fa text-danger'> $</i> <?php echo  $memberdata['Price']?> </span>
                    <img class="card-img-top preview " src="../app/controller/<?php echo  $memberdata['Image']?>" alt="Card image cap">
                    <div class="card-body ">
                        <h4 class="card-title item-title"> <?php echo  $memberdata['Name']?> </h4>
                        <p class="card-text item-desc"><?php echo  $memberdata['Description']?> </p>
                       
                    </div>
                    <hr>
                    </div>
                </div>
               </div>
           </div>
        </div>
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