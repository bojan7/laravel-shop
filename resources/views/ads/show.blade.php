@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{ $ad->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <img class="img-fluid" src="{{ '/storage/images/' . $ad->image }}" alt="">
        </div>

        <div class="col-md-4">
            @if($ad->description)
                <h3 class="my-3">Opis</h3>
                <p>{{ $ad->description }}</p>
            @endif
            <h3 class="my-3">Kontakt</h3>
            <ul>
                <li><strong>Oglasio:   </strong>{{ $ad->user->name }}</li>
                <li><strong>Grad:   </strong>{{ $ad->city }}</li>
                <li><strong>Address:   </strong>{{ $ad->address }}</li>
                <li><strong>Phone:   </strong>{{ $ad->phone }}</li>
            </ul>
            <h3 class="my-3">Cena</h3>
            <p>{{ $ad->price }}</p>
            <h3 class="my-3">Kategorija</h3>
            <p>{{ $ad->category->name }}</p>

        </div>

    </div>
    <!-- /.row -->
</div>
@endsection
