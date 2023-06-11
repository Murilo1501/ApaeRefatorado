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
                    <h1 class="fs-1">Cadastro de Eventos e Notícias</h1>
                </div>
                <form method="POST" action="../../routes/routes.php?isCadastro=1&user=eventos_notices">

                    <!-- Título -->
                    <div class="mb-3 mt-3">
                        <label for="titulo" class="form-label">Título</label>
                        <div class="col-md-12 mb-3"> <input type="text" class="form-control" id="titulo" name="titulo"
                                placeholder="Título" maxlenght="64" minlenght="2" autocomplete='off' required>
                        </div>
                    </div>

                    <!-- Descrição -->
                    <div class="mb-3 mt-3">
                        <label for="descr" class="form-label">Descrição</label>
                        <textarea class="col-md-12 mb-3 form-control" id="descr" name="descr" placeholder="Descrição"
                            rows="10" maxlength="2048" required></textarea></div>

                    <!-- Evento ou Notícia -->
                    <div class="mb-3 mt-3">
                        <label for="" class="form-label">Do que se trata a descrição acima?</label>
                        <div class="form-lable"></div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="radio1"
                                value="eventos">
                            <label class="form-check-label" for="radio1">Evento</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="radio2"
                                value="noticias">
                            <label class="form-check-label" for="radio2">Notícia</label>
                        </div>
                    </div>

                    <!-- Datas -->
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <label for="data_po" class="form-label">Data de postagem</label>
                            <input type="text" class="form-control" id="data_po" placeholder="dd/mm/aaaa"
                                data-slots="dma" autocomplete='off' required name="DataAdd">
                        </div>

                        <div class="col-md">
                            <label for="data_re" class="form-label">Data de remoção</label>
                            <input type="text" class="form-control" id="data_re" placeholder="dd/mm/aaaa"
                                data-slots="dma" autocomplete='off' required name="DataRemote">
                        </div>
                    </div>

                    <!-- Imagem -->
                  <!--  <div>
                        <label for="file" class="form-label">Imagem</label>
                        <input class="form-control" type="file" id="file" placeholder="file" multiple>
                        <span class="invalid-feedback">Preencha este campo</span>
                    </div>
                    <br>

                    <!-- Campo invisivel / usuário -->
                    <input type="hidden" name="path" value="afterLogin/admin/cadastro_event_not.php">

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