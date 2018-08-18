<h2 class="h1 text-center text-capitalize text-muted mt-4">Welcom to Items Page</h2>

<div class="container">
  <a class="btn btn-info" href="?page=item&action=add"><i class=" fa fa-plus fa-1x"></i> Add new Items</a>
  <?php if($check != FALSE) 
{
 ?>
<div class="table-responsive text-center ">
<table class="table table-hover table-bordered ">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">#ID</th>
      <th scope="col">Image Item</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col">User Name</th>
      <th scope="col">Adding Date</th>
      <th scope="col">Controller</th>
     
    </tr>
  </thead>
  <tbody class="main-table">
    <?php 
      foreach ($dataitems as $member) {
          # code...
    ?>
    <tr >
      <th scope="row"><?php echo $member['Item_ID'] ?></th>
      <td><img class="rounded-circle img-small img-fluid"src="<?php echo $member['Image'] ?>"</td>
      <td><?php echo $member['item_n'] ?></td>
      <td><?php echo $member['Description'] ?></td>
      <td><?php echo $member['Price'] ?></td>
      <td><?php echo $member['Name'] ?></td>
      <td><?php echo $member['UserName'] ?></td>
      <td><?php echo $member['Add_Date'] ?></td>
      <td class="text-center">
          <a href="?page=item&action=edit&id=<?php echo $member['Item_ID']; ?>" class="btn btn-success mb-2"><i class="fa fa-edit"></i> Edit</a>
          <a href="?page=item&action=delete&id=<?php echo $member['Item_ID']; ?>"class="btn btn-danger  mb-2 confirm"><i class="fa fa-close"></i> Delete</a>
          <?php 
            if($member['Approve'] == 0)
            {
              $id = $member['Item_ID'];
              // echo "< a href=\"?page=members&action=delete&id= \" ></a> ";
              echo "<a href='?page=item&action=approve&id=$id' class=\"btn btn-primary  mb-2 confirm\" ><i class=\"fa fa-check\"></i> Aprove</a>";
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
</div>
<?php } else
                                {
                                    echo "<div class=''><div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                                     Not Have A Record To show !!
                                     </div>
                                   </div>";
                                }?>