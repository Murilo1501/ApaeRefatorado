<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['type'] != "admin") {
    header('Location: /Novo_APAE/public/routes/logout.php');
    exit();
}
?>

<?php

require_once '../../../private/Controller/readData.php';

$read = new ReadData('all');

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/carteiras.css">

    <title>Apae Guarulhos</title>


</head>



<body>
    <?php require_once '../../shared/sidebarAdmin.php'; ?>


    <div style="background-color: #f9f9f9;">
        <div class="container py-4">
            <div class="text-start scroll_1">
                <p class="fs-2 mb-0">Lista de Usuários</p>
                <div class="row">
                    <div class="col">
                        <p class="mt-1">Veja a lista de todos os usuários cadastrados e utilize o filtro caso
                            necessário!</p>
                    </div>
                    <div class="col-md-8">
                        <select class="form-select form-select-lg mb-3" id="fetchval">
                            <option value="Todos">Todos</option>
                            <option value="admin">Administradores</option>
                            <option value="empresas">Empresas parceiras</option>
                            <option value="comum">Não-corporativos</option>
                        </select>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_GET["f"]) && $_GET["f"] == 1) {
                echo "<div class=\"alert alert-danger alert-dismissible fade show\">
                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                            <strong>Erro ao alterar!</strong> Verifique as informações. Caso acredite que estejam corretas, entre em contato com a equipe de suporte técnico.
                          </div>";
            } elseif (isset($_GET["f"]) && $_GET["f"] == 0) {
                echo '<div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Sucesso ao alterar!</strong> Os dados do usuário foram atualizados com sucesso.
                          </div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center table-hover align-middle small scroll_2">

                    <?php
                    echo "<tr style='background-color: #65baeb; border-color: #2c9ada;'>
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
                            </tr> ";

                    foreach ($read->arrayData as $dados) {
                        echo "<tr class='small'>";
                        $dados['data_cadastro'] = $read->formatDate($dados['data_cadastro'], "d/m/Y");
                        $dados['ramoAtiv'] = $dados['ramoAtiv'] != "" ? ucfirst($dados['ramoAtiv']) : "Não é empresa";
                        $dados['numero'] = $dados['numero'] != "" ? ucfirst($dados['numero']) : "Não tem número de telefone cadastrado";
                        foreach ($dados as $col => $info) {
                            if (($col == "senha") || ($col == "cpf") || ($col == "cep") || ($col == "endereco") || ($col == "complemento") || ($col == "data_nasc") || ($col == "data_vencimento"))
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
                                echo "<td>" . ucfirst($info) . "</td>";
                                continue;
                            }

                            echo "<td>" . $info . "</td>";
                        }

                        echo " <td><button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal'
                                    data-bs-target='#card" . $dados['id'] . "'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                        class='bi bi-person-vcard' viewBox='0 0 16 16'>
                                        <path
                                            d='M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z' />
                                        <path
                                            d='M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z' />
                                    </svg></button>

                            </td>
                            <td><a href='../admin/alterar_".(($dados['nivel_acesso']=='empresas')?'empresas':'usuario').".php?email=" . $dados['email'] . "' role='button' class='btn btn-primary btn-sm '><i class='bi bi-pencil-square'></i></a>
                        <button type='button' class='btn btn-secondary btn-sm' data-bs-toggle='modal' data-bs-target='#ativarUser" . $dados['id'] . "'><i class='bi bi-person-check'></i></button>
                </td>";


                        //Empresas
                        if ($dados['nivel_acesso'] == "empresas") {
                            echo '<!-- Carteira - Empresa -->
                                <div class="modal fade" id="card' . $dados['id'] . '" tabindex="-1" aria-hidden="true">
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
                                                        <p class="nome_empresa fw-bold">' . $dados['nome'] . '</p>
                                                        <p class="ramo">' . $dados['ramoAtiv'] . '</p>
                                                        <p class="cadastro_empresa">' . $dados['data_cadastro'] . '</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                            //Comum ou admin
                        } else {
                            echo "

                                <div class='modal fade' id='card" . $dados['id'] . "'tabindex='-1' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered modal-lg'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5>
                                                    Carteira - Amigo10
                                                </h5>
                                            </div>
                                            <div class='modal-body'>
                                                <div class='thumbnail text-center'>";
                            if ($dados['nivel_acesso'] == 'comum')
                                echo   "<img src='../../images/cardUser.png' alt='' class='w-100'>";
                            elseif ($dados['nivel_acesso'] == 'admin')
                                echo   "<img src='../../images/cardAdmin.png' alt='' class='w-100'>";
                            else
                                echo   "<img src='../../images/cardEmpresa.png' alt='' class='w-100'>";
                            echo "<div>
                                                        <p class='nome_" . $dados['nivel_acesso'] . "' fw-bold'>" . $dados['nome'] . "</p>
                                                        <p class='cpf_" . $dados['nivel_acesso'] . "'>" . $dados['cpf'] . "</p>
                                                        <p class='data_nasc_" . $dados['nivel_acesso'] . "'>" . $dados['data_nasc'] . "</p>
                                                        <p class='cadastro_" . $dados['nivel_acesso'] . "'>" . $dados['data_cadastro'] . "</p>
                                                        <p> Data de Vencimento: " . $dados['data_vencimento'] . "</p>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
                        }




                        echo "</tr>

                        <div class='modal fade' id='ativarUser" . $dados['id'] . "' tabindex='-1' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered modal-sm'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5>
                                            Alterar status do usuário
                                        </h5>
                                    </div>
                                    <div class='modal-body'>
                                        <div class='mb-3 mt-3 text-center'>
                                            <form action='../../routes/routes.php?isUpdate=1&user=admin' method='post'>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='ativar' id='ativo' value='1'>
                                                    <label class='form-check-label' for='ativo'>Ativar</label>
                                                </div>
                                                <div class='form-check form-check-inline'>
                                                    <input class='form-check-input' type='radio' name='ativar' id='inativo' value='0'>
                                                    <label class='form-check-label' for='inativo'>Inativar</label>
                                                </div>
                                                <br>
                                                <br>
                                                <input type='hidden' name='id' value=" . $dados['id'] . ">
                                                <p>ID: " . $dados['id'] . "</p>
                                                <input type='hidden' name='path' value='admin/lista_usuarios.php'>
                    
                                                <div class='clearfix'>
                                                    <button type='submit' class='btn btn-sm btn-outline-success float-md-end' id='salvar'>Salvar<i class='bi bi-check2-square ms-2'></i></button>
                                                </div>
                                            </form>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> ";
                    }



                    ?>


                </table>
            </div>
        </div>
    </div>

       

    <!-- Carteira - Amigo10 -->

    <!-- Carteira - Admin -->
    <div class="modal fade" id="card2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>
                        Carteira - Administrador
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="thumbnail text-center">
                        <img src="../../images/cardAdmin.png" alt="" class="w-100">
                        <div>
                            <p class="nome_admin fw-bold">Melissa Natale Ferreira Franco Mais Um Franco</p>
                            <p class="cpf_admin">123.123.123-30</p>
                            <p class="data_nasc_admin">12/12/1222</p>
                            <p class="cadastro_admin">12/12/1221</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carteira - Empresa -->
    <div class="modal fade" id="card3" tabindex="-1" aria-hidden="true">
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
                            <p class="nome_empresa fw-bold">Melissa Natale Ferreira Franco Mais Um Franco</p>
                            <p class="ramo">Exemplo de ramo</p>
                            <p class="cadastro_empresa">31/10/2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Ativar usuário -->
    <div class="modal fade" id="ativarUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>
                        Alterar status do usuário
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3 mt-3 text-center">
                        <form action="../../routes/routes.php?isUpdate=1&user=admin" method="post">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ativo" id="ativo" value="1">
                                <label class="form-check-label" for="ativo">Ativar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ativo" id="inativo" value="0">
                                <label class="form-check-label" for="inativo">Inativar</label>
                            </div>
                            <br>
                            <br>
                            <!-- Campo invisivel / usuário -->
                            <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                            <?php echo $dados['id']; ?>
                            <input type="hidden" name="path" value="admin/lista_usuarios.php">

                            <div class="clearfix">
                                <button type="submit" class="btn btn-sm btn-outline-success float-md-end" id="salvar">Salvar<i class="bi bi-check2-square ms-2"></i></button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once '../../shared/footer.html'; ?>

    <!-- Scrollavel -->
    <script>
        window.sr = ScrollReveal({
            reset: true
        });

        sr.reveal('.scroll_1', {
            duration: 1000
        });
        sr.reveal('.scroll_2', {
            duration: 1000
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#fetchval").on('change', function() {
                var value = $(this).val();
                //alert(value);

                $.ajax({
                    url: "teste.php",
                    type: "POST",
                    data: 'request=' + value,
                    beforeSend: function() {
                        $(".table ").html("<span>Filtrando...</span>");
                    },
                    success: function(data) {
                        $(".table").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>