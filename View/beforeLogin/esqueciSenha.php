<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/redefinirsenha.css">
  <title>Document</title>
</head>

<body>

  <div class="caixa_01">
    <div class="img_01">
      <img src="../images/Apae_logo.png" alt="">
    </div>
    <br>
    <form class="redefinir" action="../routes/routes.php?sendEmail=1&user=comum" method="post">
      <h3 style="text-align:center;">Problemas para se conectar?</h3>
      <?php
         if (isset($_GET["success"]) && $_GET["success"]==1) {
          echo "<div class=\"alert alert-success alert-dismissible fade show\">
                  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                  <strong>Email Enviado!</strong> Verifique seu email para realizar a alteração de senha
                </div>";
         } elseif(isset($_GET["success"]) && $_GET["success"]==0){
          echo "<div class=\"alert alert-danger alert-dismissible fade show\">
                  <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                  <strong>Erro ao enviar Email!</strong> Verifique se as informações inseridas estão corretas
                </div>";
         }
      ?>
      <p style="color: grey; padding: 10px; font-size: 18px; text-align: center;">Insira seu Email para que seja
        enviada uma solicitação de acesso.</p>
      <div class="inputBox">
        <input type="email" id="Email" required="required" name="email">
        <span>Email</span>
      </div>
      <div class="input-group2">
        <button class="fourth">Enviar</button>
      </div>
    </form>

    <div style="display: flex; flex-direction: column; gap: 10px; justify-content: center; align-items: center;">

      <div class="outros">
        <hr style="width: 100px;">
        <p style="padding-left: 10px; padding-right: 10px;">Ou</p>
        <hr style="width: 100px;">
      </div>


      <a href="login.php" style="text-decoration: none; ">Voltar</a>

    </div> 


   

</body>

</html>