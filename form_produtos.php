<?php 
include_once('bd/conexao.php');

$sql = "SELECT * FROM categoria WHERE tipo = 'Produtos'";
$qr = mysqli_query($conexao, $sql);
$categorias = mysqli_fetch_all($qr, MYSQLI_ASSOC);

include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
 ?>

<div class="col">
  <h2>Novo Produto</h2>
  <?php include_once('layout/mensagens.php'); ?>
  <div class="card">
    <div class="card-body">
      <form action="gerencia_produtos.php?acao=salvar" method="post">
        <div class="row">
          <div class="col-md-6 col-sm-12 form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" placeholder="Informe o codigo do Produto" class="form-control">
          </div>
          <div class="col-md-6 col-sm-12 form-group">
            <label for="categoria_id">Categoría</label>
            <select class="form-control" name="categoria_id">
              <option value="">Escolha</option>
              <?php foreach($categorias as $categoria): ?>
              <option value="<?= $categoria['id'] ?>"><?= $categoria['categoria'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12 form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="informe o nome do Produto" class="form-control">
          </div>
          <div class="col-md-4 col-sm-12 form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" min="0.01" name="preco" placeholder="informe o Preço do Produto" class="form-control">
          </div>
          <div class="col-md-4 col-sm-12 form-group">
            <label for="data_compra">Data de compra</label>
            <input type="date" name="data_compra" class="form-control" id="data_compra" readonly value="<?php echo date('Y-m-d') ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12 form-group">
            <label for="nome">Estoque</label>
            <input type="number" name="estoque" placeholder="" class="form-control">
              <input type="hidden" name="usuario_id" value="1" >   
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