<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="./style/style.css">

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body class="body">
        <div class="container formLogin" style="max-width: 500px;">
            <h1>LOGIN</h1>
            <form>
                <div class="mb-3">
                    <label for="exampleInputUser1" class="form-label">Usuário:</label>
                    <input type="text" class="form-control" id="exampleInputUser1" aria-describedby="userHelp" placeholder="usuário">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="********">
                </div>
                <button type="submit" class="btn btn-primary container">Entrar</button>
            </form>
        </div>
    </body>
</html>