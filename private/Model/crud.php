<?php
date_default_timezone_set('America/Sao_Paulo');
require_once 'encrytype.php';
require_once __DIR__.'/../../lib/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

final class Crud extends DataEncrytype
{

    private $userDB;
    private $passDB;
    private $pdo;
    private $queries;
 
    private const USER_LEVELS = [        //User   Password
        'AUTH-USER_LV-1~R@@T' => ['root','Bfgl@2713'], //Usuário root
        'comum'=>['Comum','SouPobre'], //Usuário comum
        'empresa'=>['Empresa','Marketing2'], //Usuário empresa
        'admin'=>['AdminAPAE','CabecaDaAPAE'], //Usuário admin
    ];

    

    function __construct(string $typeUser) {
        //PDO
        $typeUser = self::USER_LEVELS[ 'AUTH-USER_LV-1~R@@T'];
        $this->userDB = 'root';
        $this->passDB = '';
        $this->pdo = new PDO("mysql:host=localhost;dbname=apae2",$this->userDB,$this->passDB);
        $this->queries = [
            'usuarios'=> "INSERT INTO usuarios (nome,email,cep,cpf,data_nasc,senha,endereco
            ,complemento,numero, data_vencimento,nivel_acesso,data_cadastro,ativo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,1)",
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
                
                case "evento_noticia":
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
                    var_dump($dados);
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
           
          
            //Ler os dados do DB
            switch($user){
                case "all":
                    $dataPage = 3;
                    $inic = ($page*$dataPage) - $dataPage;
                    $query = "SELECT * FROM usuarios  LIMIT $inic,$dataPage ";
        
                    
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
                    $stm->execute();
                    
                    $data = $stm->fetchAll();
    
                    return count($data)>0?$data:false;


                    break;      

                case "noticia":
                    $dataAtual = date("Y-m-d");

                    $query = "SELECT * FROM noticias WHERE termino >= '$dataAtual' AND inicio <= '$dataAtual' ORDER BY id DESC ";
                    
                    
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
                    $stm->execute();
                    
                    $data = $stm->fetchAll();
    
                    return count($data)>0?$data:false;
                    break;

                case "product":

                    $query = "SELECT * FROM produtos ORDER BY id DESC  ";
                    
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
                    $stm->execute();
                    
                    $data = $stm->fetchAll();
    
                    return count($data)>0?$data:false;
                    break;

                case "count":
                    //Count usuários
                    $queryCountComum = "SELECT COUNT(id) FROM usuarios WHERE nivel_acesso = 'comum'";
                    $queryCountEmpresas = "SELECT COUNT(id) FROM usuarios WHERE nivel_acesso = 'empresas'";
                    $queryCountAdmin = "SELECT COUNT(id) FROM usuarios WHERE nivel_acesso = 'admin'";

                    //Count ativos e inativos
                    $queryCountAtivos = "SELECT COUNT(id) FROM usuarios WHERE ativo=1";
                    $queryCountInativos = "SELECT COUNT(id) FROM usuarios WHERE ativo=0";

                    //Count produtos, eventos e notícias
                    $queryCountProdutos = "SELECT COUNT(id) FROM produtos";
                    $queryCountNoticias = "SELECT COUNT(id) FROM noticias WHERE tipo='noticias'";
                    $queryCountEventos = "SELECT COUNT(id) FROM noticias WHERE tipo='eventos'";

                    //Preparação das queries
                    $countComum = $this->pdo->prepare($queryCountComum);
                    $countEmpresas = $this->pdo->prepare($queryCountEmpresas);
                    $countAdmin = $this->pdo->prepare($queryCountAdmin);

                    $countAtivos = $this->pdo->prepare($queryCountAtivos);
                    $countInativos = $this->pdo->prepare($queryCountInativos);

                    $countProdutos = $this->pdo->prepare($queryCountProdutos);
                    $countNoticias = $this->pdo->prepare($queryCountNoticias);
                    $countEventos = $this->pdo->prepare($queryCountEventos);

                    //Execução das queries
                    $countComum->execute();
                    $countEmpresas->execute();
                    $countAdmin->execute();

                    $countAtivos->execute();
                    $countInativos->execute();

                    $countProdutos->execute();
                    $countNoticias->execute();
                    $countEventos->execute();

                    //Retorno das queries
                    $retornoComum = $countComum->fetchColumn();
                    $retornoEmpresa = $countEmpresas->fetchColumn();
                    $retornoAdmin = $countAdmin->fetchColumn();

                    $retornoAtivos = $countAtivos->fetchColumn();
                    $retornoInativos = $countInativos->fetchColumn();

                    $retornoProdutos = $countProdutos->fetchColumn();
                    $retornoNoticias = $countNoticias->fetchColumn();
                    $retornoEventos = $countEventos->fetchColumn();

                    //Array associativa com os retornos
                    $retornos = [
                        "comum" => $retornoComum,
                        "empresas" => $retornoEmpresa,
                        "admin" => $retornoAdmin,

                        "ativos" => $retornoAtivos,
                        "inativos" => $retornoInativos,

                        "produtos" => $retornoProdutos,
                        "noticias" => $retornoNoticias,
                        "eventos" => $retornoEventos,
                    ];
                    return $retornos;
                    break;
               
                default:
                    $query = "SELECT * FROM usuarios WHERE email = :email";
                    $stm = $this->pdo->prepare($query);
                    $stm->setFetchMode(PDO::FETCH_ASSOC);
                    $stm->bindParam(":email",$user);
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

            $queryComSenha = "UPDATE usuarios SET numero=:numero, cep=:cep, endereco=:endereco, complemento=:complemento, senha=:senha, ativo=:ativo, autenticado=:autenticado WHERE id=:id";
            $querySemSenha = "UPDATE usuarios SET numero=:numero, cep=:cep, endereco=:endereco, complemento=:complemento, ativo=:ativo,autenticado=:autenticado WHERE id=:id";
            $stm = $this->pdo->prepare($queryComSenha);
            $stm2 = $this->pdo->prepare($querySemSenha);

            $stm->bindParam("numero",$dados['telefone']);
            $stm->bindParam("cep",$dados['cep']);
            $stm->bindParam("endereco",$dados['endereco']);
            $stm->bindParam("complemento",$dados['complemento']);
            $stm->bindParam("senha",$dados['Senha']);
            $stm->bindParam("ativo",$isAtivo);
            $stm->bindParam("autenticado",$dados['autenticar']);
            $stm->bindParam("id",$dados['id']);

            $stm2->bindParam("numero",$dados['telefone']);
            $stm2->bindParam("cep",$dados['cep']);
            $stm2->bindParam("endereco",$dados['endereco']);
            $stm2->bindParam("complemento",$dados['complemento']);
            $stm2->bindParam("ativo",$isAtivo);
            $stm2->bindParam("autenticado",$dados['autenticar']);
            $stm2->bindParam("id",$dados['id']);

            return isset($dados['Senha'])?$stm->execute():$stm2->execute();
        } catch (PDOException $exception) {
            return false;
        }
    }

  
    
