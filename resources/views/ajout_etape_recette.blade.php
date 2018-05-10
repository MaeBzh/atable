@extends('layouts.app')

@section('content')
    <section class="container elegant-color h-100">
        <div class="card w-100 m-5 z-depth-2">
            <div class="card-header red darken-3 text-white"><h4>Ajouter une étape à la recette
                    : {{$recette->titre}}</h4>
            </div>

            <div class="card-body grey lighten-4">
                <form method="POST" action="{{ route('ajout_etape_recette.post', ['id' => $recette->id] ) }}">
                    @csrf
                    <div class="form-group red-border">
                        <label for="titre" class="col-form-label text-md-right">Titre de l'étape</label>
                        <input id="titre" type="text"
                               class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}"
                               name="titre" value="{{ old('titre') }}" required autofocus>

                        @if ($errors->has('titre'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('titre') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group red-border">
                        <label for="description" class="col-form-label text-md-right">Description</label>
                        <textarea id="description" type="text" rows="3"
                                  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                  name="description" value="{{ old('description') }}" required autofocus></textarea>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group row mb-0 justify-content-center">
                        <div class="col-6">
                            <button type="submit" name="submit" value="autre_etape" class="btn btn-red">
                                Ajouter une étape
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="submit" value="valider" class="btn btn-red">
                                Valider la recette
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection
