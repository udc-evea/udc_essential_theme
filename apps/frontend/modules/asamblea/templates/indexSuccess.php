<h1 class="alert-heading"><?php echo $ente->getNombreFantasia() ?></h1>

<h3>Lista de Asambleas del Ejercicio Economico: <?php echo $Ejercicio->getNumeroEjercicioEconomico() ?></h3>

<table class="table table-bordered">
  <thead style="background: #7FDDCA">
    <tr>
      <th>Tipo asamblea</th>
      <th>Fecha asamblea</th>
      <th>Observaciones</th>      
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Asambleas as $Asamblea): ?>
    <tr>
      <td><?php if($Asamblea->getTipoAsambleaId()==1){
              echo "Ordinaria";
          }else{
              echo "Extraordinaria";
          } ?>
      </td>      
      <td><?php echo $Asamblea->getFechaDeAsamblea('d-m-Y') ?></td>
      <td><?php echo $Asamblea->getObservaciones() ?></td>
      <td>          
          <a class="btn btn-warning btn-mini" href="<?php echo url_for('asamblea/edit?id_asamblea='.$Asamblea->getIdAsamblea()) ?>"><i class="icon-pencil icon-white"></i>Modificar</a>
          <?php echo link_to('<i class="icon-trash icon-white"></i>Eliminar', 'asamblea/delete?id_asamblea='.$Asamblea->getIdAsamblea(), array('method' => 'delete', 'confirm' => 'Esta seguro de eliminar la Asamblea?', 'class'=>"btn btn-danger btn-mini")) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a class="btn btn-success" href="<?php echo url_for('personaJuridica/index?ente='.$ente->getNombreFantasia()) ?>"><i class="icon-arrow-left icon-white"></i>Volver al Ente</a>
<a class="btn btn-success" href="<?php echo url_for('ejercicioEconomico/index?ente='.$ente->getIdPersonaJuridica()) ?>"><i class="icon-arrow-left icon-white"></i>Volver al Historial</a>
<?php if($sf_user->isAuthenticated()):?>
  <a class="btn btn-info" href="<?php echo url_for('asamblea/new?ejerEcon='.$Ejercicio->getIdEjercicioEconomico()) ?>"><i class="icon-plus-sign icon-white"></i> Nueva Asamblea</a>
<?php endif;?>
