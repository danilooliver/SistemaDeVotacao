<template>
    <section class="section">
        <div class="container has-text-centered">
            <div class="columns">
                <UsuarioMenu></UsuarioMenu>
                <!-- Área de trabalho-->
                <div class="column is-9 area">
                    <h2 class="text-center">Painel</h2>
                    <div class="panel panel-default">
                        <div class="panel-body" style="padding:0px;">
                            <div class="table-responsive">
                               <h3>Estatisticas:</h3>
                                <h4>Quantidade de enquetes criadas: {{this.temas}} </h4>
                            </div>
                        </div>
                    </div>
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
        props:['temas'],

    }
</script>
