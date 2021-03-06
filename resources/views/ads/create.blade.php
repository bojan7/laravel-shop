@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kreiraj Oglas</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('ad.store') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                <label for="name">Naziv: </label>
                                <input type="text" class="form-control" name="name"/>
                            </div>
                            <div class="form-group">
                                <label for="price">Cena: </label>
                                <input type="text" class="form-control" name="price"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Opis: </label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="address">Adresa: </label>
                                <input type="text" class="form-control" name="address"/>
                            </div>
                            <div class="form-group">
                                <label for="city">Grad: </label>
                                <input type="text" class="form-control" name="city"/>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telefon:</label>
                                <input type="text" class="form-control" name="phone"/>
                            </div>
                            <div class="form-group">
                                <label for="category">Kategorija: </label>
                                <select class="custom-select" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Slika: </label>
                                <input type="file" class="form-control" name="image"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Snimi oglas</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
