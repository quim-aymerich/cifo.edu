<?php 
header('content-type:application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT , DELETE ');

include('libro.php');
include('autor.php');
include('editorial.php');

$arrURI=explode("/",$_SERVER['REDIRECT_QUERY_STRING']);

switch($arrURI[0]){
    
    case 'editorial' :
        switch ($_SERVER['REQUEST_METHOD']){
            
            case 'GET'   :
                if(isset($arrURI[1])){
                    $objEditorial = new editorial();
                    echo $objEditorial->get($arrURI[1]);
                }else{
                    $objEditorial = new editorial();
                    echo $objEditorial->getAll();
                }
                break;
        }
        break;
    
    case 'autor' : 
        
        switch ($_SERVER['REQUEST_METHOD']){
            
            case 'GET'   :
                if(isset($arrURI[1])){
                    $objAutor = new autor();
                    echo $objAutor->get($arrURI[1]);
                }else{
                    $objAutor = new autor();
                    echo $objAutor->getAll();
                }
                break;
            case 'POST'  :
                $data=json_decode(file_get_contents("php://input"));
                $objAutor = new autor();
                echo $objAutor->insert($data);
                break;
                
            case 'PUT'   :
                $data=json_decode(file_get_contents("php://input"));
                
                $objAutor = new autor();
                if(isset($arrURI[1])){
                    echo $objAutor->update($arrURI[1],$data);
                }else{
                    echo $objAutor->update($data->id, $data);
                }
                break;
            case 'DELETE':
                $data=json_decode(file_get_contents("php://input"));
                
                $objAutor = new autor();
                if(isset($arrURI[1])){
                    echo $objAutor->delete($arrURI[1]);
                }else{
                    echo $objAutor->delete($data->id);
                }
                break;
            default:
                //header('HTTP/1.1 405 Method Not Allowed');
                header('Allow: GET, POST, PUT, DELETE');
        }
        
        break;
    
    case 'libro' :
        
        switch($_SERVER['REQUEST_METHOD']){
            case 'GET':
                if(isset($arrURI[1])){
                    $objLibro = new libro();
                    echo $objLibro->get($arrURI[1]);
                }else{
                    $objLibro = new libro();
                    echo $objLibro->getAll();
                }
                break;
            case 'POST':
                $data=json_decode(file_get_contents("php://input"));
                $objLibro = new libro();
                echo $objLibro->insert($data);
                break;
                
            case 'PUT':
                $data=json_decode(file_get_contents("php://input"));
   
                $objLibro = new libro();
                if(isset($arrURI[1])){
                    echo $objLibro->update($arrURI[1],$data);
                }else{
                    echo $objLibro->update($data->id, $data);
                }
                break;
            case 'DELETE':
                $data=json_decode(file_get_contents("php://input"));
                
                $objLibro = new libro();
                if(isset($arrURI[1])){
                    echo $objLibro->delete($arrURI[1]);
                }else{
                    echo $objLibro->delete($data->id);
                }
                break;
            default : 
               // header('HTTP/1.1 405 Method Not Allowed');
                header('Allow: GET, POST, PUT, DELETE');
                
                break;
        }
        break;
}
?>