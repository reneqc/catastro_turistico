<br>
<br>
<br>
<br>
  <div class="col-md-3"></div>
  <div class="col-md-6">
   <table class="table table-bordered table-hover table-striper">
    <tr>
        <th class="text-center alert-warning" >USERNAME</th>
        <th class="text-center alert-warning" >DESCRIPCION</th>
    </tr>
    <?php foreach($usuarios -> result() as $usuario){
    
 ?>
 <tr>
     <td class="text-center"><?php echo $usuario -> USERNAME;?></td>
     <td class="text-center"><?php echo $usuario -> DES_USU;?></td>
 </tr>
 <?php
}
    ?>
</table>
</div>
<div class="col-md-3"></div>

