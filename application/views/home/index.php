<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view('_layout/header'); ?>

<div>
    <div class="meunu-pesquisa">
        <!-- Barra de Pesquisa -->
        <!-- <nav class="pesquisar"> -->
        <div class="nav-wrapper pesquisar">
            <div class="input-field">
                <input id="search" class="" type="search" placeholder="Pesquisar">
                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                <i id="close-search" class="material-icons">close</i>
            </div>
        </div>
        <!-- </nav> -->

        <!-- Menu de Categorias -->
        <div class="_menu  grey lighten-2">
            <div class="_menu-content table-of-contents">
                <?php $count = 0; ?>
                <?php foreach ($categorias as $categoria) : ?>
                    <div class="_item <?php if (++$count == 1) echo 'active'; ?>"><a href="#<?= $categoria->nome; ?>"><?= $categoria->nome; ?></a></div>
                <?php endforeach; ?>
            </div>

            <div class="_botao _left hide-on-small-only">
                <a class="scrollLeft" href="#"><strong><i class="material-icons red-text">arrow_back</i></strong></a>
            </div>
            <div class="_botao _right hide-on-small-only">
                <a class="scrollRight" href="#"><strong><i class="material-icons red-text">arrow_forward</i></strong></a>
            </div>
        </div>
    </div>

    <div class="section no-pad">
        <div class="conteudo-principal">
            <!-- Lista de Produtos Por Categoria-->
            <div id="lista-produtos" class="container no-pad"> </div>
        </div>
    </div>
</div>

<?php $this->load->view('_layout/footer_start'); ?>
<script src="<?php echo base_url("assets/js/simplebar.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/scrollbuttom.js"); ?>"></script>

<!-- Modal -->
<div id="modal1" class="modal">
        <div class="modal-content">
        <button type="button" class="modal-close topright waves-effect btn-floating red btn modal-default-close" data-dismiss="modal" aria-label="Close">
            <span style="margin-top:-0.21em;" aria-hidden="true">
                <i class="material-icons">close</i>
            </span>
        </button>

        <div class="section no-pad-bot">
            <img id="modal-imagem" class="responsive-img" src="" alt="">
        </div>

        <span id="modal-id"></span>
        <h5 id="modal-nome"></h5>
        <p id="modal-descricao"></p>
        <h6 id="modal-valor"></h6>
    </div>
</div>

<!-- Tamplate Mustache - Lista de Produtos -->
<script id="tamplate-lista-produtos" type="text/template">
    <div class="row lista-produtos section scrollspy" id="{{categoria}}">
        <div class="col s12">
            {{#categoria}}
            <div class="row "  >
                <h5 class="header col s12 light">{{categoria}}</h5>
            </div> 
            {{/categoria}}
                
            <div class="row produto-card" data-id="{{id}}">
                <div class="col s6">
                    <h5 class="nome grey-text text-darken-4">{{nome}}</h5>
                    <p  class="descricao">{{descricao}}</p>
                    <h6 class="valor">R$ {{valor}}</h6>
                </div>
                <div class="col s6">
                    <div class="waves-effect waves-block waves-light imagem" >
                        <img class="img" src="{{imagem}}">
                    </div>
                </div>
            </div> 
        </div>
    </div>        
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.modal').modal();
        $('.scrollspy').scrollSpy();
        filtrar_produto();
    }).on('click', '.imagem', function() {
        var target = $(this).closest('[data-id]'),
            nome = $(target).find('.nome').html(),
            descricao = $(target).find('.descricao').html(),
            valor = $(target).find('.valor').html(),
            imagem = $(target).find('img').attr('src');

        $('#modal-nome').html(nome);
        $('#modal-descricao').html(descricao);
        $('#modal-valor').html(valor);
        $('#modal-imagem').attr('src', imagem);
        var instance = M.Modal.getInstance($('.modal'));
        instance.open();
    }).on('input', '#search', function() {
        filtrar_produto();
    }).on('click', '#close-search', function() {
        $('#search').val('');
        filtrar_produto();
    });

    function filtrar_produto() {
        var url = '<?php echo site_url('produto/filtrar'); ?>',
            dados = {
                filtro: $('#search').val()
            };

        $.post(url, dados, function(response) {
            $("#lista-produtos").empty();
            $('._menu').show();
            var resultado = JSON.parse(response),
                ultima_categoria = '';
            if (resultado && resultado.length > 0) {
                $.each(JSON.parse(response), function(index, value) {
                    if (ultima_categoria != value.categoria)
                        ultima_categoria = value.categoria;
                    else
                        ultima_categoria = false;

                    InserirDadosNaLista({
                        id: value.id,
                        ancora: ultima_categoria,
                        categoria: ultima_categoria,
                        nome: value.nome,
                        descricao: value.descricao,
                        valor: value.valor,
                        imagem: '<?= base_url() ?>' + value.imagem
                    });

                });
            } else if (dados['filtro'] != '' && resultado.length == 0) {
                $('#lista-produtos').html('<h5 class="header col s12 light center"> Não encontramos nenhum resultado para a sua busca.</h5>')
                $('._menu').hide();
            } else {
                $('#lista-produtos').html('<h5 class="header col s12 light center">Não existe nenhum produto para ser mostrado..</h5>')
                $('._menu').hide();
            }
        });
    }

    function InserirDadosNaLista(dados) {
        var template = document.getElementById('tamplate-lista-produtos').innerHTML;
        $('#lista-produtos').append(Mustache.render(template, dados));
    }
</script>
<?php $this->load->view('_layout/footer_end'); ?>