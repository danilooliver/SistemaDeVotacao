@extends('layouts.top')

@section('content')
{{--    <enquete v-bind:temas="{{$temas}}"></enquete>--}}
<?php use Carbon\Carbon; ?>
<section class="section">
    <div class="container has-text-centered">
        <div class="columns">
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
                                href="../../">Pagina Inicial</a></td>
                    </tr>


                </table>
            </div>

            <div class="column is-9 area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center"><h4>{!! $tema->titulo !!}</h4></div>
                                <div class="panel-body text-justify">
                                    {!! $tema->descricao !!}
                                </div>
                                <?php if ($tema->duracao >= Carbon::now()): ?>
                                  <form class="" action="{!! url()->current() !!}" method="post">
                                    {!! csrf_field() !!}
                                    <div class="panel-body">
                                        <p>Selecione um das opções abaixo:</p>
                                        <?php foreach ($opcoes as $key => $value): ?>
                                          <p><input type="radio" name="opcao" value="{!! $value->id !!}"> {!! $value->opcao !!} ({!! $value->qtde !!})</p>
                                          <?php if ($value->qtde!=0): ?>
                                            <div class="progress">
                                              <div class="progress-bar" role="progressbar" style="width: {!! round(($value->qtde/$total)*100) !!}%;">
                                                <span class="">{!! round(($value->qtde/$total)*100) !!}%</span>
                                              </div>
                                            </div>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="panel-footer">
                                      <button type="submit" class="btn btn-sm btn-success">Votar</button>
                                    </div>
                                      <div>
                                          <h3><p>Tempo restante:<p></h3>
                                          <h4 id="demo"></h4>

                                      </div>
                                  </form>
                                <?php else: ?>
                                  <div class="panel-body">
                                    <p>Está votação já foi encerrada no dia: {{$tema->duracao}}</p>
                                  </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<script>

    import FlipCountdown from 'vue2-flip-countdown'
    export default {
        components: {FlipCountdown}
    }
</script>
<script>

    // Set the date we're counting down to
    var countDownDate = new Date("{{$tema->duracao}}").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
