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
                                Lista de todos <?php echo strtolower($d->title) ?>
                            </h3>
                            <?php echo Flasher::flash();?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Cod</th>
                                        <th>Ticket</th>
                                        <th>Estado</th>
                                        <th colspan="2" width="10px">
                                            <form action="<?php echo URL."ticket/create" ?>" method="POST">
                                                <input type="hidden" name="project_id" id="project_id"
                                                    value="<?php echo $d->project_id ?>">
                                                <button class="btn btn-info">Crear Nuevo Ticket</button>
                                            </form>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($d->tickets as $ticket):?>
                                    <tr>
                                        <td><?php echo $ticket->ticketid ?></td>
                                        <td><?php echo $ticket->name ?></td>
                                        <td>
                                            <?php switch($ticket->status){
                                                case 0:
                                                    echo '<small class="badge badge-danger"><i class="far fa-times"></i> Pendiente</small>';
                                                    break;
                                                case 1:
                                                    echo '<small class="badge badge-warning"><i class="far fa-clock"></i> En Progreso</small>';
                                                    break;
                                                case 2:
                                                    echo '<small class="badge badge-success"><i class="far fa-check"></i> Terminado</small>';
                                                    break;

                                            } ?>
                                        </td>
                                        <td width="100px">
                                            <a class="btn btn-info mb-2"
                                                href="<?php echo URL."ticket/view/".$ticket->slug ?>">Ver
                                                Avances</a>
                                            <form action="<?php echo URL."ticket/destroy"?>" method="POST">
                                                <?php echo insert_inputs(); ?>
                                                <input type="hidden" name="idTicket" id="idTicket"
                                                    value="<?php echo $ticket->ticketid; ?>">
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
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