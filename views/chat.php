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


<div class="container">
        <div class="col-md-6" style="height:400px;border: 1px solid black;overflow-y: auto;">
            <?php foreach ($this->mesages as $mesage) {?>
            <h6 style='border-radius:10px;width:40%;padding:10px;background:#77b78c;color:#000;'><?=$mesage['f_name'];?></h6>
            <h4 style='border-radius:10px;width:100%;padding:15px;background:#337AB7;color:#fff;'><?=$mesage['text'];?></h4>
                <?php $last_id = $mesage['id']; ?>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <form action="" method="post">
                <textarea name="message" style="width:100%;min-height:100px;"></textarea>
                <button type="submit" name="send" class="btn btn-primary btn-block" data-friend-id="//$last_id;" style="display:inherit;margin-top: 10px;"><span class="glyphicon glyphicon-envelope"></span></button>
            </form>
            <!--<textarea name="message" style="width:100%;min-height:100px;"></textarea>
            <button  name="send" class="btn btn-primary btn-block send" data-friend-id="<?=$last_id;?>" style="display:inherit;margin-top: 10px;"><span class="glyphicon glyphicon-envelope"></span></button>-->
        </div>
</div>
<script>
    var last = <?=$last_id; ?>;
    getMsgs();
</script>