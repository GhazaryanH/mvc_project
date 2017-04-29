<?php include 'layout/navbar.php'; ?>
<div class="container" style="margin-top: 100px;">
<?php foreach ($this->searchuser as $user){ ?>
    <a class="account_a" href="/account/user/<?= $user['id']; ?>" >
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
<div class="container">
    <div class="row" style="text-align: center;">
        <img <?php  echo $this->error; ?> >
    </div>
</div>

