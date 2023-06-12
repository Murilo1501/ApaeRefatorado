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
    <link rel="stylesheet" href="../../css/EmpresasParceiras.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <title>Apae Guarulhos</title>
<style>
body,
html {
    height: 100%;
}

.parallax {
    /* The image used */
    background-image: url('../../images/imagem_parallax.png');

    /* Full height */
    height: 100%;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>

</head>

<body>

    <?php require_once '../../shared/sidebarComum.php';?>

    <!-- Banner Hero -->
    <div class="container_inicio">
        <div class="text_secondary">
            <div>
                <h1 class="fw-bold text-black">Associação de Pais e Amigos dos Excepcionais Guarulhos</h1>
                <br>
                <p class="text-decoration-none text-black-10">1° de Julho de 1979 por um grupo de voluntárias,
                    professoras e pais, sem fins
                    lucrativos, com o intuito de promover a atenção integral às pessoas com deficiência
                    intelectual e múltipla.</p>
            </div>
            <div class="d-grid gap-2 d-sm-flex text-center">
                <button type="button" class="btn btn-outline-info px-4 me-sm-3 fw-bold">Contribuir</button>
            </div>
        </div>
        <div class="imagem1">
            <img src="https://www.apaeamericana.com.br/wp-content/uploads/2022/03/FOTO-FORMAS-DE-CONTRIBUICAO.png"
                alt="">
        </div>
    </div>

    <!-- texto -->
    <div class="container_text">
        <div class="texto_inicial">
            <div>
                <h1 class="fw-bold mb-0">Porque continuar assinando o Amigo 10?</h1>
                <br>
                <p class="text-decoration-none text-black-10">Continue apoiando o programa Amigo 10 e faça a diferença
                    na vida das pessoas com deficiência. Sua assinatura oferece recursos, oportunidades e serviços
                    essenciais para promover uma vida mais inclusiva. Juntos, construímos um mundo mais igualitário e
                    transformamos vidas. Seja parte dessa jornada inspiradora e continue a apoiar o Amigo 10.</p>
            </div>
        </div>
        <div class="imagem1">
            <img src="https://img.freepik.com/vetores-gratis/ilustracao-em-vetor-conceito-abstrato-de-filantropia-iniciativa-privada-generosidade-fundo-de-doacao-presente-monetario-apoio-financeiro-solucao-de-problema-publico-metafora-abstrata-de-filantropia-social_335657-4227.jpg?w=996&t=st=1685295734~exp=1685296334~hmac=32a3915d69c82673b0748c20030d571a0ada8507b18f6f66084cb863e3b83532"
                alt="">
        </div>
    </div>


    <!-- Container element 
    <div class="parallax"><p class="text_parallax">a</p></div>-->

    <!-- Missão, Visão & Valores -->
    <div>
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

    <div style="background-color: #f0f0f0">
        <div class="container py-4">
            <div class="texto_parceiro">
                <p class="fs-2 mb-0">Empresas Parceiras</p>
                <p class="text-decoration-none text-black-50">Veja algumas de nossas empresas parceiras</p>
            </div>
        </div>

        <div class="containerEmpresas scroll_2">

            <div class="wrapper">
                <i id="left" class="fa-solid fa-angle-left"></i>
                <ul class="carousel">
                    <li class="card">
                        <div class="img"><img src="../../images/AlumiS&A.jpg" alt="img" draggable="false"></div>
                        <h2>Alumi S&A Kit Box e Ferragens</h2>
                        <span>Empresa Mais Amiga, desde 2021.</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="../../images/GTNAutoPeças.jpg" alt="img" draggable="false"></div>
                        <h2>GTN Auto Peças</h2>
                        <span>Parceiro nos eventos da APAE Guarulhos.</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="../../images/Damapel.jpg" alt="img" draggable="false"></div>
                        <h2>Damapel</h2>
                        <span>Fornecedor de PHs.</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="../../images/Tambor-Line.jpg" alt="img" draggable="false"></div>
                        <h2>Tambor-Line</h2>
                        <span>Empresa Mais Amiga, desde 2021.</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="../../images/WMB.jpg" alt="img" draggable="false"></div>
                        <h2>Grupo WMB</h2>
                        <span> Sócio Contribuinte APAE Guarulhos, desde 2018.</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="../../images/NRMonitoramentos.jpg" img" draggable="false"></div>
                        <h2>NR Monitoramentos</h2>
                        <span>Sócio Contribuinte APAE Guarulhos, desde 2018.</span>
                    </li>
                </ul>
                <i id="right" class="fa-solid fa-angle-right"></i>
            </div>

        </div>

    </div>

    <!-- Últimas Notícias -->
    <div style="background-color: #fff">
        <div class="container py-4">
            <div class="text-center scroll_2">
                <p class="fs-2 mb-0">Eventos & Notícias</p>
                <a href="noticias.html" class="text-decoration-none text-black-50">Veja mais eventos e notícias clicando
                    aqui</a>
            </div>
            <div class="row g-4 mt-1 mb-1 scroll_3">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-0">Título da noticia 01<i class="bi bi-newspaper ms-2"></i>
                            </h5>
                            <span class="mt-0 mb-0 text-muted small">07/04/2023</span>
                            <p class="card-text mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip</p>

                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#noticia1">
                                Ler mais<i class="bi bi-arrow-right ms-1"></i> </button>

                            <div class="modal fade" id="noticia1" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-3">Titulo da noticia 01</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip </div>
                                        <div class="modal-footer">
                                            <p class="text-black-50">07/04/2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-0">Título do evento 01<i
                                    class="bi bi-calendar-event ms-2"></i>
                            </h5>
                            <span class="mt-0 mb-0 text-muted small">09/04/2023</span>
                            <p class="card-text mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip</p>

                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#evento1">
                                Ler mais<i class="bi bi-arrow-right ms-1"></i> </button>

                            <div class="modal fade" id="evento1" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-3">Título do evento 01</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip</div>
                                        <div class="modal-footer">
                                            <p class="text-black-50">09/04/2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-0">Título da noticia 02<i class="bi bi-newspaper ms-2"></i>
                            </h5>
                            <span class="mt-0 mb-0 text-muted small">08/04/2023</span>
                            <p class="card-text mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip</p>

                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#noticia2">
                                Ler mais<i class="bi bi-arrow-right ms-1"></i> </button>

                            <div class="modal fade" id="noticia2" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-3">Titulo da noticia 02</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip </div>
                                        <div class="modal-footer">
                                            <p class="text-black-50">08/04/2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-0">Título do evento 02<i
                                    class="bi bi-calendar-event ms-2"></i>
                            </h5>
                            <span class="mt-0 mb-0 text-muted small">09/04/2023</span>
                            <p class="card-text mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip</p>

                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#evento2">
                                Ler mais<i class="bi bi-arrow-right ms-1"></i> </button>

                            <div class="modal fade" id="evento2" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fs-3">Título do evento 02</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip</div>
                                        <div class="modal-footer">
                                            <p class="text-black-50">09/04/2023</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php require_once '../../shared/footer.html';?>


    <!-- Scrollavel -->
    <script>
        window.sr = ScrollReveal({ reset: true });

        sr.reveal('.scroll_1', { duration: 1000 });
        sr.reveal('.scroll_2', { duration: 1000 });
        sr.reveal('.scroll_3', { duration: 1000 });
    </script>
</body>

<!-- Carrocel -->

<script>
    const wrapper = document.querySelector(".wrapper");
    const carousel = document.querySelector(".carousel");
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = document.querySelectorAll(".wrapper i");
    const carouselChildrens = [...carousel.children];
    let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;
    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);
    // Insert copies of the last few cards to beginning of carousel for infinite scrolling
    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });
    // Insert copies of the first few cards to end of carousel for infinite scrolling
    carouselChildrens.slice(0, cardPerView).forEach(card => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });
    // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");
    // Add event listeners for the arrow buttons to scroll the carousel left and right
    arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
        });
    });
    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        // Records the initial cursor and scroll position of the carousel
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    }
    const dragging = (e) => {
        if (!isDragging) return; // if isDragging is false return from here
        // Updates the scroll position of the carousel based on the cursor movement
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }
    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    }
    const infiniteScroll = () => {
        // If the carousel is at the beginning, scroll to the end
        if (carousel.scrollLeft === 0) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
            carousel.classList.remove("no-transition");
        }
        // If the carousel is at the end, scroll to the beginning
        else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.offsetWidth;
            carousel.classList.remove("no-transition");
        }
        // Clear existing timeout & start autoplay if mouse is not hovering over carousel
        clearTimeout(timeoutId);
        if (!wrapper.matches(":hover")) autoPlay();
    }
    const autoPlay = () => {
        if (window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
        // Autoplay the carousel after every 2500 ms
        timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
    }
    autoPlay();
    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
    wrapper.addEventListener("mouseleave", autoPlay);
</script>


</html>
