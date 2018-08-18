<div class="container">
<h2 class="h1 text-center mt-2 mb-4 text-capitalize text-muted"> Add New  Member </h2>
    <form  class="" method="post" action="?page=members&action=Add" enctype="multipart/form-data">
        <div class="form-group row justify-content-center ">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">User Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="username" required  placeholder="User Name which acces to shop by" autocomplete='off' >
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="password" class="col-sm-2 col-form-label col-form-label-lg" >Password</label>
            <div class="col-sm-10">
            <input type="password" class="form-control form-control-lg pass" name="newPassword"  required placeholder="Write the password Strong" autocomplete="new-password">
            <i class=" show-pass fa fa-eye fa-2x"></i>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control form-control-lg" name="email" required placeholder="Email Must be valid ">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">Full Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-lg" name="FullName"required placeholder="Full Name which apparence in profile page">
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <label for="name" class="col-sm-2 col-form- col-form-label-lg">User Avater</label>
            <div class="col-sm-10">
            <input type="File" class="form-control form-control-lg" name="avater"required placeholder=" chose The Image">
            </div>
        </div>
        <div class="form-group row justify-content-end ">
            <div class=" col-sm-10 ">
                 <img src="../resource/image/img_avatar3.png" width='200' height="200" class="img-fluid img-thumbnail preview">
            </div>
        </div>
        <div class="form-group row justify-content-start ">
            <div class=" col-sm-10">
           <input type="submit" name="submit"  value="Add" class="btn btn-primary btn-block btn-lg">
         </div>
      </div>
   </form> 
</div>