<!-- // start upper bar -->
<?php session_start() ;
;?>
<div class="upper-bar">
  <div class="container">
   <div class="row">
     
   <?php
          if(isset($_SESSION['name']) || isset($_SESSION['username']))
          {
            if(isset($_SESSION['username']))
            {
              $na =$_SESSION['username'];
              $_SESSION['name'] =$na;
            }
           else
           {
            $na = $_SESSION['name'];
           }
            try
            {
              $user = new operateDB('users');
              $dff = $user->Get_data_by_colum('UserName',$na);
              $classadmin = "d-none";
              if($dff['GroupID'] == 1)
              {
                $classadmin = "";
                $_SESSION['username'] = $na;
              }
              if(empty($dff['Avater']))
              {
                echo "<span class='mr-2' style='font-size :24px;'><i class='fa fa-user-circle fa-1x fa-fw'></i></span>";
              }else
              {
                $m = $dff['Avater'];
                echo "<span class='mr-2' style='font-size :24px;'><img class='img-fluid rounded-circle img-thumbnail 'src='../app/controller/$m' style='width:36px; height:36px;position: relative;top: -4px;'></span>";
              }
          
            echo "<div class=\"dropdown show mr-2 \">
                  <a class=\"btn btn-secondary dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                   $na
                  </a>
                       
                  <div class=\"dropdown-menu p-0\" aria-labelledby=\"dropdownMenuLink\">
                  <a href='?page=profile' class='dropdown-item p-2 pl-1'> My Profile</a>
                  <a href='../app/index.php' class='dropdown-item p-2 pl-1  $classadmin '> Dasborad</a>
                  <a href='?page=ads' class='dropdown-item p-2 pl-1'> New Items  </a>
                  <a href='?page=profile#items' class='dropdown-item p-2 pl-1'> MY Items  </a>
                  <a href='?page=logout' class='dropdown-item p-2 pl-1' > Logout </a>
                  </div>
                </div>";
          
              $stats = $user->check_status($na);
              if($stats == 1)
              {
                echo "You Need To Activate";
              }
            }
            catch(Exception $ex)
            {
                $error =  $ex->getMessage();
                $message = "<div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                                This Update not succeeses .<br> $error!
                            </div>";
            }
          }
          else
          {
    ?>
     <div class="controller d-inline-block ml-auto">
       
        <a href="?page=login">Login/Sign Up</a>
     </div>
          <?php }?>
   </div>
  </div>
</div>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
      <div class="container">
        <a class="navbar-brand" href="index.php">Home Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav ml-auto">
               <?php 
                  foreach ($data as $value) {
                    # code...
                    $namecat = $value['Name'];
                    $rapace = str_replace(" ","-",$namecat);
                    $id = $value['ID'];
                    echo "
                    <li class=\"nav-item \">
                      <a class=\"nav-link p-3\" href=\"?page=categories&id=$id&catn=$rapace\">$namecat<span class=\"sr-only\">(current)</span></a>
                    </li>                    
                         ";
                }
                  
               ?>



          </ul>

        </div>
      </div>
    </nav>