<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('_layout/header'); ?>

<div class="row">
    <?php echo form_open('categoria/details/' . $categoria->id); ?>

    <div class="row">
        <label>Id: </label>
        <label><?php echo $categoria->id; ?></label>
    </div>

    <div class="row">
        <label>Nome: </label>
        <label><?php echo $categoria->nome; ?></label>
    </div>

    <div class="row">
        <a href="<?php echo site_url('categoria/edit/' .  $categoria->id) ?>" class="waves-effect waves-light  btn-small">Alterar</a>
        <a href="<?php echo site_url('categoria') ?>" class="waves-effect red btn-small">Voltar</a>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">

</script>
<?php $this->load->view('_layout/footer_end'); ?>