<?php 

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        $loggedin = true;
    }else{
        $loggedin = false;
    }
    

echo '<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="/login/welcome.php">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/login/welcome.php">Home <span class="sr-only">(current)</span></a>
            </li>';
            if(!$loggedin){
            echo '<li class="nav-item active">
                <a class="nav-link" href="/login/index.php">Log in <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/login/signup.php">Sign up <span class="sr-only">(current)</span></a>
            </li>';}
            if($loggedin){
            echo '<li class="nav-item active">
                <a class="nav-link" href="/login/logout.php">Log out <span class="sr-only">(current)</span></a>
            </li>';}
            
        echo '</ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>';

?>
