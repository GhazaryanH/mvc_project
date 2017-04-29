<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/account">WebSiteName</a>
        </div>
        <div class="flr" style="float: right;">
            <ul class="nav navbar-nav">
                <li><a href="/account">Home</a></li>
                <li><a href="/friendpage">Friends</a></li>
                <li type="button" data-toggle="modal" data-target="<?php if($this->Request_count == '0'){
                    echo "";
                }else{
                    echo '#myModal';
                } ?>" ><a href="#">Friend Request <i class="fa fa-bell"></i> <span class="badge"><?=$this->Request_count ?></span></a></li>
            </ul>
            <form action="/search" method="post" style="float: left;">
                <input type="text" class="form-control" name="search" id="search" style="display: inline;margin-top: 7px;">
                <button  href="" type="submit" class="btn btn-primary"  name="search_btn">Search</button>
            </form>
            <form action="/home/logout" method="post" style="float: left;" >
                <button type="submit" class="btn btn-primary navbar-btn" name="logout_btn">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>

                <div class="modal-body">
                    <table style="width: 100%;">
                        <?php foreach ($this->friend_request as $friend) { ?>
                        <tr>
                            <td style="padding: 10px 10px 10px; 0"><h3><?=$friend['f_name']?></h3></td>
                            <td style="padding: 10px 10px 10px; 0"><h3><?=$friend['l_name']?></h3></td>
                            <td style="padding: 10px 10px 10px; 0"><img style="width: 40px;" src="../../public/img/uploade/<?=$friend['avatar']?>" ></td>
                            <td style="padding: 10px 10px 10px; 0">
                                <form action="" method="post">
                                    <button type="submit" name="accept" class="btn btn-success">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        <input type="hidden" name="hidden_accept" value="<?=$friend['id']?>" >
                                    </button>
                                </form>
                            </td>
                            <td style="padding: 10px 10px 10px; 0">
                                <form  action="" method="post">
                                    <button type="submit" name="remove" class="btn btn-warning">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        <input type="hidden" name="hidden_remove" value="<?=$friend['id']?>" >
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>