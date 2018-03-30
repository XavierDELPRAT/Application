<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">Informations du profil</div>
            <div class="panel-body">
				<div class="col-md-12">
				    <form class="form-horizontal" method="post">
                      <div class="form-group">
                        <label for="raison_social" class="col-sm-2 control-label">Raison social</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="raison_social" id="raison_social" required value="<?= $user['raison_social']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="siren" class="col-sm-2 control-label">Siren</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="siren" id="siren" required pattern="^[0-9]{3}([ ]?[0-9]{3}){2}$" value="<?= $user['siren']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="adresse" id="adresse" required value="<?= $user['adresse']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="cp" class="col-sm-2 control-label">Code postal</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="cp" id="cp" required pattern="^[0-9]{5}|2A|2B$" value="<?= $user['cp']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ville" class="col-sm-2 control-label">Ville</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="ville" id="ville" required pattern="^([A-Z][a-z]+[ -]?)+$" value="<?= $user['ville']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tel" class="col-sm-2 control-label">Téléphone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="tel" id="tel" required pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" value="<?= $user['tel']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" required value="<?= $user['email']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="mdp" class="col-sm-2 control-label">Mdp</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="mdp" id="mdp" required pattern="^[A-Za-z0-9]{8,25}$">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="hidden" name="id_u" value="<?= $_SESSION['id']; ?>">
                          <input type="submit" name="edit" class="btn btn-success" value="Mettre à jour" id="edit">
                          <input type="submit" name="supp" class="btn btn-danger" value="Supprimer" id="supp">
                        </div>
                      </div>
                    </form>
				</div>
            </div>
        </div>
    </div><!-- /.col-->
 </div><!-- /.row -->
<?php 
    $script = "$('#supp').click(function(){
        return confirm('Etes-vous sûr ?');
    })";
?>