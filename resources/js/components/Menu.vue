<template>
    <!--------------------------------------FILTRO--------------->


    <div class="column is-2" style="margin-left: 10px">
        <table class="table menu-l">
            <p class="subtitle is-carvao is-5 has-text-left">Painel de Enquetes</p>
            <tr class="title is-6">
                <td style="border: 0px"><span class="icon is-small"
                                              style="color: #3bbfb8; position: relative;top:6px;right: 18px;"><i class="fas fa-file-alt"></i></span>
                    <a href="../../painel/adicionar-tema" class="active-link">Criar Enquete</a></td>
            </tr>
            <tr class="title is-6">
                <td style="border: 0px"><span class="icon is-small"
                                              style="color: #3bbfb8;position: relative;top:6px;right: 18px;"><i class="fas fa-folder"></i></span><a
                    href="../../painel/meus-temas">Minhas Enquetes</a></td>
            </tr>
            <tr class="title is-6">
                <td style="border: 0px"><span class="icon is-small"
                                              style="color: #3bbfb8;position: relative;top:6px;right: 18px;"><i class="fas fa-folder"></i></span><a
                    href="../../painel">Painel</a></td>
            </tr>
            <tr class="title is-6">
                <td style="border: 0px"><span class="icon is-small"
                                              style="color: #3bbfb8;position: relative;top:6px;right: 18px;"><i class="fas fa-folder"></i></span><a
                    href="/">Pagina Inicial</a></td>
            </tr>


        </table>
    </div>


</template>


<script>

    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
