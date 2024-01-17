<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<script type="text/javascript" src="http://localhost/cybercom/Skin/Admin/Js/jQuery.js"></script>
	<script type="text/javascript" src="http://localhost/cybercom/Skin/Admin/Js/mage.js"></script>

	<style type="text/css">
		.b{
			margin-left: 30px;
			width: 200px;
			height: 50px;
		}
		.t{
			margin-left: 500px;
			margin-top: 100px;
			margin-bottom: 180px;
		}
		label{
			font-weight: bold;
			font-size: 20px;
			margin-bottom: 30px;

		}
		.input{
			width: 250px;
			height: 50px;
		}
		input{
			margin-bottom: 30px;
			margin-left: 10px;
		}
		.font{
			font-family: monospace;
			color: red;
		}
	</style>

	<title>Layout</title>
</head>
<body>
	<table border="1px" width="100%">
		<tr>
			<td><?php echo $this->getChild('header')->toHtml(); ?></td>
		</tr>
		<tr>
			<td><?php
					//echo $this->getChild('message')->toHtml(); 
					echo $this->getChild('content')->toHtml();
				?>
			</td>
		</tr>
		<tr>
			<td><?php echo $this->getChild('footer')->toHtml(); ?></td>
		</tr>
	</table>
</body>
</html>