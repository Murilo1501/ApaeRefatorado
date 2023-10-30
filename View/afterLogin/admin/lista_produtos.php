<?php
    session_start();
    if(!isset($_SESSION['email']) || $_SESSION['type']!="admin") {
        header('Location: /Novo_APAE/public/routes/logout.php');
        exit();
    }

    require_once '../../../private/Controller/readData.php';
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
<?php require_once '../../shared/sidebarAdmin.php';?>


    <div style="background-color: #f9f9f9;">
        <div class="container py-4">
            <div class="text-start scroll_1">
                <p class="fs-2 mb-0">Lista de Produtos</p>
                <div class="row">
                    <div class="col">
                        <p class="mt-1">Veja a lista de todos os produtos cadastrados!</p>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center table-hover align-middle small scroll_2">
                    <?php
                        echo "<tr style='background-color: #65baeb; border-color: #2c9ada;'>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                    </tr> ";
                        foreach($read->arrayData as $produtos){
                            echo "<tr>";
                            foreach($produtos as $col=>$info){
                                echo "<td>".$info."</td>";
                            }
                            echo"</tr>";
                        }
                    ?>
                   
                </table>
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
          <li class="page-item"><a class="page-link" href="lista_produtos.php?page=1">1</a></li>
          <li class="page-item"><a class="page-link" href="lista_produtos.php?page=2">2</a></li>
          <li class="page-item"><a class="page-link" href="lista_produtos.php?page=3">3</a></li>
          <li class="page-item"><a class="page-link" href="lista_produtos.php?page=4">4</a></li>
          <li class="page-item"><a class="page-link" href="lista_produtos.php?page=5">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#">
              <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
            </a>
          </li>
        </ul>
      </nav>

    <!-- Footer -->
    <div class="fixed-bottom">
        <?php require_once '../../shared/footer.html';?>
    </div>
        <!-- Scrollavel -->
    <script>
        window.sr = ScrollReveal({ reset: true });

        sr.reveal('.scroll_1', { duration: 1000 });
        sr.reveal('.scroll_2', { duration: 1000 });
    </script>
</body>

</html>