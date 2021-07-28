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


		<div class="flex flex-col w-1/4 xs:w-full sm:w-2/4 md:w-3/6 box-border elevation-4 rounded mt-20"  >

			<form action="/" method="post" >

			<div class="w-full flex items-stretch flex-shrink-0 h-13 lightblue700 text-white rounded-tr rounded-tl">
				<div class="w-full box-border align-stretch flex flex-shrink-0 h-13">
						<div class="align-center flex flex-grow flex-shrink-0 pl-4 leading-3 text-center">
								<h3>Acceso</h3>
						</div>
				</div>
			</div>
				<!--content-->
				<div>
					<!--field-->
					<div class="w-full flex flex-col pt-3 pb-1 pl-3 pr-3 box-border flex ">
						<p class="fixed pl-2 box-border mt-3"  ><i class="fas fa-envelope fa-md text-lightblue800"></i></p>
						<input name="mail" class="box-boder bg-white rounded-md rounded-md:focus p-2.5 pl-8 border-2 border-blue100 border-blue300:focus border-solid outline-none:focus outline-offset-2:focus text-bluegray800" type="text" placeholder="Correo Eléctronico" autocomplete="off" autocapitalize >
					</div>
					<!--field-->

					<div class="w-full flex flex-col pt-3 pb-1 pl-3 pr-3 box-border">
						<p class="fixed pl-2 box-border mt-3"  ><i class="fas fa-key fa-md text-lightblue800"></i></p>
						<input name="password" class="box-boder bg-white rounded-md rounded-md:focus p-2.5 pl-8 border-2 border-blue100 border-blue300:focus border-solid outline-none:focus outline-offset-2:focus text-bluegray800" type="password" placeholder="Contraseña" autocomplete="off" autocapitalize>
					</div>

					<div class="w-full flex flex-col pt-3 pb-1 pl-3 pr-3 box-border text-center">
							<a href="/login/password-reset" class="no-underline text-lightblue700 text-lightblue800:hover cursor:hover" >¿ Olvidó su contraseña ?</a>
					</div>

				</div>
								
				<!--content-->
				<div class="w-full pl-3 pr-3 box-border pb-3 pt-3">
					<!--<a href="/login/password-reset">¿ Olvidaste tu contraseña ?</a>-->
					<button type="submit" class="blue700 blue800:hover w-full box-border text-white pt-2.5 pb-2.5 aoutline-none border-none rounded-lg cursor-pointer" >Acceder</button>
				</div>

				</form>
		</div>
</body>
</html>
