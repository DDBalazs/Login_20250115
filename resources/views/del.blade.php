@extends('layout')
@section('content')

<main class="container pb-2" >
    <h1 class="text-center display-6 py-3">Fiók törlése</h1>
    <p>Biztos, hogy törölni szeretné a profilt?</p>
    <p>
        <a class="btn btn-danger" href="/exit">Igen</a>
        <a class="btn btn-info" href="/mypage">Nem</a>
    </p>
</main>
@endsection
