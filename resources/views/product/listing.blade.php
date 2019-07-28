@extends('layouts.vue-layout')

@section('content')
    <div class="container" id="listing-id" modulename="{{ $moduleName }}">
    {{ $moduleName }}
        <listing></listing>
        @push('listing-scripts')
        <script type="text/javascript" src="js/assets/js/vuelisting.js"></script>
        @endpush
    </div>
@endsection