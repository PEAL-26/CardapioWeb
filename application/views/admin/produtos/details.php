<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="section no-pad-bot">
    <div class="container">

        <div class="row">
            <div class="section">
                <h5><?= $titulo . ' - ' . $sub_titulo; ?>
                </h5>
            </div>

            <?= form_open_multipart('admin/produto/details/' . $produto->id); ?>
            <div class="row">
                <div class="input-field col s6">
                    <input disabled value=" <?php echo $produto->id; ?>" id="id" type="text" class="validate">
                    <label for="id">Id</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input disabled value=" <?php echo $produto->nome; ?>" id="nome" type="text" class="validate">
                    <label for="nome">Nome</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input disabled value=" <?php echo $produto->categoria; ?>" id="categoria" type="text" class="validate">
                    <label for="categoria">Categoria</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <textarea disabled id="descricao" class="materialize-textarea"><?php echo $produto->descricao; ?></textarea>
                    <label for="descricao">Descrição</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input disabled value=" <?php echo $produto->valor; ?>" id="valor" type="text" class="validate">
                    <label for="valor">Valor</label>
                </div>
            </div>

            <div class="row">
                <img class="materialboxed responsive-img" width="450" src="<?= base_url($produto->imagem) ?>">
            </div>

            <div class="row">
                <a href="<?php echo site_url('admin/produto/edit/' . $produto->id) ?>" class="waves-effect btn-small">Alterar</a>
                <a href="<?php echo site_url('admin/produto') ?>" class="waves-effect red btn-small">Cancelar</a>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.materialboxed').materialbox();
    });
</script>
<?php $this->load->view('_layout/footer_end'); ?>