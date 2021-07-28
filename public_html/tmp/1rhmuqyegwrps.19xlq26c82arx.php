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
<link rel="stylesheet" href="/node_modules/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="/node_modules/codemirror/theme/monokai.css">
</head>
<body class="bc-white h-full" >
<?php echo $this->render('admin/parts/navbar.html',NULL,get_defined_vars(),0); ?>

<div class="w-full h-minfull flex flex-col">
    <div class="w-full block pt-14"></div>
    <div class="w-full pl-8 pr-8 box-border pb-16" id="view">
      <textarea  id="ide" name="name" rows="8" cols="80" ></textarea>
    </div>
</div>


<script src="/node_modules/codemirror/lib/codemirror.js" ></script>
<script src="/node_modules/codemirror/mode/javascript/javascript.js" ></script>
<script>
  var myTextarea = document.querySelector('#ide');
  var editor = CodeMirror.fromTextArea(myTextarea, {
    value:'',
    lineNumbers: true,
    theme:'monokai',
    mode: "javascript"
  });
</script>
</body>
</html>
