<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- BootsTrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <title>corner</title>

  {{-- Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('posts.home') }}">corner</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link @if($page=='home') active @endif" href="{{ route('posts.home') }}">home</a>
        </li>

        @if(isset($subjects))
        <li class="nav-item dropdown d-flex">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            assuntos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($subjects as $subject)
              <li><a class="dropdown-item" href="{{ route('posts.subject', $subject->id) }}">{{$subject->name}}</a></li>
            @endforeach
          </ul>
        </li>
        @endif

        {{--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            assuntos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($subjects as $subject)
              <li><a class="dropdown-item" href="{{ route('posts.subject'), $subject }}"> {{$subject->name}} </a></li>
        @endforeach
      </ul>
      </li> --}}
      <li class="nav-item">
        @yield('navbar')
      </li>
      </ul>

      <ul>
        <li class="nav-item dropdown d-flex">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('users.profile', Auth::user()->id) }}">perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('users.logout') }}">sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div style="margin-top: 1rem">

  {{-- Content --}}
  @yield('content')
</body>
</html>
