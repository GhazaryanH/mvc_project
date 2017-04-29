<?php include 'layout/navbar.php'; ?>

<div class="container">
    <div class="row">
        <div class="container">
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail" style="box-shadow: 0px 1px 9px 0px rgba(0, 0, 0, 0.53);">
                    <img style="min-width: 240px;max-width: 240px;" class="img-responsive img-thumbnail profilimg" src="/public/img/uploade/<?php if($this->userData['avatar'] == ""){ echo 'avatar.jpg'; }else{ echo  $this->userData['avatar'];}?>" link="img" alt="img">
                    <div class="caption">
                        <h4 style="text-transform: capitalize;display: inline-block;"><?= $this->userData['f_name'];?></h4>
                        <h4 style="text-transform: capitalize;display: inline-block;"><?= $this->userData['l_name'];?></h4><br>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="fileUpload btn btn-primary">
                                <span>Choose File</span>
                                <input type="file" class="upload" name="file" />
                            </div>
                            <button class="btn btn-sm btn-primary" name="uploade">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
