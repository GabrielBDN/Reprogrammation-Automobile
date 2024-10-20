<?php

session_start();

ob_start();

require_once 'configs/chemins.class.php';
require_once Chemins::CONFIGS . 'mySQLconfig.class.php';
require_once Chemins::CONFIGS . 'variables_globales.class.php';



require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
if (!isset($_REQUEST['controleur'])) {
    require_once(Chemins::VUES . "v_main.inc.php");
} else {

    $classeControleur = 'Controleur' . $_REQUEST['controleur']; //ex : ControleurProduits
    $fichierControleur = $classeControleur . ".class.php"; //ex : ControleurProduits.class.php
    require_once(Chemins::CONTROLEURS . $fichierControleur);

    $action = $_REQUEST['action']; //exemple : afficher

    $objetControleur = new $classeControleur(); //ex : $objetControleur = new ControleurProduits();
    $objetControleur->$action(); //ex : $objetControleur->afficher();
    //version avec classe statique
    // $classeStatiqueControleur = 'Controleur' . $_REQUEST['controleur'];
    // $classeStatiqueControleur::$action();
}

require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';





?>