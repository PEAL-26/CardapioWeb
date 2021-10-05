<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('_layout/header'); ?>

<div class="section no-pad-bot">
    <div class="container">

        <div class="row">
            <div class="section">
                <h5><?= $titulo . ' - ' . $sub_titulo; ?>
                    <a class="right btn-floating btn waves-effect waves-light red" href="<?php echo site_url('usuario/create') ?> "><i class="material-icons">add</i></a>
                </h5>
            </div>

            <table class="highlight">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><?php echo  $usuario->nome ?></td>
                            <td><?php echo  $usuario->email ?></td>
                            <td class="right">
                                <a href="<?php echo site_url('usuario/details/' . $usuario->id) ?>">
                                    <i class="material-icons">remove_red_eye</i></a>
                                <a href="<?php echo site_url('usuario/edit/' . $usuario->id) ?>">
                                    <i class="material-icons">edit</i></a>
                                <a href="javascript:Delete('<?php echo site_url('usuario/delete/' . $usuario->id) ?>')">
                                    <i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">

</script>
<?php $this->load->view('_layout/footer_end'); ?>