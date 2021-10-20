<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/header'); ?>
</nav>

<div class="section no-pad-bot">
    <div class="container">

        <div class="row">
            <div class="section">
                <h5><?= $titulo . ' - ' . $sub_titulo; ?>
                </h5>
            </div>

            <?php //if ($msg != '') : ?>
                <div class="row">
                    <div class="card-panel red col s6">
                        <span class="white-text "> <?php echo $msg; ?></span>
                    </div>
                </div>
            <?php //endif; ?>

            <?= form_open('admin/usuario/create'); ?>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Nome" id="nome" name="nome" type="text" class="validate" value="<?php echo set_value('nome'); ?>">
                    <label for="nome">Nome</label>
                    <?php echo form_error('nome', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Email" id="email" name="email" type="text" class="validate" value="<?php echo set_value('email'); ?>">
                    <label for="email">Email</label>
                    <?php echo form_error('email', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Senha" id="senha" name="senha" type="password" class="validate" value="<?php echo set_value('senha'); ?>">
                    <label for="senha">Senha</label>
                    <?php echo form_error('senha', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Repetir Senha" id="senha_repetir" name="senha_repetir" type="password" class="validate" value="<?php echo set_value('senha_repetir'); ?>">
                    <label for="senha_repetir">Repetir Senha</label>
                    <?php echo form_error('senha_repetir', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <button class="waves-effect waves-light btn-small">Guardar</button>
                <a href="<?php echo site_url('admin/usuario') ?>" class="waves-effect red btn-small">Cancelar</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">

</script>
<?php $this->load->view('_layout/footer_end'); ?>