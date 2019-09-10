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
* Cortar Texto
* 
*===========================     Detalles    ===========================
* Permite cortar un texto determinado despues de cierta cantidad de 
* caracteres determinados por el usuario, poniendo tres puntos 
* suspensivos indicando que el texto esta cortado
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta operacion
* 	cortar('Lorem ipsum dolor sit amet, consectetur', 10);
* 
*===========================    Parametros   ===========================
* String   $texto     Texto a cortar
* Integer  $cuantos   Cantidad de caracteres a mostrar antes de cortar
* @return  String
************************************************************************/
function cortar($texto, $cuantos){
	//se verifica si es un numero lo que se recibe
	if (validarNumero($cuantos)){ 
		//Verifica si el numero recibido es un entero
		if (validaEntero($cuantos)){ 
			//si el largo texto es inferior a la cantidad a cortar
			if (strlen($texto) <= $cuantos){
				return $texto;
			//si el largo texto es superior a la cantidad a cortar
			}else{
				return substr($texto, 0, $cuantos) . '...';	
			}
		} else { 
			return 'El dato ingresado no es un numero entero';
		}
	} else { 
			return 'El dato ingresado no es un numero';
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Elimina el digito verificador
* 
*===========================     Detalles    ===========================
* Elimina el digito verificador del rut entregado, dejando solo los 
* numeros. Hay que tener en cuenta que solo funciona en Rut chilenos
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta operacion
* 	cortarRut('10294658-9');
* 
*===========================    Parametros   ===========================
* String   $Rut    Rut a cortar
* @return  String
************************************************************************/
function cortarRut($Rut){
	//verifico si existe el guion	
	$var1 = substr_count($Rut, '-');
	//se verifica el largo del texto
	$var2 = strlen($Rut);
	//se consulta
	if($var1==1){
		$x = $var2 - 2;
		return substr($Rut, 0, $x);
	}else{
		return $Rut;
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Verificar largo
* 
*===========================     Detalles    ===========================
* Verifica la cantidad de caracteres minimos dentro de la palabra u 
* oracion a revisar
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta operacion
* 	palabra_largo('Lorem ipsum dolor sit amet, consectetur', 10);
* 
*===========================    Parametros   ===========================
* String   $oracion   Palabra u oracion entregada
* Integer  $largo     Cantidad de caracteres minimos a admitir
* @return  String
************************************************************************/
function palabra_largo($oracion,$largo){
	//se verifica si es un numero lo que se recibe
	if (validarNumero($largo)){ 
		//Verifica si el numero recibido es un entero
		if (validaEntero($largo)){ 
			//se verifica el largo
			if (strlen($oracion) < $largo) { 
				return 'El dato ingresado debe tener al menos '.$largo.' caracteres';
			}
		} else { 
			return 'El dato ingresado no es un numero entero';
		}
	} else { 
			return 'El dato ingresado no es un numero';
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Verificar corto
* 
*===========================     Detalles    ===========================
* Verifica la cantidad de caracteres maximo dentro de la palabra u 
* oracion a revisar
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta operacion
* 	palabra_corto('Lorem ipsum dolor sit amet, consectetur', 10);
* 
*===========================    Parametros   ===========================
* String   $oracion   Palabra u oracion entregada
* Integer  $largo     Cantidad de caracteres maximo a admitir
* @return  String
************************************************************************/
function palabra_corto($oracion,$largo){
	//se verifica si es un numero lo que se recibe
	if (validarNumero($largo)){ 
		//Verifica si el numero recibido es un entero
		if (validaEntero($largo)){ 
			//se verifica el corto
			if (strlen($oracion) > $largo) { 
				return 'El dato ingresado debe tener no mas de '.$largo.' caracteres';
			}
		} else { 
			return 'El dato ingresado no es un numero entero';
		}
	} else { 
			return 'El dato ingresado no es un numero';
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Limpiar String
* 
*===========================     Detalles    ===========================
* Permite limpiar palabras u oraciones de caracteres raros o no admitidos
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta operacion
* 	limpiarString('Lorem ipsum\n dolor sit amet\n, consectetur\r');
* 
*===========================    Parametros   ===========================
* String   $texto   Texto a limpiar
* @return  String
************************************************************************/
function limpiarString($texto){
    //Limpieza caracteres normales
    $texto = preg_replace('([^A-Za-z0-9.])', ' ', $texto);
    //Se eliminan saltos de linea y pagina
    $texto = str_replace(array("\n", "\r"), '', $texto);
    $texto = strip_tags($texto, '');	     					
    return $texto;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Reemplazar espacios por guiones
* 
*===========================     Detalles    ===========================
* Transforma los espacios dentro de una oracion a guiones bajos
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta operacion
* 	espacio_guion('Lorem ipsum dolor sit amet, consectetur');
* 
*===========================    Parametros   ===========================
* String   $dato   Oracion a transformar
* @return  String
************************************************************************/
function espacio_guion($dato) {
    return str_replace(' ', '_', $dato);
}



?>
