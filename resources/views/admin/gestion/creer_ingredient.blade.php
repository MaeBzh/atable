@extends('layouts.app')

@section('content')
    <section class="container elegant-color h-100">
        <div class="card  w-100 m-1 m-md-5 z-depth-2 grey lighten-4">
            <div class="card-header red darken-3 text-white">
                <h4>Ajouter un ingrédient</h4>
            </div>

            <div class="card-body p-1 px-md-5 m-1 m-md-5 text-md-left">
                <form method="POST" action="{{ route('admin.gestion.ingredients.ajout.post') }}">
                    @csrf

                    <div class="form-group">
                        <label for="nom" class="col-form-label text-md-right">Nom</label>
                        <input id="nom" type="text"
                               class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}"
                               name="nom" value="{{ old('nom') }}" required="required" autofocus>

                        @if ($errors->has('nom'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nom') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <button type="submit" class="btn btn-red">
                            Valider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
