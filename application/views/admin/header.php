<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html dir="ltr" lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="<?php echo base_url("assets/css/material.icons.css"); ?>" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/materialize.min.css"); ?>" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/simplebar.css"); ?>" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>" media="screen,projection" />

  <title>Cardápio Web</title>
</head>

<body>
  <div class="red accent-1 header">
    <p class="right-align">Rua Canuto de Aguiar, 1317 - Meireles, Fortaleza - CE, 60160-120</p>
    <p class="right-align">(85) 3242-7557</p>
  </div>

  <nav class="menu navbar-fixed">
    <div class="nav-wrapper">
      <a href="<?php echo site_url('/'); ?>" class="header">Cardápio Web</a>
      <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?php echo site_url('admin'); ?>">Home</a></li>
        <?php if ($this->session->userdata('usuario_logado')) : ?>
          <li><a href="<?php echo site_url('admin/produto'); ?>">Produtos</a></li>
          <li><a href="<?php echo site_url('admin/categoria'); ?>">Categorias</a></li>
          <li><a href="<?php echo site_url('admin/usuario'); ?>">Usuarios</a></li>
          <li><a href="<?php echo site_url('admin/sair'); ?>">Sair</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-menu">

    <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
    <?php if ($this->session->userdata('usuario_logado')) : ?>
      <li><a href="<?php echo site_url('admin/produto'); ?>">Produtos</a></li>
      <li><a href="<?php echo site_url('admin/categoria'); ?>">Categorias</a></li>
      <li><a href="<?php echo site_url('admin/usuario'); ?>">Usuarios</a></li>
      <li><a href="<?php echo site_url('admin/sair'); ?>">Sair</a></li>
    <?php else : ?>
      <li><a href="<?php echo site_url('admin/entrar'); ?>">Entrar</a></li>
    <?php endif; ?>

  </ul>
  
