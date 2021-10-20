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
            <?= form_open('admin/tipo/details/' . $tipo->id); ?>

            <div class="row">
                <div class="input-field col s6">
                    <input disabled value=" <?php echo $tipo->id; ?>" id="id" type="text" class="validate">
                    <label for="id">Id</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input disabled value=" <?php echo $tipo->nome; ?>" id="nome" type="text" class="validate">
                    <label for="nome">Nome</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input disabled value=" <?php echo $tipo->ordem; ?>" id="ordem" type="text" class="validate">
                    <label for="ordem">Ordem</label>
                </div>
            </div>

            <div class="row">
                <a href="<?php echo site_url('admin/tipo/edit/' .  $tipo->id) ?>" class="waves-effect waves-light  btn-small">Alterar</a>
                <a href="<?php echo site_url('admin/tipo') ?>" class="waves-effect red btn-small">Voltar</a>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">

</script>
<?php $this->load->view('_layout/footer_end'); ?>