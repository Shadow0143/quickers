@extends('realestate::layouts.master')
{{-- @extends('layouts.app') --}}
@section('title')
<title>Realestate List</title>

@endsection
@section('content')
<h1>Hello World</h1>

<p>
    This view is loaded from module: {!! config('realestate.name') !!}
</p>
@endsection