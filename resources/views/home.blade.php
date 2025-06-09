@extends('layouts.app')
@section('title','Home')
@section('description','Explore and download high-quality free sound effects.')
@section('content')
<h1>Free Sound Effects</h1>
@include('partials.grid',['sounds'=>$sounds])
<div class="mt-4">{{ $sounds->links() }}</div>
@endsection
