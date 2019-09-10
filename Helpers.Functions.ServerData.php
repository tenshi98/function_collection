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
* Obtener Fecha Actual
* 
*===========================     Detalles    ===========================
* Permite obtener la fecha actual de chile
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	fecha_actual();
* 
*===========================    Parametros   ===========================
* @return  Date
************************************************************************/
function fecha_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$fecha_actual = date("Y-m-d");
	return $fecha_actual; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Hora Actual
* 
*===========================     Detalles    ===========================
* Permite obtener la hora actual de chile
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	hora_actual();
* 
*===========================    Parametros   ===========================
* @return  Time
************************************************************************/
function hora_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$hora_actual = date("H:i:s");
	return $hora_actual; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Hora Actual (alternativa)
* 
*===========================     Detalles    ===========================
* Permite obtener la hora actual de chile
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	hora_actual_val();
* 
*===========================    Parametros   ===========================
* @return  Time
************************************************************************/
function hora_actual_val(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$hora_actual = date("H-i-s");
	return $hora_actual; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Dia Actual
* 
*===========================     Detalles    ===========================
* Permite obtener el dia actual de chile, de 1 a 31 sin ceros
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	dia_actual();
* 
*===========================    Parametros   ===========================
* @return  Integer
************************************************************************/
function dia_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$dia_actual = date("j");
	return $dia_actual; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Semana Actual
* 
*===========================     Detalles    ===========================
* Permite obtener la semana actual de chile
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	semana_actual();
* 
*===========================    Parametros   ===========================
* @return  Integer
************************************************************************/
function semana_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$semana_actual = date("W");
	return $semana_actual; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Mes Actual
* 
*===========================     Detalles    ===========================
* Permite obtener el mes actual de chile, de 1 a 12
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	mes_actual();
* 
*===========================    Parametros   ===========================
* @return  Integer
************************************************************************/
function mes_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$mes_actual = date("n");
	return $mes_actual; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Año Actual
* 
*===========================     Detalles    ===========================
* Permite obtener el año actual de chile
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	ano_actual();
* 
*===========================    Parametros   ===========================
* @return  Integer
************************************************************************/
function ano_actual(){
	// Establecer la zona horaria predeterminada a usar.
	date_default_timezone_set('America/Santiago');
	//Imprimimos la fecha actual dandole un formato
	$ano_actual = date("Y");
	return $ano_actual; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener IP del cliente
* 
*===========================     Detalles    ===========================
* Permite obtener la ip del cliente que se conecta
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	obtenerIpCliente();
* 
*===========================    Parametros   ===========================
* @return  String
************************************************************************/
function obtenerIpCliente() {
	$ipaddress = '';
	if (getenv('HTTP_CLIENT_IP')){
		$ipaddress = getenv('HTTP_CLIENT_IP');
	}elseif(getenv('HTTP_X_FORWARDED_FOR')){
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	}elseif(getenv('HTTP_X_FORWARDED')){
		$ipaddress = getenv('HTTP_X_FORWARDED');
	}elseif(getenv('HTTP_FORWARDED_FOR')){
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	}elseif(getenv('HTTP_FORWARDED')){
	   $ipaddress = getenv('HTTP_FORWARDED');
	}elseif(getenv('REMOTE_ADDR')){
		$ipaddress = getenv('REMOTE_ADDR');
	}else{
		$ipaddress = 'UNKNOWN';
	}
	return $ipaddress;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener IP del cliente
* 
*===========================     Detalles    ===========================
* Permite obtener la ip del cliente que se conecta
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	obtenerIpClienteAlt();
* 
*===========================    Parametros   ===========================
* @return  String
************************************************************************/
function obtenerIpClienteAlt($headerContainingIPAddress = null){
    if (!empty($headerContainingIPAddress)) {
        return isset($_SERVER[$headerContainingIPAddress]) ? trim($_SERVER[$headerContainingIPAddress]) : false;
    }

    $knowIPkeys = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR',
    ];

    foreach ($knowIPkeys as $key) {
        if (array_key_exists($key, $_SERVER) !== true) {
            continue;
        }
        foreach (explode(',', $_SERVER[$key]) as $ip) {
            $ip = trim($ip);
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                return $ip;
            }
        }
    }

    return false;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Directorio
* 
*===========================     Detalles    ===========================
* Nombre de la funcion: MeDir
* Version de la funcion:  1.0.0.11  
* Fecha de la funcion (Creacion):  01/06/2006  
* Fecha de la funcion (revision 1.0.0.4):  19/08/2006    
* Fecha de la funcion (ultima revision):  16/09/2006   
* 
* Autor: SERBice(r)
* 
* Descripcion de la funcion: Recorre un directorio midiendo todos los      
*                            archivos que contiene (incluso en sus          
*                            subdirectorios, hasta el ultimo).               
*                                                                            
* Parametros de la funcion: El parametro $dir, establece el directorio sobre el
*                           cual actuara la funcion, es decir, que establece  
*                           el directorio del cual se obtendra informacion de 
*                           su tamaño.                                        
*                           Si $dir no se establece se utilizara el directorio
*                           donde se encuentra el archivo que llamo a la     
*                           funcion $subdirs es el parametro que establece si vamos   
*                           o no a medir en subdirectorios o no. Si $subdirs  
*                           no se establece su valor por defaul sera 1 y   
*                           medira los subdirectorios                  
*                                                                            
* Este Software se distribuye bajo Licencia GPL, por lo cual se solicita que  
* se utilice con fines no lucrativos, es decir, que sea de uso Personal y No  
* Comercial. Que se conserven los derechos de autor y que cualquier           
* modificacion le sea notifiacda al autor, para saber y estar al tanto de     
* los avances del software en cuestion; y de esta manera enriquezer aun mas   
* esta peque?a herramienta                                                   
*                                                                            
* Atentamente: SERBice(r)                                                    
* 
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	MeDir('./backups', 1);
* 
*===========================    Parametros   ===========================
* @return  Decimal
************************************************************************/
function MeDir($dir,$subdirs){ 
        /* Creamos un array con todos los nombres de directorios y 
        archivos contenidos dentro del directorio inicial */ 
        $arr = scandir($dir); 

        /* establecemos que la variable $sizedir es igual a cero */ 
        $sizedir = 0; 

        /* YA NO Recorremos el array saltando los directorios . y .. */ 
        for ($i=0; $i<count($arr); $i++)
            {
                /* Comprobamos que el archivo/directorio actual no sea "." ni ".." */
              if ($arr[$i]!="." && $arr[$i]!="..")
              	{
	                /* Si es un directorio hacer..... */ 
	                if (is_dir($dir ."/". $arr[$i])) 
	                    { 
	                        /* Establecemos que la variable $sizedir es igual 
	                        a ella misma m?s el valor devuelto por MeDir */ 
	                        if (isset($subdirs)&&$subdirs==1) $sizedir += MeDir($dir . "/" . $arr[$i],1); 
	                    } 
	                /* Si es un archivo hacer ... */ 
	                else 
	                    { 
	                        /* Establecemos que la variable $sizedir es igual 
	                        a ella misma m?s el tama?o del fichero $dir ."/". $arr[$i] */ 
	                        $sizedir += filesize($dir ."/". $arr[$i]); 
	                    } 
               }
            } 
        /* Devolvemos el valor total de $sizedir */ 
        return $sizedir; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Devolver la URL Base
* 
*===========================     Detalles    ===========================
* Muestra la URL Base desde donde se ejecuta
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	base_url();
* 
*===========================    Parametros   ===========================
* @return  String
************************************************************************/
if (!function_exists('base_url')) {
    function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Uso Memoria Servidor
* 
*===========================     Detalles    ===========================
* Permite obtener el uso de la memoria en el servidor,calculando la 
* carga de trabajo en el servidor
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	obtenerUsoMemoriaServidor(true);
* 	obtenerUsoMemoriaServidor(false);
* 
*===========================    Parametros   ===========================
* @return  String
************************************************************************/
function obtenerUsoMemoriaServidor($getPercentage=true){
    $memoryTotal = null;
    $memoryFree = null;

    if (stristr(PHP_OS, "win")) {
        // Get total physical memory (this is in bytes)
        $cmd = "wmic ComputerSystem get TotalPhysicalMemory";
        @exec($cmd, $outputTotalPhysicalMemory);

        // Get free physical memory (this is in kibibytes!)
        $cmd = "wmic OS get FreePhysicalMemory";
        @exec($cmd, $outputFreePhysicalMemory);

        if ($outputTotalPhysicalMemory && $outputFreePhysicalMemory) {
            // Find total value
            foreach ($outputTotalPhysicalMemory as $line) {
                if ($line && preg_match("/^[0-9]+\$/", $line)) {
                    $memoryTotal = $line;
                    break;
                }
            }

            // Find free value
            foreach ($outputFreePhysicalMemory as $line) {
                if ($line && preg_match("/^[0-9]+\$/", $line)) {
                    $memoryFree = $line;
                    $memoryFree *= 1024;  // convert from kibibytes to bytes
                    break;
                }
            }
        }
    }else{
        if (is_readable("/proc/meminfo")){
            $stats = @file_get_contents("/proc/meminfo");

            if ($stats !== false) {
                // Separate lines
                $stats = str_replace(array("\r\n", "\n\r", "\r"), "\n", $stats);
                $stats = explode("\n", $stats);

                // Separate values and find correct lines for total and free mem
                foreach ($stats as $statLine) {
                    $statLineData = explode(":", trim($statLine));

                    // Total memory
                    if (count($statLineData) == 2 && trim($statLineData[0]) == "MemTotal") {
                        $memoryTotal = trim($statLineData[1]);
                        $memoryTotal = explode(" ", $memoryTotal);
                        $memoryTotal = $memoryTotal[0];
                        $memoryTotal *= 1024;  // convert from kibibytes to bytes
                    }

                    // Free memory
                    if (count($statLineData) == 2 && trim($statLineData[0]) == "MemFree") {
                        $memoryFree = trim($statLineData[1]);
                        $memoryFree = explode(" ", $memoryFree);
                        $memoryFree = $memoryFree[0];
                        $memoryFree *= 1024;  // convert from kibibytes to bytes
                    }
                }
            }
        }
    }

    if (is_null($memoryTotal) || is_null($memoryFree)) {
        return null;
    } else {
        if ($getPercentage) {
            return (100 - ($memoryFree * 100 / $memoryTotal));
        } else {
            return array(
                "total" => $memoryTotal,
                "free" => $memoryFree,
            );
        }
    }
}

function getNiceFileSize($bytes, $binaryPrefix) {
    if ($binaryPrefix==true) {
        $unit=array('B','KiB','MiB','GiB','TiB','PiB');
        if ($bytes==0) return '0 ' . $unit[0];
        return @round($bytes/pow(1024,($i=floor(log($bytes,1024)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
    } else {
        $unit=array('B','KB','MB','GB','TB','PB');
        if ($bytes==0) return '0 ' . $unit[0];
        return @round($bytes/pow(1000,($i=floor(log($bytes,1000)))),2) .' '. (isset($unit[$i]) ? $unit[$i] : 'B');
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Navegador
* 
*===========================     Detalles    ===========================
* Permite obtener el navegador con el cual se esta accediento
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	obtenerNavegador();
* 
*===========================    Parametros   ===========================
* @return  String
************************************************************************/
function obtenerNavegador(){
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$ini = '
	<div class="col-xs-12" style="margin-top:15px;">
		<div class="alert alert-danger alert-white rounded"> 
			<div class="icon"><i class="fa fa-exclamation-triangle faa-flash animated "></i></div> 
				Esta utilizando el navegador ';
	$fin = ', Se garantiza el funcionamiento en los navegadores Firefox o Chrome en sus ultimas versiones.
		</div>
	</div>';
	if(strpos($user_agent, 'Maxthon') !== FALSE){
		return $ini.'Maxthon'.$fin;
	}elseif(strpos($user_agent, 'SeaMonkey') !== FALSE){
		return $ini.'SeaMonkey'.$fin;
	}elseif(strpos($user_agent, 'Vivaldi') !== FALSE){
		return $ini.'Vivaldi'.$fin;
	}elseif(strpos($user_agent, 'Arora') !== FALSE){
		return $ini.'Arora'.$fin;
	}elseif(strpos($user_agent, 'Avant Browser') !== FALSE){
		return $ini.'Avant Browser'.$fin;
	}elseif(strpos($user_agent, 'Beamrise') !== FALSE){
		return $ini.'Beamrise'.$fin;
	}elseif(strpos($user_agent, 'Epiphany') !== FALSE){
		return $ini.'Epiphany'.$fin;
	}elseif(strpos($user_agent, 'Chromium') !== FALSE){
		return $ini.'Chromium'.$fin;
	}elseif(strpos($user_agent, 'Iceweasel') !== FALSE){
		return $ini.'Iceweasel'.$fin;
	}elseif(strpos($user_agent, 'Galeon') !== FALSE){
		return $ini.'Galeon'.$fin;
	}elseif(strpos($user_agent, 'Edge') !== FALSE){
		return $ini.'Microsoft Edge'.$fin;
	}elseif(strpos($user_agent, 'Trident') !== FALSE){ 
		return $ini.'Internet Explorer'.$fin;
	}elseif(strpos($user_agent, 'MSIE') !== FALSE){
		return $ini.'Internet Explorer'.$fin;
	}elseif(strpos($user_agent, 'Opera Mini') !== FALSE){
		return $ini.'Opera Mini'.$fin;
	}elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE){
		return $ini.'Opera'.$fin;
	}elseif(strpos($user_agent, 'Firefox') !== FALSE){
		//return 'Mozilla Firefox';
	}elseif(strpos($user_agent, 'Chrome') !== FALSE){
		//return 'Google Chrome';
	}elseif(strpos($user_agent, 'Safari') !== FALSE){
		return $ini.'Safari'.$fin;
	}elseif(strpos($user_agent, 'iTunes') !== FALSE){
		return $ini.'iTunes'.$fin;
	}elseif(strpos($user_agent, 'Konqueror') !== FALSE){
		return $ini.'Konqueror'.$fin;
	}elseif(strpos($user_agent, 'Dillo') !== FALSE){
		return $ini.'Dillo'.$fin;
	}elseif(strpos($user_agent, 'Netscape') !== FALSE){
		return $ini.'Netscape'.$fin;
	}elseif(strpos($user_agent, 'Midori') !== FALSE){
		return $ini.'Midori'.$fin;
	}elseif(strpos($user_agent, 'ELinks') !== FALSE){
		return $ini.'ELinks'.$fin;
	}elseif(strpos($user_agent, 'Links') !== FALSE){
		return $ini.'Links'.$fin;
	}elseif(strpos($user_agent, 'Lynx') !== FALSE){
		return $ini.'Lynx'.$fin;
	}elseif(strpos($user_agent, 'w3m') !== FALSE){
		return $ini.'w3m'.$fin;
	}else{
		return 'No hemos podido detectar su navegador';
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Sistema Operativo
* 
*===========================     Detalles    ===========================
* Permite obtener el sistema operativo con el cual se esta accediendo
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	obtenerSistOperativo();
* 
*===========================    Parametros   ===========================
* @return  String
************************************************************************/
function obtenerSistOperativo(){
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$ini = '
	<div class="col-xs-12" style="margin-top:15px;">
		<div class="alert alert-danger alert-white rounded"> 
			<div class="icon"><i class="fa fa-exclamation-triangle faa-flash animated "></i></div> 
				Esta utilizando el SO ';
	$fin = ', Se garantiza el funcionamiento en los sistemas Windows 7 hacia arriba o sistemas Linux o derivados en sus ultimas versiones.
		</div>
	</div>';
		
	if(strpos($user_agent, 'Windows NT 10.0') !== FALSE){
		//return $ini.'Windows 10'.$fin;
	}elseif(strpos($user_agent, 'Windows NT 6.3') !== FALSE){
		//return $ini.'Windows 8.1'.$fin;
	}elseif(strpos($user_agent, 'Windows NT 6.2') !== FALSE){
		//return $ini.'Windows 8'.$fin;
	}elseif(strpos($user_agent, 'Windows NT 6.1') !== FALSE){
		//return $ini.'Windows 7'.$fin;
	}elseif(strpos($user_agent, 'Windows NT 6.0') !== FALSE){
		return $ini.'Windows Vista'.$fin;
	}elseif(strpos($user_agent, 'Windows NT 5.1') !== FALSE){
		return $ini.'Windows XP'.$fin;
	}elseif(strpos($user_agent, 'Windows NT 5.2') !== FALSE){
		return $ini.'Windows 2003'.$fin;
	}elseif(strpos($user_agent, 'Windows NT 5.0') !== FALSE){
		return $ini.'Windows 2000'.$fin;
	}elseif(strpos($user_agent, 'Windows ME') !== FALSE){
		return $ini.'Windows ME'.$fin;
	}elseif(strpos($user_agent, 'Win98') !== FALSE){
		return $ini.'Windows 98'.$fin;
	}elseif(strpos($user_agent, 'Win95') !== FALSE){
		return $ini.'Windows 95'.$fin;
	}elseif(strpos($user_agent, 'WinNT4.0') !== FALSE){
		return $ini.'Windows NT 4.0'.$fin;
	}elseif(strpos($user_agent, 'Windows Phone') !== FALSE){
		return $ini.'Windows Phone'.$fin;
	}elseif(strpos($user_agent, 'Windows') !== FALSE){
		return $ini.'Windows'.$fin;
	}elseif(strpos($user_agent, 'iPhone') !== FALSE){
		return $ini.'iPhone'.$fin;
	}elseif(strpos($user_agent, 'iPad') !== FALSE){
		return $ini.'iPad'.$fin;
	}elseif(strpos($user_agent, 'Debian') !== FALSE){
		//return $ini.'Debian'.$fin;
	}elseif(strpos($user_agent, 'Ubuntu') !== FALSE){
		//return $ini.'Ubuntu'.$fin;
	}elseif(strpos($user_agent, 'Slackware') !== FALSE){
		//return $ini.'Slackware'.$fin;
	}elseif(strpos($user_agent, 'Linux Mint') !== FALSE){
		//return $ini.'Linux Mint'.$fin;
	}elseif(strpos($user_agent, 'Gentoo') !== FALSE){
		//return $ini.'Gentoo'.$fin;
	}elseif(strpos($user_agent, 'Elementary OS') !== FALSE){
		//return $ini.'ELementary OS'.$fin;
	}elseif(strpos($user_agent, 'Fedora') !== FALSE){
		//return $ini.'Fedora'.$fin;
	}elseif(strpos($user_agent, 'Kubuntu') !== FALSE){
		//return $ini.'Kubuntu'.$fin;
	}elseif(strpos($user_agent, 'Linux') !== FALSE){
		//return $ini.'Linux'.$fin;
	}elseif(strpos($user_agent, 'FreeBSD') !== FALSE){
		return $ini.'FreeBSD'.$fin;
	}elseif(strpos($user_agent, 'OpenBSD') !== FALSE){
		return $ini.'OpenBSD'.$fin;
	}elseif(strpos($user_agent, 'NetBSD') !== FALSE){
		return $ini.'NetBSD'.$fin;
	}elseif(strpos($user_agent, 'SunOS') !== FALSE){
		return $ini.'Solaris'.$fin;
	}elseif(strpos($user_agent, 'BlackBerry') !== FALSE){
		return $ini.'BlackBerry'.$fin;
	}elseif(strpos($user_agent, 'Android') !== FALSE){
		return $ini.'Android'.$fin;
	}elseif(strpos($user_agent, 'Mobile') !== FALSE){
		return $ini.'Firefox OS'.$fin;
	}elseif(strpos($user_agent, 'Mac OS X+') || strpos($user_agent, 'CFNetwork+') !== FALSE){
		return $ini.'Mac OS X'.$fin;
	}elseif(strpos($user_agent, 'Macintosh') !== FALSE){
		return $ini.'Mac OS Classic'.$fin;
	}elseif(strpos($user_agent, 'OS/2') !== FALSE){
		return $ini.'OS/2'.$fin;
	}elseif(strpos($user_agent, 'BeOS') !== FALSE){
		return $ini.'BeOS'.$fin;
	}elseif(strpos($user_agent, 'Nintendo') !== FALSE){
		return $ini.'Nintendo'.$fin;
	}else{
		return 'Plataforma Desconocida';
	}
} 
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Favicon
* 
*===========================     Detalles    ===========================
* Permite obtener el favicon del sitio ingresado
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	getFavicon("http://youtube.com/");
* 
*===========================    Parametros   ===========================
* String   $url    Direccion web desde donde se obtendra el favicon
* @return  Image
************************************************************************/
function getFavicon($url){
	return sprintf('<img src="https://www.google.com/s2/favicons?domain=%s"/>',urlencode($url));
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener Avatar
* 
*===========================     Detalles    ===========================
* Permite obtener el avatar del correo electronico
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	getGravatar('tucorreo@gmail.com');
* 	getGravatar(
* 		"tucorreo@gmail.com",
* 		$size = 200,
* 		$default = 'monsterid',
* 		$rating = 'x',
* 		$attributes = array(
* 			"class" => "Gravatar"
* 		)
* 	);
* 
*===========================    Parametros   ===========================
* String   $email       Correo ingresar
* Integer  $size       (Opcional)Tamaño por defecto del avatar (Ancho x Alto)
* String   $default    (Opcional)Identificador de la imagen
* String   $rating
* Array    $attributes (Opcional)Clases,etc
* @return  Image
************************************************************************/
function getGravatar($email, $size = 80, $default = 'mm', $rating = 'g', $attributes = []){
        
    $attr = trim(arrayToString($attributes));
    if (is_https()) {
        $url = 'https://secure.gravatar.com/';
    } else {
        $url = 'http://www.gravatar.com/';
    }

    return sprintf(
        '<img src="%savatar.php?gravatar_id=%s&default=%s&size=%s&rating=%s" width="%spx" height="%spx" %s />',
        $url,
        md5(strtolower(trim($email))),
        $default,
        $size,
        $rating,
        $size,
        $size,
        $attr
    );
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Obtener URL Actual
* 
*===========================     Detalles    ===========================
* Permite obtener la URL Actual
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	getCurrentURL();
* 
*===========================    Parametros   ===========================
* @return  String
************************************************************************/
function getCurrentURL(){
    $url = 'http://';
    if (isHttps()) {
        $url = 'https://';
    }

    if (isset($_SERVER['PHP_AUTH_USER'])) {
        $url .= $_SERVER['PHP_AUTH_USER'];
        if (isset($_SERVER['PHP_AUTH_PW'])) {
            $url .= ':'.$_SERVER['PHP_AUTH_PW'];
        }
        $url .= '@';
    }
    if (isset($_SERVER['HTTP_HOST'])) {
        $url .= $_SERVER['HTTP_HOST'];
    }
    if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80) {
        $url .= ':'.$_SERVER['SERVER_PORT'];
    }
    if (!isset($_SERVER['REQUEST_URI'])) {
        $url .= substr($_SERVER['PHP_SELF'], 1);
        if (isset($_SERVER['QUERY_STRING'])) {
            $url .= '?'.$_SERVER['QUERY_STRING'];
        }

        return $url;
    }

    $url .= $_SERVER['REQUEST_URI'];

    return $url;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Entregar tarea al servidor
* 
*===========================     Detalles    ===========================
* Permite entregar una tarea al servidor para que la ejecute de forma 
* separada a los tiempos de ejecucion de el programa desde donde 
* se llama
*===========================    Modo de uso  ===========================
* 	
* 	//se obtiene dato
* 	tareasServer(http://www.ejemplo.com?param1=1&param2=2&param3=3);
* 
*===========================    Parametros   ===========================
* String    $tarea    Direccion web con lo que se tiene que ejecutar 
*                     en el servidor, entregar URL completas
************************************************************************/
function tareasServer($tarea){

	//Ejecutamos comando dentro del servidor
	$command = "/usr/bin/wget -N -q '".$tarea."' &";
	$fp = shell_exec($command);

}
?>
