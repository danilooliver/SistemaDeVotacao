@extends('layouts.top')
@section('content')

<editarenquete v-bind:tema="{{$tema}}"></editarenquete>

@endsection
<script>
    import Editarenquete from "../../../js/components/editarenquete";
    export default {
        components: {Editarenquete}
    }
</script>
