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
* Obtener Distancia
* 
*===========================     Detalles    ===========================
* Esta funcion permte obtener la distancia (en metros) entre dos 
* puntos georeferenciados
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta codigo
* 	db_select_nrows(-40.807289, -72.634907, -42.176560, -73.425923);
* 
*===========================    Parametros   ===========================
* Decimal  $latitude1     Latitud posicion 1
* Decimal  $longitude1    Longitud posicion 1
* Decimal  $latitude2     Latitud posicion 2
* Decimal  $longitude2    Longitud posicion 2
* @return  Integer
************************************************************************/
function obtenerDistancia( $latitude1, $longitude1, $latitude2, $longitude2 ) {  
    
    //radio de la tierra
    $earth_radius = 6371;

    $dLat = deg2rad( $latitude2 - $latitude1 );  
    $dLon = deg2rad( $longitude2 - $longitude1 );  

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
    $c = 2 * asin(sqrt($a));  
    $d = $earth_radius * $c;  

    return $d;  
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////
/***********************************************************************
* Verificar si esta dentro de zona
* 
*===========================     Detalles    ===========================
* Permite verificar si punto de georeferencia se ubica dentro de una geocerca referenciada
*===========================    Modo de uso  ===========================
* 	
* 	//se ejecuta codigo
* 	//Se crea geocerca
* 	$polygon = array();
* 	array_push( $polygon,-37.085118 -72.739278 );//Punto 1
* 	array_push( $polygon,-37.281183 -72.832662 );//Punto 2
* 	array_push( $polygon,-37.267195 -71.992208 );//Punto 3
* 	array_push( $polygon,-36.858664 -71.964742 );//Punto 4
* 	array_push( $polygon,-37.085118 -72.739278 );//Se cierra figura
* 	//se verifica si se esta dentro
* 	$pointLocation = new subpointLocation();
* 	//$c_chek =  $pointLocation->pointInPolygon(-40.807289 -72.634907, $polygon);
* 	$c_chek =  $pointLocation->pointInPolygon($point, $polygon);
* 	if($c_chek=='inside'){
* 
* 	}		
* 
*===========================    Parametros   ===========================
* Object   $polygon   Geocerca definida
* String   $point     Latitud y longitus separado por un espacio
* @return  String
************************************************************************/
//verificar si punto esta dentro de un poligono
class subpointLocation {
    var $pointOnVertex = true; // Check if the point sits exactly on one of the vertices?
 
    function pointLocation() {
    }
 
    function pointInPolygon($point, $polygon, $pointOnVertex = true) {
        $this->pointOnVertex = $pointOnVertex;
 
        // Transform string coordinates into arrays with x and y values
        $point = $this->pointStringToCoordinates($point);
        $vertices = array(); 
        foreach ($polygon as $vertex) {
            $vertices[] = $this->pointStringToCoordinates($vertex); 
        }
 
        // Check if the point sits exactly on a vertex
        if ($this->pointOnVertex == true and $this->pointOnVertex($point, $vertices) == true) {
            return "vertex";
        }
 
        // Check if the point is inside the polygon or on the boundary
        $intersections = 0; 
        $vertices_count = count($vertices);
 
        for ($i=1; $i < $vertices_count; $i++) {
            $vertex1 = $vertices[$i-1]; 
            $vertex2 = $vertices[$i];
            if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) { // Check if point is on an horizontal polygon boundary
                return "boundary";
            }
            if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) { 
                $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x']; 
                if ($xinters == $point['x']) { // Check if point is on the polygon boundary (other than horizontal)
                    return "boundary";
                }
                if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
                    $intersections++; 
                }
            } 
        } 
        // If the number of edges we passed through is odd, then it's in the polygon. 
        if ($intersections % 2 != 0) {
            return "inside";
        } else {
            return "outside";
        }
    }
 
    function pointOnVertex($point, $vertices) {
        foreach($vertices as $vertex) {
            if ($point == $vertex) {
                return true;
            }
        }
 
    }
 
    function pointStringToCoordinates($pointString) {
        $coordinates = explode(" ", $pointString);
        return array("x" => $coordinates[0], "y" => $coordinates[1]);
    }
 
}

?>
