<?php 
header('content-type:application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: http://mf02.violeta.local');
include('pelicula.php');
include('nacionalidad.php');
include('productora.php');

$arrURI=explode("/",$_SERVER['REDIRECT_QUERY_STRING']);

switch($arrURI[0]){
    
    case 'nacionalidad' :
        
        switch($_SERVER['REQUEST_METHOD']){
            
            case 'GET':
                if(isset($arrURI[1])){
                    $objNacionalidad= new nacionalidad();
                    echo $objNacionalidad->get($arrURI[1]);
                }else{
                    $objNacionalidad = new nacionalidad();
                    echo $objNacionalidad->getAll();
                    
                }
                break;
        }
        break;
    case 'productora' :
        
        switch($_SERVER['REQUEST_METHOD']){
            
            case 'GET':
                if(isset($arrURI[1])){
                    $objProductora = new productora();
                    echo $objProductora->get($arrURI[1]);
                }else{
                    $objProductora = new productora();
                    echo $objProductora->getAll();
                    
                }
                break;
        }
        break;
    case 'pelicula' :
        
        switch($_SERVER['REQUEST_METHOD']){
                
            case 'GET':
                if(isset($arrURI[1])){
                    $objPelicula = new pelicula();
                    echo $objPelicula->get($arrURI[1]);
                }else{
                    $objPelicula = new pelicula();
                    echo $objPelicula->getAll();
                   
                }
                break;
                
            case 'POST'  :
                $data=json_decode(file_get_contents("php://input"));
                $objPelicula=new pelicula();
                echo $objPelicula->insert($data);
                break;
                
            case 'PUT'   :
                $data=json_decode(file_get_contents("php://input"));
                
                $objPelicula = new pelicula();
                if(isset($arrURI[1])){
                    echo $objPelicula->update($arrURI[1],$data);
                }else{
                    echo $objPelicula->update($data->id, $data);
                }
                break;
                
            case 'DELETE':
                $data=json_decode(file_get_contents("php://input"));
                
                $objPelicula = new pelicula();
                if(isset($arrURI[1])){
                    echo $objPelicula->delete($arrURI[1]);
                }else{
                    echo $objPelicula->delete($data->id);
                }
                break;
                
            default:
                header('HTTP/1.1 405 Method Not Allowed');
                header('Allow: GET, POST, PUT, DELETE');
                
                
        }
        break;
}
?>