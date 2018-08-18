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
<h2 class="h1 text-center mt-2 mb-4 text-capitalize text-muted"> Edit  Items </h2>
    <form  class="" method="post" action="?page=item&action=update" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $memberdata['Item_ID']?>">
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="Name" required  placeholder="Name Of The Items" value="<?php echo $memberdata['Name']?>" >
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label col-form-label-lg" >Description</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg " name="description"   placeholder="Descripe The Items" value="<?php echo $memberdata['Description']?>"`>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label col-form-label-lg" >Price</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg " name="price" required  placeholder="Price of The Items" value="<?php echo $memberdata['Price']?>">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Country Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="country"required placeholder="Country Which Made Of Items" value="<?php echo $memberdata['Country_Made']?>">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Status</label>
            <div class="col-sm-10">
            <select class="form-control form-control-lg" name="status">
               <option value="0">....</option>
                <option value="1"<?php if( $memberdata['Status'] == 1) {echo 'selected';} ?>>New</option>
                <option value="2"<?php if( $memberdata['Status'] == 2) {echo 'selected';} ?>>Like New</option>
                <option value="3"<?php if( $memberdata['Status'] == 3) {echo 'selected';} ?>>Used</option>
                <option value="4"<?php if( $memberdata['Status'] == 4) {echo 'selected';} ?>>Old</option>
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
                      $selected = '';
                      if($id ==$memberdata['Member_ID'] )
                      {
                        $selected = 'selected';
                      }
                      
                      echo "<option value='$id' $selected>$name</option>";
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
                      $selected = '';
                      if($id ==$memberdata['Cat_ID'] )
                      {
                        $selected = 'selected';
                      }
                      echo "<option value='$id'  $selected>$name</option>";

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
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Tags</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="tags" placeholder="Separe Tags With Comma (,)" value="<?php echo $memberdata['Tags']?>">
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
              if(empty($memberdata['Image']) == FALSE)
              {
                  echo " <img src=". $memberdata['Image']." width='200' height=\"200\" class=\"img-fluid img-thumbnail preview\">";
              }
              else
              {
                echo " <img src=\"../resource/image/img_avatar3.png\" width='200' height=\"200\" class=\"img-fluid img-thumbnail\">";
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

<h2 class="h1 text-center text-capitalize text-muted mt-5 mb-4"> The Coments Which <?php echo $memberdata['Name']?> have :</h2>

<div class="container">
<?php 


try
{
    $id = $memberdata['Item_ID'];
    $getcomments = new operateDB('comments');
    $cond = "where items.Item_ID = $id ";
    $dataitems =  $getcomments->getData_inner('items','users',"Item_ID",'Member_ID','Item_ID','UserID',',items.Name,users.UserName',$cond);
    $check = True;
}
catch(Exception $ex)
{
    $error = $ex->getMessage();
   $message  = "<div class='container'><div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
   Not Have Any Coment !
  </div></div>";
   die($message);
    $check = FALSE;
}



 ?>
<div class="table-responsive text-center ">
<table class="table table-hover table-bordered ">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">#ID</th>
      <th scope="col">Comments</th>
      <th scope="col">Items Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Add Date</th>
      <th scope="col">Controller</th>
     
    </tr>
 

  </thead>
  <tbody class="main-table">
    <?php 
      foreach ($dataitems as $member) {
          # code...
    ?>
    <tr >
      <th scope="row"><?php echo $member['C_ID'] ?></th>
      <td><?php echo $member['Comments'] ?></td>
      <td><?php echo $member['Name'] ?></td>
      <td><?php echo $member['UserName'] ?></td>
      <td><?php echo $member['Comment_Date'] ?></td>
      <td class="text-center">
          <a href="?page=comments&action=edit&id=<?php echo $member['C_ID']; ?>" class="btn btn-success mb-2"><i class="fa fa-edit"></i> Edit</a>
          <a href="?page=comments&action=delete&id=<?php echo $member['C_ID']; ?>"class="btn btn-danger  mb-2 confirm"><i class="fa fa-close"></i> Delete</a>
          <?php 
            if($member['States'] == 0)
            {
              $id = $member['C_ID'];
              // echo "< a href=\"?page=members&action=delete&id= \" ></a> ";
              echo "<a href='?page=comments&action=active&id=$id' class=\"btn btn-primary  mb-2 confirm\" ><i class=\"fa fa-check\"></i> Active</a>";
              // echo "<a href=\"?page=members&action=delete&id=$member['UserID']\" class=\"btn btn-danger  mb-2 confirm\"><i class=\"fa fa-close\"></i> Delete</a> ";
            }
          ?>
      </td>
    </tr
      <?php }?>>
  </tbody>
</table>
</div>


</div>