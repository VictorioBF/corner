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
  <div class="card" style="width: 32rem; margin: auto; margin-top: 4rem;">
    <div class="card-body">
      <form method="post" action="{{ route('users.new') }}">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">nome</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
          <label for="username" class="form-label">nome de usuário</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">e-mail</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">senha</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="mb-3">
          <label for="repeatpassword" class="form-label">repita a senha</label>
          <input type="password" class="form-control" id="repeatpassword" name="repeatpassword">
        </div>

        <div class="mb-3">
          <a type="submit" role="button" class="btn btn-danger" href="{{ route('users.login') }}">voltar</a>
          <button type="submit" class="btn btn-primary">registrar</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
