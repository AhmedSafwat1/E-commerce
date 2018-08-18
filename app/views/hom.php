
<div class="container home-stat text-center">
    <h2 class="h1 mt-5 mb-4 text-muted">Dasborad</h2>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="stat stat-members row no-gutters h-100 align-items-center">
              <div class="icon  col-md-6 col-12 mb-1">
                <i class="fa fa-users fa-5x fa-fw"></i>
              </div>
               <div class="info col-md-6 col-12 mb-1">
                 Total Members
                 <span><a href="?page=mange" class=""> <?php echo $countnumbers ?></a></span>
               </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="stat stat-pinding row no-gutters h-100 align-items-center">
              <div class="icon  col-md-6 col-12 text-center mb-1">
                    <i class="fa fa-user-plus fa-5x fa-fw"></i>
              </div>
              <div class="info  col-md-6 col-12">
                Pending Members
                <span><a href="?page=mange&panding" class=""> <?php echo $countpending ?></a></span>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="stat stat-item row no-gutters h-100 align-items-center">
              <div class="icon  col-md-6 col-12 mb-1">
                <i class="fa fa-tag fa-5x fa-fw"></i>
              </div>
              <div class="info  col-md-6 col-12">
                Total Items
                <span><a href="?page=item"><?php echo  $countitem ;?></a></span>
              </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="stat stat-comments row no-gutters h-100 align-items-center">
              <div class="icon   col-md-6 col-12 mb-1">
                <i class="fa fa-comments fa-5x fa-fw"></i>
              </div>
              <div class="info   col-md-6 col-12">
                Total Comment
                <span>
                <a href="?page=comments"><?php echo $countcomments ;?></a></span>
                </span>
             </div>
            </div>
        </div>
    </div>        
</div>
<!-- start  the lattest  -->
<div class="container latest mt-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between ">
                    <span><i class="fa fa-users"></i> Latest <?php echo count($datamemer);?> Register Users</span>
                    <span class="plus-info"><i class="fa fa-plus fa-lg"></i></span>
                </div>
                <div class="card-body p-0 editing ">
                    <ul class="list-group list-group-flush strip">
                        <?php if(empty($datamemer) == FALSE){?>
                            <?php 
                            foreach ($datamemer as  $value) {
                        ?>
                        <li class="list-group-item d-flex justify-content-between p-2 " ><?php echo $value['UserName'] ;?>
                            <div class="d-sm-inline-block d-flex flex-column ">
                            <?php 
                                if($value['RegStatus'] == 0)
                                {
                                $id = $value['UserID'];
                                // echo "< a href=\"?page=members&action=delete&id= \" ></a> ";
                                echo "<a href='?page=members&action=active&id=$id' class=\"btn btn-primary  confirm\" ><i class=\"fa fa-check\"></i> Active</a>";
                                // echo "<a href=\"?page=members&action=delete&id=$member['UserID']\" class=\"btn btn-danger  mb-2 confirm\"><i class=\"fa fa-close\"></i> Delete</a> ";
                                }
                            ?>
                              <a href="?page=members&action=edit&id=<?php echo $value['UserID']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                        </li>
                            <?php }?>
                            <?php 
                        }else
                        {
                            echo  "<li class=\"list-group-item p-2 \" >Empty Users !</li>";
                            
                        }
                    
                            ?> 
                    </ul>   
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between ">
                    
                    <span><i class="fa fa-tag"></i> Latest <?php echo count($dataitem);?>  Items</span>
                    <span class="plus-info"><i class="fa fa-plus fa-lg"></i></span>
                    
                </div>
                <div class="card-body  p-0">
                <ul class="list-group list-group-flush strip">
                        <?php 
                           if(empty($dataitem) == FALSE)
                           {
                            foreach ($dataitem as  $value) {
                        ?>
                        <li class="list-group-item d-flex justify-content-between p-2 " ><?php echo $value['Name'] ;?>
                            <div class="d-sm-inline-block d-flex flex-column">
                            <?php 
                                if($value['Approve'] == 0)
                                {
                                $id = $value['Item_ID'];
                                // echo "< a href=\"?page=members&action=delete&id= \" ></a> ";
                                echo "<a href='?page=item&action=active&id=$id' class=\"btn btn-primary  confirm\" ><i class=\"fa fa-check\"></i> Active</a>";
                                // echo "<a href=\"?page=members&action=delete&id=$member['UserID']\" class=\"btn btn-danger  mb-2 confirm\"><i class=\"fa fa-close\"></i> Delete</a> ";
                                }
                            ?>
                              <a href="?page=item&action=edit&id=<?php echo $value['Item_ID']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                        </li>
                            <?php }?>
                            <?php 
                               } else
                               {
                                echo  "<li class=\"list-group-item p-2 \" >Empty Items !</li>";
                               }
                            ?>
                    </ul>   
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between ">
                    
                    <span><i class="fa fa-comment"></i> Latest <?php echo count($datacoments);?>  Coments </span>
                    <span class="plus-info"><i class="fa fa-plus fa-lg"></i></span>
                    
                </div>
                <div class="card-body  p-0">
                <ul class="list-group list-group-flush strip">
                   <?php if(empty($datacoments) == FALSE){?>
                        <?php 
                            foreach ($datacoments as  $value) {
                        ?>
                        <li class="list-group-item d-flex justify-content-between p-2 " >
                            <div class="info-comment">
                            <h4 class="card-title text-primary"> <?php echo $value['UserName'] ;?></h4>
                                <p class="card-text w-100 text-light bg-dark p-2 lead toolipt">
                                        <?php echo $value['Comments'] ?> .
                                </p>
                                
                            </div>
                            <div class="d-sm-inline-block d-flex flex-column">
                            <?php 
                                if($value['States'] == 0)
                                {
                                $id = $value['C_ID'];
                                // echo "< a href=\"?page=members&action=delete&id= \" ></a> ";
                                echo "<a href='?page=item&action=active&id=$id' class=\"btn btn-primary  confirm\" ><i class=\"fa fa-check\"></i> Active</a>";
                                // echo "<a href=\"?page=members&action=delete&id=$member['UserID']\" class=\"btn btn-danger  mb-2 confirm\"><i class=\"fa fa-close\"></i> Delete</a> ";
                                }
                            ?>
                              <a href="?page=item&action=edit&id=<?php echo $value['C_ID']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                        </li>
                            <?php }?>
                            <?php 
                               } else
                               {
                                echo  "<li class=\"list-group-item p-2 \" >Empty Coments !</li>";
                               }
                            ?>
                    </ul>   
                </div>
            </div>
        </div>

    </div>
</div>
<!--  end the lattest -->