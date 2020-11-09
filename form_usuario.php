<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
include_once('bd/conexao.php');
include_once('bd/estados.php');

if (isset($_GET['id']) && $_GET['id'] != '') {
  $sql_colab = "SELECT * FROM colaboradores WHERE id = " .  $_GET['id'];
  $qr_colab = mysqli_query($conexao, $sql_colab);
  $colaborador = mysqli_fetch_assoc($qr_colab);

}else{ 
$colaborador ='';

}
 ?>
<div class="col">
   <h2>Novo Usuário</h2>
   <?php include_once('layout/mensagens.php'); ?>
  <div class="card">
    <div class="card-body">
     <form action="gerencia_colaboradores.php?acao=salvar" method="post">
     <h5 id="">Dados de Login</h5>
     <br />
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <div class="form-group">
             <label for="email">E-mail:</label>
             <input type="email" name="email" id="email" class="form-control" required value="<?php echo ($colaborador != '' ? $colaborador['email'] : ''); ?>">
             <input type="hidden" name="id" value="<?php echo ($colaborador != '' ? $colaborador['id'] : ''); ?>" placeholder="">
           </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="Informe uma senha" class="form-control" <?php echo ($colaborador != '' ? '' : ' required'); ?> >
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="form-group">
            <label for="senha">Confirmação de Senha</label>
            <input type="password" name="confirma_senha" placeholder="Confirme sua senha" class="form-control" <?php echo ($colaborador != '' ? '' : ' required'); ?>>
          </div>
        </div>
      </div>
      <hr>
        
      <h5 id="">Dados pessoais</h5>
      <br />
       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cpf">CPF:</label>
             <input type="text" name="cpf" id="cpf" class="form-control cpf" required value="<?php echo ($colaborador != '' ? $colaborador['cpf'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-9 col-sm-12">
           <div class="form-group">
             <label for="nome">Nome:</label>
             <input type="text" name="nome" id="nome" class="form-control" required value="<?php echo ($colaborador != '' ? $colaborador['nome'] : ''); ?>">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="telefone">Telefone:</label>
             <input type="text" name="telefone" id="telefone" class="form-control fone" value="<?php echo ($colaborador != '' ? $colaborador['telefone'] : ''); ?>">
           </div>
         </div>

          <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="cep">CEP:</label>
             <input type="text" name="cep" id="cep" class="form-control cep" value="<?php echo ($colaborador != '' ? $colaborador['cep'] : ''); ?>">
           </div>
         </div>
       </div>
       

       <div class="row">
         
         <div class="col-md-8 col-sm-12">
           <div class="form-group">
             <label for="logradouro">Logradouro:</label>
             <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?php echo ($colaborador != '' ? $colaborador['logradouro'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="numero">Número:</label>
             <input type="text" name="numero" id="numero" class="form-control" value="<?php echo ($colaborador != '' ? $colaborador['numero'] : ''); ?>">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="complemento">Complemento:</label>
             <input type="text" name="complemento" id="complemento" class="form-control" value="<?php echo ($colaborador != '' ? $colaborador['complemento'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="bairro">Bairro:</label>
             <input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo ($colaborador != '' ? $colaborador['bairro'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cidade">Cidade:</label>
             <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo ($colaborador != '' ? $colaborador['cidade'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-2 col-sm-12">
           <div class="form-group">
             <label for="estado">Estado:</label>
             <select name="estado" class="form-control" id="estado">
               <option value=""></option>
               <?php foreach ($estados as $estado) : ?>
                 <option value="<?php echo $estado['sigla'] ?>" <?php echo ($colaborador != '' && $colaborador['estado'] == $estado['sigla'] ? 'selected' : '') ?>><?php echo $estado['sigla'] ?></option>
               <?php endforeach; ?>
             </select>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col">
           <button type="submit" class="btn btn-primary w-100">
            <i class="fas fa-save"></i> Salvar</button>
         </div>

       </div>

     </form>
<!-- <input type="text" name="usuario_id" value="1" placeholder="" >
<input type="text" name="categoria_id" value="1" placeholder=""> -->

    </div>
  </div>
</div>
<?php 
include_once('layout/footer.php');
 ?>