<?php 
namespace App\Providers;
class Api_Manager{

   // private $url = "https://marvelrivalsapi.com/rivals";
    //private $key = "";

    private $baseUrl;
    private $headers;
    public function __construct($baseUrl, $headers = []){
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->headers = $headers;
    }

    private function request($method,$endpoint, $data = null){
        $url = $this->baseUrl . '/' . ltrim($endpoint, '/');

        $ch = curl_init();

        $defaultHeader = [
            'Content-type: application/json',
            'Accept: Application/json'
        ];

        $allHeader = array_merge($defaultHeader,$this->headers);

        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,strtoupper($method));
        curl_setopt($ch,CURLOPT_HTTPHEADER,$allHeader);

        if($data !== null && in_array(strtoupper($method),['POST','PUT','PATCH'])){
            curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        $err = curl_error($ch);
        curl_close($ch);

        return [
            'status' => $httpCode,
            'response' => json_decode($response,true),
            'error' => $err ?: null
            
        ];
    }


    public function get($endpoint){
        return $this->request('GET',$endpoint);
    }
}
