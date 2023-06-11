<?php

session_start();
if(!isset($_SESSION['email'])) {
    header('Location: /Novo_APAE/public/beforeLogin/login.php');
    exit();
}

require_once '../../../private/Controller/readData.php';
require_once '../../../private/Controller/Classes/controlCrud.php';
$read = new ReadData("AUTH-USER_LV-1~R@@T","noticia");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>

    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="../../css/admin.css">

    <title>Apae Guarulhos</title>

</head>

<body>
<?php require_once '../../shared/sidebarComum.php'?>

    <!-- Banner Hero -->
    <div
        style="position: relative; background: url(../../images/hero.png) no-repeat center; background-size: cover; height: 500px; overflow: hidden;">
        <!-- <div class="container">
            <div class="text-secondary px-4 py-5 mb-4 mt-5 text-center">
                <div class="py-5">
                    <h1 class="display-5 fw-bold text-white">Associação de Pais e Amigos dos Excepcionais Guarulhos</h1>
                    <div class="col-lg-10 mx-auto">
                        <p class="fs-5 mb-4 text-light">Fundada em
                            1° de Julho de 1979 por um grupo de voluntárias, professoras e pais, sem fins
                            lucrativos, com o intuito de promover a atenção integral às pessoas com deficiência
                            intelectual e múltipla.</p>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Custom
                                button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Missão, Visão & Valores -->
    <div style="background-color: rgb(255, 255, 255)">

        <div class="container align-items-end py-4">
            <div class="row row-cols-1 row-cols-md-3 g-4 scroll_1">
                <div class="col pe-2 ps-2">
                    <div class="card h-100 card-shadow" style="border: none;">
                        <img src="../../images/telescope.png" class="card-img-top mx-auto d-block w-25 mt-3">
                        <div class="card-body">
                            <h3 class="card-title text-center">Missão</h3>
                            <p class="card-text text-center">Ser referência em atendimento na cidade, buscando a
                                integração à sociedade desta população.</p>
                        </div>
                    </div>
                </div>
                <div class="col pe-2 ps-2">
                    <div class="card h-100 card-shadow" style="border: none;">
                        <img src="../../images/target.png" class="card-img-top mx-auto d-block w-25 mt-3" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-center">Visão</h3>
                            <p class="card-text text-center">Promover e articular ações de defesa de direitos e
                                prevenção,
                                orientações, prestação de serviços, apoio à família, direcionadas à melhoria de
                                qualidade de vida da pessoa com deficiência e a construção de uma sociedade justa e
                                solidária.</p>
                        </div>
                    </div>
                </div>
                <div class="col pe-2 ps-2">
                    <div class="card h-100 card-shadow" style="border: none;">
                        <img src="../../images/receive.png" class="card-img-top mx-auto d-block w-25 mt-3" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-center">Valores</h3>
                            <p class="card-text text-center">Busca Constante da Excelência nos Serviços;
                                Comprometimento com a Causa;
                                Ética nas Relações e no Exercício das Atividades;
                                Promoção do Exercício da Cidadania;
                                Respeito as Diversidades.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Últimas Notícias -->
    <div style="background-color: #f9f9f9;">
        <div class="container py-4">
            <div class="text-center scroll_2">
                <p class="fs-2 mb-0">Eventos & Notícias</p>
                <a href="noticias.html" class="text-decoration-none text-black-50">Veja mais eventos e notícias clicando
                    aqui</a>
            </div>

           
            <div class='row g-4 mt-1 mb-1 scroll_3'>

                <?php
                    foreach($read->arrayData as $dados){
                        if($dados['tipo'] == "eventos"){
                            echo " <div class='col-sm-6'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title fw-bold mb-0'>$dados[titulo]<i class='bi bi-newspaper ms-2'></i>
                                    </h5>
                                    <span class='mt-0 mb-0 text-muted small'>$dados[inicio]</span>
                                    <p class='card-text mt-1'>$dados[texto]</p>
        
                                    <button type='button' class='btn btn-sm btn-outline-primary' data-bs-toggle='modal'
                                        data-bs-target='#noticia1'>
                                        Ler mais<i class='bi bi-arrow-right ms-1'></i> </button>
        
                                    <div class='modal fade' id='noticia1' tabindex='-1' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-scrollable modal-xl'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title fs-3'>$dados[titulo]</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                        aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                   $dados[texto] </div>
                                                <div class='modal-footer'>
                                                    <p class='text-black-50'>$dados[termino]</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
        
                                </div>
                            </div>
                        </div>";
                        } else {
                            echo "   <div class='col-sm-6'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title fw-bold mb-0'>$dados[titulo]<i class='bi bi-newspaper ms-2'></i>
                                    </h5>
                                    <span class='mt-0 mb-0 text-muted small'>$dados[inicio]</span>
                                    <p class='card-text mt-1'>$dados[texto]</p>
        
                                    <button type='button' class='btn btn-sm btn-outline-primary' data-bs-toggle='modal'
                                        data-bs-target='#noticia2'>
                                        Ler mais<i class='bi bi-arrow-right ms-1'></i> </button>
        
                                    <div class='modal fade' id='noticia2' tabindex='-1' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-scrollable modal-xl'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title fs-3'>$dados[titulo] </h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                        aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    $dados[texto] </div>
                                                <div class='modal-footer'>
                                                    <p class='text-black-50'>$dados[termino]</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
        
                                </div>
                            </div>
                        </div>";
                        }
                    }
                ?>
                
        
   
             
              

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once '../../shared/footer.html';?>

    <!-- Scrollavel -->
    <script>
        window.sr = ScrollReveal({reset: true});

        sr.reveal('.scroll_1', {duration: 1000});
        sr.reveal('.scroll_2', {duration: 1000});
        sr.reveal('.scroll_3', {duration: 1000});
    </script>
</body>

</html>