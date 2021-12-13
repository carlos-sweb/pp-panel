var drawer = new ppDrawer("main");

var root = document.getElementById("view");

// Declare router here
var router = new ppRouter(
  // How to use it ?
  {
  "/":{
      controller:function(){
          root.innerHTML = `<h1>Home</h1>`;
      }
  },
  "/route-remove":{
      controller:function(){
          root.innerHTML = `<h1>Route Remove</h1>`;
      }
  }
  }
);

// If you want to add another router
router.addRoute("/vegetables/:name(string)/:id(number)",
  {
      controller:function( params ){
          root.innerHTML = `<h1>vegetables ${params.name} : ${params.id} </h1>`;
      }
  }
);


router.noFound = function( location ){
  // Put you code here
}
router.start("/");
