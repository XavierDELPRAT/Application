<?php $script = ""; ?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php $i = 0; foreach($clients as $client){ ?>
    <div class="panel panel-<?= ($client['etat'] != 0) ? $color_panels[$i] : $color_panels[4]; ?>">
        <div class="panel-heading" role="tab" id="heading<?= $client['id_cli']; ?>">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $client['id_cli']; ?>" aria-expanded="true" aria-controls="collapse<?= $client['id_cli']; ?>">
              <?= $client['raison_social']; ?>
              <svg class="glyph stroked chevron down pull-right"><use xlink:href="#stroked-chevron-down"/></svg>
            </a>
        </div>
        <div id="collapse<?= $client['id_cli']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $client['id_cli']; ?>">
            <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="raison_social" class="col-sm-2 control-label">Raison social</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="raison_social" id="raison_social" required value="<?= $client['raison_social']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="siren" class="col-sm-2 control-label">Destinataire</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="destinataire" id="destinataire" required value="<?= $client['destinataire']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" required value="<?= $client['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emailcc" class="col-sm-2 control-label">Email CC</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="emailcc" id="emailcc" value="<?= $client['emailcc']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="adresse" id="adresse" required value="<?= $client['adresse']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cp" class="col-sm-2 control-label">Code postal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="cp" id="cp" required pattern="^[0-9]{5}|2A|2B$" value="<?= $client['cp']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ville" class="col-sm-2 control-label">Ville</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="ville" id="ville" required pattern="^([A-Z][a-z]+[ -]?)+$" value="<?= $client['ville']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Encaissement</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_encaiss">
                            <?php foreach($encaissements as $encaissement)
                                  { 
                                    if($encaissement['id_encaiss'] == $client['id_encaiss'])
                                        echo '<option value="'.$encaissement['id_encaiss'].'" selected>'.$encaissement['libelle'].'</option>';
                                    else
                                        echo '<option value="'.$encaissement['id_encaiss'].'">'.$encaissement['libelle'].'</option>';
                                  } 
                             ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_type" id="type<?= $client['id_cli']; ?>">
                                <?php foreach($types as $type)
                                      { 
                                        if($type['id_type'] == $client['id_type'])
                                            echo '<option value="'.$type['id_type'].'" selected>'.$type['libelle'].'</option>';
                                        else
                                            echo '<option value="'.$type['id_type'].'">'.$type['libelle'].'</option>';
                                      } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hidden" id="classe<?= $client['id_cli']; ?>">
                        <label class="col-sm-2 control-label">Classe</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="classes[]" pattern="^[A-Za-z0-9 -]+$">
                        </div>
                        <div class="col-sm-1">
                            <button type="button" name="duplicatebtnclasse" id="duplicatebtnclasse<?= $client['id_cli']; ?>" class="btn btn-default"><strong>+</strong></button>
                        </div>
                    </div>
                    <div class="form-group hidden" id="duplicateclasse<?= $client['id_cli']; ?>">
                        <label class="col-sm-2 control-label">Classe</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="classes[]" pattern="^[A-Za-z0-9 -]+$">
                        </div>
                    </div>
                    <?php foreach($client['classes'] as $classe){ ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Classe</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="classes[]" pattern="^[A-Za-z0-9 -]+$" value="<?= $classe['libelle']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Prestation</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="prestations[]">
                                <?php 
                                    foreach($prestations as $prestation){ 
                                        echo "<option value='{$prestation['id_presta']}'>{$prestation['libelle']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                          <input type="number" min="0" class="form-control" name="tarifs[]" pattern="^[0-9.]+$">
                        </div>
                        <div class="col-sm-1">
                            <button type="button" name="duplicatebtnpresta" id="duplicatebtnpresta<?= $client['id_cli']; ?>" class="btn btn-default"><strong>+</strong></button>
                        </div>
                    </div>
                    <div class="form-group hidden" id="duplicatepresta<?= $client['id_cli']; ?>">
                        <label class="col-sm-2 control-label">Prestation</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="prestations[]">
                                <?php 
                                    foreach($prestations as $prestation){ 
                                        echo "<option value='{$prestation['id_presta']}'>{$prestation['libelle']}</option>";
                                    }
                                ?>
                            </select>      
                        </div>
                        <div class="col-sm-2">
                          <input type="number" min="0" class="form-control" name="tarifs[]" pattern="^[0-9.]+$">
                        </div>
                    </div>
                    <?php foreach($client['prestations'] as $prestation_cli){ ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Prestation</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="prestations[]">
                                <?php 
                                    foreach($prestations as $prestation){ 
                                        if($prestation_cli['id_presta'] == $prestation['id_presta'])
                                            echo "<option value='{$prestation['id_presta']}' selected>{$prestation['libelle']}</option>";
                                        else
                                            echo "<option value='{$prestation['id_presta']}'>{$prestation['libelle']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                          <input type="number" min="0" class="form-control" name="tarifs[]" pattern="^[0-9.]+$" value="<?= $prestation_cli['tarif']; ?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id_u" value="<?= $_SESSION['id']; ?>">
                            <input type="hidden" name="id_cli" value="<?= $client['id_cli']; ?>">
                            <input type="submit" name="edit" class="btn btn-success" value="Modifier">
                            <?php if($client['etat'] == 1){  ?>
                            <input type="submit" name="supp" class="btn btn-danger" value="Supprimer" id="supp<?= $client['id_cli']; ?>">
                            <?php }else{ ?>
                            <input type="submit" name="activate" class="btn btn-primary" value="Activer" id="activate<?= $client['id_cli']; ?>">
                            <?php } ?> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php                                        
        $script .= "$('#supp{$client['id_cli']}').click(function(){
                        return confirm('Etes-vous sûr ?');
                    }); 
          
        if($('#type{$client['id_cli']}').val()==2){
            $('#classe{$client['id_cli']}').removeClass('hidden');
        } 
          
        $('#type{$client['id_cli']}').change(function(e){
			if($(this).val()==2)
              $('#classe{$client['id_cli']}').removeClass('hidden');
            else
              $('#classe{$client['id_cli']}').addClass('hidden');
        });
        
        $('#duplicatebtnclasse{$client['id_cli']}').click(function(e){
			e.preventDefault();
			var clone = $('#duplicateclasse{$client['id_cli']}').clone().attr('id','').removeClass('hidden');
                $('#duplicateclasse{$client['id_cli']}').before(clone);
        });

        $('#duplicatebtnpresta{$client['id_cli']}').click(function(e){
                e.preventDefault();
                var clone = $('#duplicatepresta{$client['id_cli']}').clone().attr('id','').removeClass('hidden');
                $('#duplicatepresta{$client['id_cli']}').before(clone);
        });";

        if($i>2)
            $i = 0;
        else
            $i++;
    } 
    ?>
</div>
<?php 
    $script .= "$('.panel-heading').click(function(){
                    if($(this).find('a').find('svg').find('use').attr('xlink:href') == '#stroked-chevron-up')
                        $(this).find('a').find('svg').find('use').attr('xlink:href','#stroked-chevron-down');
                    else
                        $(this).find('a').find('svg').find('use').attr('xlink:href','#stroked-chevron-up')
                });";
?>