    public function verifyLogin(array $dadosLogin): bool|string {
        try {
            //Fazer login
          //var_dump($dadosLogin);
            $senha = $dadosLogin['SenhaLogin'];
            $result_queryLog = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND autenticado = 1 /*AES_ENCRYPT(?, 'keyUsedByTheCommonUser')*/  /*AES_ENCRYPT(?,'keyUsedByTheCommonUser')*/ AND ativo=1");
            $result_queryLog->setFetchMode(PDO::FETCH_ASSOC);
            $result_queryLog->bindParam(1,$dadosLogin['EmailLogin']);
            //$result_queryLog->bindParam(2,$dadosLogin['SenhaLogin']);
            $result_queryLog->execute();
            $user = $result_queryLog->fetch();
            var_dump($user);
            $sla = $user['senha'];

            $confirm = password_verify($senha,$sla);
            if($confirm){
                return  $confirm?$user['nivel_acesso']:false;
            }else {
                return false;
            }
            
           
           
           
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function verifyEmail($email){


        $sql = "SELECT * FROM usuarios WHERE email = :email AND nivel_acesso = 'comum'";
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam(':email',$email['email']);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        $result = $stm->fetch();

        if($result){
            $sucesso = $this->PHPMailer($email);
            return $sucesso;
        } else{
            return false;
        }

    
    }


    private function PHPMailer($email){
        try{
            $mail = new PHPMailer(true);

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '83f862e63259c2';
            $mail->Password = '40a3b9382303da';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 2525;

            $mail->setFrom('falconeri1501@gmail.com');
            $mail->addAddress($email['email']);
                      
            $mail->isHTML(true);                                 
            $mail->Subject = 'Recuperação de senha';
            $mail->Body = "Para a sua recuperação de senha basta clicar no link clicando"."<a href='http://localhost/Novo_APAE/public/beforeLogin/RedefinirSenha.php?email=$email[email]'>aqui</a>";
            $mail->AltBody = "Olá Cesar, Sua solicitação sobre o curso de PHP Developer.\nTexto da segunda linha.";

           $sent = $mail->send();

        
           return $sent;

        } catch(Exception $e){

        }


    }

    
    public function Mail($data){

        var_dump($data);
        $sql = "UPDATE usuarios SET senha = ? WHERE email = ?";  
        echo $data['email'];
        $ResultSql = $this->pdo->prepare($sql);
        $ResultSql->bindParam(1,$data['Senha']);
        $ResultSql->bindParam(2,$data['email']);
        $ResultSql->execute();

        if($ResultSql->execute()){
            return true;
        }
        
    }
       
    
}



