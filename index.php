<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tio Du Pets</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>

<?php
include 'agendamento.php';
?>


<div style="height: 12vh;"></div>

<main>

    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/carousel/carousel1.jpg" class="d-flex w-100" alt="carousel-image" />
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/carousel/carousel2.jpg" class="d-flex w-100" alt="carousel-image" />
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/carousel/carousel3.webp" class="d-flex w-100" alt="carousel-image"/>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExample"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden" id="sobre-nos">Next</span>
        </button >
      </div >

      <div style="height: 4vh;"></div>


        <section class="container-fluid">
            <div class="box">

                <div class="texto" >
                    <h1>Bem-vindo ao Tio Du Pets</h1>
                    <h2>O Melhor Cuidado para o Seu Pet!</h2>
                    <p>Aqui no <strong>Tio Du Pets</strong>, acreditamos que seu pet merece o melhor. Oferecemos um ambiente seguro, confortável e cheio de carinho para garantir que seu animal de estimação se sinta em casa, seja para uma estadia no nosso hotel, um dia de diversão na creche ou para o serviço personalizado de pet sitter.</p>
                    
                </div>

                <div class="cards-panel">
                    <div class="card">
                        <img src="assets/images/ambiente-seguro.jpg" alt="Ambiente confortável">
                        <div class="image-label">Ambiente confortável</div>
                    </div>
                    <div class="card">
                        <img src="assets/images/atividades.jpg" alt="Diversas atividades">
                        <div class="image-label">Diversas atividades</div>
                    </div>
                    <div class="card">
                        <img src="assets/images/equipe.jpg" alt="Equipe qualificada">
                        <div class="image-label">Equipe qualificada</div>
                    </div>
                </div>
            </div>

        </section>

        <div style="height: 4vh;"></div>

        <section class="container-fluid">
            <div class="box">
            <div class="texto" id="servicos">
                <h1>Serviços e comodidades</h1>
                <h2>Aqui no Tio Du Pets, seu pet receberá todo carinho que merece"</h2>
                <h4 style="letter-spacing: 3px;">Nós oferecemos:</h4>
                <ul style="list-style:none; padding-left: 0;">
                    <li>&#129505; Serviço de Hotelaria Pet &#129505;</li>
                    <li>&#11088; Creche Animal &#11088;</li>
                    <li>&#9925; Pet Sitter &#9925;</li>
                </ul>
            </div>

            <div style="height: 2vh;"></div>

            <div class="row justify-content-md-around text-center">
                <div class="col col-lg-2" >
                  <img src="assets/images/hotel_pet.jpg" alt="hotel_pet" class="img-fluid rounded-circle" width="200" height="200">
                  <h2>Hotel</h2>
                  <p>Um lar longe de casa, com todo o conforto e cuidado que seu pet merece!</p>
                </div>
                <div class="col col-lg-2">
                  <img src="assets/images/creche_pet.jpg" alt="creche_pet" class="img-fluid rounded-circle" width="200" height="200">
                  <h2>Creche</h2>
                  <p>Diversão garantida enquanto você cuida da sua rotina!</p>
                </div>
                <div class="col col-lg-2">
                  <img src="assets/images/petsitter_pet.jpg" alt="petsitter_pet" class="img-fluid rounded-circle" width="200" height="200">
                  <h2>Pet Sitter</h2>
                  <p>Cuidado personalizado no conforto da sua casa!</p>
                </div>
            </div>
        </div>
    </section>

    <div style="height: 4vh;"></div>

    <section class="container-fluid">
            
            <div class="box">

                <div class="texto" id="acomodacoes">
                    <h1>Acomodações</h1>
                    <h4 style="letter-spacing: 3px;">O lar perfeito para o seu pet enquanto você está fora!</h4>
                </div>

                <div class="cards-panel">
                    <div class="card">
                        <img src="assets/images/acomodacao1.jpg" alt="acomodacao1">
                        <div class="image-label">Carinho</div>
                    </div>
                    <div class="card">
                        <img src="assets/images/acomodacao2.jpg" alt="acomodacao2">
                        <div class="image-label">Amor</div>
                    </div>
                    <div class="card">
                        <img src="assets/images/acomodacao3.jpg" alt="acomodacao3">
                        <div class="image-label">Conforto</div>
                    </div>
                </div>
            </div>

        </section>

    <div style="height: 4vh;"></div>

    <section class="container-fluid">
            
            <div class="box">
        
                    <div class="texto" id="localizacao">
                        <h2>Nossa Localização</h2>
                    </div>
        
            
                     <element class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14705.551338323445!2d-47.0990599!3d-22.8621273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c8c701b143b069%3A0x590087383e5521b4!2sFatec%20Campinas%20-%20Faculdade%20de%20Tecnologia%20de%20Campinas!5e0!3m2!1spt-BR!2sbr!4v1726487989244!5m2!1spt-BR!2sbr" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                     </element>
        
            </div>
        
        </section>

    <div style="height: 4vh;"></div>

    <section class="container-fluid">
    <div class="box">
        <div class="texto" id="avaliacoes">
            <h1>Avaliações</h1>
            <h2>O que nossos clientes dizem:</h2>

            <!-- Carousel -->
            <div id="carouselAvaliacoes" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <?php
                    // Conexão ao banco de dados
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "db_tiodupetservice";

                    // Cria a conexão
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verifica se há erros na conexão
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Consulta para obter as 5 últimas avaliações
                    $sql = "SELECT nome_avaliador, estrelas, descricao FROM avaliacao_aprovadas ORDER BY id DESC LIMIT 5";
                    $result = $conn->query($sql);

                    // Verifica se há resultados
                    if ($result->num_rows > 0) {
                        $active = true; // Para ativar o primeiro item no carrossel
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
                            echo '<div class="card text-center">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . htmlspecialchars($row["nome_avaliador"]) . '</h5>';
                            echo '<div class="stars">';
                            for ($i = 0; $i < 5; $i++) {
                                echo $i < $row["estrelas"] ? '<i class="fa fa-star text-warning"></i>' : '<i class="fa fa-star text-muted"></i>';
                            }
                            echo '</div>';
                            echo '<p class="card-text">' . htmlspecialchars($row["descricao"]) . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            $active = false; // Apenas o primeiro item é ativo
                        }
                    } else {
                        echo '<div class="carousel-item active">';
                        echo '<p class="text-center">Ainda não há avaliações.</p>';
                        echo '</div>';
                    }

                    // Fecha a conexão
                    $conn->close();
                    ?>
                </div>

                <!-- Controles do carrossel -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselAvaliacoes" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselAvaliacoes" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>

            <a href="solicitarAvaliacao.php">Quer fazer uma avaliação?</a>
        </div>
    </div>
</section>


</main>

<script src="assets/mobile-navbar.js"></script>
<script src="assets/agendamento.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

<div class="footer">
    <footer class="py-1">

          <div class="row">
            <img src="assets/images/LogoTioDu.svg" alt="Logo Tio Du Pets" width="150px" height="150px" align-item="center" justify-content="center">
          </div>
          
          <div class="custom-border-top">
            <h6> &nbsp © Tio Du Pet Serviçe - 2024 | Todos os Direitos reservados.</h6>
        </div>

    </footer>
</div>

<div class="MFF">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center py-1 my-1 OFFICE">
        <h6>&nbsp | Orgulhosamente desenvolvido com AMOR por &copy; M.F.F Consultoria. |</h6>
        <a href="http://localhost/tiodupetservice_web/office/login.php">
            <div><span>&#9881;</span></div>
        </a>
    </div>
</div>


</html>