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
$read = new ReadData("noticia",'');

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
    <link rel="stylesheet" href="../../css/comum.css">
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


    <!-- Container element 
    <div class="container-parallax parallax">
        <div class="container_text">
            <div class="text_parallax scroll_1 mt-5 mb-5">
                <div class="ms-2 me-2">
                    <h1 class="fw-bold mb-0">Associação de Pais e Amigos dos Excepcionais Guarulhos</h1>
                    <br>
                    <p class="text-decoration-none text-black-10">1° de Julho de 1979 por um grupo de voluntárias,
                        professoras e pais, sem fins
                        lucrativos, com o intuito de promover a atenção integral às pessoas com deficiência
                        intelectual e múltipla.</p>
                    <button type="button" class="btn btn-outline-info px-4 me-sm-3 fw-bold mb-3">Contribuir</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Banner -->
    <div class="container_text" style="background-color: #fffffe;">
        <div class="texto_inicial scroll_1">
            <div class="ms-2 me-2">
                <h1 class="fw-bold mb-0" style="color: #ffcd17">Associação de Pais e Amigos dos Excepcionais Guarulhos
                </h1>
                <br>
                <p class="text-decoration-none text-black-10">1° de Julho de 1979 por um grupo de voluntários,
                    professores e pais, sem fins
                    lucrativos, com o intuito de promover a atenção integral às pessoas com deficiência
                    intelectual e múltipla.</p>
                <a href="../comum/tela_doacao.php" role="button"
                    class="btn btn-outline-warning px-4 me-sm-3 fw-bold mb-3">Contribuir</a>
            </div>
        </div>
        <div>
            <img src="data:image/jpeg;base64,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"
                class="img-fluid scroll_1">
        </div>
    </div>

    <!-- texto -->
    <div class="container_text" style="background-color: #f1f8ff;">
        <div class="texto_inicial scroll_1">
            <div class="ms-2">
                <h1 class="fw-bold mb-0" style="color: #164b84">Por que continuar assinando o Amigo 10?</h1>
                <br>
                <p class="text-decoration-none text-black-10">Continue apoiando o programa Amigo 10 e faça a
                    diferença
                    na vida das pessoas com deficiência. Sua assinatura oferece recursos, oportunidades e serviços
                    essenciais para promover uma vida mais inclusiva. Juntos, construímos um mundo mais igualitário
                    e
                    transformamos vidas.</p>
            </div>
        </div>
        <div>
            <img src="../../images/donate.png" class="img-fluid scroll_1">
        </div>
    </div>

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
                <p class="fs-2 mb-0" style="color: #164b84">Empresas Parceiras</p>
                <p class="text-decoration-none text-black-50">Veja algumas de nossas empresas parceiras</p>
            </div>
        </div>

        <div class="containerEmpresas scroll_2">

            <div class="wrapper">
                <i id="left" class="fa-solid fa-angle-left"></i>
                <ul class="carousel">
                    <li class="card">
                        <div class="img"><img src="../../images/AlumiSA.jpg" alt="img" draggable="false"></div>
                        <h2>Alumi S&A Kit Box e Ferragens</h2>
                        <span>Empresa Mais Amiga, desde 2021.</span>
                    </li>
                    <li class="card">
                        <div class="img"><img src="../../images/GTNAutoPecas.jpg" alt="img" draggable="false"></div>
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
        <div style="background-color: #fff;">
            <div class="container py-4">
                <div class="text-center scroll_2">
                    <p class="fs-2 mb-0" style="color: #164b84">Eventos & Notícias</p>
                    <a href="noticias.html" class="text-decoration-none text-black-50">Veja mais eventos e notícias
                        clicando
                        aqui</a>
                </div>
                <div class="row g-4 mt-1 mb-1 scroll_3">
                    <?php
                        foreach ($read->arrayData as $dados) {
                            if($dados['tipo'] == "eventos"){
                                echo " <div class='col-sm-6'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title fw-bold mb-0'>$dados[titulo]<i class='bi bi-calendar-event ms-2'></i>
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
                                                    <div class='modal-body'>
                                                    $dados[texto] </div>
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
