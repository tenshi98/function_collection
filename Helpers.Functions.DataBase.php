<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                                                                                                 */
/*                                                  Funciones                                                      */
/*                                                                                                                 */
/*******************************************************************************************************************/
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Conectar Base de Datos
* 
*===========================     Detalles    ===========================
* Funcion para conectarse a la base de datos
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta codigo
* 	conectar ();
* 
*===========================    Parametros   ===========================
* Constantes  DB_SERVER  Ubicacion o direccion web donde se ubica la base de datos
* Constantes  DB_USER    Usuario de acceso a la BD
* Constantes  DB_PASS    Contraseña de acceso a la BD
* Constantes  DB_NAME    Nombre de la BD
* @return  db_con
************************************************************************/
//Funcion para conectarse a la base de datos
function conectar () {
	$db_con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$db_con->set_charset("utf8");
	return $db_con; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Seleccionar datos
* 
*===========================     Detalles    ===========================
* Funcion para seleccionar data desde la base de datos
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta codigo
* 	db_select_data('tabla1.columnaA1,tabla2.columnaB1','tabla1','LEFT JOIN tabla2 ON tabla2.id = tabla1.id','tabla1.id=1',$dbConn);
* 
*===========================    Parametros   ===========================
* String   $data     Columnas seleccionadas en la consulta
* String   $table    Tabla desde donde traer los datos
* String   $join     Concatenaciones con otras tablas
* String   $where    Definicion del dato a traer
* db_con   $dbConn   Conexion a la base de datos
* @return  Object
************************************************************************/
function db_select_data ($data, $table, $join, $where, $dbConn) {
	
	// Se hace consulta
	$query = "SELECT ".$data."
	FROM `".$table."`
	".$join."
	WHERE ".$where."
	LIMIT 1";
	//Consulta
	$resultado = mysqli_query ($dbConn, $query);
	//Si ejecuto correctamente la consulta
	if(!$resultado){
		//variables
		$Transaccion = 'Helpers.Functions.DataBase.php';

		//generar log
		error_log("========================================================================================================================================", 0);
		error_log("Transaccion: ". $Transaccion, 0);
		error_log("-------------------------------------------------------------------", 0);
		error_log("Error code: ". mysqli_errno($dbConn), 0);
		error_log("Error description: ". mysqli_error($dbConn), 0);
		error_log("Error query: ". $query, 0);
		error_log("-------------------------------------------------------------------", 0);
										
	}
	$rowData = mysqli_fetch_assoc ($resultado);
	
	//devolver objeto
	return $rowData;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Contar datos
* 
*===========================     Detalles    ===========================
* Funcion para contar data desde la base de datos
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta codigo
* 	db_select_nrows('tabla1.columnaA1,tabla2.columnaB1','tabla1','LEFT JOIN tabla2 ON tabla2.id = tabla1.id','tabla1.id=1',$dbConn);
* 
*===========================    Parametros   ===========================
* String   $data     Columnas seleccionadas en la consulta
* String   $table    Tabla desde donde traer los datos
* String   $join     Concatenaciones con otras tablas
* String   $where    Definicion del dato a traer
* db_con   $dbConn   Conexion a la base de datos
* @return  Integer
************************************************************************/
function db_select_nrows ($data, $table, $join, $where, $dbConn) {
	
	// Se hace consulta
	$query = "SELECT ".$data."
	FROM `".$table."`
	".$join."
	WHERE ".$where;
	//Consulta
	$resultado = mysqli_query ($dbConn, $query);
	//Si ejecuto correctamente la consulta
	if(!$resultado){
		//variables
		$Transaccion = 'Helpers.Functions.DataBase.php';

		//generar log
		error_log("========================================================================================================================================", 0);
		error_log("Transaccion: ". $Transaccion, 0);
		error_log("-------------------------------------------------------------------", 0);
		error_log("Error code: ". mysqli_errno($dbConn), 0);
		error_log("Error description: ". mysqli_error($dbConn), 0);
		error_log("Error query: ". $query, 0);
		error_log("-------------------------------------------------------------------", 0);
										
	}
	$ndata_1 = mysqli_num_rows($resultado);
	
	//devolver objeto
	return $ndata_1;
}

?>
