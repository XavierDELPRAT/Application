<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="<?= BASE_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>/css/datepicker.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>/css/styles.css" rel="stylesheet">
    <link href="<?= BASE_URL; ?>/css/bootstrap-theme.min.css" rel="stylesheet">
    <!--Icons-->
    <script src="<?= BASE_URL; ?>/js/lumino.glyphs.js"></script>
    <!--[if lt IE 9]>
    <script src="<?= BASE_URL; ?>/js/html5shiv.js"></script>
    <script src="<?= BASE_URL; ?>/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Menu mobile</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                <a class="navbar-brand" href="<?= BASE_URL; ?>"><span>Cré@tix</span>-web</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Mon compte <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?= BASE_URL."/profil"; ?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profil</a></li>
							<li><a href="<?= BASE_URL."/parametres"; ?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Paramètres</a></li>
							<li><a href="<?= BASE_URL."/logout"; ?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Déconnexion</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Rechercher ...">
			</div>
		</form>
		<ul class="nav menu">
			<li <?= isActive($title,"Tableau de bord"); ?>><a href="<?= BASE_URL; ?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Tableau de bord</a></li>
			<?php foreach($clients as $client)
                  { 
                    echo "<li ".isActive($title,$client['raison_social'])."><a href='".BASE_URL."/client/{$client['id_cli']}'><svg class='glyph stroked folder'><use xlink:href='#stroked-folder'/></svg> {$client['raison_social']}</a></li>";
                  }
            ?>
			<li role="presentation" class="divider"></li>
			<li <?= isActive($title,"Nouveau client"); ?>><a href="<?= BASE_URL; ?>/nouveau-client"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Nouveau client</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?= BASE_URL; ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?= $title; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?= $title; ?></h1>
			</div>
		</div><!--/.row-->
		<?= flash(); ?>
		<?= $content; ?>
	</div>	<!--/.main-->
    
	<script src="<?= BASE_URL; ?>/js/jquery-1.11.1.min.js"></script>
	<script src="<?= BASE_URL; ?>/js/bootstrap.min.js"></script>
	<script src="<?= BASE_URL; ?>/js/chart.min.js"></script>
	<script src="<?= BASE_URL; ?>/js/chart-data.js"></script>
	<script src="<?= BASE_URL; ?>/js/easypiechart.js"></script>
	<script src="<?= BASE_URL; ?>/js/easypiechart-data.js"></script>
	<?= isset($cdn) ? $cdn : ''; ?>
	<script>
		/*$('#calendar').datepicker({
		});*/

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
        <?= $script ?>
	</script>	
</body>
</html>
