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

            <?= form_open('admin/tipo/edit/' . $tipo->id, '', array("id" => $tipo->id)); ?>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Nome" id="nome" name="nome" type="text" class="validate" value="<?php echo set_value('nome', $tipo->nome); ?>">
                    <label for="nome">Nome</label>
                    <?php echo form_error('nome', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>
           
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Ordem" id="ordem" name="ordem" type="text" class="validate" value="<?php echo set_value('ordem', $tipo->ordem); ?>">
                    <label for="ordem">Ordem</label>
                    <?php echo form_error('ordem', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <button class="waves-effect waves-light btn-small">Guardar</button>
                <a href="<?php echo site_url('admin/tipo') ?>" class="waves-effect red btn-small">Cancelar</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">

</script>
<?php $this->load->view('_layout/footer_end'); ?>