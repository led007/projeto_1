<?php 
include_once('bd/conexao.php');

if(isset($_GET['id']) && $_GET['id'] != '') {
  $sql = "SELECT * FROM clientes WHERE id = " . $_GET['id'];
  $qr = mysqli_query($conexao, $sql);
  $cliente = mysqli_fetch_assoc($qr);

}else {
  $cliente = '';
}

include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
include_once('bd/estados.php');
?>
<div class="col">
  <h2>Novo cliente</h2>
  <?php include_once('layout/mensagens.php'); ?>
  <div class="card">
    <div class="card-body">
     <form method="post" action="gerencia_clientes.php?acao=salvar">
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="cpf">CPF:</label>
             <input type="text" name="cpf" id="cpf" class="form-control cpf" required value="<?php echo ($cliente != '' ? $cliente['cpf'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-8 col-sm-12">
           <div class="form-group">
             <label for="nome">Nome:</label>
             <input type="text" name="nome" id="nome" class="form-control" required value="<?php echo ($cliente != '' ? $cliente['nome'] : ''); ?>">

              <input type="hidden" name="usuario_id" id="usuario" class="form-control" readonly value="<?php echo ($cliente != '' ? $cliente['usuario_id'] : ''); ?>">

              <input type="hidden" name="id" value="<?php echo ($cliente != '' ? $cliente['id'] : ''); ?>" placeholder="">
           </div>
          </div>
         </div>

       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="telefone">Telefone:</label>
             <input type="text" name="telefone" id="telefone" class="form-control fone" value="<?php echo ($cliente != '' ? $cliente['telefone'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="email">E-mail:</label>
             <input type="email" name="email" id="email" class="form-control" required value="<?php echo ($cliente != '' ? $cliente['email'] : ''); ?>">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="convenio">Convênio:</label>
             <input type="text" name="convenio" id="convenio" class="form-control" value="<?php echo ($cliente != '' ? $cliente['convenio'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="num_convenio">Nº Convênio:</label>
             <input type="number" name="num_convenio" id="num_convenio" class="form-control" value="<?php echo ($cliente != '' ? $cliente['num_convenio'] : ''); ?>">
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cep">CEP:</label>
             <input type="text" name="cep" id="cep" class="form-control cep" value="<?php echo ($cliente != '' ? $cliente['cep'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="logradouro">Logradouro:</label>
             <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?php echo ($cliente != '' ? $cliente['logradouro'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="numero">Número:</label>
             <input type="text" name="numero" id="numero" class="form-control" value="<?php echo ($cliente != '' ? $cliente['numero'] : ''); ?>">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="complemento">Complemento:</label>
             <input type="text" name="complemento" id="complemento" class="form-control" value="<?php echo ($cliente != '' ? $cliente['complemento'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="bairro">Bairro:</label>
             <input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo ($cliente != '' ? $cliente['bairro'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cidade">Cidade:</label>
             <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo ($cliente != '' ? $cliente['cidade'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-2 col-sm-12">
           <div class="form-group">
             <label for="estado">Estado:</label>
             <select name="estado" class="form-control" id="estado">
               <option value=""></option>
               <?php foreach ($estados as $estado): ?>
                <option value="<?php echo $estado['sigla'] ?>" <?php echo ($cliente != '' && $cliente['estado'] == $estado['sigla'] ? 'selected' : ''); ?>><?php echo $estado['sigla'] ?></option>
              <?php endforeach; ?>
             </select>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col">
           <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Salvar</button>
         </div>
       </div>

     </form>


    </div>
  </div>
</div>
<?php 
include_once('layout/footer.php');
?>