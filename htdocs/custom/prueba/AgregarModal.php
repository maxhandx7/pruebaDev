<div class="modal fade" id="addnew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             
                    <h4 class="modal-title" id="myModalLabel">Agregar nueva persona</h4>
           
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-val" method="POST" action="AgregarNuevo.php" novalidate>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-sm-12 p-2">
                            <input type="text" class="form-control" id="valName" name="txtNom" placeholder="Nombre"  />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 p-2">
                            <input type="text" class="form-control" id="valApell" name="txtApell" placeholder="Apellido"  />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 p-2">
                            <input type="text" class="form-control" id="valMail" name="txtMail" placeholder="Email"  />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 p-2">
                            <input type="text" class="form-control" id="valTel" name="txtTel" placeholder="Telefono"  />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>