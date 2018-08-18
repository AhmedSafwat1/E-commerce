<div class="container">
    <div class="card mt-5">
            <h2 class="card-header h1 text-white bg-info  text-center"><?php echo  $dataitems[0]['item_n']?> </h2>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                         <div>
                             <img src="../app/controller/<?php echo $dataitems[0]['Image']?>" alt="..." class="img-thumbnail img-fluid">  
                         </div>
                    </div>  
                    <?php 
                     $ss = str_replace(' ',"-",$dataitems[0]['Name'])
                    ?>
                    <div class="col-md-9">
                        <div class="info">
                            <h2 class=" text-muted"> <?php echo  $dataitems[0]['item_n']; ?></h2>
                            <p class="lead card-text"><?php echo  $dataitems[0]['Description']?></p>
                            <p class="lead card-text"><span><i class="fa fa-money fa-fw"></i></span> <span>Price : </span><?php echo  $dataitems[0]['Price']?></p>
                            <p class="lead card-text"><span><i class="fa fa-building fa-fw"></i></span> <span>Made In : </span><?php echo  $dataitems[0]['Country_Made']?></p>
                            <p class="lead card-text"><span><i class="fa fa-user fa-fw"></i></span> <span>Add By : </span><a href="?page=profile&action=showprof&id=<?php echo  $dataitems[0]['Member_ID']?>"><?php echo  $dataitems[0]['UserName']?></a></p>
                            <p class="lead card-text"><span><i class="fa fa-tag fa-fw"></i></span> <span>Categories is : </span><a href="?page=categories&id=<?php echo  $dataitems[0]['Item_ID']?>&catn=<?php echo $ss?>"><?php echo  $dataitems[0]['Name']?></a></p>
                            <p class="card-text"><span><i class="fa fa-calendar fa-fw"></i></span> <small class="text-muted"><?php echo  $dataitems[0]['Add_Date']?></small></p>
                            <p class="lead card-text"><span><i class="fa fa-tag fa-fw"></i><span>Tags is : </span>
                              <?php
                                 $tag = explode(",",$dataitems[0]['Tags']) ;
                                 if(empty($tag) ==  FALSE)
                                 {
                                 foreach ($tag as  $valuetag) {
                                     $valuetag = str_replace(' ','-',$valuetag);
                                     $valuetag  = strtolower($valuetag);
                                   echo " <span><a class='' href='?page=categories&action=viewtage&tag=$valuetag'>$valuetag</a></span> | ";
                                 }
                                }
                             ?>
                             </p>
                        </div>
                    </div>   
                </div>
                <hr>
                <div class="row mt-4">
                    <div class="col-lg-9 offset-lg-3">
                     <h3 class="text-primary">Add Your Comments</h3>
                     <?php if(isset($_SESSION['name']))
                        {
                       
                        
                        ?>
                        <form method="post" action="?page=profile&action=addcoment">
                            <input type="hidden" name="cid" value="<?php  echo $dataitems[0]['Item_ID'] ?>">
                        <div class="form-group">
                            <textarea class="form-control" name="coment" rows="3"></textarea>
                        </div>
                        <input type="submit" name="submit"  value="Comments" class="btn btn-primary  btn-lg">

                        </form>
                        <?php 
                        } else
                        {
                            echo "<p class='lead text-center' >Must Be <a href='?page=login'> login </a> Or <a href='?page=login'> Register </a>To Comments</p>";
                        }
                        ?>
                    </div>
                </div>
<hr>
                <?php
                   if(empty($datacomments) == FALSE)
                   {
                        foreach ($datacomments as  $value) {
                            # code...
                        
                   
                ?>
                 <div class="row mt-4">
                     <div class="col-md-2  text-center">
                         <?php 
                           if(empty($value['Avater'])==FALSE)
                           {
                               $dd = $value['Avater'];
                               echo "<img src=\"../app/controller/$dd\"class=\"img-fluid img-thumbnail rounded-circle\" style='width:100px'>";
                           }
                           else
                           {
                              echo "<img src=\"image/img_avatar3.png\" class=\"img-fluid img-thumbnail rounded-circle\" style='width:100px'>";
                           }
                         ?>

                         
                         <span class="d-block text-center"><?php echo $value['UserName'] ?></span>
                     </div>
                     <div class="col-md-10">
                    
                        <div class="com">
                            <p class="card-text "><?php echo $value['Comments'] ?></p>
                            <p class="card-text"><small class='text-muted'><?php echo $value['Comment_Date']?></small></p>
                        </div>
                     </div>
                     <hr>
                 </div>
                 <?php 
                   }}
                   else
                   {
                       echo "<p class='lead'>Dont Have Any Coment</p>";
                   }
                 ?>

            </div>
     </div>
</div>