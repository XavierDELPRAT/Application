<div class="row">
   <?php $i = 0; foreach($ca_clients as $ca){ ?>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-<?= $easypie_names[$i]; ?> panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <strong><?= $ca['raison_social']; ?></strong>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?= $ca['ca']; ?></div>
                    <div class="text-muted">Euros</div>
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

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">Évolution du C.A sur n et n-1</div>
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
    <?php $i = 0; foreach($pourcentage_clients as $pourcentage){ ?>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-<?= $color_panels[$i]; ?>">
             <div class="panel-heading text-center">
                 <h4><?= $pourcentage['raison_social']; ?></h4>
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

<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">Répartition du C.A</div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <canvas class="chart" id="pie-chart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">Livres de recettes</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form">
                        <div class="form-group">
                            <label>Choix de l'année</label>
                            <select class="form-control">
                                <option>2017</option>
                                <option>2016</option>
                                <option>2015</option>
                                <option>2014</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Générer PDF</button>
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Générer CSV</button>
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/.row-->
<?php 
    $script = "lineChart(".$tab_ca_mensuels.",".$tab_last_ca_mensuels.");
               pieChart(".json_encode($ca_clients).");";
?>