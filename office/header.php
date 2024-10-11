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
    background-color: #f0f001;
    height: 12vh;
    border-radius: 10pt;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    z-index: 999;
}

.navbar li {
    float: left;
    z-index: 999;
    
}

.navbar li a, .dropbtn {
    display: inline-block;
    color: rgb(7, 7, 7);
    text-decoration: none;
    z-index: 999;
}

.dropdown {
    padding:  10pt;
    position:relative;
    display: inline-block;

}

/* Estilo do conteúdo do dropdown */
.dropdown-content {
    text-align: center;
    width: auto;
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
    z-index: 999;
}
    </style>
</head>

<body>

<header>
    <nav>
   
    <a class="logo" href="http://localhost/tiodupetservice_web/office/main.php"><img src="../assets/images/LogoTioDu.svg" alt="Logo Tio Du Pets"></a>
    <ul class="navbar">

    

           <!-- Dropdown Matrícula -->
           <li class="dropdown">

            <a href="calendario.php" class="dropbtn">Calendário</a>

            </li>

        <!-- Dropdown Matrícula -->
        <li class="dropdown">

            <a class="dropbtn">Creche</a>

            <div class="dropdown-content">

                <ul>
                    <li><a href="matricula_creche.php">Matrícula</a></li>
                    <li><a href="matricula_consulta_creche.php">Consulta</a></li>
                    <li><a href="matricula_listagem_creche.php">Listagem</a></li>
                </ul>
            </div>
        </li>
        
        <!-- Dropdown de Serviços -->
        <li class="dropdown">

            <a class="dropbtn">Agendamento</a>

            <div class="dropdown-content">

                <ul>
                    <li><a href="agendamento_hospedagem.php">Hotel</a></li>
                    <li><a href="agendamento_petsitter.php">Pet Sitter</a></li>
                    <li><a href="listar_agendamento.php">Agenda</a></li>
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
                <li><a href="listar_pet.php">Listagem Pet</a></li>
                    <li><a href="listar_cliente.php">Listagem Cliente</a></li>
                    <li><a href="listar_veterinario.php">Listagem Veterinário</a></li>
                    <li><a href="listar_servico.php">Listagem Serviço</a></li>
                </ul>

            </div>
        </li>

        <li class="dropdown">

            <a class="dropbtn">Leads</a>

            <div class="dropdown-content">

                <ul>
                    <li><a href="listar_lead.php">Consultar Agendamento</a></li>
                    <li><a href="listar_avaliacao.php">Consultar Avaliação</a></li>

                </ul>

            </div>
        </li>

    </ul>
</nav>
</header>

</body>