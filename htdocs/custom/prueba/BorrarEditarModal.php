<div class="modal fade" id="edit_<?php echo $row['rowid']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             
                    <h4 class="modal-title" id="myModalLabel">Editar</h4>
           
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-val" method="POST" action="EditarRegistro.php?id=<?php echo $row['rowid']; ?>">
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-sm-12 p-2">
                            <input type="text" class="form-control" id="valName" name="txtUdpNom" value="<?php echo $row['nombre']; ?>"  />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 p-2">
                            <input type="text" class="form-control" id="valApell" name="txtUdpApell" value="<?php echo $row['apellido']; ?>"  />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 p-2">
                            <input type="text" class="form-control" id="valMail" name="txtUdpMail" value="<?php echo $row['email']; ?>"  />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 p-2">
                            <input type="text" class="form-control" id="valTel" name="txtUdpTel" value="<?php echo $row['tel']; ?>"  />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" data-bs-keyboard="false" id="delete_<?php echo $row['rowid']; ?>" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel3" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
					<h4 class="modal-title" id="myModalLabel">Borrar usuario</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p class="text-center">¿Esta seguro de Borrarlo?</p>
				<h2 class="text-center"><?php echo $row['nombre'] . '<br>' . $row['email']; ?></h2>
			</div>
			<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
				<a href="BorrarRegistro.php?id=<?php echo $row['rowid']; ?>" class="btn btn-danger"> Si</a>
			</div>

		</div>
	</div>
</div>