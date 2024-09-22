<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tio Du Pets</title>
    <style>
        *{
    margin: 10;
    padding: 10;
}

a:hover{
    opacity: 0.7;
}

.logo {
    font-size: 20px;
    letter-spacing: 4px;
    padding-left: 15px;
    align-items: normal;
}

.logo img {
    width:13vh;
    height: auto;
    display: block;
    border-radius: 50pt;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

nav{
    font-size: 20px;
    width: 100%;
    display: flex;
    justify-content:space-around;
    align-items: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    background: #f0f001;
    height: 12vh;
    border-radius: 10pt;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    margin-bottom: 10pt;
}

.navbar li {
    float: left;
}

.navbar li a, .dropbtn {
    display: inline-block;
    color: rgb(7, 7, 7);
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    padding:  10pt;
    position:relative;
    display: inline-block;

}

/* Estilo do conteúdo do dropdown */
.dropdown-content {
    text-align: center;
    width:19vh;
    display: none;
    position: absolute;
    background-color: #f0f001;
    box-shadow: 0 4px 4px rgba(0,0,0,0.2);
}

.dropdown-content ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.dropdown-content li {
    padding: 8px 8px;
}

.dropdown-content li a {
    text-align: center;
    color: rgb(1, 1, 1);
    text-decoration: none;
    display: block;
}

.dropdown:hover .dropdown-content {
    display: block;
}
    </style>
</head>

<body>

<header>
    <nav>
   
    <a class="logo" href="http://localhost/tiodupetservice_web/office/main.php"><img src="../assets/images/LogoTioDu.svg" alt="Logo Tio Du Pets"></a>
    <ul class="navbar">
        
        <!-- Dropdown de Serviços -->
        <li class="dropdown">

            <a class="dropbtn">Serviços</a>

            <div class="dropdown-content">

                <ul>
                    <li><a href="servico_hotel.php">Hotel</a></li>
                    <li><a href="servico_creche.php">Creche</a></li>
                    <li><a href="servico_pet_sitter.php">Pet Sitter</a></li>
                </ul>
            </div>
        </li>

        <!-- Dropdown de Cadastro -->
        <li class="dropdown">

            <a class="dropbtn">Cadastro</a>

            <div class="dropdown-content">

                <ul>
                    <li><a href="cadastro_pet.php">Pet</a></li>
                    <li><a href="cadastro_cliente.php">Cliente</a></li>
                    <li><a href="cadastro_veterinario.php">Veterinário</a></li>
                    <li><a href="cadastro_servico.php">Serviço</a></li>
                </ul>

            </div>
        </li>

        <!-- Dropdown de Alteração -->
        <li class="dropdown">

            <a class="dropbtn">Consulta</a>

            <div class="dropdown-content">

                <ul>
                    <li><a href="listar_pet.php">Consultar Pet</a></li>
                    <li><a href="listar_cliente.php">Consultar Cliente</a></li>
                    <li><a href="listar_veterinario.php">Consultar Veterinário</a></li>
                    <li><a href="listar_servico.php">Consultar Serviço</a></li>
                </ul>

            </div>
        </li>

    </ul>
</nav>
</header>

</body>