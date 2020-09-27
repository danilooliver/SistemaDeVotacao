<template>
    <section class="section">
        <div class="container has-text-centered">
            <div class="columns">
                <UsuarioMenu></UsuarioMenu>
                <!-- Área de trabalho-->
                <div class="column is-9 area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="panel panel-default" v-for="item in temas">
                                    <div class="panel-heading text-center"><h4>{{item.titulo}}</h4></div>
                                    <div class="panel-body text-justify">
                                        {{item.descricao}}
                                    </div>
                                    <div>
                                        <div class="panel-body">
                                            <p>Selecione um das opções abaixo:</p>
                                            <div class="progress" v-for="ops in opcoes">

                                                <p><input type="radio" name="opcao" v-bind:value="ops.id"> {{ops.opcao}} ({{ops.qtd}})</p>
                                                <div class="progress-bar" role="progressbar" style="width: {!! round(($value->qtde/$total)*100) !!}%;">
                                                    <span class="">Math.round(({{ops.qtd}}/{{this.total}})*100)</span>
                                                    <k-progress v-bind:percent="Math.round((ops.qtd/this.total)*100)" ></k-progress>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success" v-on:click="updateUser">Votar</button>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <p>Está votação já foi encerrada no dia: {{temas.duracao}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </div>


                </div>
            </div> <!--Aqui -->
        </div>
    </section>
</template>
<script>

    import Vue from 'vue'
    import menuusario from './Menu'
    import KProgress from 'k-progress';

    Vue.component('k-progress', KProgress);
    Vue.component('UsuarioMenu', menuusario);


    export default {
        props:['temas'],

        data() {
            return {
                opcoes: [],
                total:[],

            }
        },
        mounted() {
            axios.get('../../tema/total/'+this.temas.id).then(resp => {

                this.total = resp;
                alert("Total: "+resp);

            });

            axios.get('../../tema/opcoes/'+this.temas.id).then(resp => {

                this.opcoes = resp;
                alert("Opcoes: "+resp);

            });

        },

        methods: {
            updateUser: function () {
                if(this.titulo === true ){
                    this.titulo = false;
                }
                else{
                    this.titulo = true;
                }

            }

        }
    }
</script>
