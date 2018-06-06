<?php 

class serie {
     
    private $mysql;
    private $returnType;
    
    /*El constructor se invoca cuando instanciamos new pelicula del index */
    // Constructor
    function __construct($type='') {
        $this->mysql =  new mysqli('localhost','u_playmobil','12345','playmobil');
        $this->mysql->set_charset("utf8");
        $this->returnType   = $type;
    }
    
    public function get($id){
        $sql=" SELECT serie.* FROM serie WHERE id=$id     " ;
        $rsRows=$this->mysql->query($sql);
        $arrRow=$rsRows->fetch_assoc();
        switch($this->returnType){
            case 'json' :
                return json_encode($arrRow);
                break;
            case 'xml':
                $xml= new DOMDocument();
                $xml->encoding ='UTF-8';
                $serieTag=$xml->createElement('serie');
                foreach($arrRow as $key=>$value){
                   $tag= $xml->createElement($key,$value);
                   $serieTag->appendChild($tag);
                }
                $xml->appendChild($serieTag);
                return $xml->saveXML();
                
                break;
            default :
                return $arrRow;
        }
    }
    
    public function getAll(){
        $sql=" SELECT serie.* FROM serie WHERE 1 ORDER BY nom";
        $rsRows=$this->mysql->query($sql);
        $arrRows=array();
        while( $arrRow=$rsRows->fetch_assoc()){
            $arrRows[]=$arrRow;  
        }
        switch($this->returnType){
            case 'json' :
                return json_encode($arrRows);
                break;
            case 'xml':
                $xml= new DOMDocument();
                $xml->encoding ='UTF-8';
                $seriesTag=$xml->createElement('series');
                for($k=0; $k<count($arrRows);$k++){
                    $serieTag=$xml->createElement('serie');
                    foreach(  $arrRows[$k]   as   $key  =>  $value){
                        $tag= $xml->createElement($key,$value);
                        $serieTag->appendChild($tag);
                    }
                    $seriesTag->appendChild($serieTag);
                }
                $xml->appendChild($seriesTag);
                return $xml->saveXML();
                break;
            default :
                return $arrRows;
        }
    }
        
}

?>