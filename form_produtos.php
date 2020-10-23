<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
include_once('bd/categorias.php');
 ?>
<div class="col">
  <h2>Novo Produto</h2>
  <div class="card">
    <div class="card-body">
      <form>

        <div class="row">
          <div class="col-md-6 col-sm-12 form-group">
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" placeholder="Informe o codigo do Produto" class="form-control">
          </div>
          <div class="col-md-6 col-sm-12 form-group">
            <label for="categoria">Categoría</label>
            <select class="form-control" name="categoria">
              <option value="">Escolha</option>
              <?php foreach($categorias as $categoria): ?>
              <option value="<?= $categoria['nome'] ?>"><?= $categoria['nome'] ?></option>
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
            <input type="date" name="data_compra" class="form-control" id="data_compra" readonly>
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