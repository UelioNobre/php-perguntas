<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Questionário</title>
</head>

<body>

  <div class="container">
    <h1 class="my-4">Questionário processo seletivo</h1>
    <!-- Pergunta 1 -->
    <div class="card mb-4">
      <div class="card-header">Pergunta 01 - Dicotomica</div>
      <div class="card-body">
        <h5 class="card-title">Masculino é feminino?</h5>
        <form action="#">
          <div class="form-check">
            <input type="radio" name="alt_per_001" id="op1">
            <label for="op1" class="col-1">Sim</label>
          </div>
          <div class="form-check">
            <input type="radio" name="alt_per_001" id="op2">
            <label for="op2" class="col-1">Não</label>
          </div>
        </form>
      </div>
    </div>

    <!-- Pergunta 2 -->
    <div class="card mb-4">
      <div class="card-header">Pergunta 02 - Multipla Escolha</div>
      <div class="card-body">
        <h5 class="card-title">Estados da Região Nordeste.</h5>
        <form action="#">
          <div class="form-check">
            <input type="checkbox" name="p21" id="p21">
            <label for="p21" class="col-1">Ceará</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="p22" id="p22">
            <label for="p22" class="col-1">Amapá</label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="p23" id="p23">
            <label for="p23" class="col-1">Maranhão</label>
          </div>
        </form>
      </div>
    </div>

    <!-- Pergunta 3 -->
    <div class="card mb-4">
      <div class="card-header">Pergunta 03 - Entrada de Texto Simples</div>
      <div class="card-body">
        <h5 class="card-title">Informe o nome de uma operação simples de matemática.</h5>
        <form action="#">
          <div class="mb-3 row">
            <div class="col-sm-12">
              <input type="text" class="form-control" id="p31" placeholder="Insira a resposta aqui.">
            </div>
          </div>
        </form>
      </div>
    </div>


    <!-- Pergunta 4 -->
    <div class="card mb-4">
      <div class="card-header">Pergunta 04</div>
      <div class="card-body">
        <h5 class="card-title">Informe o nome de uma operação simples de matemática.</h5>
        <form action="#">
          <div class="mb-3 row">
            <div class="col-sm-12">
              <input type="text" class="form-control" id="p31" placeholder="Insira a resposta aqui.">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>