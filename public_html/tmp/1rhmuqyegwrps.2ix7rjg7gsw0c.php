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

<?php echo $this->render('admin/parts/navbar.html',NULL,get_defined_vars(),0); ?>

<div class="w-full h-minfull flex flex-col">
    <div class="w-full block pt-14"></div>
    <div class="w-full pl-8 pr-8 box-border pb-16" id="view">
	<a href="/admin/logout">Salir</a>
      <h1>Admin</h1>
      <h3><a href="#/branches">Sucursales</a></h3>
      <h3><a href="#/players">Player</a></h3>
      <h3><a href="#/medias">Media</a></h3>
      <h3><a href="#/playlist">Parrilla</a></h3>
      <h3><a href="#/rss">Rss</a></h3>
      <h3><a href="#/vod">V.O.D</a></h3>
      <h3><a href="#/planning">Planificacion</a></h3>
      <h3><a href="#/status">Status</a></h3>
      <h3><a href="#/report">Reportes</a></h3>

    </div>
</div>




</body>
</html>
