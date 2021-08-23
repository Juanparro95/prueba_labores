<?php require_once INCLUDES."inc_header.php"; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $d->title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $d->title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <?php echo Flasher::flash();?>
                    <div class="AlertasMensajes"></div>
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="formSaveTicket">
                                <?php echo insert_inputs(); ?>
                                <input type="hidden" id="project_id" name="project_id"
                                    value="<?php echo $d->project_id;?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Ingrese el nombre del ticket">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Descripci&oacute;n</label>
                                            <textarea class="form-control" rows="3" id="description" name="description"
                                                placeholder="Ingrese los comentarios del ticket"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-block btn-success">A&ntilde;adir</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php require_once INCLUDES."inc_footer.php"; ?>