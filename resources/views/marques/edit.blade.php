<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_bootswatch.css') }}" rel="stylesheet">    <title>Gestion des voitures</title>
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
    <form action="{{ route('marques.update' ,$marque->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group row">
        <div class="col-sm-10">
            <label class="form-label mt-4" for="id">ID :</label>
            <input class="form-control" type="text" value="{{$marque->id}}" name="id" id="id" required>
        
            <label class="form-label mt-4" for="designation">designation :</label>
            <input class="form-control" type="text" value="{{$marque->designation}}" name="designation" id="designation" required>
        
            <label class="form-label mt-4" for="Tel">fabriquant :</label>
            <input class="form-control" type="text" value="{{$marque->fabriquant}}" name="fabriquant" id="fabriquant" required>
            
        </div>
        </div>
        
        <button class="btn btn-outline-primary" type="submit" >Modifier</button>
    </form>
        
</body>

</html>
