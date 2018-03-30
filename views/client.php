<?php if($client['id_type'] == 2){ ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">Prestations réalisées</div>
            <div class="panel-body">
                <form method="post">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Classe:</th>
                            <th>Prestation:</th>
                            <th>Date:</th>
                            <th>Nb heures:</th>
                            <th>Tarif:</th>
                            <th>Total:</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 0; $i < 3; $i++){ ?>
                        <tr>
                            <td>
                                <select name="classes[]" class="form-control classes">
                                    <?php foreach($classes as $classe){ ?>
                                        <option value="<?= $classe['id_cla']; ?>"><?= $classe['libelle']; ?></option> 
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select name="prestations[]" class="form-control prestations">
                                    <?php foreach($prestations as $prestation){ ?>
                                        <option value="<?= $prestation['id_presta']; ?>"><?= $prestation['libelle']; ?></option> 
                                    <?php } ?>
                                </select>
                            </td>
                            <td><input type="text" name="dates[]" class="datepicker form-control" pattern="^[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])$"></td>
                            <td><input type="number" name="nbs[]" class="form-control nbs" min="0" step="0.5" pattern="^[0-9.]+$"></td>
                            <td><input type="text" name="tarifs[]" class="form-control tarifs" disabled></td>
                            <td><input type="text" name="totaux[]" class="form-control totaux" disabled></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="submit" name="submitCours" class="btn btn-success pull-right">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">Factures</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label>Choix du mois</label>
                            <select class="form-control">
                                <option>Janvier</option>
                                <option>Février</option>
                                <option>Mars</option>
                                <option>Avril</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="envoyer" id="envoyer">Envoyer
                                </label>
                            </div>
                        </div>
                        <div class="form-group hidden" id="sujet">
				            <label>Sujet</label>
				            <input name="sujet" class="form-control">
				        </div>
                        <div class="form-group hidden" id="contenu">
				            <label>Message:</label>
				            <textarea name="message" id="message" class="form-control" rows="3"></textarea>
				        </div>
                        <button type="submit" name="submitPDF" class="btn btn-success"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Générer PDF</button>
                        <button type="submit" name="submitCSV" class="btn btn-warning"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Générer CSV</button>
                        <button type="submit" name="submitPrint" class="btn btn-danger"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">Évolution du C.A</div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">Évolution du C.A</div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <canvas class="main-chart" id="bar-chart" height="200" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->

<div class="row">
    <?php $i = 0; foreach($pourcentage_prestations as $pourcentage){ ?>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-<?= $color_panels[$i]; ?>">
            <div class="panel-heading text-center">
                <h4><?= $pourcentage['libelle']; ?></h4>
            </div>
            <div class="panel-body easypiechart-panel">
                <div class="easypiechart easypiechart-<?= $easypie_names[$i]; ?>" data-percent="<?= $pourcentage['pourcentage']; ?>"><span class="percent"><?= $pourcentage['pourcentage']; ?>%</span>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if($i>2)
            $i = 0;
        else
            $i++;
        } ?>
</div>

<!--/.row-->
<?php 
   $cdn = "<script src='".BASE_URL."/ckeditor/ckeditor.js'></script>
           <script src='".BASE_URL."/js/jquery-ui.min.js'></script>";
   $script = "$('.nbs').click(function(){
                var tarif = $(this).parent().next('td').find('.tarifs');
                var id_presta = $(this).parent().prev('td').prev('td').find('.prestations').val();
                var id_cli = {$client['id_cli']};
               
                $.ajax({
                  method: 'POST',
                  url: '".BASE_URL."/ajax',
                  data: { id_cli: id_cli, id_presta: id_presta },
                  success : function(data){
                    tarif.val(data);   
                  }
                });
             });
   
             $('.nbs').each(function(){
                $(this).keyup(function(){
                    var tarif = $(this).parent().next('td').find('.tarifs').val();
                    var total = $(this).parent().next('td').next('td').find('.totaux');
                
                    $(total).val(tarif * $(this).val());
                });
             });
            
             $('#envoyer').click(function(){
                if($('#sujet').hasClass('hidden'))
                {
                    $('#sujet').removeClass('hidden');
                    $('#contenu').removeClass('hidden');
                }
                else
                {
                    $('#sujet').addClass('hidden');
                    $('#contenu').addClass('hidden');
                }
             });
             
             CKEDITOR.replace('message');
             
             lineChart(".$tab_ca_mensuels.",".$tab_last_ca_mensuels.");
             barChart(".$tab_ca_mensuels.",".$tab_last_ca_mensuels.");
             
             $.datepicker.regional['fr'] = {
             closeText: 'Fermer',
             prevText: 'Précédent',
             nextText: 'Suivant',
             currentText: 'Aujourd\'hui',
             monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
             monthNamesShort: ['Janv.','Févr.','Mars','Avril','Mai','Juin','Juil.','Août','Sept.','Oct.','Nov.','Déc.'],
             dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
             dayNamesShort: ['Dim.','Lun.','Mar.','Mer.','Jeu.','Ven.','Sam.'],
             dayNamesMin: ['D','L','M','M','J','V','S'],
             weekHeader: 'Sem.',
             dateFormat: 'yy-mm-dd',
             firstDay: 1,
             isRTL: false,
             showMonthAfterYear: false,
             yearSuffix: ''};
             $.datepicker.setDefaults($.datepicker.regional['fr']);
             $('.datepicker').datepicker();";
?>