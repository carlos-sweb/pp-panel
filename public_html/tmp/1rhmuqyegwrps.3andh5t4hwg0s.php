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
<body class="bc-white h-full flex flex-col justify-start content-center items-center gray200 xs:pl-4 xs:pr-4" >


		<div class="flex flex-col w-2/4 xs:w-full sm:w-2/4 md:w-3/6 box-border elevation-4 rounded mt-20"  >


			<div class="w-full flex items-stretch flex-shrink-0 h-13 lightblue700 text-white rounded-tr rounded-tl">
				<div class="w-full box-border align-stretch flex flex-shrink-0 h-13">
						<div class="align-center flex flex-grow flex-shrink-0 pl-4 leading-3 text-center">
								<h3>Bienvenido</h3>
						</div>
				</div>
			</div>
				<!--content-->
				<div class="p-3" >

				<p>Te damos una coordial bienvenida, instalar stix-tv es muy facil.</p>
				<p>Necesitaremos la siguiente información de la base de datos para comenzar la instalación:</p>
				<ul>
					<li>Nombre de la base de datos</li>
					<li>Usuario de la base de datos</li>
					<li>Contraseña de la base de datos</li>
					<li>Host de la base de datos</li>
				</ul>

				<p>Si ya tienes esta información comencemos !!</p>

				</div>
				<!--content-->
				<div class="w-full pl-3 pr-3 box-border pb-3 pt-3">
					<button onclick="window.location.href='/install/setup-config'" class="block blue700 blue800:hover box-border text-white p-2.5 aoutline-none border-none rounded-lg cursor-pointer" >Siguiente</button>
				</div>

		</div>
</body>
</html>
