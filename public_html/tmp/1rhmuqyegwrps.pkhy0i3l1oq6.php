<?php echo $this->render('login/parts/header.html',NULL,get_defined_vars(),0); ?>

<body class="bc-white h-full flex flex-col justify-start content-center items-center gray200 xs:pl-4 xs:pr-4" >



<?php if ($COOKIE['mode'] == 'light'): ?>
	
		<button onclick="Cookies.set('mode','dark');location.reload();" class="elevation-1 absolute mt-5 bluegray700 w-10 box-border text-white pt-2.5 pb-2.5 aoutline-none border-none rounded-lg cursor-pointer cursor-not-allowed:disabled" >
		<i class="fas fa-moon fa-md text-bluegray50"></i>
		</button>
	
	<?php else: ?>
		<button onclick="Cookies.set('mode','light');location.reload();" class="elevation-1 absolute mt-5 yellow700 w-10 box-border text-white pt-2.5 pb-2.5 aoutline-none border-none rounded-lg cursor-pointer cursor-not-allowed:disabled" >
		<i class="fas fa-sun fa-md text-bluegray50"></i>
		</button>
	
<?php endif; ?>


		<div class="flex flex-col w-1/4 xs:w-full sm:w-2/4 md:w-3/6 box-border elevation-4 rounded mt-20"  >

			<form pp-form='login' action="/login" method="post" >
			<input type="hidden" value="<?= ($SESSION['csrf_token']) ?>" name="csrf_token" >
			<div class="w-full flex items-stretch flex-shrink-0 h-13 lightblue700 text-white rounded-tr rounded-tl">
				<div class="w-full box-border align-stretch flex flex-shrink-0 h-13">
						<div class="align-center flex flex-grow flex-shrink-0 pl-4 leading-3 text-center">
								<h3><?= ($login['titleForm']) ?></h3>
						</div>
				</div>
			</div>
				<!--content-->
				<div>
					<!--field-->
					<div class="w-full flex flex-col pt-3 pb-1 pl-3 pr-3 box-border flex ">
						<p class="fixed pl-2 box-border mt-3"  ><i class="fas fa-envelope fa-md text-lightblue800"></i></p>
						<input name="mail" class="box-boder bg-white rounded-md rounded-md:focus p-2.5 pl-8 border-2 border-blue100 border-blue300:focus border-solid outline-none:focus outline-offset-2:focus text-bluegray800" type="text" placeholder="<?= ($login['labelMail']) ?>" autocomplete="off" autocapitalize >
					</div>
					<!--field-->

					<div class="w-full flex flex-col pt-3 pb-1 pl-3 pr-3 box-border">
						<p class="fixed pl-2 box-border mt-3"  ><i class="fas fa-key fa-md text-lightblue800"></i></p>
						<input name="password" class="box-boder bg-white rounded-md rounded-md:focus p-2.5 pl-8 border-2 border-blue100 border-blue300:focus border-solid outline-none:focus outline-offset-2:focus text-bluegray800" type="password" placeholder="<?= ($login['labelPassword']) ?>" autocomplete="off" autocapitalize>
					</div>

					<div class="w-full flex flex-col pt-3 pb-1 pl-3 pr-3 box-border text-center">
							<a href="/login/password-reset" class="no-underline text-lightblue700 text-lightblue800:hover cursor:hover" ><?= ($login['labelForgetPassword']) ?></a>
					</div>

				</div>

				<!--content-->
				<div class="w-full pl-3 pr-3 box-border pb-3 pt-3">
					<!--<a href="/login/password-reset">¿ Olvidaste tu contraseña ?</a>-->
					<button type="submit" class="blue200:disabled blue700 w-full box-border text-white pt-2.5 pb-2.5 aoutline-none border-none rounded-lg cursor-pointer cursor-not-allowed:disabled" ><?= ($login['labelBotton']) ?></button>
				</div>

				<!--SECCION DE IDIOMA DEL FORMULARIO-->
				<div class="w-full pl-3 pr-3 box-border pb-3 pt-3 gray200 flex flex-row justify-center" >
					<img src="/img/core/lang/<?= ($login['logoLang']) ?>" class="w-8 mr-2 rounded-full  border-solid border-2 border-gray400"  >
					<select onchange="location.href=event.target.value" class="box-boder bg-white rounded-md rounded-md:focus p-1 pl-3 border-2 border-gray400 border-gray500:focus border-solid outline-none:focus outline-offset-2:focus text-gray800">
						<?php foreach (($login['avalaibleLang']?:[]) as $key=>$lang): ?>
							<?php if ($PARAMS['lang'] == $key): ?>
								
									<option selected value="<?= ($key) ?>"><?= ($lang) ?></option>
								
								<?php else: ?>
									<option value="<?= ($key) ?>"><?= ($lang) ?></option>
								
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
				</div>
				<!--SECCION DE IDIOMA DEL FORMULARIO-->


				</form>
		</div>

		<!--
		 <img src="img/core/lang/es.svg" alt="" style="width:40px;" >
		 <select name="" id="">
		 	<option value="">Español</option>
			<option value="">Ingles</option>
		 </select>
		 <!-->
<?php echo $this->render('login/parts/footer.html',NULL,get_defined_vars(),0); ?>
