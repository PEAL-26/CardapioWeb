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

            <?= form_open('admin/categoria/edit/' . $categoria->id, '', array("id" => $categoria->id)); ?>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Nome" id="nome" name="nome" type="text" class="validate" value="<?php echo set_value('nome', $categoria->nome); ?>">
                    <label for="nome">Nome</label>
                    <?php echo form_error('nome', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <select name="tipo_id">
                        <?php foreach ($tipos as $tipo) : ?>
                            <option value="<?php echo $tipo->id; ?>" <?php if ($tipo->nome == $categoria->tipo) echo 'selected'; ?>><?php echo $tipo->nome; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Tipo</label>
                    <?php echo form_error('tipo_id', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <button class="waves-effect waves-light btn-small">Guardar</button>
                <a href="<?php echo site_url('admin/categoria') ?>" class="waves-effect red btn-small">Cancelar</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">
  $(document).ready(function() {
        $('select').formSelect();
    });
</script>
<?php $this->load->view('_layout/footer_end'); ?>