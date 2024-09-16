<?php defined('CONTROL') or die('Acesso inválido.') ?>
<div class="container-fluid p-3 bg-secondary text-white">
    <div class="row my-5">
        <div class="col text-center">
            <h1>Pets Services</h1>
            <main>
            <section id="search">
                <h2>Encontre o Serviço Ideal para Seu Pet</h2>
                <input type="text" id="search-bar" placeholder="Digite o tipo de serviço">
                <button onclick="searchServices()">Buscar</button>
                <br></br>
                <br></br>
            </section>
            <section id="services">
                <!-- Lista de serviços será inserida aqui -->
            </section>
            </main>
<div class="col gallery-center">
<style>
  .gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }
  .gallery img {
    max-width: 70%;
    height: 35%;
    border-radius: 8px; /* Opcional: bordas arredondadas */
  }
</style>
  <img src="images/pet9.png" alt="Pet 2" />
  <br></br>
  <img src="images/pet10.png" alt="Pet 3" />
  <!-- Adicione mais imagens conforme necessário -->
</div>
        <footer>
            <br></br>
            <p>&copy; 2024 Tio Du Pets</p>
        </footer>
        <script src="script.js"></script>
        </div>
    </div>
</div>