<?php
    session_start();
    if(!isset($_SESSION['email']) || $_SESSION['type']!="empresas") {
        header('Location: /Novo_APAE/public/routes/logout.php');
        exit();
    }
?>

<?php

require_once '../../../private/Controller/readData.php';
$page = isset($_GET['page']) ? $_GET['page']:1;
$read = new ReadData("all",$page);

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

    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/carteiras.css">

    <title>Apae Guarulhos</title>

    <style>
     .thumbnail {
            position: relative;
            display: inline-block;
        }

        /* Comum */
        .nome_comum {
            position: absolute;
            top: 19%;
            left: 8%;
            text-align: start;
            width: 85%;
            color: #24376b;
            font-weight: 500;
            font-size: 3vw;
        }

        .cpf_comum {
            position: absolute;
            top: 44%;
            left: 18%;
            text-align: start;
            color: #6d7ca1;
            font-weight: 500;
            font-size: 1.7vw;
        }

        .data_nasc_comum {
            position: absolute;
            top: 53%;
            left: 31%;
            text-align: start;
            color: #6d7ca1;
            font-weight: 500;
            font-size: 1.7vw;
        }

        .cadastro_comum {
            position: absolute;
            top: 64%;
            left: 42%;
            text-align: start;
            color: #6d7ca1;
            font-weight: 500;
            font-size: 1.7vw;
        }

        /* Admin */
        .nome_admin {
            position: absolute;
            top: 19%;
            left: 8%;
            text-align: start;
            width: 85%;
            color: #8a1919;
            font-weight: 500;
            font-size: 3vw;
        }

        .cpf_admin {
            position: absolute;
            top: 46%;
            left: 18%;
            text-align: start;
            color: #c97777;
            font-weight: 500;
            font-size: 1.7vw;
        }

        .data_nasc_admin {
            position: absolute;
            top: 55%;
            left: 31%;
            text-align: start;
            color: #c97777;
            font-weight: 500;
            font-size: 1.7vw;
        }

        .cadastro_admin {
            position: absolute;
            top: 64%;
            left: 42%;
            text-align: start;
            color: #c97777;
            font-weight: 500;
            font-size: 1.7vw;
        }

        /* Empresa */
        .nome_empresa {
            position: absolute;
            top: 19%;
            left: 8%;
            text-align: start;
            width: 85%;
            color: #b07907;
            font-weight: 500;
            font-size: 3vw;
        }

        .ramo {
            position: absolute;
            top: 54%;
            left: 47%;
            text-align: start;
            color: #c4a554;
            font-weight: 500;
            font-size: 1.7vw;
        }

        .cadastro_empresa {
            position: absolute;
            top: 63%;
            left: 45%;
            text-align: start;
            color: #c4a554;
            font-weight: 500;
            font-size: 1.7vw;
        }

    </style>
</head>



<body>
    <?php require_once '../../shared/sidebarParceiros.php'; ?>


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
                        <select class="form-select form-select-lg mb-3">
                            <option value="0">Todos</option>
                            <option value="1">Administradores</option>
                            <option value="2">Empresas parceiras</option>
                            <option value="3">Não-corporativos</option>
                        </select>
                    </div>
                </div>
            </div>
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
                            </tr> ";

                    foreach ($read->arrayData as $dados) {
                        echo "<tr class='small'>";
                        $dados['data_cadastro'] = $read->formatDate($dados['data_cadastro'],"d/m/Y");
                        $dados['ramoAtiv'] = $dados['ramoAtiv']!=""?ucfirst($dados['ramoAtiv']):"Não é empresa";
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
                            } 
                
                    

                        echo "</tr>";
                    }



                    ?>








                    <!-- Testes com as outras opções de carteiras -->
                    <!-- <tr class='small'>
                        <td>2</td>
                        <td>Melissa Natale Ferreira Franco</td>
                        <td>123.456.789-10</td>
                        <td>(11) 91234-5678</td>
                        <td>07123-456</td>
                        <td>Rua de exemplo, bairro teste, cidade, sp</td>
                        <td>112962022@eniac.edu.br</td>
                        <td><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#card2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                </svg></button>
                        </td>
                        <td>sim</td>
                        <td><button type="button" class="btn btn-primary btn-sm mt-2 mb-2 me-1 ms-1"><i
                                    class="bi bi-pencil-square"></i></button><button type="button"
                                class="btn btn-danger btn-sm mt-2 mb-2 me-1 ms-1"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>

                    <tr class="small">
                        <td>2</td>
                        <td>Melissa Natale Ferreira Franco</td>
                        <td>123.456.789-10</td>
                        <td>(11) 91234-5678</td>
                        <td>07123-456</td>
                        <td>Rua de exemplo, bairro teste, cidade, sp</td>
                        <td>112962022@eniac.edu.br</td>
                        <td><button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#card3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                </svg></button>
                        </td>
                        <td>sim</td>
                        <td><button type="button" class="btn btn-primary btn-sm mt-2 mb-2 me-1 ms-1"><i
                                    class="bi bi-pencil-square"></i></button><button type="button"
                                class="btn btn-danger btn-sm mt-2 mb-2 me-1 ms-1"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr> -->
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

    <nav>
        <ul class="pagination pagination-sm justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#">
                    <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                </a>
            </li>
            <!-- 10 itens (1,2,3,...,10) / a seta vai mudar esses numeros pra 11-20 (11,12,13,...,20) -->
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                </a>
            </li>
        </ul>
    </nav>

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
</body>

</html>