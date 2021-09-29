<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('_layout/header'); ?>

<a class="btn-floating btn waves-effect waves-light red" href="<?php echo site_url('categoria/create') ?> "><i class="material-icons">add</i></a>

<div class="row">
    <table class="highlight">
        <thead>
            <tr>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria) : ?>
                <tr>
                    <td><?php echo  $categoria->nome ?></td>
                    <td>
                        <a href="<?php echo site_url('categoria/details/' . $categoria->id) ?>">
                            <i class="material-icons">remove_red_eye</i></a>
                        <a href="<?php echo site_url('categoria/edit/' . $categoria->id) ?>">
                            <i class="material-icons">edit</i></a>
                        <a href="javascript:Delete('<?php echo site_url('categoria/delete/' . $categoria->id) ?>')">
                            <i class="material-icons">delete</i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">

</script>
<?php $this->load->view('_layout/footer_end'); ?>