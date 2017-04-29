<?php
include 'layout/navbar.php';
$url = substr($_SERVER['REQUEST_URI'], 1 );
$url = explode('/', $url);
$id = $url['2'];
?>
<div class="container-fluid" style="margin-top:100px;">
    <div class="container">
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail" style="box-shadow: 0px 1px 9px 0px rgba(0, 0, 0, 0.53);">
                <img src="/public/img/uploade/<?php echo $this->userData['avatar']; ?>">
                <div class="caption">
                    <h4 style="text-transform: capitalize;display: inline-block;"><?= $this->userData['f_name'];?></h4>
                    <h4 style="text-transform: capitalize;display: inline-block;"><?= $this->userData['l_name'];?></h4><br>
                    <form action="" method="post" style="float: left;">
                        <?=$this->btn?>
                    </form>
                        <a href="/account/chat/<?=$id;?>"><button type="submit" class="btn btn-primary" style="margin-left: 85px;"><span class="glyphicon glyphicon-envelope"></span></button></a>
                </div>
            </div>
        </div>
    </div>
</div>



