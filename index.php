<?php 
include_once('layout/header.php');
?>

<div class="container-fluid">
  <div class="row">
  	<div class="container">
     <div class="row conteudo">
     	<div class="col-6 offset-3">
     		<div class="card login">
     				<img src="img/laborus.png" alt="" >

     				<h3>Área restrita</h3>
     			<div class="card-body">
     				<?php include_once('layout/mensagens.php'); ?>
     				<div class="mensagem" style="display: none;"></div>

     				<form id="form-login" method="post" onsubmit="return false;">
     					<div class="form-group">
     						<label for="email">E-mail:</label>
     						<input type="text" name="email" id="email" class="form-control " >
     						<div class="invalid-feedback" id="email-invalid" style="display: none;">
					          E-mail obrigatório.
					        </div>
     					</div>
     					<div class="form-group">
     						<label for="senha">Senha:</label>
     						<input type="password" name="senha" id="senha" class="form-control " >
     						<div class="invalid-feedback" id="senha-invalid" style="display: none;">
					          Senha obrigatória.
					        </div>
     					</div>
     					<div class="form-group">
     						
     						<button class="btn btn-primary float-right" onclick="login()">Efetuar login</button>

     						<!-- <button class="btn btn-primary float-right g-recaptcha"  
					        data-sitekey="6LeDI98ZAAAAAPaar8qT6vW3_o1e3sKYl_ocdkv3" 
					        data-callback='onSubmit' 
					        data-action='submit'>Efetuar login</button> -->
     					</div>
     				</form>
     			</div>
     		</div>
     	</div>

<?php 
include_once('layout/footer.php');
//chave de site: 6LeDI98ZAAAAAPaar8qT6vW3_o1e3sKYl_ocdkv3
?>
<script>
	function login() {
		var email = $("#email").val();
		var senha = $("#senha").val();

		if(email == ''){
			$('#email-invalid').show();
			$("#email").addClass('is-invalid');
		}else if(senha == '') {
			$('#email-invalid').hide();
			$("#email").removeClass('is-invalid');
			$("#senha").addClass('is-invalid');
			$('#senha-invalid').show();
		} else {
			
			$.ajax({
				url: 'gerencia_login.php',
				type: 'POST',
				dataType: 'json',
				data: { email: email, senha: senha },
				beforeSend: function() {
					$('#carregando').fadeIn();
					$('.mensagem').fadeIn();
				}
			})
			.done(function(data) {
				var exibirMensagem = `<div class="alert alert-${data.alert}">${data.mensagem}</div>`;
				$('.mensagem').html(exibirMensagem);
				$("#email").val('');
				$("#senha").val('');

				setTimeout(function() {
					window.location.href = "dashboard.php";
				}, 3000);
			})
			.fail(function(data) {
				var exibirMensagem = `<div class="alert alert-${data.responseJSON.alert}">${data.responseJSON.mensagem}</div>`;
				$('.mensagem').html(exibirMensagem);
				$("#senha").val('');
				$("#email").focus();
				$('#carregando').fadeOut();
			});
			
		}
	}
</script>
<!-- <script src="https://www.google.com/recaptcha/api.js"></script>
<script>
   function onSubmit(token) {
     document.getElementById("form-login").submit();
   }
 </script> -->