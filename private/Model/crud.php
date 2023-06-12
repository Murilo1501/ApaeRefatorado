<?php

require_once 'encrytype.php';
final class Crud extends DataEncrytype
{

    private $userDB;
    private $passDB;
    private $pdo;
    private $queries;
    private $decriptSenha;
 
    private const USER_LEVELS = [        //User   Password
        'AUTH-USER_LV-1~R@@T' => ['root',''], //Usuário root
        'comum'=>['Comum','SouPobre'], //Usuário comum
        'empresa'=>['Empresa','Marketing2'], //Usuário empresa
        'admin'=>['AdminAPAE','CabecaDaAPAE'], //Usuário admin
    ];

    

    function __construct(string $typeUser) {
        //PDO
        $typeUser = self::USER_LEVELS[ 'AUTH-USER_LV-1~R@@T'];
        $this->userDB = $typeUser[0];
        $this->passDB = $typeUser[1];
        $this->pdo = new PDO("mysql:host=localhost;dbname=apae2",$this->userDB,$this->passDB);
        //$decriptSenha = $this->DecryptKey();
        $this->queries = [
            'usuarios'=> "INSERT INTO usuarios (nome,email,cep,cpf,data_nasc,senha,endereco,numero,nivel_acesso,data_cadastro,ativo) VALUES (?,?,?,?,?,?,?,?,?,,1)",
            'parceiros'=> "INSERT INTO usuarios (nome,ramoAtiv,email,senha,nivel_acesso,data_cadastro,ativo) VALUES (?,?,?,?,?,?,1)",
            'eventos_notices' => "INSERT INTO noticias  (titulo,texto,tipo,inicio,termino) VALUES (?,?,?,?,?)",
            'product' => "INSERT INTO produtos (nome,descricao,preco) VALUES (?,?,?)"
        ];
       
      
    }

    function __destruct() {
        $this->userDB = null;
        $this->passDB = null;
        $this->pdo = null;

    }

    function insert(array $dados):bool {
        try {
            //Inserir os dados no DB
           
            $type_insert = $dados['nivel']; // Seleciona a rerquisição feita pelo formulário (cadastro de admin,comum,parceiro,noticia e evento)
            
            // Pega a query insert do array QUERY

            $queryChose_user = $this->queries['usuarios'];  // Query escolhida (eventos, noticias ou usuarios)
            $queryChose_parceiros = $this->queries['parceiros'];
            $queryChose_notices_events = $this->queries['eventos_notices'];
            $queryChose_product = $this->queries['product'];
            $proxy = [];
          
            switch($type_insert){ // Switch que faz as condições para saber qual o tipo de requisão foi feita
                case "admin":
                case "comum":
                   
                    $stm = $this->pdo->prepare($queryChose_user);
                    foreach($dados as $v){   // laço de repetição que faz o cadastro sozinho com o array dos dados
                        $proxy[] = $v;
                    }

                    $proxy[] = date("Y-m-d");
                    var_dump($dados);
                    if($stm->execute($proxy)){
                        return true;
                    }
                    return false;
        
                break;

                case "empresas":
                    $stm = $this->pdo->prepare($queryChose_parceiros);
                    var_dump($dados);
                    foreach($dados as $v){
                        $proxy[] = $v;
                    }
                    $proxy[] = date("Y-m-d");
                    if($stm->execute($proxy)){
                        return true;
                    }
                    return false;

                break;
                
                case "eventos_notices":
                    var_dump($dados);
                    unset($dados['nivel']); 
                    $stm = $this->pdo->prepare($queryChose_notices_events);
                    foreach($dados as $v){
                        $proxy[] = $v;
                    }
                  if($stm->execute($proxy)){
                    return true;
                  }
                  return false;

                break;

                case "product":
                    
                    unset($dados['nivel']);

                    $stm = $this->pdo->prepare($queryChose_product);
                    foreach($dados as $v){
                        $proxy[] = $v;
                    }
                  if($stm->execute($proxy)){
                    return true;
                  }
                  return false;
                break;

             
            }

         

        } catch (PDOException $exception) {
            echo $exception;
            return false;
        }
          
    }

