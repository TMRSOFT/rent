<?php



if ((isset($_POST['username']) && isset($_POST['password'])) && (!empty($_POST['username']) && !empty($_POST['password']))) {
    $nombre_archivo = 'libs/users/'.$_POST['username'].'.crip';
    $llave = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
    $texto = desencriptar($nombre_archivo, $llave);
    if ($texto != ''){
        if (($_POST['username']== $texto[0]) && ($_POST['password'] == $texto[1])) {
            session_name("rent");
            session_start();
            $_SESSION['empresa'] = validar($texto[0]);
        }
    }
}
header('Location: index.php');

function getConexion(){
    $username = 'root';
    $password = '';
    $host = 'localhost';
    $port = '3306';
    $database = 'rent';
    $url = 'mysql:host='.$host.';port='.$port.';dbname='.$database;
    $mysql = new PDO($url, $username, $password);
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $mysql;
}

function validar($adm){
    try {
        $sql = getConexion()->prepare("SELECT * FROM empresa e WHERE e.administrador=?");
        $sql->execute(array($adm));
        return $sql->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
    }
}

function desencriptar($nombre_archivo, $llave){
    $texto_encriptado = leerArchivo($nombre_archivo);
    if ($texto_encriptado != '') {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $texto_encriptado = base64_decode($texto_encriptado);
        $iv_dec = substr($texto_encriptado, 0, $iv_size);
        $texto_encriptado = substr($texto_encriptado, $iv_size);
        $texto_desencriptado = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $llave, $texto_encriptado, MCRYPT_MODE_CBC, $iv_dec);
        $array = explode('#', $texto_desencriptado);
        return $array;
    }else{
        return '';
    }
}

function leerArchivo($nombre_archivo){
    error_reporting(0);
    if (fopen($nombre_archivo, "r")){
        $myfile = fopen($nombre_archivo, "r") or die("El archivo que contiene la informacion confidencial del usuario se encuentra corrupto. Por favor reporte inmediatamente al administrador de sistema de EPSAS.");
        $contenido = fread($myfile,filesize($nombre_archivo));
        fclose($myfile);
        return $contenido;
    }else{
        return '';
    }
}

?>