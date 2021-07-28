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


		<div class="flex flex-col w-1/4 xs:w-full sm:w-2/4 md:w-3/6   box-border elevation-4 rounded mt-20"  >
			<div class="w-full flex items-stretch flex-shrink-0 h-13 lightblue700 text-white rounded-tr rounded-tl">
				<div class="w-full box-border align-stretch flex flex-shrink-0 h-13">
						<div class="align-center flex flex-grow flex-shrink-0 pl-4 leading-3 text-center">
								<h3>Proceso de configuración</h3>
						</div>
				</div>
			</div>
				<!--content-->
				<div class="p-3">

					<ul class="m-0 p-0 list-none">
						<li class="text-green500 font-bold"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users</li>
						<li class="text-gray700 text-green700:hover"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users - Acceso</li>
						<li class="text-gray700 text-green700:hover"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users - Acceso</li>
						<li class="text-gray700 text-green700:hover"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users - Acceso</li>
						<li class="text-gray700 text-green700:hover"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users - Acceso</li>
						<li class="text-gray700 text-green700:hover"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users - Acceso</li>
						<li class="text-gray700 text-green700:hover"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users - Acceso</li>
						<li class="text-gray700 text-green700:hover"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users - Acceso</li>
						<li class="text-gray700 text-green700:hover"  ><i class="fas fa-check"></i>&nbsp;Crear tabla Users - Acceso</li>
					</ul>

				</div>
				<!--content-->
				<div class="w-full pl-3 pr-3 box-border pb-4 pt-4">
					<!--<a href="/login/password-reset">¿ Olvidaste tu contraseña ?</a>-->
					<button disabled onclick="window.location.href='/install/setup-account'" class="blue300:disabled  blue700 blue800:hover w-full box-border text-white pt-2.5 pb-2.5 aoutline-none border-none rounded-lg cursor-pointer" >Conectar</button>
				</div>
		</div>

</body>
</html>
