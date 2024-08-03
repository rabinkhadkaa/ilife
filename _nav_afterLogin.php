<div class="navbar-horizontal">
    <div class="company-name" style="color: crimson;font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 1.5em;">ilife</div>
    <div class="user-dropdown">
        <button class="dropdown-button">
            <img src="../img/user.png" style="width: 30px;" class="rounded-pill">
        </button>
        <div class="dropdown-menu">
            <a href="#">Hi <?php echo $_SESSION['username']?></a>
            <a href="#">As <?php echo $_SESSION['role']?></a>
            <a href="#settings">Settings</a>
            <a href="./logout.php">Logout</a>
        </div>
    </div>
</div>
