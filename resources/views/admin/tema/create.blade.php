@extends('layouts.top')
@section('content')

<createtemas></createtemas>

@endsection

<script>
    import Createtemas from "../../../js/components/createtemas";
    export default {
        components: {Createtemas}
    }
</script>
