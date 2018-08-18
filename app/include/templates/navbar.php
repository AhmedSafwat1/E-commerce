<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
      <div class="container">
        <a class="navbar-brand" href="dasborad.php"><?php echo lang('Home_Admin') ;?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link p-3" href="?page=Categories"><?php echo lang('CATAGRIOES') ;?><span class="sr-only">(current)</span></a>
            </li> 
            <li class="nav-item ">
              <a class="nav-link p-3" href="?page=item"><?php echo lang('ITEMS') ;?><span class="sr-only">(current)</span></a>
            </li> 
            <li class="nav-item ">
              <a class="nav-link p-3" href="?page=mange"><?php echo lang('MEMBER') ;?></a>
            </li>   
            <li class="nav-item ">
              <a class="nav-link p-3" href="?page=comments"><?php echo lang('COMMENT') ;?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-3" href="index.html#"><?php echo lang('STASTAISIC') ;?></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link p-3" href="index.html#"><?php echo lang('LOGS') ;?></a>
            </li>          
          </ul>
          <div class="navbar-nav dropdown my-2 my-md-0  p-0">
              <a class="nav-link dropdown-toggle p-3" href="http://example.com" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']?></a>
              <div class="dropdown-menu p-0" aria-labelledby="dropdown07">
                <a class="dropdown-item pt-3 pb-3" href="../../index.php">Visite Shop </a>
                <a class="dropdown-item pt-3 pb-3" href="?page=members&action=edit&id=<?php if(isset($_SESSION['id'])) {echo $_SESSION['id'] ;}?>">Edit Profile</a>
                <a class="dropdown-item pt-3 pb-3" href="index.html#">Setting</a>
                <a class="dropdown-item pt-3 pb-3" href="../models/logout.php">Logout</a>
              </div>
        </div>

        </div>
      </div>
    </nav>