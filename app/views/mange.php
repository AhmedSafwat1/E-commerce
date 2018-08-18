

<h2 class="h1 text-center text-capitalize text-muted mt-4">Welcom to mange page</h2>

<div class="container">
<a class="btn btn-info" href="?page=members&action=add&id=<?php echo $_SESSION['id'];?>"><i class=" fa fa-plus fa-1x"></i> Add new Mebmber</a>
<?php if($check != FALSE) 
{
 ?>
 
<div class="table-responsive text-center ">
<table class="table table-hover table-bordered ">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">#ID</th>
      <th scope="col">Avater</th>
      <th scope="col">User name</th>
      <th scope="col">Email</th>
      <th scope="col">Full name</th>
      <th scope="col">Register Data</th>
      <th scope="col">Controller</th>
     
    </tr>
  </thead>
  <tbody class="main-table">
    <?php 
      foreach ($data as $member) {
          # code...
    ?>
    <tr >
      <th scope="row"><?php echo $member['UserID'] ?></th>
      <td><img class="rounded-circle img-small img-fluid"src="<?php echo $member['Avater'] ?>"</td>
      <td><?php echo $member['UserName'] ?></td>
      <td><?php echo $member['Email'] ?></td>
      <td><?php echo $member['FullName'] ?></td>
      <td><?php echo $member['Date'] ?></td>
      <td class="text-center">
          <a href="?page=members&action=edit&id=<?php echo $member['UserID']; ?>" class="btn btn-success mb-2"><i class="fa fa-edit"></i> Edit</a>
          <a href="?page=members&action=delete&id=<?php echo $member['UserID']; ?>"class="btn btn-danger  mb-2 confirm"><i class="fa fa-close"></i> Delete</a>
          <?php 
            if($member['RegStatus'] == 0)
            {
              $id = $member['UserID'];
              // echo "< a href=\"?page=members&action=delete&id= \" ></a> ";
              echo "<a href='?page=members&action=active&id=$id' class=\"btn btn-primary  mb-2 confirm\" ><i class=\"fa fa-check\"></i> Active</a>";
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

<?php } else
                                {
                                    echo "<div class=''><div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                                     Not Have A Record To show !!
                                     </div>
                                   </div>";
                                }?>