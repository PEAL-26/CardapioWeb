<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html dir="ltr" lang="pt">

<head>
  <meta charset="utf-8">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!--Import Google Icon Font-->
  <link href="<?php echo base_url("assets/css/material.icons.css"); ?>" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/materialize.min.css"); ?>" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/sweetalert2.min.css"); ?>" media="screen,projection" />

  <title>Cardápio Web</title>
</head>

<body>

  <div class="parallax-container">
    <nav>
      <div class="nav-wrapper">
        <a href="<?php echo site_url('home'); ?>" class="brand-logo">Cardápio Web</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
          <li><a href="<?php echo site_url('produto'); ?>">Produtos</a></li>
          <li><a href="<?php echo site_url('categoria'); ?>">Categorias</a></li>
        </ul>
      </div>
    </nav>
  </div>