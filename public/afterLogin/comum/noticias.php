<?php
    session_start();
    if(!isset($_SESSION['email']) || $_SESSION['type']!="comum") {
        header('Location: /Novo_APAE/public/routes/logout.php');
        exit();
    }
?>
<?php

require_once '../../../private/Controller/readData.php';
require_once '../../../private/Controller/Classes/controlCrud.php';
$read = new ReadData("noticia",'','');
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
<?php require_once '../../shared/sidebarComum.php';?>


 <!-- Últimas Notícias -->
 <div style="background-color: #f9f9f9;">
        <div class="container py-4">
            <div class="text-start scroll_noticias_eventos_1">
                <p class="fs-2 mb-0">Notícias & Eventos</p>
                <div class="row">
                    <div class="col">
                        <p class="mt-1">Utilize o filtro para navegar com menores dificuldades!</p>
                    </div>
                    <div class="col-md-8">
                        <select class="form-select form-select-lg mb-3">
                            <option value="0">Todos</option>
                            <option value="1">Notícias</option>
                            <option value="2">Eventos</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row g-4 mt-1 mb-1 scroll_noticias_eventos_2">
            <?php
                    foreach($read->arrayData as $dados){
                        if($dados['tipo'] == "eventos"){
                            echo " <div class='col-sm-6'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title fw-bold mb-0'>".$dados['titulo']."<i class='bi bi-calendar-event ms-2'></i>
                                    </h5>
                                    <span class='mt-0 mb-0 text-muted small'>".$dados['inicio']."</span>
                                    <p class='card-text mt-1'>".$dados['texto']."</p>
        
                                    <button type='button' class='btn btn-sm btn-outline-primary' data-bs-toggle='modal'
                                        data-bs-target='#noticia".$dados['id']."'>
                                        Ler mais<i class='bi bi-arrow-right ms-1'></i> </button>
        
                                    <div class='modal fade' id='noticia".$dados['id']."' tabindex='-1' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-scrollable modal-xl'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title fs-3'>$dados[titulo]</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                        aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>".
                                                   $dados['texto'] ."</div>
                                                <div class='modal-footer'>
                                                    <p class='text-black-50'>".$dados['termino']."</p>
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
                                    <h5 class='card-title fw-bold mb-0'>".$dados['titulo']."<i class='bi bi-newspaper ms-2'></i>
                                    </h5>
                                    <span class='mt-0 mb-0 text-muted small'>".$dados['inicio']."</span>
                                    <p class='card-text mt-1'>".$dados['texto']."</p>
        
                                    <button type='button' class='btn btn-sm btn-outline-primary' data-bs-toggle='modal'
                                        data-bs-target='#noticia".$dados['id']."'>
                                        Ler mais<i class='bi bi-arrow-right ms-1'></i> </button>
        
                                    <div class='modal fade' id='noticia".$dados['id']."' tabindex='-1' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-scrollable modal-xl'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title fs-3'>".$dados['titulo']." </h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                        aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>".
                                                    $dados['texto']." </div>
                                                <div class='modal-footer'>
                                                    <p class='text-black-50'>".$dados['termino']."</p>
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
        window.sr = ScrollReveal({ reset: true });

        sr.reveal('.scroll_noticias_eventos_1', { duration: 1000 });
        sr.reveal('.scroll_noticias_eventos_2', { duration: 1000 });
    </script>

<script>
        $(document).ready(function(){
            $("#fetchval").on('change',function(){
                var value = $(this).val();
                //alert(value);

                $.ajax({
                    url:"teste.php",
                    type:"POST",
                    data:'request='+value,
                    beforeSend:function(){
                        $(".table ").html("<span>Filtrando...</span>");
                    },
                    success:function(data){
                        $(".table").html(data);
                    }
                });
            });
        });
    </script>
</body>

</html>