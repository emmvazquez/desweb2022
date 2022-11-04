
<div class="container">
  <div class="row mt-4">
    <div class="col"></div>
    <div class="col-6">
        <form action="<?=base_url('index.php/Usuario/login') ?>" method="POST">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="Correo"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
           
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="Pass"class="form-control" id="exampleInputPassword1">
          </div>
          
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
    <div class="col"></div>

  </div>

</div>