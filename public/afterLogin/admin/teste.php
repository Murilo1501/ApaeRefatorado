<?php

$con = mysqli_connect("localhost","root","","apae2");



if(isset($_POST['request'])){
    $request = $_POST['request'];

    $query = "SELECT * FROM usuarios WHERE nivel_acesso = '$request' ";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);


?>

<table class="table-responsive">
    <?php 
       if($count){    
    ?>

    <thead>
        <tr style='background-color: #65baeb; border-color: #2c9ada;'>
            <th>ID</th>
            <th>Nome</th>
            <th>E-Mail</th>
            <th>Telefone</th>
            <th>Ramo de atividade</th>
            <th>Status</th>
            <th>Tipo de usuário</th>
            <th>Data de cadastro</th>
            <th>Carteira</th>
            <th>Editar</th>
        </tr>

        <?php
       }else{
            echo "Nenhum usuário encontrado";
       }


        ?>
    </thead>

    <tbody>
        <?php while($dados = mysqli_fetch_assoc($result)){ 
             echo "<tr class='small'>";
             $dados['ramoAtiv'] = $dados['ramoAtiv']!=""?ucfirst($dados['ramoAtiv']):"Não é empresa";
             $dados['numero'] = $dados['numero']!=""?ucfirst($dados['numero']):"Não tem número de telefone cadastrado";
             foreach ($dados as $col => $info) {
                 if (($col == "senha") || ($col == "cpf") || ($col == "cep") || ($col == "endereco") || ($col == "complemento") ||($col == "data_nasc"))
                     continue;

                 if ($col == "ativo" && $info == "1") {
                     echo "<td>Ativo</td>";
                     continue;
                 } elseif ($col == "ativo" && $info == "0") {
                     echo "<td>Inativo</td>";
                     continue;
                 }

                 if ($info == "0") {
                     echo "<td>Sem dados</td>";
                     continue;
                 }

                 if ($col == "nivel_acesso") {
                     echo "<td>".ucfirst($info)."</td>";
                     continue;
                 }

                 echo "<td>" . $info . "</td>";
             }

             echo " <td><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal'
             data-bs-target='#card".$dados['id']."'>
             <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                 class='bi bi-person-vcard' viewBox='0 0 16 16'>
                 <path
                     d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z' />
                 <path
                     d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z' />
             </svg></button>

     </td>
     <td>
         <a href='../admin/alterar_usuario.php?email=".$dados['email']."' role='button' class='btn btn-primary btn-sm mt-2 mb-2'><i class='bi bi-pencil-square'></i></a>
     </td>";


    //Empresas
    if ($dados['nivel_acesso']=="empresas") {
     echo '<!-- Carteira - Empresa -->
         <div class="modal fade" id="card'.$dados['id'].'" tabindex="-1" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered modal-lg">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5>
                             Carteira - Empresa
                         </h5>
                     </div>
                     <div class="modal-body">
                         <div class="thumbnail text-center">
                         <img src="../../images/cardEmpresa.png" alt="" class="w-100">
                             <div>
                                 <p class="nome_empresa fw-bold">'.$dados['nome'].'</p>
                                 <p class="ramo">'.$dados['ramoAtiv'].'</p>
                                 <p class="cadastro_empresa">'.$dados['data_cadastro'].'</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>';
     //Comum ou admin
     } else {
     echo "

         <div class='modal fade' id='card".$dados['id']."'tabindex='-1' aria-hidden='true'>
             <div class='modal-dialog modal-dialog-centered modal-lg'>
                 <div class='modal-content'>
                     <div class='modal-header'>
                         <h5>
                             Carteira - Amigo10
                         </h5>
                     </div>
                     <div class='modal-body'>
                         <div class='thumbnail text-center'>";
                             if($dados['nivel_acesso'] == 'comum')
                                 echo   "<img src='../../images/cardUser.png' alt='' class='w-100'>";
                             elseif ($dados['nivel_acesso'] == 'admin')
                                 echo   "<img src='../../images/cardAdmin.png' alt='' class='w-100'>";
                             else 
                                 echo   "<img src='../../images/cardEmpresa.png' alt='' class='w-100'>";
                         echo "<div>
                                 <p class='nome_".$dados['nivel_acesso']."' fw-bold'>".$dados['nome']."</p>
                                 <p class='cpf_".$dados['nivel_acesso']."'>".$dados['cpf']."</p>
                                 <p class='data_nasc_".$dados['nivel_acesso']."'>".$dados['data_nasc']."</p>
                                 <p class='cadastro_".$dados['nivel_acesso']."'>".$dados['data_cadastro']."</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         ";
        ?>
       
        <?php
        }
        ?>
    </tbody>
</table>

<?php
}
}
?>