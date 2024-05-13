@extends('layouts.login')

@section('content')
<p>フォローリスト</p>

@foreach($follows as $follow)

<p>{{ $follow }}</p>

@endforeach



@endsection
