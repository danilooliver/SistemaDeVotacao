<template>
    <section class="section">
        <div class="container has-text-centered">
            <div class="columns">
                <UsuarioMenu></UsuarioMenu>
                <!-- Área de trabalho-->
                <div class="column is-9 area">
                    <section class="hero is-small title-pages">
                        <div class="hero-body">
                            <h2 class="title text-blue">
                                Editar Enquetes
                                <span class="icon has-text-info is-pulled-right" title="lorem ipsum ">
              <i class="fas fa-info-circle"></i>
            </span>
                            </h2>

                        </div>
                    </section>
                    <section class="hero">
                        <div class="hero-body-table">

                            <!-- Informações-->
                            <div class="card">
                                <header class="card-header">
                                    <p class="card-header-title">
                                        Edição de Enquete
                                    </p>
                                </header>
                                <div class="card-content b-pb-lg " v-for="item in tema">
                                    <input type="hidden" id="idenquete" name="idenquete" :value="item.idtema">

                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal">
                                            <label class="label">Titulo</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field is-expanded">
                                                <p class="control">
                                                    <input class="input " type="text" placeholder="Titulo da enquete" id="titulo" :value="item.titulo">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal">
                                            <label class="label">Descrição</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field is-expanded">
                                                <p class="control">
                                                    <input class="input " type="text" placeholder="Descrição" id="descricao" :value="item.descricao">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal">
                                            <label class="label">Duração</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field is-expanded">
                                                <p class="control">
                                                    <input class="input " type="text" placeholder="22-10-2017 16:00" id="duracao" :value="item.duracao">
                                                </p>
                                                <p>Digite o tempo de duração. Exemplo: 22-10-2020 16:00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal">
                                            <label class="label">Opções</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field is-expanded">
                                                <p class="control" v-for="i in input">
                                                    <input :key="i" class="input " type="text" :placeholder="'Digite a opção '+i" :id='"opcoes"+i' :value="i.opcao">
                                                    <br><br>
                                                </p>
                                                <br>
                                                <button @click="input++" class="btn btn-outline-secondary" type="button" style="min-width:150px;">Adicionar</button>
                                                <br>
                                                <p>Você não pode alterar as opções anteriores, mas pode adicionar novas.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <p class="control column is-3" style="margin: 0 auto;">
                                <button class="button is-info is-hovered  " v-on:click="updateUser" id="salvar1">
                                    Salvar alterações
                                </button>
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</template>
<script>

    import Vue from 'vue'
    import menuusario from './Menu'

    Vue.component('UsuarioMenu', menuusario);


    export default {
        props:['tema'],

        data(){
            return{
                input: 0,
                text:[],
                i:0,
            }
        },

        methods: {
            updateUser: function ()
            {
                if(this.input > 0) {
                    for (this.i = 1; this.i <= this.input; this.i++) {
                        if (this.i < this.input) {
                            this.text += $('#opcoes' + this.i).val() + ',';
                        } else {
                            this.text += $('#opcoes' + this.i).val()
                        }

                    }
                }
                this.input = [
                    $('#titulo').val(),         //0
                    $('#descricao').val(),      //1
                    $('#duracao').val(),        //2
                    this.text,                  //3
                    $('#idenquete').val(),      //4



                ];
                console.log(this.input);

                $('#salvar1').removeClass('button  is-block has-button-yellow');
                $('#salvar1').addClass('button  is-block has-button-yellow is-loading');

                axios.post('../../painel/editar-tema/', {

                    input: this.input
                })
                    .then(function (response) {
                        alert("Enquete publicada com sucesso: ");
                        $('#salvar1').removeClass('button  is-block has-button-yellow is-loading');
                        $('#salvar1').addClass('button  is-block has-button-yellow');
                        console.log(response);
                    })
                    .catch(function (error) {
                        alert("Erro: "+error);
                        $('#salvar1').removeClass('button  is-block has-button-yellow is-loading');
                        $('#salvar1').addClass('button  is-block has-button-yellow');
                        console.log(error);
                    });

            }

        }
    }
</script>
