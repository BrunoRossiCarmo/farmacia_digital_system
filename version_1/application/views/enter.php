<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://cdn.pixabay.com/photo/2020/08/03/09/39/medical-5459630_960_720.png" class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

          <div class="form-outline mb-5 mt-4">
            <?php if(isset($alerta)){ ?>
                <div class="alert alert-<?php echo $alerta['class']; ?>">
                    <?php echo $alerta['mensagem']; ?>
                </div>
            <?php }?>
           <h1 class="display-8">Farmácia Digital: Bem Vindo!</h1>
          </div>

        <form action="<?php echo base_url('enter/enter_user'); ?>" method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" id="email" name="email" class="form-control form-control-lg" />
            <label class="form-label" for="email">E-mail</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" id="senha" name="senha" class="form-control form-control-lg" />
            <label class="form-label" for="senha">Senha</label>
          </div>

          <div class="d-flex justify-content-around align-items-center mb-4">
            <!-- Checkbox -->
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
                checked
              />
              <label class="form-check-label" for="form1Example3">Lembre de mim</label>
            </div>
            <a href="#!">Esqueceu sua senha?</a>
          </div>

          <!-- Submit button -->
          <button type="submit" name="entrar" value="entrar" class="btn btn-primary btn-lg btn-block float-end">Entrar</button>

        </form>
      </div>
    </div>
  </div>
</section>