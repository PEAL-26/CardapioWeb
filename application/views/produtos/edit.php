<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('_layout/header'); ?>
<div class="section no-pad-bot">
    <div class="container">

        <div class="row">
            <div class="section">
                <h5><?= $titulo . ' - ' . $sub_titulo; ?>
                </h5>
            </div>

            <?= form_open_multipart('produto/edit/' . $produto->id, '', array("id" => $produto->id)); ?>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Nome" id="nome" name="nome" type="text" class="validate" value="<?php echo set_value('nome', $produto->nome); ?>">
                    <label for="nome">Nome</label>
                    <?php echo form_error('nome', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <select name="categoria_id">
                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="<?php echo $categoria->id; ?>" <?php if ($categoria->nome == $produto->categoria) echo 'selected'; ?>><?php echo $categoria->nome; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Categoria</label>
                    <?php echo form_error('categoria_id', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <textarea id="descricao" name="descricao" class="materialize-textarea" row="3"><?php echo set_value('descricao', $produto->descricao); ?> </textarea>
                    <label for="descricao">Descrição</label>
                    <?php echo form_error('descricao', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Valor" id="valor" name="valor" type="text" class="validate" value="<?php echo set_value('valor', $produto->valor); ?>">
                    <label for="valor">Valor</label>
                    <?php echo form_error('valor', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>Imagem</span>
                        <input type="file" name="imagem">
                    </div>
                    <div class="file-path-wrapper">
                        <input name="nome_imagem" placeholder="Localizar imagem" class="file-path validate" type="text" value="<?php echo set_value('imagem', $produto->imagem); ?>">
                    </div>
                    <?php echo form_error('imagem', '<div class="red-text">', '</div>'); ?>
                </div>
            </div>

            <div class="row">
                <button class="waves-effect waves-light btn-small">Guardar</button>
                <a href="<?php echo site_url('produto') ?>" class="waves-effect red btn-small">Cancelar</a>
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