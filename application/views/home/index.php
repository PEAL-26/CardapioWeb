<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('_layout/header'); ?>

<!-- <div class="row">

    <nav class="menu navbar-fixed">
        <div class="nav-wrapper">

            <form>
                <div class="input-field">
                    <input id="search" type="search">
                    <label class="label-icon" for="search"><i class=" material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form> -->

<!-- Categorias -->
<!-- <div class="wrapper menu-categorias">
                <div class="nav-wrapper">
                    <ul class="lista-categoria center-align "> -->
<!-- table-of-contents -->
<!-- <?php foreach ($categorias as $categoria) : ?>
                            <li><a href="#<?= $categoria->nome ?>"><?= $categoria->nome ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

           
        </div>
    </nav>

</div> -->
<div class="pesquisar navbar-fixed pinned">
    <nav>
        <div class="nav-wrapper grey lighten-4">
            <form>
                <div class="input-field">
                    <input id="search" class="" type="search" >
                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    <i class="material-icons">close</i>
                </div>
            </form>
        </div>
    </nav>
</div>

<div class="section no-pad-bot">
    <div class="container">

        <!-- Lista de Produtos Por Categoria-->
        <?php $ultima_categoria = ""; ?>
        <?php foreach ($produtos as $produto) : ?>

            <div class="row scrollspy lista-produtos" id="<?php if ($ultima_categoria != $produto->categoria) echo $produto->categoria; ?>">
                <div class="col s12">
                    <div class="row">
                        <h5><?php if ($ultima_categoria != $produto->categoria) echo $produto->categoria;  ?></h5>
                    </div>

                    <div class="row produto-card card-panel small" data-id="<?= $produto->id ?>">
                        <div class="col s6">
                            <h5 class="nome grey-text text-darken-4"><?= $produto->nome ?></h5>
                            <p class="descricao" align="justify"><?= $produto->descricao ?></p>
                            <h5 class="valor">R$ <?= $produto->valor ?></h5>
                        </div>
                        <div class="col s6">
                            <!-- <div class="card-image waves-effect waves-block waves-light"> -->
                            <img class="responsive-img imagem" src="<?= base_url($produto->imagem) ?>" alt="<?= $produto->nome ?>">
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <?php $ultima_categoria = $produto->categoria; ?>
        <?php endforeach; ?>

    </div>
</div>

<!-- Modal -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <div class="">
            <img id="modal-imagem" class="responsive-img" src="" alt="">
        </div>

        <span id="modal-id"></span>
        <h4 id="modal-nome"></h4>
        <p id="modal-descricao" align="justify"></p>
        <h6 id="modal-valor"></h6>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('.carousel').carousel();
        $('.modal').modal();
        $('.scrollspy').scrollSpy();

        $barraMenu = $('.menu');
        $categoria = $('.wrapper');

        $categoria.pushpin({
            top: 700
        });

        console.log($categoria);

    }).on('click', '.imagem', function() {
        var target = $(this).closest('[data-id]'),
            nome = $(target).find('.nome').html(),
            descricao = $(target).find('.descricao').html(),
            valor = $(target).find('.valor').html(),
            imagem = $(this).attr('src');

        $('#modal-nome').html(nome);
        $('#modal-descricao').html(descricao);
        $('#modal-valor').html(valor);
        $("#modal-imagem").attr('src', imagem);
        var instance = M.Modal.getInstance($('.modal'));
        instance.open();
    });
</script>
<?php $this->load->view('_layout/footer_end'); ?>