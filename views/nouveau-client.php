<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">Informations client</div>
            <div class="panel-body">
				<div class="col-md-12">
				    <form class="form-horizontal" method="post">
                      <div class="form-group">
                        <label for="raison_social" class="col-sm-2 control-label">Raison social</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="raison_social" id="raison_social" required <?= inputValue('raison_social'); ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="siren" class="col-sm-2 control-label">Destinataire</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="destinataire" id="destinataire" required <?= inputValue('destinataire'); ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" required <?= inputValue('email'); ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Emailcc</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="emailcc" id="emailcc" <?= inputValue('emailcc'); ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="adresse" id="adresse" required <?= inputValue('adresse'); ?>> 
                        </div>
                      </div>  
                       <div class="form-group">
                        <label for="cp" class="col-sm-2 control-label">Code postal</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="cp" id="cp" required pattern="^[0-9]{5}|2A|2B$" <?= inputValue('cp'); ?>>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ville" class="col-sm-2 control-label">Ville</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="ville" id="ville" required pattern="^([A-Z][a-z]+[ -]?)+$" <?= inputValue('ville'); ?>>
                        </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-2 control-label">Encaissement</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="encaissement">
                                <?php 
                                    foreach($encaissements as $encaissement){ 
                                        echo "<option value='{$encaissement['id_encaiss']}'>{$encaissement['libelle']}</option>";
                                    }
                                ?>
                                </select>
                          </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-2 control-label">Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="type" id="type">
                                <?php 
                                    foreach($types as $type){ 
                                        echo "<option value='{$type['id_type']}'>{$type['libelle']}</option>";
                                    }
                                ?>
                                </select>
                          </div>
                      </div>
                      <div class="form-group hidden classes">
                        <label class="col-sm-2 control-label">Classe</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="classes[]" pattern="^[A-Za-z0-9 -]+$">
                        </div>
                        <div class="col-sm-1">
                            <button type="button" name="duplicatebtnclasse" id="duplicatebtnclasse" class="btn btn-default"><strong>+</strong></button>
                        </div>
                      </div>
                      <div class="form-group hidden classes" id="duplicateclasse">
                        <label class="col-sm-2 control-label">Classe</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="classes[]" pattern="^[A-Za-z0-9 -]+$">
                        </div>
                      </div>
                      <hr>
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
                            <button type="button" name="duplicatebtnpresta" id="duplicatebtnpresta" class="btn btn-default"><strong>+</strong></button>
                        </div>
                      </div>
                      <div class="form-group hidden" id="duplicatepresta">
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
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="hidden" name="id_u" value="<?= $_SESSION['id']; ?>">
                          <input type="submit" name="submit" class="btn btn-success" value="Enregistrer">
                          <input type="reset" name="raz" class="btn btn-danger" value="RAZ">
                        </div>
                      </div>
                    </form>
				</div>
            </div>
        </div>
    </div><!-- /.col-->
 </div><!-- /.row -->
<?php 
    $script = "$('#type').change(function(){
                if($(this).val()==2)
                  $('.classes:first').removeClass('hidden');
                else
                {
                  $('.classes').each(function(index,elem){
                   $(elem).find('input').val('');
                  });
                  $('.classes').addClass('hidden');
                }
    });

    $('#duplicatebtnclasse').click(function(e){
			e.preventDefault();
			var clone = $('#duplicateclasse').clone().attr('id','').removeClass('hidden');
			$('#duplicateclasse').before(clone);
    });
    
    $('#duplicatebtnpresta').click(function(e){
			e.preventDefault();
			var clone = $('#duplicatepresta').clone().attr('id','').removeClass('hidden');
			$('#duplicatepresta').before(clone);
    });";
?>