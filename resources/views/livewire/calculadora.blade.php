<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <form>
        <!-- BINARIO A ENTERO -->
        <div class="col-lg-12">
          <h3>Convertir binario a decimal</h3>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="">Binario</label>
            <input type="text" class="form-control" id="binario" placeholder="Digite...">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="">Decimal</label>
            <input type="text" class="form-control" readonly="" id="entero" placeholder="Resultado">
          </div>
        </div>

        <!-- ENTERO A BINARIO -->
        <div class="col-lg-12">
          <h3>Convertir decimal a binario</h3>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="">Decimal</label>
            <input type="text" class="form-control" id="decimal" placeholder="Digite...">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="">Binario</label>
            <input type="text" class="form-control" readonly="" id="entero_conv" placeholder="Resultado">
          </div>
        </div>

        <!-- SUMA DE BINARIOS -->
        <div class="col-lg-12">
          <h3>Suma de binarios</h3>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="">Binario 1</label>
            <input type="text" class="form-control sumbin1" id="" placeholder="Digite...">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="">Binario 2</label>
            <input type="text" class="form-control sumbin2" id="" placeholder="Resultado">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <label for="">Resultado en binario:</label>
            <input type="text" class="form-control ressuma" readonly="" id="" placeholder="Resultado">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <label for="">Resultado en decimal:</label>
            <input type="text" class="form-control ressumadec" readonly="" id="" placeholder="Resultado">
          </div>
        </div>

        <!-- RESTA DE BINARIOS -->
        <div class="col-lg-12">
          <h3>Resta de binarios</h3>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="">Binario 1</label>
            <input type="text" class="form-control restabin" id="" placeholder="Digite...">
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            <label for="">Binario 2</label>
            <input type="text" class="form-control restabin2" id="" placeholder="Resultado">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <label for="">Resultado binario</label>
            <input type="text" class="form-control restatotal" readonly="" id="" placeholder="Resultado">
          </div>
        </div>
        <div class="col-lg-2">
          <div class="form-group">
            <label for="">Resultado decimal</label>
            <input type="text" class="form-control restadec" readonly="" id="" placeholder="Resultado">
          </div>
        </div>

      </form>
    </div>
  </div>
</div>