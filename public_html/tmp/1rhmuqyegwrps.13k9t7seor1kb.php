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


		<div class="flex flex-col w-2/5 xs:w-full sm:w-2/4 md:w-3/6 box-border elevation-4 rounded mt-20"  >

			<div class="w-full flex items-stretch flex-shrink-0 h-13 red800 text-white rounded-tr rounded-tl">
				<div class="w-full box-border align-stretch flex flex-shrink-0 h-13">
						<div class="align-center flex flex-grow flex-shrink-0 pl-4 leading-3 text-center">
								<h3>Error</h3>
						</div>
				</div>
			</div>
				<!--content-->
				<div>
					<div class="w-full flex flex-col pt-3 pb-1 pl-3 pr-3 box-border text-left">
							<p class="text-gray800 p-0 m-0" >Error al establecer la conexión con la base de datos</p>
							<p class="text-gray800 p-0 m-0 mt-4" >Comunicarse con el WebMaster del Sitio</p>
					</div>

				</div>
				<!--content-->
				<div class="w-full pl-3 pr-3 box-border pb-3 pt-3">

				</div>
		</div>
</body>
</html>
