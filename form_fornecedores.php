<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
 ?>

<div class="col">
<h2>Novo Fornecedor</h2>
  <div class="card">
    <a href="javascript:history.back(-1)" title="" class="btn btn-secondary w-25">
      <i class="fas fa-arrow-left"></i> Voltar
      </a>
    <div class="card-body">
     <form>
       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cpf">CNPJ:</label>
             <input type="text" name="cpf" id="cpf" class="form-control">
           </div>
         </div>
         <div class="col-md-9 col-sm-12">
           <div class="form-group">
             <label for="nome">Nome Fantasia:</label>
             <input type="text" name="nome" id="nome" class="form-control">
           </div>
         </div>
         <div class="col-md-12 col-sm-12">
           <div class="form-group">
             <label for="nome">Razão Social:</label>
             <input type="text" name="nome" id="nome" class="form-control">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="telefone">Telefone:</label>
             <input type="text" name="telefone" id="telefone" class="form-control">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="email">E-mail:</label>
             <input type="email" name="email" id="email" class="form-control">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-12 col-sm-12">
           <div class="form-group">
             <label for="convenio">Nome do Contrato:</label>
             <input type="text" name="convenio" id="convenio" class="form-control">
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cep">CEP:</label>
             <input type="text" name="cep" id="cep" class="form-control">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="logradouro">Logradouro:</label>
             <input type="text" name="logradouro" id="logradouro" class="form-control">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="numero">Número:</label>
             <input type="text" name="numero" id="numero" class="form-control">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="complemento">Complemento:</label>
             <input type="text" name="complemento" id="complemento" class="form-control">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="bairro">Bairro:</label>
             <input type="text" name="bairro" id="bairro" class="form-control">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cidade">Cidade:</label>
             <input type="text" name="cidade" id="cidade" class="form-control">
           </div>
         </div>
         <div class="col-md-2 col-sm-12">
           <div class="form-group">
             <label for="estado">Estado:</label>
             <select name="estado" class="form-control" id="estado">
               <option value=""></option>
               <option value="AC">AC</option>
               <option value="AL">AL</option>
               <option value="AP">AP</option>
               <option value="AM">AM</option>
               <option value="BA">BA</option>
               <option value="CE">CE</option>
               <option value="DF">DF</option>
               <option value="ES">ES</option>
               <option value="GO">GO</option>
               <option value="MA">MA</option>
               <option value="MT">MT</option>
               <option value="MS">MS</option>
               <option value="MG">MG</option>
               <option value="PA">PA</option>
               <option value="PB">PB</option>
               <option value="PR">PR</option>
               <option value="PE">PE</option>
               <option value="PI">PI</option>
               <option value="RJ">RJ</option>
               <option value="RN">RN</option>
               <option value="RS">RS</option>
               <option value="RO">RO</option>
               <option value="RR">RR</option>
               <option value="SC">SC</option>
               <option value="SP">SP</option>
               <option value="SE">SE</option>
               <option value="TO">TO</option>
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
