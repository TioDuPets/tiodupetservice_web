<?php defined('CONTROL') or die('Acesso inválido.') ?>
<div class="container-fluid bg-dark text-white p-3">
    <div class="row">
        <div class="col"><h1><?= APP_NAME ?></h1></div>
        <div class="col text-end align-self-center">
            <a href="index.php?a=home" class="btn btn-secondary">HOME</a>
            <span class="px-3">|</span>
            <a href="index.php?a=services" class="btn btn-secondary">SERVICES</a>
            <span class="px-3">|</span>
            <a href="index.php?a=contacts" class="btn btn-secondary">CONTACTS</a>
            <span class="px-3">|</span>
            <a href="index.php?a=login" class="btn btn-secondary">LOGIN</a>
        </div>
    </div>
</div>