<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('_layout/header'); ?>

<div class="row">
    <?php echo form_open('categoria/edit/' . $categoria->id, '', array("id" => $categoria->id)); ?>
    <div class="row">
        <div class="input-field col s6">
            <input placeholder="Nome" id="nome" name="nome" type="text" class="validate" value="<?php echo set_value('nome', $categoria->nome); ?>">
            <label for="nome">Nome</label>
            <?php echo form_error('nome', '<div class="red-text">', '</div>'); ?>
        </div>
    </div>

    <div class="row">
        <button class="waves-effect waves-light btn-small">Guardar</button>
        <a href="<?php echo site_url('categoria') ?>" class="waves-effect red btn-small">Cancelar</a>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">

</script>
<?php $this->load->view('_layout/footer_end'); ?>