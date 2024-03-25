<?php 
 class PeticionApi {
     public $urlApi;

     function __construct()
     {
        $this -> urlApi = "http://tallergeorgio.hopto.org:5613/tallergeorgio/api/subirimagenes.php";
     }

    function subirUnidad($foto){
        $ch = curl_init();
        $post = [
          'opcion' => '7',
          'image' => new CurlFile($foto['tmp_name'], $foto['type'], $foto['name'])
        ];
        $url = $this->urlApi;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        
         $json = json_decode($response, true);
        $jeso =  json_encode($response);
          return $jeso;
        
    }

    
}