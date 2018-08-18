<div class="container login-page">
    <h2 class="h1 mt-4 mb-4 text-capitalize text-center text-muted">
        <span class=" activeform" data-class='login'>Login</span> | <span class="" data-class='signup'>Sign Up</span>
    </h2>
    <form class='login   mt-3' action="?page=login&action=login" method="post">
        <div class="form-group mb-3">
            <input type="text" class="form-control form-control-lg " name="username" autocomplete="off" required aria-describedby="emailHelp" placeholder="Enter user name">
        </div>
        <div class="form-group mb-3">
            <input type="password" class="form-control form-control-lg" autocomplete="new-password" required name="password" placeholder="Password">
        </div>
        <input type='submit' name="submit" value="Login" class="btn btn-primary btn-block ">
    </form>
<!-- // sign up   -->
    <form class='signup mt-3' action="?page=login&action=signup" method="post">
        <div class="form-group mb-3">
            <input type="text" class="form-control form-control-lg " required  name="username" autocomplete="off" aria-describedby="emailHelp" placeholder="Enter user name" pattern =".{4,}" title="must enter more 4">
        </div>
        <div class="form-group mb-3">
            <input type="password" class="form-control form-control-lg" required autocomplete="new-password" name="password" placeholder=" Type A Complate Password">
        </div>
        <div class="form-group mb-3">
            <input type="password" class="form-control form-control-lg" required autocomplete="new-password" name="password2" placeholder=" Type Password Agin ">
        </div>
        <div class="form-group mb-3 ">
            <input type="email" class="form-control form-control-lg" name="email" required placeholder="Email Must be valid ">
        </div>
        <input type='submit' name="submit" value="Sign Up" class="btn btn-success btn-block ">
    </form>
</div>