<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
include_once('bd/conexao.php');
include_once('bd/estados.php');

if (isset($_GET['id']) && $_GET['id'] != '') {
  $sql_forne = "SELECT * FROM fornecedores WHERE id = " .  $_GET['id'];
  $qr_forne = mysqli_query($conexao, $sql_forne);
  $fornecedor = mysqli_fetch_assoc($qr_forne);

}else{ 
$fornecedor ='';

}
?>

<div class="col">
<h2>Novo Fornecedor</h2>
<?php include_once('layout/mensagens.php'); ?>
   <div class="row "> 
    <div class="offset-9 col-3 w-100">
      
    <a href="javascript:history.back(-1)" title="" class="btn btn-secondary w-100 ">
         <i class="fas fa-arrow-left"></i> Voltar
         </a>
       </div>
    </div>
  <div class="card">
    <div class="card-body">
     <form action="gerencia_fornecedores.php?acao=salvar" method="post">
       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cpf">CNPJ:</label>
             <input type="text" name="cpf" id="cnpj" class="form-control cnpj" value="<?php echo ($fornecedor != '' ? $fornecedor['cnpj'] : ''); ?>">
             <input type="hidden" name="id" value="<?php echo ($fornecedor != '' ? $fornecedor['id'] : ''); ?>" placeholder="">
           </div>
         </div>
         <div class="col-md-9 col-sm-12">
           <div class="form-group">
             <label for="fantasia">Fantasia:</label>
             <input type="text" name="fantasia" id="fantasia" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['fantasia'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-12 col-sm-12">
           <div class="form-group">
             <label for="razao_social">Razão Social:</label>
             <input type="text" name="razao_social" id="razao_social" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['razao_social'] : ''); ?>">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="telefone">Telefone:</label>
             <input type="text" name="telefone" id="telefone" class="form-control fone" value="<?php echo ($fornecedor != '' ? $fornecedor['telefone'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="email">E-mail:</label>
             <input type="email" name="email" id="email" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['email'] : ''); ?>">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12 col-sm-12">
           <div class="form-group">
             <label for="nome_contato">Nome do Contato:</label>
             <input type="text" name="nome_contato" id="nome_contato" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['nome_contato'] : ''); ?>">
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cep">CEP:</label>
             <input type="text" name="cep" id="cep" class="form-control cep" value="<?php echo ($fornecedor != '' ? $fornecedor['cep'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="logradouro">Logradouro:</label>
             <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['logradouro'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="numero">Número:</label>
             <input type="text" name="numero" id="numero" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['numero'] : ''); ?>">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="complemento">Complemento:</label>
             <input type="text" name="complemento" id="complemento" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['complemento'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="bairro">Bairro:</label>
             <input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['bairro'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cidade">Cidade:</label>
             <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo ($fornecedor != '' ? $fornecedor['cidade'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-2 col-sm-12">
           <div class="form-group">
             <label for="estado">Estado:</label>
             <select name="estado" class="form-control" id="estado">
               <option value=""></option>
               <?php foreach ($estados as $estado) : ?>
                 <option value="<?php echo $estado['sigla'] ?>" <?php echo ($fornecedor != '' && $fornecedor['estado'] == $estado['sigla'] ? 'selected' : '') ?>><?php echo $estado['sigla'] ?></option>
               <?php endforeach; ?>
             </select>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col">
           <button type="submit" class="btn btn-primary w-100"> <i class="fas fa-save"></i> Salvar</button>
         </div>
       </div>

     </form>


    </div>
  </div>
</div>
       <?php 

       include_once('layout/footer.php');

        ?>