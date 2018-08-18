
<div class="container">
<?php if($check == FALSE) 
{
 ?>

<h2 class="h1 text-center text-capitalize text-muted mt-4"> Empty Comments</h2>
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
</div>

<?php die(); }?>

<!-- // 888888888888888888888888888888888888888888888888888888888888888888888 -->

<h2 class="h1 text-center text-capitalize text-muted mt-4"> Welcom To  Comments mange </h2>

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