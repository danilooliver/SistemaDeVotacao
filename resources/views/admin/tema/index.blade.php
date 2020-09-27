@extends('layouts.top')
@section('content')

    <meustemas v-bind:temas="{{$temas}}"></meustemas>
@endsection
<script>
    import Meustemas from "../../../js/components/meustemas";
    export default {
        components: {Meustemas}
    }
</script>
