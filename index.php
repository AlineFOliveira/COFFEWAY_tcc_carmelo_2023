<?php
session_start();
include_once('config/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>CoffeWay</title>
</head>

<body>
<header>
        <div class="container header">
            <div class="logo">
                <a href=""><img class="logo" src="assets/images/logo.png" /></a>
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="sobreNos.php">SOBRE NÓS</a></li>
                        <li><a href="selecionarCardapio.php">CARDÁPIO</a></li>
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'cliente') : ?>
                            <li><a href="cliente.php">
                                    <div class="clienteLogado"><?php echo $_SESSION['user_name']; ?></div>
                                </a></li>
                        <?php else : ?>
                            <li><a href="login.php">LOGIN</a></li>
                            <li><a href="cadastro.php">CADASTRAR</a></li>
                        <?php endif; ?>
                        <li><a href="carrinho.php"><svg class="carrinho" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.69122 2.50017L5.01244 16.4326C5.05483 16.7244 5.19973 16.9916 5.42118 17.1863C5.6548 17.3935 5.95769 17.5055 6.26992 17.5001H19.9998C20.2622 17.5001 20.518 17.4176 20.7309 17.2641C20.9439 17.1107 21.1031 16.8941 21.186 16.6451L24.9359 5.39515C24.9985 5.20724 25.0156 5.00714 24.9857 4.81135C24.9557 4.61556 24.8797 4.42968 24.7639 4.26903C24.648 4.10838 24.4957 3.97756 24.3193 3.88735C24.143 3.79714 23.9478 3.75012 23.7497 3.75016H5.43368L4.98744 1.06269C4.94163 0.755627 4.78241 0.476885 4.5412 0.281441C4.31258 0.094654 4.02513 -0.00500175 3.72996 0.000193321H1.24998C0.918468 0.000193321 0.60053 0.131888 0.366112 0.366307C0.131694 0.600726 0 0.918666 0 1.25018C0 1.5817 0.131694 1.89964 0.366112 2.13406C0.60053 2.36848 0.918468 2.50017 1.24998 2.50017H2.69122ZM7.30866 15.0001L5.84993 6.25014H22.016L19.0985 15.0001H7.30866ZM9.99988 22.5C9.99988 23.1631 9.73649 23.7989 9.26766 24.2678C8.79882 24.7366 8.16294 25 7.49991 25C6.83688 25 6.201 24.7366 5.73216 24.2678C5.26333 23.7989 4.99994 23.1631 4.99994 22.5C4.99994 21.837 5.26333 21.2011 5.73216 20.7323C6.201 20.2634 6.83688 20 7.49991 20C8.16294 20 8.79882 20.2634 9.26766 20.7323C9.73649 21.2011 9.99988 21.837 9.99988 22.5ZM21.2497 22.5C21.2497 23.1631 20.9864 23.7989 20.5175 24.2678C20.0487 24.7366 19.4128 25 18.7498 25C18.0867 25 17.4509 24.7366 16.982 24.2678C16.5132 23.7989 16.2498 23.1631 16.2498 22.5C16.2498 21.837 16.5132 21.2011 16.982 20.7323C17.4509 20.2634 18.0867 20 18.7498 20C19.4128 20 20.0487 20.2634 20.5175 20.7323C20.9864 21.2011 21.2497 21.837 21.2497 22.5Z" fill="#0D0D0D" />
                                </svg></a></li>
                    </ul>
                </nav>
            </div>
    </header>

  <!-- C:\xampp\php\php.exe -->



  <section class="banner">
    <div class="escurecer">
      <div class="bannerArea">
        <div class="content">
          <div class="arrows">
            <span class="arrow prev"><svg width="30" height="58" viewBox="0 0 30 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.902 1.65954C29.605 2.42329 30 3.45902 30 4.53896C30 5.6189 29.605 6.65463 28.902 7.41838L9.05218 28.9753L28.902 50.5323C29.5851 51.3004 29.9631 52.3292 29.9546 53.3971C29.946 54.4649 29.5516 55.4864 28.8563 56.2415C28.161 56.9967 27.2204 57.425 26.2371 57.4343C25.2538 57.4435 24.3065 57.033 23.5992 56.2911L1.09801 31.8548C0.394954 31.091 0 30.0553 0 28.9753C0 27.8954 0.394954 26.8597 1.09801 26.0959L23.5992 1.65954C24.3025 0.896024 25.2562 0.467102 26.2506 0.467102C27.245 0.467102 28.1987 0.896024 28.902 1.65954Z" fill="white" />
              </svg>
            </span>
            <span class="arrow next"><svg width="30" height="58" viewBox="0 0 30 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.09801 1.65954C0.394955 2.42329 0 3.45902 0 4.53896C0 5.6189 0.394955 6.65463 1.09801 7.41838L20.9478 28.9753L1.09801 50.5323C0.414881 51.3004 0.0368805 52.3292 0.0454254 53.3971C0.0539684 54.4649 0.448374 55.4864 1.14369 56.2415C1.83901 56.9967 2.77961 57.425 3.7629 57.4343C4.74619 57.4435 5.69349 57.033 6.40079 56.2911L28.902 31.8548C29.605 31.091 30 30.0553 30 28.9753C30 27.8954 29.605 26.8597 28.902 26.0959L6.40079 1.65954C5.69753 0.896024 4.74382 0.467102 3.7494 0.467102C2.75498 0.467102 1.80128 0.896024 1.09801 1.65954Z" fill="white" />
              </svg>
            </span>
          </div>
          <div class="slides">
            <input name='slide' type="radio" id="slide1" checked>
            <input name='slide' type="radio" id="slide2">

            <div class="slide active s1">
              <div class="slideArea">
                <div class="slideAreaSlide1">
                  <h2>It's Coffee Time!</h2>
                  <p>Ilumine seu dia com uma boa dose de cafeína</p>
                </div>
              </div>
            </div>
            <div class="slide">
              <div class="slideArea">
                <div class="slideAreaSlide2">
                  <div class="slideAreaSlideEsquerdo">
                    <h2>Experimente nossos lanches</h2>
                    <p>Além de café, temos opções todos os gostos: bolos, tortas, sanduíches, pudins e muito mais!</p>
                  </div>

                  <div class="slideAreaSlideDireito">
                    <img src="assets/images/torta.png" alt="Imagem-torta">
                  </div>
                </div>
              </div>
            </div>



          </div>

        </div>
      </div>
    </div>
  </section>

  <script>
    const slides = document.querySelector('.slides');
    const slideWidth = slides.querySelector('.slide').clientWidth;
    let currentIndex = 0;

    function showSlide(index) {
      slides.style.marginLeft = `-${index * slideWidth}px`;
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % 2;
      showSlide(currentIndex);
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + 2) % 2;
      showSlide(currentIndex);
    }

    document.querySelector('.arrow.next').addEventListener('click', nextSlide);
    document.querySelector('.arrow.prev').addEventListener('click', prevSlide);

    // Automatizar a troca de slides a cada 5 segundos
    setInterval(nextSlide, 6000);
  </script>

  <main class="areaPrincipal">
    <section class="bemvindoArea">
      <div class="bemvindoAreaInformacoes">
        <div class="bemvindoAreaInformacoesEsquerda">
          <h2>Um espaço casual e confortável</h2>
          <p>Bem vindo ao nosso café online! Aqui você encontrará uma seleção incrível de cafés e lanches. Escolha seus favoritos e adicione ao seu carrinho de compras agora mesmo!</p>
        </div>

        <div class="bemvindoAreaInformacoesDireita">
          <img src="assets/images/caferesumo.png">
        </div>
      </div>

      <div class="itensPopularesArea">
        <h2>Itens Populares</h2>
        <div class="itensPopularesBlocos">
          <div class="itensPopularesBlocoEsquerdo">
            <img src="assets/images/croissant.png" />
          </div>

          <div class="itensPopularesBlocoDireito popularesTexto">
            <h3>Croissants</h3>
          </div>

        </div>
        <div class="itensPopularesBlocos">
          <div class="itensPopularesBlocoEsquerdo popularesTexto">
            <h3>Bagel com
              Cream Cheese</h3>
          </div>

          <div class="itensPopularesBlocoDireito">
            <img src="assets/images/bagel.png" />
          </div>

        </div>
        <div class="itensPopularesBlocos">
          <div class="itensPopularesBlocoEsquerdo">
            <img src="assets/images/smoothie.png" />
          </div>

          <div class="itensPopularesBlocoDireito popularesTexto">
            <h3>Smoothies com Frutas</h3>
          </div>

        </div>
      </div>
    </section>
  </main>

  <section id="sobreNos" class="sobreNos">
    <div class="sobreNosArea">
      <div class="sobreNosTexto">
        <h2>Sobre Nós</h2>
        <p>Somos uma pequena cafeteria localizada no coração da cidade, comprometidos em oferecer aos nossos clientes os melhores Enderecos de café da manhã, feitos com ingredientes frescos e de alta qualidade. </p>
      </div>
      <a href="sobreNos.php" class="sobreNosBotao">
        <h3>Saiba mais!</h3>
      </a>
    </div>
  </section>
<?php

  $sqlLoja = "SELECT * FROM loja;";
  $resultLoja = mysqli_query($conexao, $sqlLoja);
  $rowLoja = mysqli_fetch_assoc($resultLoja);
  
  $uf = $rowLoja['uf'];
  $rua = $rowLoja['rua'];
  $telefone = $rowLoja['telefone'];
  $email = $rowLoja['email'];

?>
  <section class="visiteNos">
    <div class="visiteNosFundo">
      <h2>Visite-nos</h2>
      <p><?php echo $rua .', '. $uf;?></p>
    </div>
  </section>

  <footer>
    <div class="footerArea">
      <h3>Contate-nos</h3>
      <div class="footerInformacoes">
        <div class="footerContatos">
          <a href=""><?php echo $telefone;?></a>
          <a href=""><?php echo $email;?></a>
          <a href="">@insta_insta</a>
          <a href="">Gerenciamento</a>
        </div>
        <div class="footerDireitos">
          <h4>Todos os direitos reservados</h4>
        </div>
      </div>
    </div>
  </footer>

  </div>
</body>

</html>