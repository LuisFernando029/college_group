<?php
include "Comissionado.php";

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
} else {
    $codigo = '';
}
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
} else {
    $nome = '';
}
if (isset($_POST['valorHora'])) {
    $valorHora = floatval($_POST['valorHora']);
} else {
    $valorHora = 0.0;
}
if (isset($_POST['horasTrabalhadas'])) {
    $horasTrabalhadas = floatval($_POST['horasTrabalhadas']);
} else {
    $horasTrabalhadas = 0.0;
}
if (isset($_POST['vendas'])) {
    $vendas = floatval($_POST['vendas']);
} else {
    $vendas = 0.0;
}

$comissionado = new Comissionado($codigo, $nome, $valorHora, $horasTrabalhadas, $vendas);
?>


<!doctype html>
<html lang="pt-br" data-bs-theme="auto">
  <head><script src="assets/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <link rel="shortcut icon" href="image/calc.png" type="image/x-icon">
    <title>Cálculo Comissionado</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="assets/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

      #codigo:focus , #nome:focus, #hora:focus, #horaTrab:focus, #totalVendas:focus{
        border-color: white;
      }
      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/checkout.css" rel="stylesheet">
  </head>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="#" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img class="bi" width="40" height="32" role="img" aria-label="Bootstrap" src="img/calculadora.png" alt="Imagem Calculadora">
        </a>
      </div>
      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-warning me-2">
        <a href="index.php" style="text-decoration: none; color: white;">Sair</a>
        </button>
      </div>
    </header>
  </div>
  <body class="bg-body-tertiary">    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/calculadora.png" alt="" width="72" height="57">
      <h2>Comissionado</h2>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-warning">Folha de Pagamento</span>
        </h4>

        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Código do funcionário:</h6>
              <small class="text-body-secondary"><?php echo $comissionado->getCodigo(); ?></small>
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Nome completo:</h6>
              <small class="text-body-secondary"><?php echo $comissionado->getNome(); ?></small>
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Valor da hora:</h6>
              <small class="text-body-secondary"><?php echo $comissionado->getValorHora(); ?></small>
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Horas trabalhadas:</h6>
              <small class="text-body-secondary"><?php echo $comissionado->getHorasTrabalhadas(); ?></small>
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Total de vendas:</h6>
              <small class="text-body-secondary"><?php echo $comissionado->getVendas(); ?></small>
            </div>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Salário Líquido:</h6>
              <small class="text-body-secondary"><strong>R$<?php echo $comissionado->calcularSalario(); ?></strong></small>
            </div>
          </li>

        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <form method="post">
          <div class="row g-3">

            <div class="col-12">

              <div class="input-group">
                <input type="text" name="codigo" class="form-control" id="codigo" placeholder="Código do Comissionado" required>
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do Comissionado" required>
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <input type="text" name="valorHora" class="form-control" id="hora" placeholder="Valor da Hora" required>
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <input type="text" name="horasTrabalhadas" class="form-control" id="horaTrab" placeholder="Horas Trabalhadas" required>
              </div>
            </div>

            <div class="col-12">
              <div class="input-group">
                <input type="text" name="vendas" class="form-control" id="totalVendas" placeholder="Total de Vendas" required>
              </div>
            </div>


          <hr class="my-4">

          <button class="w-100 btn btn-warning btn-lg" type="submit">Calcular</button>
        </form>
      </div>
    </div>
  </main>
<br><br><br><br>
</html>
