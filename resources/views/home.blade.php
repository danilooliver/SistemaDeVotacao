@extends('layouts.top')

@section('content')
    <home v-bind:temasdetail="{{$temasdetail}}"></home>
@endsection
<script>
    import Home from "../js/components/home";
    export default {
        components: {Home}
    }
</script>
