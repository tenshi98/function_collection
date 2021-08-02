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
//Verifico la existencia de errores
$err_count = 0;
foreach($_SESSION['ErrorListing'] as $producto) {
	$err_count++;
}

//solo si es administrador
if($_SESSION['usuario']['basic_data']['idTipoUsuario']==1){
	//Se guarda la memoria final del sistema
	$sis_mem_fin = memory_get_usage();

	//Obtengo la memoria del sistema
	$memUsage = obtenerUsoMemoriaServidor(false);
	//Calculos
	$total_memory    = $memUsage["total"];
	$server_memory   = $memUsage["total"] - $memUsage["free"];
	$actual_memory   = ($sis_mem_fin - $sis_mem_ini)*1024;
	
	//obtengo la ip del servidor
	$serverIP = $_SERVER["SERVER_ADDR"];
	
	echo '
	<div style="background: #fff;">
                  
        <div class="col-md-9 col-sm-12">
            <div class="bs-callout bs-callout-info" id="callout-type-dl-truncate"> 
				<h4>Errores detectados</h4>';
				require_once 'Helpers.Utils.Result.Errors.php';
			echo '
			</div>           
        </div>
 
        <div class="col-md-3 col-sm-6">
            <div class="info-box-main">
				
				<div class="info-box-box">
					<div class="info-stats">
						<p>Carga del Sistema</p>
						<span>'.getNiceFileSize($actual_memory, false).' / '.getNiceFileSize($total_memory, false).'</span>
					</div>
					<div class="info-icon text-danger"><i class="fa fa-server" aria-hidden="true"></i></div>
					<div class="info-box-progress">
						<div class="progress">
							<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: '.Cantidades((($actual_memory/$total_memory)*100), 0).'%;"></div>
						</div>
					</div>
				</div>
				
                <div class="info-box-box">
					<div class="info-stats">
						<p>Carga del Servidor</p>
						<span>'.getNiceFileSize($server_memory, false).' / '.getNiceFileSize($total_memory, false).'</span>
					</div>
					<div class="info-icon text-danger"><i class="fa fa-server" aria-hidden="true"></i></div>
					<div class="info-box-progress">
						<div class="progress">
							<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: '.Cantidades((($server_memory/$total_memory)*100), 0).'%;"></div>
						</div>
					</div>
                </div>
                
            </div>
            
            <div class="info-box-main">
                <div class="info-stats">
                    <p>Server IP</p>
                    <span>'.$serverIP.'</span>
                </div>
            </div>
            
        </div>

        <div class="clearfix"></div>        
    </div>';

//para el resto	
}else{
	//se envian correos
	require_once 'Helpers.Utils.Result.Errors.php';
}





//Se verifica el tipo de usuario
if($_SESSION['usuario']['basic_data']['idTipoUsuario']==1){ 

	

	?>

	

<?php }
?>
