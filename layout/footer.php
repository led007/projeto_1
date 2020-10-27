        </div>

        </div>
        
        </div>

      </div>
    </div>

    <div id="carregando">
      <img src="img/loading.gif" class="loading"/>
    </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.maskedinput.js"></script>
    <script>
      $('#toggle').click(function() {
        $('#sidebar').toggle('slide');
          $('.content').animate({
              'margin-left' : $('.content').css('margin-left') == '230px' ? '0px' : '230px'
          }, 300);
      });

      $('.cpf').mask('999.999.999-99');
      $('.fone').mask('(99) 99999-9999');
      $('.cep').mask('99999-999');

      <?php if(isset($_GET['mensagem'])): ?>
        setTimeout(function(){
          $('#alert-mensagem').fadeOut();
          window.location.href =  window.location.href.split("?")[0];
        }, 5000);
     <?php endif; ?>

     

     $('.cep').on('change', function() {
      var cep = $(this).val();

      $.ajax({
        url: `http://viacep.com.br/ws/${cep}/json/`,
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
          $('#carregando').fadeIn();

          $('#logradouro').val('');
          $('#complemento').val('');
          $('#bairro').val('');
          $('#cidade').val('');
          $('#estado').val('');
        }
      })
      .done(function(resultado) {
        if(resultado.erro) {
          alert('CEP não encontrado! Por favor digite um válido.')
          $('#cep').val('');
          $('#logradouro').val('');
          $('#complemento').val('');
          $('#bairro').val('');
          $('#cidade').val('');
          $('#estado').val('');

          return;
        }

        $('#logradouro').val(resultado.logradouro);
        $('#complemento').val(resultado.complemento);
        $('#bairro').val(resultado.bairro);
        $('#cidade').val(resultado.localidade);
        $('#estado').val(resultado.uf);

        $('#numero').focus();

      })
      .fail(function() {
        alert('Digite um CEP válido!');
        $('#cep').focus();
      }).always(function() {
        $('#carregando').fadeOut();

      });
      
     })
    </script>
  </body>
</html>