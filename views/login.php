<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page de login</title>
    <link href="<?= BASE_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>/css/datepicker3.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>/css/styles.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?= BASE_URL; ?>/js/html5shiv.js"></script>
    <script src="<?= BASE_URL; ?>/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>	
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Connectez-vous</div>
				<div class="panel-body">
				    <?= flash(); ?>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Raison social" name="raison_social" type="text" autofocus="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="mdp" type="password" value="" required>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Se souvenir de moi">Se souvenir de moi
								</label>
							</div>
							<input type="submit" name="submit" class="btn btn-primary" value="Connexion">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<script src="<?= BASE_URL; ?>/js/jquery-1.11.1.min.js"></script>
	<script src="<?= BASE_URL; ?>/js/bootstrap.min.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>
</html>