    public function read(string $user,string $page): bool | array | int {
        try {
           
           
            $initialId = strval((intval($page)-1)*10);
            $finalId = strval(intval($page)*200);
            //Ler os dados do DB
            switch($user){
                case "all":
                   
        
                    $query = "SELECT * FROM usuarios  WHERE :initialId < id AND id <= :finalId ORDER BY id ASC  ";
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
                    $stm->bindParam(":initialId",$initialId);
                    $stm->bindParam(":finalId",$finalId);
                    $stm->execute();
                    
                    $data = $stm->fetchAll();
    
                    return count($data)>0?$data:false;


                break;      

                case "noticia":

                    $query = "SELECT * FROM noticias ORDER BY id DESC  LIMIT 4 ";
                    
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
                    $stm->execute();
                    
                    $data = $stm->fetchAll();
    
                    return count($data)>0?$data:false;
                break;

                case "product":

                    $query = "SELECT * FROM produtos WHERE :initialId < id AND id <= :finalId ORDER BY id DESC   ";
                    
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
                    $stm->bindParam(":initialId",$initialId);
                    $stm->bindParam(":finalId",$finalId);
                    $stm->execute();
                    
                    $data = $stm->fetchAll();
    
                    return count($data)>0?$data:false;
                break;
               
                default:
                    $query = "SELECT * FROM usuarios WHERE email = :email";
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
                    $stm->bindParam("email",$user);
                    $stm->execute();
        
                    $data = $stm->fetch();
        
                    return $data; //Array com dados ou `false`
                

            }
            //Todos os usuários
           

            //Usuário específico
           
        } catch (PDOException $exception) {
            echo $exception;
            return false;
        }
    }

    public function update(array $dados): bool {
        try {
            //Atualizar os dados do DB
            unset($dados['nivel']); //Nivel de acesso não utilizado

            $isAtivo = $dados['ativo'] ?? 1;

            $queryComSenha = "UPDATE usuarios SET numero=:numero, cep=:cep, endereco=:endereco, complemento=:complemento, senha=:senha, ativo=:ativo WHERE id=:id";
            $querySemSenha = "UPDATE usuarios SET numero=:numero, cep=:cep, endereco=:endereco, complemento=:complemento, ativo=:ativo WHERE id=:id";
            $stm = $this->pdo->prepare($queryComSenha);
            $stm2 = $this->pdo->prepare($querySemSenha);

            $stm->bindParam("numero",$dados['telefone']);
            $stm->bindParam("cep",$dados['cep']);
            $stm->bindParam("endereco",$dados['endereco']);
            $stm->bindParam("complemento",$dados['complemento']);
            $stm->bindParam("senha",$dados['Senha']);
            $stm->bindParam("ativo",$isAtivo);
            $stm->bindParam("id",$dados['id']);

            $stm2->bindParam("numero",$dados['telefone']);
            $stm2->bindParam("cep",$dados['cep']);
            $stm2->bindParam("endereco",$dados['endereco']);
            $stm2->bindParam("complemento",$dados['complemento']);
            $stm2->bindParam("ativo",$isAtivo);
            $stm2->bindParam("id",$dados['id']);

            return isset($dados['Senha'])?$stm->execute():$stm2->execute();
        } catch (PDOException $exception) {
            return false;
        }
    }

  
    
    public function verifyLogin(array $dadosLogin): bool|string {
        try {
            //Fazer login
        
            $result_queryLog = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?  /*AES_ENCRYPT(?, 'keyUsedByTheCommonUser')*/ AND senha = ? AND ativo = 1 /*AES_ENCRYPT(?,'keyUsedByTheCommonUser')*/");
            $result_queryLog->setFetchMode(PDO::FETCH_ASSOC);
            $result_queryLog->bindParam(1,$dadosLogin['Email']);
            $result_queryLog->bindParam(2,$dadosLogin['Senha']);
            $result_queryLog->execute();
            $user = $result_queryLog->fetch();
            return $user ? $user['nivel_acesso']:false;

           
        } catch (PDOException $exception) {
            return false;
        }
    }
}

