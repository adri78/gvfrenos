<?php
//error_reporting(0);
$return = Array('ok'=>TRUE);
if(isset($_GET["c"])){ $C=$_GET["c"];  }


$upload_folder ='null';
switch ($C) {
	case "1":
		$upload_folder = '../../WebMaq';
		break;

	case "2":
        $upload_folder = '../../ArtImg';
		break;

    case 3:
        $upload_folder = 'imarke';
        break;
}

$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
$tmp_archivo = $_FILES['archivo']['tmp_name'];
$t = time();

$archivador = $upload_folder . '/' . $t .'.png';
$return = Array( 'msg'  => $archivador ) ;
if( $tipo_archivo == "image/jpeg" ||  $tipo_archivo == "image/png" ||  $tipo_archivo == "image/gif" ) {

	if ( ! move_uploaded_file( $tmp_archivo, $archivador ) ) {
		$return = Array(
			'ok'     => false,
			'msg'    => "Ocurrio un error al subir el archivo. " . $nombre_archivo . " No pudo guardarse.",
			'status' => 'error',
			'ty'     => $tipo_archivo
		);
	}else {
		$return = Array( 'msg' => $t );
	};

	$return = Array( 'msg'  => $archivador ) ;
		header( 'Content-Type: application/json' );
	echo json_encode( $return );

}

?>