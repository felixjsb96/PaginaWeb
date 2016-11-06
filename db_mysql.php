<?php
class DB_mysql{
	//variables de conexion
	var $Servidor;
	var $BaseDatos;
	var $Usuario;
	var $Clave;
	//identificadores de conexion
	var $Conexion_ID=0;
	var $Consulta_ID=0;
	//Numero y detalle de error
	var $Errno=0;
	var $Error="";
	//Datos para paginacion
	var $hoja_actual=1;
	var $registros_hoja=10;
	var $hoja_destino;
	//constructor
	function DB_mysql($bd="db_colegio",$host="localhost",$user="anything",$pass=""){
		$this->BaseDatos=$bd;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
		}

	//conexion con la base de datos
	function conectar($bd,$host,$user,$pass){
		if ($bd !="") $this->BaseDatos=$bd;
		if ($host !="") $this->Servidor=$host;
		if ($user !="") $this->Usuario=$user;
		if ($pass !="") $this->Clave=$pass;
		
		//conectando con el server
		$this->Conexion_ID=mysql_connect($this->Servidor,$this->Usuario,$this->Clave);
		if (!$this->Conexion_ID){
			$this->$Error="No se logro la conexion";
			return 0;
			}
		//seleccionamos la base de datos
		if (!@mysql_select_db($this->BaseDatos,$this->Conexion_ID)){
			$this->Error="Imposible abrir ". $this->BaseDatos;
			return 0;
		}
		return $this->Conexion_ID;
		}

	//Ejecuta consulta
	function consulta($sql=""){
		if ($sql==""){
			$this->Error="No se ha ingresado una consulta SQL";
			return 0;
		}
		
		//ejecutamos la consulta
		$this->Consulta_ID=@mysql_query($sql,$this->Conexion_ID);
			if (!$this->Consulta_ID){
				$this->Errno=mysql_errno();
				$this->Error=mysql_error();
				}
			//Si hubo exito en la consulta cambia el valor de 0;
			return $this->Consulta_ID;
		}
		
	function numcampos(){
		return mysql_num_fields($this->Consulta_ID);
		}
		
	function numregistros(){
		return mysql_num_rows($this->Consulta_ID);
		}
	
	function nombrecampo($numcampo){
		return mysql_field_name($this->Consulta_ID,$numcampo);
		}
	
	function verconsulta(){
		echo "<table align=center border=1>\n";
		echo "<tr>\n";
		//mostramos los nombres de los campos
		for ($i=0;$i<$this->numcampos();$i++){
		     $stilo='"#CCCCCC"';
			echo "<td bgcolor=".$stilo." class='Links'><font color='#003366'><center>".strtoupper($this->nombrecampo($i))."</center></font></span></td>\n";
			}
		echo "</tr>\n";
		
		//mostrando datos del resultado
			$bg='"#FFFFFF"';
			$st='"text"';
			$rx=1;
		while ($fila=mysql_fetch_row($this->Consulta_ID)){
			echo "<tr>\n";
			for ($i=0;$i<$this->numcampos();$i++){
			     if(($i==0)){echo "<td bgcolor=".$bg."class=".$st."><font color='#003366'><center>&nbsp;".$fila[$i]."&nbsp;</center></td></font></span>\n";}
				    else{echo "<td bgcolor=".$bg."class=".$st."><font color='#003366'>".$fila[$i]."</td></font></span>\n";}
			}
			echo "</tr>\n";
			$rx=$rx+1;
			}
		mysql_free_result($this->Consulta_ID);
		mysql_close($this->Conexion_ID);
	}
	
	function consultapaginada($tabla,$select_campos,$select_condicion){
		//validando la consulta
		if ($select_campos=="" or $select_condicion==""){
			$this->Error="Las consultas no debe ser vacias";
			return 0;
			}
		//ejecutamos la segunda consulta para saber cuantos cumplen la condicion
		$this->Consulta_ID=@mysql_query("select count(*) as total from $tabla " . $select_condicion);
		if (!$this->Consulta_ID){
				$this->Errno=mysql_errno();
				$this->Error=mysql_error();
			}
	
		$resultados=mysql_fetch_row($this->Consulta_ID);
		$total=$resultados[0];
		$tot_pag=ceil($total/$this->registros_hoja);
		$st='"text"';
		echo "<p align='Center'"."class=".$st."><font color='#003366'>Se han encontrado $total Registros Activos y se mostraran en $tot_pag hojas <br>\n [Hoja N° $this->hoja_actual] <br>\n</font></span>\n";
		if (!$this->hoja_actual){
			$this->hoja_actual=1;
			$reg_ini=0;
		}else{
			$reg_ini=($this->hoja_actual-1)*$this->registros_hoja;
		}
		
		$this->Consulta_ID=@mysql_query($select_campos . " ". $select_condicion . " limit $reg_ini,".$this->registros_hoja );
		$this->verconsulta();
		echo "</table>";
		echo "<p align='Center'"."class=".$st.">";
		for ($p=1;$p<=$tot_pag;$p++){
		    $_p=$p;
			if ($p<10){$_p=('0'.$p);}
		   if ($p<$tot_pag){
			  echo "<font color='#003366'><a href=".$this->hoja_destino."?pagina=$p>$_p</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
						   }
						   else {echo "<font color='#003366'><a href=".$this->hoja_destino."?pagina=$p>$_p</a>";}
			if (fmod($p,17.0)==0){echo "<br>";} 			   
		}
		echo "</font></span>\n<br>\n<br>\n ";
	}
}