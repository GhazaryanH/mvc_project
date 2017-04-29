<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/account">WebSiteName</a>
        </div>
        <div class="flr" style="float: right;">
            <form action="/home/logout" method="post" style="float: left;" >
                <button type="submit" class="btn btn-primary navbar-btn" name="logout_btn">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container" style="margin-top: 100px;">
    <?php foreach ($this->getall_friends as $user){ ?>
        <a class="account_a" href="/account/user/<?= $user['user_id']; ?>" >
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img style="width: 200px;height: 200px;" src="../public/img/uploade/<?php echo $user['avatar']; ?>" alt="">
                    <div class="caption">
                        <h3><?php  echo $user['f_name'];?>  <?php  echo $user['l_name'];?></h3>
                    </div>
                </div>
            </div>
        </a>
    <?php } ?>
</div>



