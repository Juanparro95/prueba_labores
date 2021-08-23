<?php require_once INCLUDES."inc_header_log.php"; ?>

<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Workvance</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form id="registrar_usuario">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" id="email"
                        placeholder="Digite su correo electr&oacute;nico">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Digite su nombre">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="lastname" id="lastname"
                        placeholder="Digite sus apellidos">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Digite la contrase&ntilde;a">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="repeat_password" id="repeat_password"
                        placeholder="Digite de nuevo la contrase&ntilde;a">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <select class="custom-select custom-select-lg|custom-select-sm list_companies" name="idCompany"
                        id="idCompany">
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-building"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                Acepto los <a href="#">t&eacute;rminos y condiciones</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Registrarme</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="<?php echo URL."auth"; ?>" class="text-center">Ya tengo una cuenta registrada</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<?php require_once INCLUDES."inc_footer_log.php"; ?>