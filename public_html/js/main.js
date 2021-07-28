
	var drawer = new ppDrawer("main")
	
	var tmlHome = `
		<div class="wrapper_home animate__animated animate__fadeIn" >

			<div>
				<h3>¿ Como comprar ?</h3>
			</div>
			<div>
				<div>
					<i class="fa fa-hamburger" ></i>					
				</div>
				<div>
					<h3>Arma tu pedido</h3>
				</div>
			</div>
			<div>
				<div>
					<i class="fa fa-clipboard-list"></i>
				</div>
				<div>
					<h3>Ingresa tu datos</h3>
				</div>
			</div>
			<div>
				<div>
					<i class="fa fa-truck"></i>
				</div>
				<div>
					<h3>Disfruta tu pedido</h3>
				</div>
			</div>

		</div>
	`;

	var tmlMenu = `
          <!--1 element-->
          <div class="wrapper_content animate__animated animate__fadeIn" >
          <div class="card mdc-elevation--z1 gray200" >
              <div class="card-image">
                  <img src="img/churrasco-granjero.png" alt="">
              </div>
              <div class="card-content">
                 <p class="card-title" >Churrasco Granjero</p>
              </div>
              <div class="card-actions" >
                <button class="card-button green600">Agregar</button>
              </div>
          </div>
          <!--1 element-->
          <!--1 element-->
          <div class="card mdc-elevation--z1 gray200" >
              <div class="card-image">
                  <img src="img/churrasco-chacarero.png" alt="">
              </div>
              <div class="card-content">
                 <p class="card-title" >Churrasco chacarero</p>
              </div>
              <div class="card-actions" >
                <button class="card-button green600">Agregar</button>
              </div>
          </div>
          <!--1 element-->
          <!--1 element-->
          <div class="card mdc-elevation--z1 gray200" >
              <div class="card-image">
                  <img src="img/churrasco-luco.png" alt="">
              </div>
              <div class="card-content">
                 <p class="card-title" >Churrasco luco</p>
              </div>
              <div class="card-actions" >
                <button class="card-button green600">Agregar</button>
              </div>
          </div>
          <!--1 element-->
          <!--1 element-->
          <div class="card mdc-elevation--z1 gray200" >
              <div class="card-image">
                  <img src="img/lomo-italiano.png" alt="">
              </div>
              <div class="card-content">
                 <p class="card-title" >Lomo Italiano</p>
              </div>
              <div class="card-actions" >
                <button class="card-button green600">Agregar</button>
              </div>
          </div>
          <!--1 element-->
          <!--1 element-->
          <div class="card mdc-elevation--z1 gray200" >
              <div class="card-image">
                  <img src="img/mechada-queso.png" alt="">
              </div>
              <div class="card-content">
                 <p class="card-title" >Mechada Queso</p>
              </div>
              <div class="card-actions" >
                <button class="card-button green600">Agregar</button>
              </div>
          </div>
          <!--1 element-->
          <!--1 element-->
          <div class="card mdc-elevation--z1 gray200" >
              <div class="card-image">
                  <img src="img/pollo-granjero.png" alt="">
              </div>
              <div class="card-content">
                 <p class="card-title" >Pollo Granjero</p>
              </div>
              <div class="card-actions" >
                <button class="card-button green600">Agregar</button>
              </div>
          </div>
          <!--1 element-->          
        <!--space--><div>&nbsp;</div><div>&nbsp;</div><!--space-->
        </div>
        `;

	var tmlLocal = ``;
	var tmlFilter = ``;	


	var content = document.getElementById("content");	

	var router = new ppRouter({
		"/home":{
			controller:function(){
				content.innerHTML = tmlHome;	
			}
		},
		"/menu":{
			controller:function(){
				console.log("Menu lisen");
				content.innerHTML = tmlMenu;
			}
		},
		"/local":{
			controller:function(){
				
				content.innerHTML = tmlLocal;

			}
		},
		"/filter":{
			controller:function(){
				content.innerHTML = tmlFilter;
			}
		}
	});

	router.noFound = function( location ){		

		location.hash = '/home';

	}
	

	router.start();

	var footerItems = document.querySelectorAll(".footer-item,.footer-item-round");

	for( var i = 0 ; i < footerItems.length ; i++ ){

		var item = footerItems[i];		

		if(  '#/'+item.getAttribute('data-link') == window.location.hash  ){

			item.classList.remove('bluegray600');
			item.classList.add('bluegray400');
		}
		

		item.addEventListener('click',function( event ){

			var current = event.currentTarget;
			
			var otherLink = current.parentNode.querySelectorAll('.footer-item');

			otherLink.forEach(function(node){
				if( node.classList.contains('bluegray400') ){
					node.classList.remove('bluegray400');
					node.classList.add('bluegray600');
				}				
			});		

			current.classList.remove('bluegray600')

			current.classList.add('bluegray400')

			var go = current.getAttribute("data-link");

			window.location.hash = "/"+go;

		});

	}