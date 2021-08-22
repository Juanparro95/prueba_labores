<?php require_once INCLUDES."inc_header_log.php"; ?>

<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Workvance</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <?php echo Flasher::flash();?>
            <div class="AlertasMensajes"></div>
            <p class="login-box-msg">Ingrese sus datos para entrar a la plataforma.</p>


            <form action="Login/Show" method="post" novalidate>
                <?php echo insert_inputs(); ?>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo electr&oacute;nico">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Ingrese su contrase&ntilde;a" id="password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesi&oacute;n</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
            <br>
            <p class="mb-1">
                <a href="forgot-password.html">He perdido mi contrase&ntilde;a</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Registrarme</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<?php require_once INCLUDES."inc_footer_log.php"; ?>