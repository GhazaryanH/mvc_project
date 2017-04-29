<nav class="navbar navbar-default bg-faded">
    <h1 class="navbar-brand mb-0"><i class="fa fa-user-o" aria-hidden="true"></i> <i class="fa fa-user-o" aria-hidden="true"></i> <i class="fa fa-user-o" aria-hidden="true"></i> Social Networck</h1>
</nav>
<div class='container'>
    <div class="row">
        <!-- Sign In Start -->
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password" id="pwd">
                </div>
                <button type="submit" class="btn btn-primary" name="login_btn" >Sing In</button>
            </form>
            <?php  echo $this->error; ?>
        </div>
        <!-- Sign In End -->
        <!-- Sign Up Start -->
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="f_name">First Name:</label>
                    <input type="text" class="form-control" name="f_name" id="f_name">
                </div>
                <div class="form-group">
                    <label for="l_name">Last Name:</label>
                    <input type="text" class="form-control" name="l_name" id="l_name">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary" name="reg_btn" >Sing Up</button>
            </form>
        </div>
        <!-- Sign Up End -->
    </div>
</div>