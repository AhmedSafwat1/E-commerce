<h2 class="h1 text-center text-capitalize text-muted mt-4">Welcom to Categories Mange</h2>

<div class="container">
  <a class="btn btn-info" href="?page=Categories&action=add"><i class=" fa fa-plus fa-1x"></i> Add new Mebmber</a>
</div>
<?php if($check != FALSE) 
{
 ?>
<div class="container">
    <div class="card">
                    <div class="card-header mb-3 d-flex justify-content-between">
                        <div>
                        <i class="fa fa-gears"></i> Categories Manger
                        </div>
                        <div style="color:#FFF">
                            <span style="color:#9a8888"><i class ="fa fa-sort"></i> Order By :</span>
                           <a class="btn btn-secondary <?php if($_GET['sorting'] == 'ASC') { echo 'active';} ?>"  href="?page=Categories&sorting=ASC">ASC</a>
                           <a class="btn  btn-dark <?php if($_GET['sorting'] == 'DESC') { echo 'active';} ?>"  href="?page=Categories&sorting=DESC">DESC</a>
                           <span style="color:#9a8888"><i class="fa fa-eye"></i> View :</span>
                           <br class="d-md-none">
                           <a class="btn btn-success view-mode">Classic</a>
                           <a class="btn btn-danger view-mode">Full</a>
                        </div>
                    </div>
                    <div class="card-body p-0 editing  ">
                            <?php 
                            $getCategories = new operateDB('categories');
                                foreach ($datacategories as  $value) {
                                    $id_C = $value['ID'];
                                    try
                                    {
                                    $datacategories_sub = $getCategories->Get_all_sorting("ID",$sorting='ASC',$cond ="where Parent = $id_C  ",0 );
                                    }
                                    catch(Exception $ex)
                                    {
                                        $error = $ex->getMessage();
                                        echo $error;
                                    }
                                                            ?>
                           <div class="d-flex  justify-content-between hover-mker">
                                
                          
                             <div class="catg">
                             <h4 class="card-title pl-1 head-view "><?php echo $value['Name'] ;?> </h4>
                             <div class="ful-view ">
                                <p class="card-text pl-1 "> <?php 
                                if(empty( $value['Description']))
                                {
                                        echo "Empty Description ";
                                }
                                else
                                {
                                    echo $value['Description'] ;
                                }
                                ?>
                                </p>
                                <div class="cat pl-2 ">
                                
                                <span class="badge badge-danger">
                                <?php 
                                    if($value['Visiblity'] == 1 )
                                    {
                                        echo "<i class='fa fa-close'></i> Visibility Not Allow";
                                    }
                                    else
                                    {
                                            echo "<i class='fa fa-eye'></i> Visibility  Allow";
                                    }
                                    ?>
                                </span>
                                <span class="badge badge-warning">
                                <?php 
                                    if($value['Allow_Comments'] == 1 )
                                    {
                                        echo " <i class='fa fa-close'></i> Comments Not Allow";
                                    }
                                    else
                                    {
                                            echo "<i class='fa fa-eye'></i> Comments Allow";
                                    }
                                    ?>
                                </span>
                                <span class="badge badge-dark">
                                <?php 
                                    if($value['Allow_Ads'] == 1 )
                                    {
                                        echo " <i class='fa fa-close'></i> Ads Not Allow";
                                    }
                                    else
                                    {
                                            echo "<i class='fa fa-eye'></i> Ads Allow";
                                    }
                                    ?>
                                </span>
                                </span>
                                </div>
                                </div>
                               
                                   
                            </div>
                             <div class="hidden-button pr-2 h-100">
                                 <?php $id =$value['ID'] ?>
                                <a href="?page=Categories&action=edit&id=<?php echo $id ?>" class="btn btn-outline-info"><i class="fa fa-edit"></i> Edit</a>
                                <a href="?page=Categories&action=delete&id=<?php echo $id ?>" class="btn btn-outline-danger confirm"><i class="fa fa-close"></i>Delete </a>
                            </div>
                            
                           </div>
                            
                             <?php 
                                   
                                  
                                        if(empty($datacategories_sub) == FALSE)
                                        {
                                            echo "<ul class=\"list-group list-group-flush mt-2 p-4\">";
                                            echo "<h6 class='text-success pl-3'> Sub Categories</h6>";
                                            foreach ($datacategories_sub  as  $valuesub) {
                                                $id_sub = $valuesub['ID'];
                                                echo "<li class=\"list-group-item  show-hideSub \"><a href='?page=Categories&action=edit&id= $id_sub'>".$valuesub['Name']."</a> <a href=\"?page=Categories&action=delete&id=$id_sub\" class=\"btn text-danger  sub-delete m-0 mb-0 confirm\">Delete </a></li>";
                                                
                                            }
                                            echo "</ul>";
                                        }
                                  
                                    ?>
                            <hr class="">
                            <?php }?>
                    </div>
    </div>
</div>
                                <?php } else
                                {
                                    echo "<div class='container'><div class=\"alert alert-danger text-muted text-center\" role=\"alert\">
                                     Not Have A Record To show !!
                                     </div>
                                   </div>";
                                }