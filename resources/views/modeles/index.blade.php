<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_bootswatch.css') }}" rel="stylesheet">
    <title>Gestion des voitures</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
        <a class="nav-link" href="{{url('marques')}}">Marque</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('modeles')}}">Modéle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('voitures')}}">Voiture</a>
        </li>

        <li class="nav-item">
        <button class="btn btn-secondary my-2 my-sm-0" ><a class="nav-link" href="{{url('marques/create')}}">Ajouter Marque</a></button>
        </li>
        <li class="nav-item">
        <button class="btn btn-secondary my-2 my-sm-0" ><a class="nav-link" href="{{url('modeles/create')}}">Ajouter Modéle</a></button>
        </li>
        <li class="nav-item">
        <button class="btn btn-secondary my-2 my-sm-0" ><a class="nav-link" href="{{url('voitures/create')}}">Ajouter Voiture</a></button>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <table class="table table-hover">
    <thead>
        <tr class="table-primary">
            <th scope="row">ID</th>
            <th scope="row">Marque_id</th>
            <th scope="row">Désignation</th>
            <th scope="row">Anneé modele</th>
            <th scope="row">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($modeles as $modele)
            <tr class="table-light">
                <td scope="row">{{ $modele->id }}</td>
                <td scope="row">
                    @foreach($marques as $i)
                        @if ($i->id==$modele->marque_id)
                        {{ $i->designation }}
                        @endif
                    @endforeach
                </td>
                <td scope="row">{{ $modele->designation }}</td>
                <td scope="row">{{ $modele->annee_modele }}</td>
                <td scope="row"><button class="btn btn-outline-primary"><a href="{{ route('modeles.edit', $modele->id) }}">Modifier</a></button>
                    <form action="{{ route('modeles.destroy', $modele->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-primary" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


</body>
</html>

