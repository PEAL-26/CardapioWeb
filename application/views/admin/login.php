<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html dir="ltr" lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/material.icons.css"); ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/materialize.min.css"); ?>" media="screen,projection" /> -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" media="screen,projection" />

    <title>Cardápio Web</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #F44336;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            color: white;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
    </style>
</head>

<body class="">

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <?php echo form_open('entrar', array('class' => 'form', 'id' => 'login-form')); ?>
                        <h3 class="text-center ">Login</h3>
                        <div class="form-group">
                            <label for="email" class="">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                            <?php echo form_error('email', '<div class="red-text">', '</div>'); ?>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="senha" class="">Senha:</label><br>
                            <input type="password" name="senha" id="senha" class="form-control">
                            <?php echo form_error('senha', '<div class="red-text">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <br>
                            <input type="submit" name="submit" class="btn btn-success btn-md" value="Entrar">
                            <a href="<?php echo site_url('home') ?>" class="btn btn-danger btn-md">Cancelar</a>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url("assets/js/jquery-3.6.0.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/materialize.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/sweetalert2.min.js"); ?>"></script>
</body>

</html>