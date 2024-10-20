<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reprogrammation</title>
        <link rel="stylesheet" href="path/to/bootstrap.css">
        <link rel="stylesheet" href="path/to/custom.css">
    </head>
    <body>
        <div class="page-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Reprogrammation</h1>
                        <span>Nous avons plus de 20 ans d'expérience</span>
                    </div>
                </div>
            </div>
        </div>

        <nav class="breadcrumb-nav" aria-label="breadcrumb">
            <div class="container2">
                <ol class="breadcrumb2">
                    <li class="breadcrumb-item"><a href="http://localhost/REN_RACE/index_REN_RACE/index.php?controleur=Reprog&action=afficher">Voitures</a></li>
                    <li class="breadcrumb-item"><a href="#"><?php echo $_POST['marqueName'];?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span>Modèle</span></li>
                </ol>
            </div>
        </nav>

        <div class="progress-step-header">
            <div class="container2">
                <div class="progress-step-header-container2 d-sm-flex align-items-center"><a class="progress-step-header-back"
                                                                                             href="index.php?controleur=Reprog&action=afficher">Retour</a>
                    <div class="progress-step-header-number2" href="#">Etape 2</div>
                    <div class="progress-step-header-title2" href="">Choisissez le modèle du véhicule</div>
                </div>
                <div class="progress-step-header-bar2">
                    <div class="progress">
                        <div class="progress-bar2" role="progressbar" style="width: 20%;" aria-valuenow="{{progress}}"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="progress-step-header-bar-value2">20 %</div>
                </div>
            </div>
        </div>

        <?php
        // Vérifier si des données de modèles ont été reçues via POST
        if (isset($_POST['modelsData'])) {
            // Décoder les données JSON des modèles
            $modelsData = json_decode(urldecode($_POST['modelsData']));

            echo '<div class="container" id = "PageDebut">';
            echo '<div class="row">';

            // Récupérer l'URL du logo de la marque envoyée via le formulaire
            $brandLogoUrl = isset($_POST['brandLogoUrl']) ? $_POST['brandLogoUrl'] : '';

            // Regrouper les modèles par marque
            $brands = [];
            foreach ($modelsData as $model) {
                // Vérifier si la propriété 'brand' existe dans l'objet $model
                $brand = isset($model->brand) ? $model->brand : 'Marque Inconnue';
                $brands[$brand][] = $model;
            }

            foreach ($brands as $brand => $models) {
                echo '<div class="col-lg-4">';
                echo '<div id="model-list" class="choice-list-component box-component">';
                echo '<div class="box-component-brand">' . $brand . '</div>';
                echo '<div class="box-component-title d-flex align-items-center">';
                echo '<img class="img-fluid model-logo" src="' . $brandLogoUrl . '" alt="' . $brand . '">';
                echo '<span class="bct-tag">Modèle</span>';
                echo '</div>';
                echo '<div class="box-component-content-column box-component-col-height">';
                echo '<div class="scroller-component">';
                echo '<div class="list-component">';

                foreach ($models as $model) {
                    echo '<div class="car-model">';
                    echo '<img class="car-miniature" src="' . (isset($model->imageUrl) ? $model->imageUrl : 'chemin/vers/image-par-defaut.jpg') . '" alt="' . $model->name . '">';
                    echo '<a href="#year-list" class="model-item" id="' . $model->id . '">' . $model->name . '</a>';
                    echo '</div>';
                }

                echo '</div>'; // end list-component
                echo '</div>'; // end scroller-component
                echo '</div>'; // end box-component-content-column
                echo '</div>'; // end choice-list-component
                echo '</div>'; // end col-lg-4
            }
            echo '<div class = "col-lg-4" id = "yearList">';
            echo '<div id = "year-list" class = "choice-list-component box-component">';
            echo '<div class = "box-component-title d-flex align-items-center"> <img class="img-fluid model-logo" src="' . $brandLogoUrl . '" alt="' . $brand . '"><span class = "bct-tag">Année</span></div>';
            echo '<div class = "box-component-content-column box-component-col-height">';
            echo '<div class = "scroller-component">';
            echo '<div class = "list-component">';

            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class = "col-lg-4" id="fuelList">';
            echo '<div id = "motor-list" class = "choice-list-component box-component">';
            echo '<div class = "box-component-title d-flex align-items-center"><img class = "img-fluid model-logo" src = "' . $brandLogoUrl . '" alt = ""><span class = "bct-tag">Motorisation</span></div>';

            echo '<div class = "box-component-content-column box-component-col-height motor-box">';
            echo '<div class = "motor-scroller" id="fuel-list">';

            echo '<div>';

            echo '</div>';
            echo '</div>';
            echo '<div class = "motorisation-section"><!----></div>';
            echo '<div class = "motorisation-section"><!----></div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '</div>'; // end row
            echo '</div>'; // end container
        } else {
            // Afficher un message si aucune donnée n'a été reçue

            echo '<div class="row">';
            echo '<div class="col-md-12">';
            echo '<p>Aucune donnée de modèle de voiture n\'a été reçue.</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

        <div id = "PageFin" class="container disabled">
            <div class="choice-list-row-component row">
                <div class="col-lg-7 mobile-second" data-v-71621ad2="">
                    <div id="year-list" class="choice-list-component box-component" data-v-71621ad2="">
                        <div class="box-component-title d-flex align-items-center" data-v-71621ad2=""><img
                                class="img-fluid model-logo"<?php echo "src='$brandLogoUrl' alt='$brand'";?>
                                data-v-71621ad2=""><span class="bct-tag" data-v-71621ad2="">A4 - B8 Mk2 - 2012 -&gt; 2015 - 1.4
                                TFSI</span></div>
                        <div class="box-component-content-column" data-v-71621ad2="">
                            <div class="stage" data-v-71621ad2="">
                                <div class="stage-section" data-v-71621ad2=""></div>
                            </div>
                            <table class="motor-detail" data-v-71621ad2="">
                                <thead data-v-71621ad2="">
                                    <tr data-v-71621ad2="">
                                        <th data-v-71621ad2=""></th>
                                        <th data-v-71621ad2="">Origine</th>
                                        <th data-v-71621ad2="">Modifié</th>
                                        <th data-v-71621ad2="">Différence</th>
                                    </tr>
                                </thead>
                                <tbody data-v-71621ad2="">
                                    <tr class="motor-detail-power" data-v-71621ad2="">
                                        <td data-lobel="Power" data-v-71621ad2="">Puissance</td>
                                        <td data-lobel="EnginePower" data-v-71621ad2="">125 ch</td><!----><!---->
                                        <td data-lobel="NewPower" data-v-71621ad2="">-</td><!----><!---->
                                        <td data-lobel="Difference" data-v-71621ad2="">-</td>
                                    </tr>
                                    <tr class="motor-detail-torque" data-v-71621ad2="">
                                        <td data-lobel="Torque" data-v-71621ad2="">Couple</td>
                                        <td data-lobel="EngineTorque" data-v-71621ad2="">200 Nm</td><!---->
                                        <td data-lobel="NewTorque" data-v-71621ad2="">-</td><!----><!---->
                                        <td data-lobel="EngineDifference" data-v-71621ad2="">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="full-width mobile-third" data-v-71621ad2=""><button
                                class="mobile-only mobile-button reserved-button" data-v-71621ad2=""onclick="location.href='index.php?controleur=RDV&action=afficher';"> Réserver </button><!---->
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mobile-first" data-v-71621ad2="">
                    <div class="choice-list-component box-component graph-box" data-v-71621ad2="">
                        <div data-v-71621ad2="" id="divFinale">
                        </div><!---->
                        <div class="box-component-content-column" data-v-71621ad2=""></div>
                    </div><button class="reserved-button desktop-only" data-v-71621ad2="" onclick="location.href='index.php?controleur=RDV&action=afficher';"> Réserver </button><!---->
                </div>
            </div>
        </div>



        <script>
            $(document).ready(function () {
                
                // Fonction pour charger les modèles de véhicules d'une marque donnée avec les logos
                function loadYears(modeleId) {
                    var test = new URLSearchParams(window.location.search);
                    var test2 = test.get('model');
                    $('.progress-step-header-number2').text("Etape 3");
                    $('.progress-step-header-title2').text("Choisissez l'année du véhicule");
                    $('.active').removeClass('active');
                    $('#' + modeleId).addClass('active');
                    $('.breadcrumb-item active').removeClass('active');
                    $('.breadcrumb-item').find('span').replaceWith(function(){
                        return $('<a>', {
                            html: $(this).html(),
                            href: '#'
                        });
                    });
                    $('.breadcrumb2').append("<li class='breadcrumb-item active'><span>"+$('.model-item.active').text())+"</span></li>";

                    $.ajax({
                        url: 'https://reprogrammation.mtrmotorsport.com/api/vehicles/1/brands/' + test2 + '/models/' + modeleId + '/years/',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Préparer un tableau pour les données finales à envoyer
                            var modelsData = [];
                            data.forEach(function (model) {
                                $('#year-list .list-component').append('<div><a class="yearList" href="#motor-list" id="' + model.id + '">' + model.long_name + '</a></div>');
                            });
                        },
                        error: function (xhr, status, error) {
                            console.error('Erreur lors du chargement des modèles de véhicules:', error);
                        }
                    });
                    
                    changerAvancement(50);
                }
                
                
                function changerAvancement(avancement){
                    $('.progress-bar2').css('width', avancement+'%');
                    $('.progress-step-header-bar-value2').text(avancement + "%");
                }

                function loadFuel(yearId) {
                    var test = new URLSearchParams(window.location.search);
                    var test2 = test.get('model');
                    $('.progress-step-header-number2').text("Etape 4");
                    $('.progress-step-header-title2').text("Choisissez la motorisation du véhicule");
                    $('#' + yearId).addClass('active');
                    $('.breadcrumb-item active').removeClass('active');
                    $('.breadcrumb-item').find('span').replaceWith(function(){
                        return $('<a>', {
                            html: $(this).html(),
                            href: '#'
                        });
                    });
                    $('.breadcrumb2').append("<li class='breadcrumb-item active'><span>"+$('.yearList.active').text())+"</span></li>";
                    $.ajax({
                        url: 'https://reprogrammation.mtrmotorsport.com/api/vehicles/1/brands/' + test2 + '/models/' + $('.model-item.active').attr('id') + '/years/' + yearId + "/powertrains",
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Préparer un tableau pour les données finales à envoyer
                            var modelsData = {};
                            $.each(data, function (index, item) {
                                if (!modelsData[item.engine.fuel_type]) {
                                    modelsData[item.engine.fuel_type] = [];
                                }
                                modelsData[item.engine.fuel_type].push(item);
                            });

                            $.each(modelsData, function (fuel_type, items) {
                                if (fuel_type == 'petrol') {
                                    fuel_type = 'Essence';
                                }
                                if(fuel_type == 'petrol micro-hybrid'){
                                    fuel_type = 'Micro-hybride essence';
                                }
                                var fuelDiv = $('<div></div>').addClass('fuel-type').text(fuel_type);
                                $('#motor-list .motor-scroller').append(fuelDiv);
                                $.each(items, function (index, item) {
                                    var divSurSurItem = $('<div></div>').addClass('motorisation-section');
                                    var divSurItem = $('<div></div>').addClass('list-component');
                                    var finalDiv = $('<div></div>');
                                    var itemDiv = $('<a></a>').text(item.engine.name).attr("href", "#").attr("id", item.id).addClass("listeDesFuels");
                                    var aChevaux = $('<a></a>').addClass('engine-link').attr("href", '#').text(item.engine.power + "ch");
                                    var divPourChevaux = $('<div></div>').addClass('engine-bg').append(aChevaux);
                                    divSurSurItem.append(divSurItem);
                                    $('#motor-list .motor-scroller').append(divSurSurItem);
                                    divSurItem.append(finalDiv);
                                    finalDiv.append(itemDiv);
                                    itemDiv.append(divPourChevaux);
                                });

                                ;
                                
                                changerAvancement(70);
                            });


//                    data.forEach(function (model){
//                    $('#motor-list .motor-scroller').append('<div><a href="#motor-list">'+model.engine.name+'</a></div>');
//                    });
                        },
                        error: function (xhr, status, error) {
                            console.error('Erreur lors du chargement des modèles de véhicules:', error);
                        }
                    });
                }


                function loadStages(motorId) {
                    var test = new URLSearchParams(window.location.search);
                    var test2 = test.get('model');
                    $('.progress-step-header-number2').text("Etape 5");
                    $('.progress-step-header-title2').text("Choisissez la reprogrammation du véhicule");
                    $('#' + motorId).addClass('active');
                    $('.breadcrumb-item active').removeClass('active');
                    $('.breadcrumb-item').find('span').replaceWith(function(){
                        return $('<a>', {
                            html: $(this).html(),
                            href: '#'
                        });
                    });
                    $('.breadcrumb2').append("<li class='breadcrumb-item active'><span>"+$('.listeDesFuels.active').text().replace($('.listeDesFuels.active').find('a').text(), ''))+"</span></li>";
                    $.ajax({
                        url: 'https://reprogrammation.mtrmotorsport.com/api/vehicles/1/brands/' + test2 + '/models/' + $('.model-item.active').attr('id') + '/years/' + $(".yearList.active").attr("id") + "/powertrains/" + motorId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Préparer un tableau pour les données finales à envoyer
                            var stageData = data.engine.stages;
                            var numStage = 0;
                            $.each(stageData, function(index, stage){
                                numStage++;
                                 var classAttr = (numStage == 1) ? 'class="current"' : '';
                                $('.stage-section').append('<a ' + classAttr + 'tabindex="4" data-idStage="'+stage.id+'">'+stage.name+'</div></a>');
                            });
                            
                            $('td[data-lobel="EnginePower"]').text(data.engine.power + " ch");
                            $('td[data-lobel="EngineTorque"]').text(data.engine.torque + " Nm");
                            $newPower = stageData[0].power;
                            $difference = "-";
                            if($newPower == null){$newPower = "-";}else{
                                $diffPrix = $newPower - data.engine.power;
                                $difference = "+ " + $diffPrix + "ch";
                                $newPower = $newPower + "ch";
                            }
                            $('td[data-lobel="NewPower"]').text($newPower);
                            $('td[data-lobel="Difference').text($difference);
                            
                            
                            $newTorque = stageData[0].torque;
                            $difference = "-";
                            if($newTorque == null){$newTorque = "-";}else{
                                $diffPrix = $newTorque - data.engine.torque;
                                $difference = "+ " + $diffPrix + "Nm";
                                $newTorque = $newTorque + "Nm";
                            }
                            $('td[data-lobel="NewTorque"]').text($newTorque);
                            $('td[data-lobel="EngineDifference').text($difference);
                            $('.bct-tag').text($('.model-item.active').text() + " - " + $('.yearList.active').text() + " - " + $('.listeDesFuels.active').text().replace($('.listeDesFuels.active').find('a').text(), ''));
                            if($('.current').data('idstage') == -1){
                                $('#divFinale').append('<img class="img-flex-fuel" src="https://reprogrammation.mtrmotorsport.com/images/image-flex-fuel.png" data-v-71621ad2="">');
                            }else{
var data1 = [parseInt(data.engine.power), parseInt($newPower)];
var data2 = [parseInt(data.engine.torque), parseInt($newTorque)];

dessinerGraph(data1, data2);                            }
},
                        error: function (xhr, status, error) {
                            console.error('Erreur lors du chargement des modèles de véhicules:', error);
                        }
                    });
                    
                    changerAvancement(90);
                    
                }
                
                
                function dessinerGraph(data1, data2){
                
                var canvas = '<canvas id="canvasFinal" width="568" height="567" style="display: block; box-sizing: border-box; height: 453.6px; width: 454.4px;"></canvas>';
                                $('#divFinale').append(canvas);
                                 var ctx = $('#canvasFinal')[0].getContext('2d');
                // Calculer la valeur minimale et maximale parmi les données
var minValue = Math.min(...data1.concat(data2));
var maxValue = Math.max(...data1.concat(data2));

// Dimensions du graphique
var graphWidth = 460;
var graphHeight = 460;
var graphMargin = 50;

// Calculer la différence entre la valeur maximale et minimale
var valueRange = maxValue - minValue;

// Dessiner l'axe X et Y
ctx.beginPath();
ctx.moveTo(graphMargin, graphMargin);
ctx.lineTo(graphMargin, graphMargin + graphHeight);
ctx.lineTo(graphMargin + graphWidth, graphMargin + graphHeight);
ctx.strokeStyle = 'white';
ctx.stroke();

ctx.fillStyle = 'white';
ctx.font = '14px Arial';
var labelX = graphMargin + 30;
var labelY = graphMargin + graphHeight + 20;

ctx.textAlign = "left"; // Ajusté pour afficher 'Minimum' à gauche
ctx.fillText('Minimum', labelX, labelY);

ctx.textAlign = "right"; // Ajusté pour afficher 'Maximum' à droite
ctx.fillText('Maximum', graphMargin + graphWidth, labelY);

// Dessiner les étiquettes sur le côté gauche et droit (Puissance + Couple)
ctx.save();
ctx.translate(10, graphMargin + graphHeight / 2);
ctx.rotate(-Math.PI / 2); // Rotation de 90 degrés dans le sens antihoraire
ctx.textAlign = 'center';
ctx.fillStyle = 'white';
ctx.fillText('Puissance + Couple', 0, 0);
ctx.restore();

ctx.save();
ctx.translate(graphMargin + graphWidth + 10, graphMargin + graphHeight / 2);
ctx.rotate(Math.PI / 2); // Rotation de 90 degrés dans le sens horaire
ctx.textAlign = 'center';
ctx.fillStyle = 'white';
ctx.fillText('Puissance + Couple', 0, 0);
ctx.restore();

// Dessiner les étiquettes de l'axe Y
ctx.textAlign = 'right';
ctx.textBaseline = 'middle';
ctx.font = '14px Arial';
ctx.fillStyle = 'white';

// Dessiner les étiquettes de l'axe Y
for (var i = 0; i <= 5; i++) {
    var y = graphMargin + graphHeight - (graphHeight * (i / 5));
    var labelValue = minValue + (valueRange * (i / 5));
    ctx.fillText(Math.round(labelValue), graphMargin - 10, y);
}

// Dessiner la légende au-dessus du graphique
ctx.font = '20px Arial';
ctx.fillStyle = 'blue';
ctx.textAlign = 'center';
ctx.fillText('Puissance', graphMargin + graphWidth / 2, graphMargin - 10);
ctx.fillStyle = 'red';
ctx.fillText('Couple', graphMargin + graphWidth / 2, graphMargin - 30);

// Dessiner le premier graphique linéaire (data1)
ctx.beginPath();
ctx.strokeStyle = 'blue';
ctx.lineWidth = 3;
ctx.moveTo(graphMargin, graphMargin + graphHeight - (data1[0] - minValue) / valueRange * graphHeight);
for (var i = 1; i < data1.length; i++) {
    var x = graphMargin + i * (graphWidth / (data1.length - 1));
    var y = graphMargin + graphHeight - (data1[i] - minValue) / valueRange * graphHeight;
    ctx.lineTo(x, y);
}
ctx.stroke();


ctx.fillStyle = 'blue';
for (var i = 0; i < data1.length; i++) {
    var x = graphMargin + i * (graphWidth / (data1.length - 1));
    var y = graphMargin + graphHeight - (data1[i] - minValue) / valueRange * graphHeight;
    ctx.beginPath();
    ctx.arc(x, y, 5, 0, 2 * Math.PI); // Rayon du point = 5
    ctx.fill();
}

// Dessiner le deuxième graphique linéaire (data2)
ctx.beginPath();
ctx.strokeStyle = 'red';
ctx.lineWidth = 3;
ctx.moveTo(graphMargin, graphMargin + graphHeight - (data2[0] - minValue) / valueRange * graphHeight);
for (var i = 1; i < data2.length; i++) {
    var x = graphMargin + i * (graphWidth / (data2.length - 1));
    var y = graphMargin + graphHeight - (data2[i] - minValue) / valueRange * graphHeight;
    ctx.lineTo(x, y);
}

ctx.stroke();
ctx.fillStyle = 'red';
for (var i = 0; i < data2.length; i++) {
    var x = graphMargin + i * (graphWidth / (data2.length - 1));
    var y = graphMargin + graphHeight - (data2[i] - minValue) / valueRange * graphHeight;
    ctx.beginPath();
    ctx.arc(x, y, 5, 0, 2 * Math.PI); // Rayon du point = 5
    ctx.fill();
}
                }
                
                function changeStage(stageClique){
                    $('.current').removeClass("current");
                    stageClique.addClass("current");
                    
                    var test = new URLSearchParams(window.location.search);
                    var test2 = test.get('model');
                        $.ajax({
                        url: 'https://reprogrammation.mtrmotorsport.com/api/vehicles/1/brands/' + test2 + '/models/' + $('.model-item.active').attr('id') + '/years/' + $(".yearList.active").attr("id") + "/powertrains/" + $(".listeDesFuels.active").attr('id'),
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Préparer un tableau pour les données finales à envoyer
                            var stageData = data.engine.stages;
                            
                            var nouveauStage = $.grep(stageData, function(stage){
                               return stage.id == stageClique.data('idstage'); 
                            });
                            
                            
                            $newPower = nouveauStage[0].power;
                            $difference = "-";
                            if($newPower == null){$newPower = "-";}else{
                                $diffPrix = $newPower - data.engine.power;
                                $difference = "+ " + $diffPrix + "ch";
                                $newPower = $newPower + "ch";
                            }
                            $('td[data-lobel="NewPower"]').text($newPower);
                            $('td[data-lobel="Difference').text($difference);
                            
                            $newTorque = nouveauStage[0].torque;
                            $difference = "-";
                            if($newTorque == null){$newTorque = "-";}else{
                                $diffPrix = $newTorque - data.engine.torque;
                                $difference = "+ " + $diffPrix + "Nm";
                                $newTorque = $newTorque + "Nm";
                            }
                            $('td[data-lobel="NewTorque"]').text($newTorque);
                            $('td[data-lobel="EngineDifference').text($difference);
                            $('#divFinale').empty();
                            if(stageClique.data('idstage') == -1){
                                $('#divFinale').append('<img class="img-flex-fuel" src="https://reprogrammation.mtrmotorsport.com/images/image-flex-fuel.png" data-v-71621ad2="">');
                            }else{
                                
                                var data1 = [parseInt(data.engine.power), parseInt($newPower)];
var data2 = [parseInt(data.engine.torque), parseInt($newTorque)];

dessinerGraph(data1, data2);


                            }
                            
                            
},
                        error: function (xhr, status, error) {
                            console.error('Erreur lors du chargement des modèles de véhicules:', error);
                        }
                    });
                }




                // Capturer l'événement de clic sur un logo de marque
                $('.model-item').click(function (event) {
                    event.preventDefault();
                    $('#year-list .list-component').empty();
                    $('.motor-scroller').empty();

                    var brandId = $(this).data('brand-id');
                    // Charger les modèles de véhicules et les logos de la marque
                    loadYears(this.id);
                });





                $('#yearList').on('click', '#year-list .list-component > div a', function () {
                    event.preventDefault();
                    $('.motor-scroller').empty();

                    var brandId = $(this).data('brand-id');
                    // Charger les modèles de véhicules et les logos de la marque
                    loadFuel($(this).attr('id'));
                });

                $('#fuelList').on('click', '#motor-list #fuel-list .motorisation-section .list-component > div a', function () {
                    event.preventDefault();
                    $("#PageDebut").addClass('disabled');
                    $("#PageFin").removeClass('disabled');
                    loadStages($(this).attr('id'));
                });
                
                
                $('.stage-section').on('click', '> a', function () {
                    event.preventDefault();
                    changeStage($(this));
                });


            });


        </script>

