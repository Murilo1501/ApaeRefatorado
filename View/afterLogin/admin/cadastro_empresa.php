<?php
    session_start();
    if(!isset($_SESSION['email']) || $_SESSION['type']!="admin") {
        header('Location: /Novo_APAE/public/routes/logout.php');
        exit();
    }
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
<?php require_once '../../shared/sidebarAdmin.php';?>

    <div style="background-color: #eee;">
        <div class="container py-4">
            <div class="container border bg-body rounded-3 shadow p-4 scroll_meus_dados">
                <div class="text-start">
                    <h1 class="fs-1">Cadastro de Empresas</h1>
                </div>
                <?php
                    if (isset($_GET["f"]) && $_GET["f"]==1) {
                        echo "<div class=\"alert alert-danger alert-dismissible fade show\">
                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                            <strong>Erro ao cadastrar!</strong> Verifique as informações. Caso acredite que estejam corretas, entre em contato com a equipe de suporte técnico.
                            </div>";
                    } elseif (isset($_GET["f"]) && $_GET["f"]==0) {
                        echo "<div class=\"alert alert-success alert-dismissible fade show\">
                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                            <strong>Sucesso ao cadastrar!</strong> A nova empresa já está pronto para acessar a conta.
                            </div>";
                    }
                ?>
                <form method="post" action="../../routes/routes.php?isCadastro=1&user=empresas">

                    <!-- Nome -->
                    <div class="mb-3 mt-3">
                        <label for="nome" class="form-label">Nome</label>
                        <div class="col-md-12 mb-3"> <input type="text" class="form-control" id="nome" name="Nome"
                                placeholder="Nome" maxlenght="64" minlenght="2" autocomplete='off' required>
                        </div>
                    </div>

                    <!-- Ramo -->
                    <div class="mb-3 mt-3">
                        <label for="ramo_atividade" class="form-label">Ramo de atividade</label>
                        <div class="col-md-12 mb-3"> <input type="text" class="form-control" id="ramo_atividade" name="ramoAtiv"
                                placeholder="Ramo de atividade" maxlenght="64" minlenght="2" autocomplete='off'
                                required>
                        </div>
                    </div>

                    <!-- E-mail -->
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">E-mail</label>
                        <div class="col-md-12 mb-3"> <input type="text" class="form-control" id="email" name="Email"
                                placeholder="E-mail" maxlength="128" minlength="5"
                                pattern="^[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}$" autocomplete='off'
                                required>
                        </div>
                    </div>

                    <!-- Senha -->
                    <div class="mt-3 mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" placeholder="Senha" maxlength="24" name="Senha"
                                minlength="8" pattern="(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,24}" aria-label="button-addon1"
                                required>

                            <button class="btn btn-outline-primary rounded-end" type="button" id="button-addon1"
                                onclick="showPass('password',this.id)"><i class="bi bi-eye-slash"></i></button>
                        </div>
                        <div class="form-text">
                            Sua senha deve conter ao menos 8 caracteres, sendo 1 letra maiúscula, 1 letra minúscula e 1
                            número. Limite de
                            24 caracteres
                        </div>
                    </div>

                    <div class="mt-3 mb-3">
                        <label for="conf-password" class="form-label">Confirmar senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="conf-password" placeholder="Confirmar senha" name="ConfirmarSenha"
                                maxlength="99" minlength="99" onkeyup="validatePass()" aria-label="button-addon2"
                                required>

                            <button class="btn btn-outline-primary rounded-end" type="button" id="button-addon2"
                                onclick="showPass('conf-password',this.id)"><i class="bi bi-eye-slash"></i></button>

                            <span class="valid-feedback" id="conf-pass-lbl">As senhas não são iguais</span>
                            <span class="invalid-feedback">As senhas não são iguais</span>
                        </div>
                    </div>

                    <!-- 
                    <div>
                      <label for="file" class="form-label">Imagem</label>
                      <input class="form-control" type="file" id="file" placeholder="file">
                      <span class="invalid-feedback">Preencha este campo</span>
                    </div> -->

                    <!-- Campo invisivel / usuário -->
                    <input type="hidden" name="path" value="afterLogin/admin/cadastro_empresa.php">

                    <!-- Botão -->
                    <div class="clearfix">
                        <button type="submit" class="btn btn-sm btn-outline-primary float-md-end mt-2"
                            id="cadastrar">Cadastrar<i class="bi bi-plus-square ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once '../../shared/footer.html';?>

    <!-- Scrollavel -->
    <script>
        window.sr = ScrollReveal({ reset: true });

        sr.reveal('.scroll_meus_dados', { duration: 1000 });
    </script>

    <!-- Verif Senha -->
    <script src="../../shared/confirmPassword.js"></script>
</body>

</html>