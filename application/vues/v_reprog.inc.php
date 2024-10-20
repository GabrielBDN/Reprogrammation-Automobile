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
                <li class="breadcrumb-item"><a href="#">Voitures</a></li>
                <li class="breadcrumb-item active" aria-current="page"><!----></li>
            </ol>
        </div>
    </nav>


    <div class="progress-step-header">
        <div class="container2">
            <div class="progress-step-header-container2 d-sm-flex align-items-center"><a class="progress-step-header-back" href="#">Retour</a>

                <div class="progress-step-header-number2" href="#">Etape 1</div>
                <div class="progress-step-header-title2" href="">Choisissez la marque du véhicule</div>
            </div>
            <div class="progress-step-header-bar2">
                <div class="progress">
                    <div class="progress-bar2" role="progressbar" style="width: 10%;" aria-valuenow="{{progress}}"
                         aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="progress-step-header-bar-value2">10 %</div>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="brands-logo-list">
            <?php
            // Récupérer les données de l'API
            $url = 'https://reprogrammation.mtrmotorsport.com/api/vehicles/1/brands/';
            $data = file_get_contents($url);

            // Décoder les données JSON en objet PHP
            $brands = json_decode($data);

            // Afficher les logos des marques avec leur nom et attribut data-brand-id
            foreach ($brands as $brand) {
                echo '<a class="brand-logo-item" href="#" data-brand-id="' . $brand->id . '"><img loading="lazy" class="img-fluid brands-logo-list-logo" alt="' . $brand->name . '" src="https://reprogrammation.mtrmotorsport.com/api/vehicles/1/brands/' . $brand->id . '/logo/dark/small"></a>';
            }
            ?>
        </div>
        <!-- Formulaire invisible pour envoyer les données des modèles de véhicules -->
        <form id="models-form" action="index.php?controleur=Models&action=afficher" method="post" style="display: none;">
            <input type="hidden" name="modelsData" id="modelsDataInput">
        </form>

        <!-- Container pour afficher les modèles de véhicules -->
        <div id="models-container"></div>
    </div>

    <script>
        $(document).ready(function () {
            // Fonction pour charger les modèles de véhicules d'une marque donnée avec les logos
            function loadModelsAndLogos(brandId) {
                $.ajax({
                    url: 'https://reprogrammation.mtrmotorsport.com/api/vehicles/1/brands/' + brandId + '/models',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if(!Array.isArray(data)){
                            data = $.map(data, function(valeur, cle){
                return valeur;                            });
                        }
                        // Préparer un tableau pour les données finales à envoyer
                        var modelsData = [];

                        // Récupérer l'URL du logo de la marque
                        var logoUrl = $('.brand-logo-item[data-brand-id="' + brandId + '"] img').attr('src');

                        // Ajouter l'URL du logo aux données de chaque modèle
                        
                        
                        data.forEach(function (model) {
                            model.imageUrl = 'https://reprogrammation.mtrmotorsport.com/api/vehicles/1/brands/' + brandId + '/models/' + model.id + '/miniature';
                            model.logoUrl = logoUrl;
                            modelsData.push(model);
                        });
                        
                        var url = "index.php?controleur=Models&action=afficher&model="+ brandId;

                        // Créer un formulaire avec les données des modèles et le logo de la marque
                        var form = $('<form action="'+url+'" method="post"></form>');
                        form.append('<input type="hidden" name="modelsData" value="' + encodeURIComponent(JSON.stringify(modelsData)) + '">');
                        form.append('<input type="hidden" name="brandLogoUrl" value="' + logoUrl + '">');
                        form.append('<input type="hidden" name="marqueName" value="' + $('[data-brand-id="' + brandId + '"]').find('img').attr('alt') + '">');

                        // Ajouter le formulaire à la page et le soumettre
                        $('body').append(form);
                        console.error(form);
                       form.submit();
                    },
                    error: function (xhr, status, error) {
                        console.error('Erreur lors du chargement des modèles de véhicules:', error);
                    }
                });
            }

            // Capturer l'événement de clic sur un logo de marque
            $('.brand-logo-item').click(function (event) {
                event.preventDefault();
                var brandId = $(this).data('brand-id');
                // Charger les modèles de véhicules et les logos de la marque
                loadModelsAndLogos(brandId);
            });
        });
    </script>

