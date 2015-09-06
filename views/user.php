<div class="col-lg-offset-4 col-lg-4">
    <div>
        User name: <?php echo $_SESSION['logged_user']['name'];?>
    </div>
    <div>
        User surname:<?php echo $_SESSION['logged_user']['surname'];?>
    </div>
    <div>
        User Email:<?php echo $_SESSION['logged_user']['email'];?>
    </div>
    <div>
        User Avatar: <img src="<?php echo $_SESSION['logged_user']['image'];?>" width="50" height="50">
    </div>

    <a href="/?controller=registration&action=logout">Logout</a>
</div>