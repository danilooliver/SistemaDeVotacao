<template>
    <div class="">
        <!--------------------------------------ENQUETES lISTADAS--------------->
        <section class="section" style="background: rgb(255, 255, 255);">
            <div class="container has-text-left">
                <h2 class="title">ENQUETES MAIS VOTADAS</h2>
                <h2 class="subtitle ">Nós separamos as que são tendência<br>
                    exclusivamente para você</h2>
            </div>
            <br>
            <div class="container has-text-left" style="margin-top: 1%;" v-if="temasdetail.length > 0">
                <div class="columns is-multiline is-center"  style="width: 1200px" >
                    <div class="columns is-4" style="width: 25%; height: 25%; margin-left: 1px; margin-top: 10px;"  v-for="item in temasdetail">
                        <div class="card" style="border-radius: 4px; background-color: #FFFFFF;	box-shadow: 0 1px 2px 0 rgba(0,0,0,0.2); cursor: pointer">

                            <div class="card-content" style="margin-left: -20px; height: 200px; width: 270px;">

                                <p class="subtitle is-carvao is-5 is-bold">{{item.titulo}}</p>
                                <p class="subtitle is-7">{{item.descricao}}</p>
                                <p class="subtitle is-carvao is-8">Disponível até:</p>
                                <p class="subtitle is-5 is-bold" style="color: #23A7FB">{{item.duracao}}</p>

                                <p class="subtitle is-carvao is-8">Criado por: {{item.name}}</p>


                            </div>
                            <a class="button" style=" background-color:#23A7FB; border-radius: 0 0 4px 4px; color:#ffffff; font-size: 14px; width:255px; height: 32px;" v-bind:href="'tema/'+item.idtema+'/'+item.slug" target="_blank" >ENQUETE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container has-text-left" style="margin-top: 1%;" v-if="temasdetail.length === 0">
                <div class="columns is-multiline is-center"  style="width: 1200px" >
                    <div class="columns is-4" style="width: 25%; height: 25%; margin-left: 1px; margin-top: 10px;">
                        <div class="card" style="border-radius: 4px; background-color: #FFFFFF;	box-shadow: 0 1px 2px 0 rgba(0,0,0,0.2); cursor: pointer">

                            <div class="card-content" style="margin-left: -20px; height: 200px; width: 270px;">

                                <p class="subtitle is-carvao is-5 is-bold">Ainda Não temos nenhuma enquete para mostrar!</p>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

    export default {
        props: ['temasdetail'],


    }
</script>
