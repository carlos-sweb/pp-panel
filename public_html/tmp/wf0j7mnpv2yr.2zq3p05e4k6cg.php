<!DOCTYPE html>
<html lang="es" xml:lang="es" style="position:relative;min-height:100%;">
<head>
<meta charset="utf-8">
	<link rel="icon" type="image/png" href="favicon.png">
	<!--aqui van los metas-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mister Yiyo</title>
	<link rel="stylesheet" href="node_modules/pp-drawer.js/pp-drawer.min.css">
	<?php foreach (($css?:[]) as $link): ?>
		<link 
			rel="stylesheet" 
			href="<?= ($link) ?>"/>
	<?php endforeach; ?>
</head>
<body class="body" >
<div drawer-id="main" class="pp-drawer hidden_drawer drawer-shadow"></div>
<div drawer-id="main" class="pp-drawer-scrim hidden"></div>
<?php echo $this->render('parts/navbar.html',NULL,get_defined_vars(),0); ?>
<?php echo $this->render('content/home.html',NULL,get_defined_vars(),0); ?>
<?php echo $this->render('parts/footer.html',NULL,get_defined_vars(),0); ?>
<script type="text/javascript" src="node_modules/pp-drawer.js/pp-drawer.min.js" ></script>
<script type="text/javascript" src="node_modules/pp-router.js/pp-router.min.js" ></script>
<script type="text/javascript" src="node_modules/axios/dist/axios.min.js" ></script>
<script type="text/javascript" src="js/main.js?v=<?= ($rand) ?>" ></script>
</body>
</html>