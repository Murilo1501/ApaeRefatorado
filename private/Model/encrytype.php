<?php


class DataEncrytype{

    protected string $key = "a2V5VXNlZEJ5VGhlQ29tbW9uVXNlcg==";
    
   
    public function DecryptKey():string {
        $key_encrypted = $this->key;
        $key_decrypted = base64_decode($key_encrypted);
        return $key_decrypted;
       
    }
}

