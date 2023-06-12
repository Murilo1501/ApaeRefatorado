<?php

session_start();
if(!isset($_SESSION['email'])) {
    header('Location: /Novo_APAE/public/beforeLogin/login.php');
    exit();
}

require_once '../../../private/Controller/readData.php';
require_once '../../../private/Controller/Classes/controlCrud.php';
$read = new ReadData("product");

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="../../css/admin.css">

    <title>Apae Guarulhos</title>
</head>

<body>
    <?php require_once '../../shared/sidebarComum.php';?>

    <div class="container py-5">
        <p class="fs-2 mb-0">Produtos</p>
        <div class="row justify-content-center">
            <?php
                foreach($read->arrayData as $dados){
                    echo "  <div class='col-md-8 col-lg-6 col-xl-4 scroll_1'>
                    <div class='card mb-2'>
                        <img src='https://cdn-icons-png.flaticon.com/512/43/43777.png' class='card-img-top'>
                        <div class='card-body'>
                            <div>
                                <h5 class='card-title'>$dados[nome]</h5>
                            </div>
                            <div class='d-flex justify-content-between total font-weight-bold mt-4'>
                                <h3>$dados[preco]</h3>
                            </div>
                            <button type='button' class='btn btn-primary' data-bs-toggle='modal'
                                data-bs-target='#produto1'>Detalhes do produto<i
                                    class='bi bi-arrow-right ms-1'></i></button>
                            <div class='modal fade' id='produto1' tabindex='-1' aria-labelledby='produto1'
                                style='display: none;' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-scrollable'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h1 class='modal-title fs-5' id='exampleModalScrollableTitle'>$dados[nome]
                                            </h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                         
                                            <hr>
                                            <h4>Detalhes do produto:</h4>
                                            <p>$dados[descricao]</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
                }
            ?>
          
         
            
            
        </div>
    </div>

    <!-- Footer -->
    <?php require_once '../../shared/footer.html';?>

    <!-- Scrollavel -->
    <script>
        window.sr = ScrollReveal({ reset: true });

        sr.reveal('.scroll_1', { duration: 1000 });
        sr.reveal('.scroll_2', { duration: 1000 });
    </script>
</body>

</html>