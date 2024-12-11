<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include 'view_as_buyer.php'; ?>
<style>
    .view-as-buyer {
    display: inline-block;
    vertical-align: middle;
}

.view-as-buyer form {
    display: flex;
    align-items: center;
    gap: 5px; /* Adds spacing between dropdown and button */
}

.view-as-buyer select, 
.view-as-buyer button {
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.view-as-buyer button {
    background-color: #007bff;
    color: white;
    cursor: pointer;
}

.view-as-buyer button:hover {
    background-color: #0056b3;
}

.user-dropdown {
    display: inline-block;
    position: relative;
}

.dropdown-button {
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
}

.dropdown-menu {
    display: none;
    position: absolute;
    right: 0;
    background-color: #f9f9f9;
    min-width: 200px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 5px;
}

.user-dropdown:hover .dropdown-menu {
    display: block;
}
</style>
<div class="navbar-horizontal">
    <div class="company-name" style="color: red; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: 1.8em;">
        ilife
    </div>

    <!-- View as Buyer Dropdown (Left of User Icon) -->
    <div>
        <div class="view-as-buyer">
            <?php renderViewAsBuyerDropdown($vpab); ?>
        </div>
        <!-- User Icon Dropdown -->
        <div class="user-dropdown" style="display: inline-block;">
            <button class="dropdown-button">
                <img src="../img/user.png" style="width: 30px;" class="rounded-pill">
            </button>
            <div class="dropdown-menu">
                <a href="#">Hi <?php echo htmlspecialchars($_SESSION['username']); ?></a>
                <a href="#">As <?php echo htmlspecialchars($_SESSION['role']); ?></a>

                <?php if ($vpab->isImpersonating()): ?>
                    <!-- Return to Admin -->
                    <form method="POST" action="">
                        <button type="submit" name="restore_role" style="width: 100%; background: #ff6347; color: white; cursor: pointer;">
                            Return to Admin
                        </button>
                    </form>
                <?php endif; ?>

                <a href="#settings">Settings</a>
                <a href="./logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>
