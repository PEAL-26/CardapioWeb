<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('_layout/header'); ?>

<div class="section no-pad-bot">
    <div class="container">

        <div class="row">
            <div class="row">
                <h5 class="header"><?= $titulo . ' - ' . $sub_titulo; ?>
                    <a class="right btn-floating btn waves-effect waves-light red" href="<?php echo site_url('produto/create') ?> "><i class="material-icons">add</i></a>
                </h5>
            </div>

            <table class="highlight">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Categoria</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) : ?>
                        <tr>
                            <td><?php echo  $produto->nome ?></td>
                            <td><?php echo  $produto->categoria ?></td>
                            <td><?php echo  $produto->valor ?></td>
                            <td class="right">
                                <a href="<?php echo site_url('produto/details/' . $produto->id) ?>">
                                    <i class="material-icons">remove_red_eye</i></a>
                                <a href="<?php echo site_url('produto/edit/' . $produto->id) ?>">
                                    <i class="material-icons">edit</i></a>
                                <a href="javascript:Delete('<?php echo site_url('produto/delete/' . $produto->id) ?>')">
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