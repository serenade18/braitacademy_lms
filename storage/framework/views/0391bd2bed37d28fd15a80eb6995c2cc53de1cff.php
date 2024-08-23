<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-I">
	<title>Paytm</title>
	<script type="text/javascript">
		function response(){
			return document.getElementById('response').value;
		}
	</script>
</head>
<body>
  Redirect back to the app<br>

  <form name="frm" method="post">
    <input type="hidden" id="response" name="responseField" value='<?php echo e($json); ?>'>
  </form>
</body>
</html><?php /**PATH C:\Users\BraIT\Desktop\Dev\braitacademy\vendor\anandsiddharth\laravel-paytm-wallet\src\resources\views\app_redirect.blade.php ENDPATH**/ ?>