<?php foreach (($js?:[]) as $link): ?>
  <script type="text/javascript" src="<?= ($link) ?>" ></script>
<?php endforeach; ?>
<script type="text/javascript">
  if(  Cookies.get('mode') == '' ){ Cookies.set('mode', 'light'); }  
</script>
</body>
</html>
