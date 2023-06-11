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
        $decriptSenha = $this->DecryptKey();
        $this->queries = [
            'usuarios'=> "INSERT INTO usuarios (nome,email,cep,cpf,data_nasc,senha,cidade,numero,nivel_acesso) VALUES (?,?,?,?,?,?,?,?,?)",
            'parceiros'=> "INSERT INTO usuarios (nome,email,cep,cpf,data_nasc,senha,cidade,numero,ramoAtiv,nivel_acesso) VALUES (?,?,?,?,?,?,?,?,?,?)",
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
                case "comum":
                  $stm = $this->pdo->prepare($queryChose_user);
                  foreach($dados as $v){   // laço de repetição que faz o cadastro sozinho com o array dos dados
                    $proxy[] = $v;
                  }     
                
                 if($stm->execute($proxy)){
                    return true;
                 }
                 return false;
        
                break;

                case "admin":
                    $stm = $this->pdo->prepare($queryChose_user);
                  foreach($dados as $v){
                    $proxy[] = $v;
                  }

                  if($stm->execute($proxy)){
                    return true;
                 }
                  return false;
                break;

                case "parceiro":
                    $stm = $this->pdo->prepare($queryChose_parceiros);
                    var_dump($dados);
                    foreach($dados as $v){
                        $proxy[] = $v;
                    }
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

    public function read(string $user,string $page="1"): bool | array | int {
        try {
           
            //Ler os dados do DB
            switch($user){
                case "all":
                    $query = "SELECT * FROM usuarios  WHERE :initialId < id AND id <= :finalId ";
                    $initialId = strval(intval($page)-1);
                    $finalId = strval(intval($page)*200);
        
                    
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

                    $query = "SELECT * FROM produtos ORDER BY id DESC LIMIT 3  ";
                    
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
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
            $id = $dados['id'];
            var_dump($dados);
            //Atualizar os dados do DB
            $stm =$this->pdo->prepare( "UPDATE usuarios SET  numero = :numero,  cep = :cep, cidade = :cidade,  complemento = :complemento, senha = :senha, isAtivo = :isAtivo WHERE id = :id");
            $stm->bindParam(':numero',$dados['telefone']);
            $stm->bindParam(':cep',$dados['CEP']);
            $stm->bindParam(':cidade',$dados['endereco']);
            $stm->bindParam(':senha',$dados['senha']);
            $stm->bindParam(':complemento',$dados['complemento']);
            $stm->bindParam(':isAtivo',$dados['inlineRadioOptions']);
            $stm->bindParam(':id',$id);
            $stm->execute();
            return true;
        } catch (PDOException $exception) {
            echo $exception;
            return false;
        }
    }

  
    
    public function verifyLogin(array $dadosLogin): bool|string {
        try {
            //Fazer login


            $result_queryLog = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ?  /*AES_ENCRYPT(?, 'keyUsedByTheCommonUser')*/ AND senha = ? /*AES_ENCRYPT(?,'keyUsedByTheCommonUser')*/");
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

