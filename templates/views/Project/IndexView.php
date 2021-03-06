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
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Lista de todos mis proyectos
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Cod</th>
                                        <th>Nombre Proyecto</th>
                                        <th>Estado</th>
                                        <th colspan="2" style="width: 2px;"><a href="<?php echo URL."project/create"?>"
                                                class="btn btn-info btn-block">Crear Nuevo Proyecto</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($d->projects as $project):?>
                                    <tr>
                                        <td><?php echo $project->projectid ?></td>
                                        <td><?php echo $project->name ?></td>
                                        <td>
                                            <?php switch($project->status){
                                                case 0:
                                                    echo '<small class="badge badge-danger"><i class="far fa-times"></i> Pendiente</small>';
                                                    break;
                                                case 1:
                                                    echo '<small class="badge badge-warning"><i class="far fa-clock"></i> En Progreso</small>';
                                                    break;
                                                case 2:
                                                    echo '<small class="badge badge-sucess"><i class="far fa-check"></i> Terminado</small>';
                                                    break;

                                            } ?>
                                        </td>
                                        <td width="100px">
                                            <a href="<?php echo URL."ticket/index/".$project->slug?>"
                                                class="btn btn-success mb-2">Tickets</a>
                                            <a href="<?php echo URL."ticket/destroy"?>"
                                                class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Cod</th>
                                        <th>Nombre Proyecto</th>
                                        <th>Estado</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php require_once INCLUDES."inc_footer_projects.php"; ?>