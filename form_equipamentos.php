<?php
include_once('bd/conexao.php');
$sql = "SELECT * FROM categoria WHERE tipo = 'Equipamentos'";
$qr  = mysqli_query($conexao, $sql);
$categorias = mysqli_fetch_all($qr, MYSQLI_ASSOC);

if(isset($_GET['id']) && $_GET['id'] != '') {
  $sql_equip = "SELECT * FROM produtos WHERE id = " . $_GET['id'];
  $qr_equip = mysqli_query($conexao, $sql_equip);
  $equipamento = mysqli_fetch_assoc($qr_equip);

} else {
  $equipamento = '';
}

include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>
<div class="col">
  <h2>Novo equipamento</h2>
  <div class="card">
    <div class="card-body">
      <form action="gerencia_equipamentos.php?acao=salvar" method="post">

        <div class="row">
          <div class="col-md-6 col-sm-12 form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" placeholder="Informe o codigo do Produto" class="form-control" value="<?php echo ($equipamento != '' ? $equipamento['codigo'] : ''); ?>">

            <input type="hidden" name="id" value="<?php echo ($equipamento != '' ? $equipamento['id'] : ''); ?>" placeholder="">
          </div>
          <div class="col-md-6 col-sm-12 form-group">
            <label for="categoria_id">Categoria</label>
            <select class="form-control" name="categoria_id">
              <?php foreach($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id'] ?>" 
                  <?php 
                    if($equipamento != '' && $categoria['id'] == $equipamento['categoria_id']) {
                      echo ' selected';
                    }
                  ?>
                 >
                  <?php echo $categoria['categoria'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12 form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="informe o nome do Produto" class="form-control" value="<?php echo ($equipamento != '' ? $equipamento['nome'] : '' ); ?>">
          </div>
          <div class="col-md-4 col-sm-12 form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" min="0.01" name="preco" placeholder="informe o Preço do Produto" class="form-control" value="<?php echo ($equipamento != '' ? $equipamento['preco'] : ''); ?>">
          </div>
          <div class="col-md-4 col-sm-12 form-group">
            <label for="data_compra">Data de compra</label>
            <input type="date" name="data_compra" class="form-control" id="data_compra" readonly value="<?php echo ($equipamento != '' ? substr($equipamento['data_compra'], 0, 10) : date('Y-m-d')); ?>">
          </div>
        </div>
        <div class="row">
         <div class="col">
           <button type="submit" class="btn btn-primary w-100">
            <i class="fas fa-save"></i> Salvar</button>
         </div>
          
        </div>
      </form>
        
      </div>
      
    </div>
    
  </div>
  <?php 
include_once('layout/footer.php');
?>