<!DOCTYPE html>
<html lang="es" xml:lang="es" class="bc-white h-full">
<head>
<meta charset="utf-8">
	<link rel="icon" type="image/png" href="favicon.png">
	<!--aqui van los metas-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STIX-TV</title>
	<?php foreach (($css?:[]) as $link): ?>
		<link rel="stylesheet" href="<?= ($link) ?>"/>
	<?php endforeach; ?>
</head>
<body class="bc-white h-full" >

	<div drawer-id="main" class="pp-drawer hidden_drawer drawer-shadow">
		<?php echo $this->render('admin/parts/drawer.profile.html',NULL,get_defined_vars(),0); ?>
		<?php echo $this->render('admin/parts/drawer.menu.html',NULL,get_defined_vars(),0); ?>
	</div>
	<div drawer-id="main" class="pp-drawer-scrim hidden"></div>


<?php echo $this->render('admin/parts/navbar.html',NULL,get_defined_vars(),0); ?>


<div class="w-full h-minfull flex flex-col">
    <div class="w-full block pt-14"></div>
    <div class="w-full pl-8 pr-8 box-border pb-16" id="view">


	<h1><?= ($SESSION['user_name']) ?></h1>
	<h1><?= ($SESSION['user_token']) ?></h1>



	<a href="/admin/logout">Salir</a>


    </div>
</div>

<link rel="stylesheet" href="/node_modules/pp-drawer.js/pp-drawer.min.css">
<script type="text/javascript" src="/node_modules/pp-drawer.js/pp-drawer.min.js"></script>
<script type="text/javascript" >
	var drawer = new ppDrawer("main")
</script>
</body>
</html>
