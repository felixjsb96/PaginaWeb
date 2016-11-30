<?php
session_start();
if(!$_SESSION['login']){
header('location: ../view/login.html');
}
?>
<html lang="en">
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
		<meta charset="utf-8">
		<title>--Menu--</title>
		<link href="../assets/style/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="../assets/style/iconic.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="prefix-free.js"></script>
			
<style type="text/css">
			#button {
					border: none;
					background: #3a7999;
					color: #f2f2f2;
					padding: 10px;
					font-size: 18px;
					border-radius: 5px;
					position: relative;
					box-sizing: border-box;
					transition: all 500ms ease;
					}
				
    table {
        width: 100%;
        margin: 1em 0 2em;
        border-collapse: collapse;
    }

    caption {
        margin: 1em 0 .7em 0;
        text-align: left;
        font-weight: bold;
        font-size: 120%;
        letter-spacing: .5px;
        color: #444;
    }

    th {
        text-align: left;
        padding: .5em .5em;
        font-weight: bold;
        border-top: solid 3px #ccc;
        border-bottom: solid 1px #ccc;
    }

    td {
        padding: .5em .5em;
        border-bottom: solid 1px #ccc;
    }
				
	</style>
	</head>
<body>	
	<div>
	<form method="GET" action="../controller/controller.php">
	<table class="#" border="0" align ="center">
	<tr><td  >Codigo: </td><td><input type="text" name="codigo"/>
	<td><input id="button" class="button:before" type="submit" value="Buscar"/></td>
	</tr>
	</table>
	</form>
    <form id="form-matricula" method="POST" action="controller.php">
    	<table class="#" border="0" align="center">
    		<tr>
    			<td>Codigo</td>
    			<td>Nombre</td>
    			<td>Apellido</td>
    			<td>DNI</td>
    			<td>Sexo</td>
    			<td>Fecha Naciemiento</td>
    		</tr>
    	</table>
	<?php
	if(isset($alm) && $alm=""){
		echo ("<tr>");
		echo ("<td>".$alm->id."</td>");
		echo ("<td>".$alm->Nombre."</td>");
	}else{

	}
	?>
     	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
<script src="js/jquery.responsive-tables.min.js"></script>
<script src="js/app.js"></script>	
</body>

</html>