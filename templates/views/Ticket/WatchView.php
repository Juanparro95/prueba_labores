<?php require_once INCLUDES."inc_header.php"; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?php echo $d->title.' "'.$d->ticket->name.'"' ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $d->ticket->name ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo URL."progressTicket/show" ?>" method="post" novalidate>
                        <?php echo insert_inputs(); ?>
                        <input type="hidden" id="ticket_id" name="ticket_id" value="<?php echo $d->ticket->ticketid ?>">
                        <div class="form-group">
                            <label for="name">Nombre de la tarea</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Ingrese el nombre de la tarea">
                        </div>
                        <div class="float-right">
                            <button class="btn btn-success" type="submit">A&ntilde;adir</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <?php foreach($d->progressTickets as $progressTicket): ?>
                        <div class="time-label">
                            <span
                                class="bg-red"><?php echo date("Y-m-d", strtotime($progressTicket->created_at))." - ".$progressTicket->name ?>
                            </span>
                            <div class="icheck-primary d-inline ml-2">
                                <input <?php echo ($progressTicket->status == 1) ? "checked" : "" ?> type="checkbox"
                                    onclick="cambiarEstado(this.name, this.checked)"
                                    name="<?php echo $progressTicket->progressticketid ?>"
                                    id="check<?php echo $progressTicket->progressticketid ?>">
                                <label for="check<?php echo $progressTicket->progressticketid ?>">Terminado</label>
                            </div>
                        </div>
                        <div id="commentsAuto<?php echo $progressTicket->progressticketid ?>"
                            data-id="<?php echo $progressTicket->progressticketid ?>"></div>

                        <div>
                            <i class="fas fa-comments bg-yellow"></i>
                            <div class="timeline-item">
                                <h3 class="timeline-header">Ingrese sus avances</h3>
                                <form id="progressForm<?php echo $progressTicket->progressticketid ?>"
                                    onsubmit="agregarNuevoComentario(event, this.id); return">
                                    <div class="timeline-body">
                                        <div class="form-group p-5">
                                            <input type="hidden" id="progress_id" name="progress_id"
                                                value="<?php echo $progressTicket->progressticketid ?>">
                                            <textarea name="comments" placeholder="Ingrese sus comentarios"
                                                id="comments" cols="30" rows="5" class="form-control"></textarea>

                                            <button type="submit" class="mt-3 btn btn-warning btn-sm">Enviar
                                                Comentario</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php endforeach ?>
                        <!-- timeline item -->

                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>

                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
</div>

<?php require_once INCLUDES."inc_footer.php"; ?>