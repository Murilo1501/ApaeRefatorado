<!-- Unused file -->

<!-- <?php

    class DataSecurity {
        private static $prevKey = "";
        private static $currentDecryptedKey = "";
        private const ENCRYPT_METHOD = "aes-256-gcm";

        //Criptografa os dados
        protected function encryptData(array &$dados, string $key, string $tag="defaultTag"): void {
            //Tamanho do vetor de inicialização (IV)
            $iv_len = openssl_cipher_iv_length(self::ENCRYPT_METHOD);
            //Vetor de inicialização
            $iv = openssl_random_pseudo_bytes($iv_len);

            foreach($dados as $field=>$value) {
                if ($field=='Senha' || $field=='Confirmar Senha') {
                    $dados[$field] = $this->hashSenha($value);
                    continue;
                };
                //Criptografar dados
                $dados[$field] = openssl_encrypt(
                    $value,
                    self::ENCRYPT_METHOD,
                    $this->decodeKey($key),
                    0,
                    $iv,
                    $tag
                );
            }

            $dados["iv"]=$iv;
        }

        //Descriptografa
        protected function decryptData(array &$dados, string $key, string $tag="defaultTag", string $iv) {
            foreach ($dados as $field=>$value) {
                $dados[$field] = openssl_decrypt(
                    $value,
                    self::ENCRYPT_METHOD,
                    $this->decodeKey($key),
                    0,
                    $iv,
                    $tag
                );
            }
        }

        //Hash da senha
        private function hashSenha(string &$senha): void {
            $senha=password_hash($senha,PASSWORD_ARGON2ID);
        }

        //Decodificação da chave
        private function decodeKey(string $key): string {
            //Se a chave a ser decodificada foi a última solicitada
            if (self::$prevKey==$key) {
                return self::$currentDecryptedKey;
            }

            //Decodificação
            self::$prevKey = $key; //Armazena a chave atual
            $jsonFileContent = file_get_contents(__DIR__."/../../config/json/.json"); //Conteúdo do arquivo JSON
            $jsonFileArray = json_decode($jsonFileContent,true); //Transforma o conteúdo do arquivo JSON em uma array associativa
            $jsonFileValueEncoded = $jsonFileArray[$key]; //Chave de criptografia codificada 
            $jsonFileValueDecoded = base64_decode($jsonFileValueEncoded); //Decodifica a chave
            self::$currentDecryptedKey = $jsonFileValueDecoded; //Armazena o valor decodificado

            return $jsonFileValueDecoded; //Retorna o valor
        }
    }

?> -->
