<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>CoffeWay - Cadastrar Endereco</title>
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


  <section class="sobreNosBannerArea">

    <div class="sobreNosCentro">
      <img src="assets/images/selo.png" alt="">
      <h3>Sobre Nós</h3>

      <p>A CoffeWay é uma cafeteria apaixonada pelo café. Com uma atmosfera acolhedora, servimos café de alta qualidade, preparado com maestria. </p>
      <p>Além do café e outras bebidas, oferecemos acompanhamentos, como pães frescos e bolos caseiros. Nossa equipe atenciosa está pronta para tornar sua visita memorável. </p>
    </div>
  </section>
  <section class="equipeArea">
    <div class="equipeAreaCentro">
      <p>EQUIPE</p>
      <div class="equipeAreaMembros">
        <div class="equipeMembro">
          <img src="assets/images/funcionario.jpeg" alt="">
          <h5>Joe</h5>
        </div>
        <div class="equipeMembro">
          <img src="assets/images/funcionaria.jpeg" alt="">
          <h5>Joana</h5>
        </div>
        <div class="equipeMembro">
          <img src="assets/images/funcionario.jpeg" alt="">
          <h5>Joe Gêmeo</h5>
        </div>
      </div>
    </div>
  </section>
  <section class="contateNos">
    <div class="contateNosArea">
      <h4>Contate-nos</h4>
      <div class="contateNosItens">
        <div class="contatoItem">
          <a href=""><img src="assets/images/insta.png" alt=""></a>
        </div>
        <div class="contatoItem">
          <a href=""><img src="assets/images/whats.png" alt=""></a>
        </div>
        <div class="contatoItem">
          <a href=""><img src="assets/images/twitter.png" alt=""></a>
        </div>
        <div class="contatoItem">
          <a href=""><img src="assets/images/face.png" alt=""></a>
        </div>

      </div>
    </div>
  </section>
  <footer>
    <div class="footerArea">
      <h3>Contate-nos</h3>
      <div class="footerInformacoes">
        <div class="footerContatos">
          <a href="">45 00000-0000</a>
          <a href="">email@email.com</a>
          <a href="">@insta_insta</a>
          <a href="">Gerenciamento</a>
        </div>
        <div class="footerDireitos">
          <h4>Todos os direitos reservados</h4>
        </div>
      </div>
    </div>
  </footer>


</body>

</html>