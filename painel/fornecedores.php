<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<table class="table table-bordered table-hover">
  <thead  class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">nome</th>
      <th scope="col">gmail</th>
      <th scope="col">telefone</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">1</th>
      <td>478689867</td>
      <td>paulo</td>
      <td>paulo1@gmail.com</td>
      <td>9912141516</td>
      <td>
        <button type="submit" class="btn btn-cadastro">editar</button>
        <button type="submit" class="btn btn-danger">excluir</button>
      </td>
    </tr>

    <tr>
      <th scope="row">2</th>
      <td>3241412</td>
      <td>Sergio</td>
      <td>Sergio2@gmail.com</td>
      <td>9912141516</td>
      <td>
        <button type="submit" class="btn btn-cadastro">editar</button>
        <button type="submit" class="btn btn-danger">excluir</button>
      </td>
    </tr>

    <tr>
      <th scope="row">3</th>
      <td>2341312</td>
      <td>Roberto</td>
      <td>Roberto3@gmail.com</td>
      <td>9912141516</td>
      <td>
        <button type="submit" class="btn btn-cadastro">editar</button>
        <button type="submit" class="btn btn-danger">excluir</button>
      </td>
    </tr>

    <tr>
      <th scope="row">4</th>
      <td>2341312</td>
      <td>João</td>
      <td>João4@gmail.com</td>
      <td>9912141516</td>
      <td>
        <button type="submit" class="btn btn-cadastro">editar</button>
        <button type="submit" class="btn btn-danger">excluir</button>
      </td>
    </tr>

  </tbody>
</table>
<button type="submit" class="btn btn-danger" onclick="location.href='cadastroFornecedores.php'">Novo</button>
</body>
</html>