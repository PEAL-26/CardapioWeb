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

            <?= form_open('admin/usuario/editpassword/' . $usuario->id, '', array("id" => $usuario->id)); ?>

          
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Senha Antiga" id="senha_antiga" name="senha_antiga" type="password" class="validate" value="<?php echo set_value('senha_antiga'); ?>">
                    <label for="senha_antiga">Senha Antiga</label>
                    <?php echo form_error('senha_antiga', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Senha Nova" id="senha_nova" name="senha_nova" type="password" class="validate" value="<?php echo set_value('senha_nova'); ?>">
                    <label for="senha_nova">Senha Nova</label>
                    <?php echo form_error('senha_nova', '<div class="red-text">', '</div>'); ?>
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