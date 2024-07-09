<?php
//include 'login.php';
//2nd day practice

if(isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] == true){
    if($_SESSION['role'] == "Admin"){
        $role = "Admin";
    }elseif($_SESSION['role'] == "Buyer"){
        $role = "Buyer";
    } else {
        $role = "Supplier";
    }
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">iNotes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./loggedinhome.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                        <form class="d-flex" role="search">
                        
                    </form>
                    </ul>
                <!--  <form class="d-flex" role="search">
                        <li>
                        <a  style ="color:white;"><u>Hi '.$_SESSION['username'].'</u></a>
                        </li>
                        <li>
                        <a class="navbar-brand" href="./logout.php">
                        <img src="Logout.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">                    
                        </a>
                        </li>
                    </form> -->
                    <ul class="navbar-nav col-1  mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/user.png" style="width: 30px;" class="rounded-pill">
                        </a>
                        <ul class="dropdown-menu dropdown-right">
                            <li><a class="dropdown-item" href="#">Hi '.$_SESSION['username'].'</a></li>
                            <li><a class="dropdown-item" href="#">As '.$role.'</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                          </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>'; 
} else {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a style="color: darkred;" class="navbar-brand" href="#"><h3>ilife</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="font-size: 1.2em;" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./loggedinhome.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
            </ul>
            <ul class="navbar-nav col-1  mb-2 mb-lg-0">
               <li class="nav-item">
                <button class="btn btn-success px-3 py-0 " >
                    <a style="font-size: 1.2em;" class="nav-link" href="./login.php">Login</a>
                </button>
                </li>
            </ul>
            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </div>
  </nav>';
}
?>
