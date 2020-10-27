<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>
<div class="col">
  <h2>Nova categoria</h2>
  <div class="card">
    <div class="card-body">
     <form method="post" action="gerencia_categorias.php?acao=salvar">
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="categoria">Categoria:</label>
             <input type="text" name="categoria" id="categoria" class="form-control">
           </div>
         </div>
       </div>
       
       <div class="row">
         <div class="col">
           <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
         </div>
       </div>

     </form>


    </div>
  </div>
</div>
<?php 
include_once('layout/footer.php');