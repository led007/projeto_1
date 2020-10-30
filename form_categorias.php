<?php 
include_once('bd/conexao.php');

if(isset($_GET['id']) && $_GET['id'] != '') {

  $sql = "SELECT * FROM categoria WHERE id = " . $_GET['id'];
  $qr = mysqli_query($conexao, $sql);
  $categoria = mysqli_fetch_array($qr);

} else {
  $categoria = '';
}

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
             <input type="text" name="categoria" id="categoria" class="form-control" value="<?php echo ( isset($categoria['categoria']) ? $categoria['categoria'] : ''); ?>">
             <input type="hidden" name="id" value="<?php echo (isset($categoria['id']) ? $categoria['id'] : ''); ?>" placeholder="">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="tipo">Tipo:</label>
             <select name="tipo" class="form-control">
               <option value="Equipamentos" <?php echo (isset($categoria['tipo']) && $categoria['tipo'] == 'Equipamentos' ? 'selected' : ''); ?>>Equipamentos</option>
               <option value="Produtos" <?php echo (isset($categoria['tipo']) &&  $categoria['tipo'] == 'Produtos' ? 'selected' : ''); ?>>Produtos</option>
               <option value="Serviços" <?php echo (isset($categoria['tipo']) &&  $categoria['tipo'] == 'Serviços' ? 'selected' : ''); ?>>Serviços</option>
               option
             </select>
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