<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        <link rel="icon" type="image/png" href="public/images/logo.png">
        <title>REN RACE</title>

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="<?php echo Chemins::STYLES . 'fontawesome.css'; ?>">
        <link href="<?php echo Chemins::STYLES . 'style.css'; ?> "rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo Chemins::STYLES . 'owl.css'; ?>">
        <link rel="stylesheet" href="<?php echo Chemins::STYLES . 'style2.css'; ?>">

        <!-- Bootstrap core CSS -->
        <link href="<?php echo Chemins::STYLES . 'bootstrap.min.css'; ?>" rel="stylesheet">



        <!-- Bootstrap core JavaScript -->
        <script src="public/js/jquery.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap.bundle.min.js" type="text/javascript"></script>

        <!-- Additional Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script src="public/js/custom.js" type="text/javascript"></script>
        <script src="public/js/owl.js" type="text/javascript"></script>
        <script src="public/js/slick.js" type="text/javascript"></script>
        <script src="public/js/accordions.js" type="text/javascript"></script>

        <script type="text/javascript">
            cleared[0] = cleared[1] = cleared[2] = 0;
            function clearField(t) {
                if (!cleared[t.id]) {
                    cleared[t.id] = 1;
                    t.value = '';
                    t.style.color = '#fff';
                }
            }
        </script>

        <script>
            (function (h, o, t, j, a, r) {
                h.hj = h.hj || function () {
                    (h.hj.q = h.hj.q || []).push(arguments)
                };
                h._hjSettings = {hjid: 2612921, hjsv: 6};
                a = o.getElementsByTagName('head')[0];
                r = o.createElement('script');
                r.async = 1;
                r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
                a.appendChild(r);
            })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
        </script>







    </head>

    <body>

        <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>  
        <!-- ***** Preloader End ***** -->

        <!-- Header -->
        <div class="sub-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <ul class="left-info">
                            <li><a href="#"><i class="fa fa-clock-o"></i>Mar-Sam 09:00-18:00</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>04.67.76.90.70</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $current_page = basename($_SERVER['PHP_SELF']);
        ?>

        <header class="">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.php"><h2>Reprogrammation Moteur</h2></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item <?php if ($current_page == 'index.php' && empty($_GET['controleur'])) echo 'active'; ?>">
                                <a class="nav-link" href="index.php">Accueil
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($current_page == 'index.php' && isset($_GET['controleur']) && $_GET['controleur'] == 'APN' && isset($_GET['action']) && $_GET['action'] == 'afficher') echo 'active'; ?>">
                                <a class="nav-link" href="index.php?controleur=APN&action=afficher">A propos de nous</a>
                            </li>  
                            <li class="nav-item <?php if ($current_page == 'index.php' && isset($_GET['controleur']) && $_GET['controleur'] == 'Service' && isset($_GET['action']) && $_GET['action'] == 'afficher') echo 'active'; ?>">
                                <a class="nav-link" href="index.php?controleur=Service&action=afficher">Nos Services</a>
                            </li>                          
                            <li class="nav-item <?php if ($current_page == 'index.php' && isset($_GET['controleur']) && $_GET['controleur'] == 'RDV' && isset($_GET['action']) && $_GET['action'] == 'afficher') echo 'active'; ?>">
                                <a class="nav-link" href="index.php?controleur=RDV&action=afficher">Rendez-vous</a>
                            </li>
                            <li class="nav-item <?php if ($current_page == 'index.php' && isset($_GET['controleur']) && $_GET['controleur'] == 'Reprog' && isset($_GET['action']) && $_GET['action'] == 'afficher') echo 'active'; ?>">
                                <a class="nav-link" href="index.php?controleur=Reprog&action=afficher">Reprogrammation</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Logo flottant -->
        <img src="public/images/ren_race" alt="Floating Logo" class="floating-logo" id="floatingLogo" onclick="scrollToTop()">

        <script>
            function scrollToTop() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        </script>


