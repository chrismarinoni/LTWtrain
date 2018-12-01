<?php
    session_start();
    function getHeader(){
        echo('
                <header id="nav" >
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-red"  >
                <div class="container" >
                <a class="navbar-brand" href="http://www.ltwtrain.altervista.org/index.php">LTWtrain</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://www.ltwtrain.altervista.org/index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.ltwtrain.altervista.org/order/biglietteria.php">Biglietteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.ltwtrain.altervista.org/tabellone.php">Tabellone</a>
                    </li>
                    </ul>
        ');
        if($_SESSION['idUtente'] == "" ){
            echo('
                        <a href="http://www.ltwtrain.altervista.org/account/signin.html" class="btn btn-light" role="button" aria-pressed="true">Area Personale</a>
            ');
        } else {
            echo( '
                        <div class="nav-item dropdown">
                            <a class="dropdown-toggle btn btn-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Il mio profilo</a>
                            <div class="dropdown-menu">
                            <div class="text-center mt-2">
                                <img src="https://cdn2.iconfinder.com/data/icons/circle-icons-1/64/profle-512.png" width="48px" height="48px"/>
                                <p>Ciao, '.$_SESSION['nome'].'</p>
                            </div>
                            <a class="dropdown-item" href="http://www.ltwtrain.altervista.org/account/dashboard.php">Dashboard</a>
                            <a class="dropdown-item" href="http://www.ltwtrain.altervista.org/account/profile.php">Il tuo account</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </div>
            ');
        }
        echo('
                    </div>
                    </div>
                </nav>
                </header>
        ');
       
    }
    
?>