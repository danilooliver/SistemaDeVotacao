<template>
    <section class="section">
        <div class="container has-text-centered">
            <div class="columns">
                <UsuarioMenu></UsuarioMenu>
                <!-- Área de trabalho-->
                <div class="column is-9 area">
                    <h4 class="text-center">Enquetes</h4>
                    <h4><button class="hero-buttons" v-on:click="updateUser">Mostrar enquetes Inativos</button></h4>

                    <div class="panel panel-default">
                        <div class="panel-body" style="padding:0px;">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Descrição</th>
                                        <th>Criada</th>
                                        <th>Fim</th>
                                        <th></th>
                                    </tr>
<!--                                    <?php foreach ($temas as $key => $value): ?>-->
                                    <tr v-for="item in temas">
                                        <td>{{item.id}}</td>
                                        <td>{{ item.titulos }}</td>
                                        <td>{{ item.descricao }}</td>
                                        <td>{{item.created_at}}</td>
                                        <td>{{item.duracao}}</td>
                                        <td>
                                                <a v-bind:href="'../tema/'+ item.id +'/'+ item.slug"  class="btn btn-xs btn-success">Visualizar</a>
                                                <a v-bind:href="'editar-tema/'+item.id"  class="btn btn-xs btn-danger">Editar</a>
                                                <a v-bind:href="'deletar-tema/'+item.id"  class="btn btn-xs btn-danger">Deletar</a>

<!--                                                <a href="'painel/ativar-tema/'.item.id" class="btn btn-xs btn-warning">Ativar</a>-->

                                        </td>
                                    </tr>
<!--                                    <?php endforeach; ?>-->
                                </table>
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

    Vue.component('UsuarioMenu', menuusario);


    export default {
        props:['temas',  'titulo'],

        data() {
            return {
                titulo: true,

            }
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
