<!DOCTYPE html>
<html lang="es" xml:lang="es" style="position:relative;min-height:100%;">
<head>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="favicon.png">
<!--aqui van los metas-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mister Yiyo</title>

</head>
<body class="body" >  

<script type="text/javascript" src="node_modules/pp-router.js/pp-router.min.js" ></script>
<script type="text/javascript" src="node_modules/axios/dist/axios.min.js" ></script>
<script type="text/javascript">
var router = new ppRouter({
	"/":{
		controller:function(){
			console.log("hello");
		}
	}
});
router.start();
var footerItems = document.querySelectorAll(".footer-item,.footer-item-round");
for( var i = 0 ; i < footerItems.length ; i++ ){
	var item = footerItems[i];
	item.addEventListener('click',function( event ){
		console.log(event.currentTarget.getAttribute("data-link"));
	});
}
</script>
</body>
</html>