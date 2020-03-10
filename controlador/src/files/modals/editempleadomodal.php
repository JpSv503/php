<div class="modal fade" id="frmModalEditDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form action="../controlador/EmpleadoController.php" id="myform" method="POST">
                        <div id="f"></div>
                            <div class="form-group">
                                <label for="id_empleado">Id</label>

                                <input type="text" id="id_empleado" name="id_empleado"
                                class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>

                                <input type="text" id="nombre" name="nombre"
                                class="form-control" placeholder="Nombre">
                            </div>
                            <div>
                                <label for="id_dep">Departamanto</label>
                                <select name="id_dep" id="id_dep" class="form-control">
                                    <option value="none">Seleccione...</option>
                                    <?php
                                        foreach($dep as $value){
                                            echo "<option value=".$value["id_dep"].">".$value["nombre"]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                                <br>
                            <input type="button" name="modificar" value="Save"
                            class="btn btn-primary btn-block text center">
                            <br>
                        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
