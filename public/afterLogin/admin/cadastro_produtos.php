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
            <div class="container border border-1 bg-body rounded-3 shadow rounded p-4 scroll_meus_dados">
                <div class="text-start">
                    <h1 class="fs-1">Cadastro de Produtos</h1>
                </div>
                <form method="post" action="../../routes/routes.php?isCadastro=1&user=product">

                    <!-- Título -->
                    <div class="mb-3 mt-3">
                        <label for="titulo-pro" class="form-label">Título</label>
                        <input type="text" class="col-md-12 mb-3 form-control" id="titulo-pro" placeholder="Título" name="nome"
                            rows="3" maxlength="100" required>
                    </div>

                    <!-- Descrição -->
                    <div class="mb-3 mt-3">
                        <label for="descr-pro" class="form-label">Descrição</label>
                        <textarea class="col-md-12 mb-3 form-control" id="descr-pro" placeholder="Descrição" rows="3" name="descricao"
                            maxlength="256" required></textarea>
                    </div>

                    <!-- Preço -->
                    <div class="mb-3 mt-3">
                        <label for="preco" class="form-label">Preço</label>
                        <input type="text" class="col-md-12 mb-3 form-control" id="preco" placeholder="R$___,__" name="preco"
                            data-accept='[\d]' data-slots='_' rows="3" maxlength="100" required>
                    </div>

                    <!-- Imagem -->
                    <!-- <div>
                      <label for="file" class="form-label">Imagem</label>
                      <input class="form-control" type="file" id="file" placeholder="file" multiple>
                      <span class="invalid-feedback">Preencha este campo</span>
                    </div>
                    <br>-->

                 
                    <!-- Campo invisivel / usuário -->

                    <input type="hidden" name="path" value="afterLogin/admin/cadastro_produtos.php">

                    <!-- Botões -->
                    <div class="clearfix">
                        <button type="submit" class="btn btn-sm btn-outline-success float-md-end mt-2"
                            id="cadastrar">Finalizar cadastro<i class="bi bi-check-square ms-2"></i></button>

                        <button type="submit" class="btn btn-sm btn-outline-primary float-md-end mt-2 me-3"
                            id="cadastrar">Cadastrar item<i class="bi bi-plus-square ms-2"></i></button>
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

    <!-- Masks -->
    <script>
        //Credits: https://stackoverflow.com/a/55010378
        document.addEventListener('DOMContentLoaded', () => {
            for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
                const pattern = el.getAttribute("placeholder"),
                    slots = new Set(el.dataset.slots || "_"),
                    prev = (j => Array.from(pattern, (c, i) => slots.has(c) ? j = i + 1 : j))(0),
                    first = [...pattern].findIndex(c => slots.has(c)),
                    accept = new RegExp(el.dataset.accept || "\\d", "g"),
                    clean = input => {
                        input = input.match(accept) || [];
                        return Array.from(pattern, c =>
                            input[0] === c || slots.has(c) ? input.shift() || c : c
                        );
                    },
                    format = () => {
                        const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                            i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                            return i < 0 ? prev[prev.length - 1] : back ? prev[i - 1] || first : i;
                        });
                        el.value = clean(el.value).join``;
                        el.setSelectionRange(i, j);
                        back = false;
                    };
                let back = false;
                el.addEventListener("keydown", (e) => back = e.key === "Backspace");
                el.addEventListener("input", format);
                el.addEventListener("focus", format);
                el.addEventListener("blur", () => el.value === pattern && (el.value = ""));
            }
        });
    </script>
</body>

</html>