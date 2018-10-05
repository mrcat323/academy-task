@extends('layouts.app')
@section('title')
  Dashboard
@endsection

@section('content')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
      @include('layouts.sidebar')
      <div class="clearfix"></div>
      <div class="row content">
        <div class="jumbotron text-center">
          <h2>Welcome to Admin-Panel!</h2>
        </div>
      </div>
    </div>
</div>
@endsection
