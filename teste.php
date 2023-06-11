<?php

class DataEncrytype{
    private $key = "a2V5VXNlZEJ5VGhlQ29tbW9uVXNlcg==";
    private $currentKey;
    
    public function encryptKey(){
        $this->currentKey = base64_encode($this->key);
        echo $this->currentKey;
    }

    public function DecryptKey(){
        $key_encrypted = $this->currentKey;
        $key_decrypted = base64_decode($key_encrypted);
        echo $key_decrypted;
       
    }
}

$objeto = new DataEncrytype();
$objeto->encryptKey();
$objeto->DecryptKey();
