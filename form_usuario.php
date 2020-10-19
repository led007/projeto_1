<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link rel="stylesheet" href="css/estilo.css">

    <title>Formulário do Novo Usuário</title>
  </head>
  <body style="padding-top:60px;">
    
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top menu-superior">
        <div class="container-fluid">
          <div class="row row-menu-superior">
          <div class="col-md-2">
            
          
          <a class="navbar-brand" href="index.html">
            <img src="img/laborus.png" height="36px" alt="">
          </a>
        </div>
        <div class="col-md-10">
          
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação menu">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#" id="toggle"><i class="fas fa-bars icone-sidebar"></i></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Inicial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Mensagens</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Configurações</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Ação</a>
                <a class="dropdown-item" href="#">Outra ação</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Algo mais aqui</a>
              </div>
            </li>

          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>

          <div class="profile">
            <div class="dropdown">
              <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="img/avatar.jpg" alt="">
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Alguma ação</a>
                <a class="dropdown-item" href="#">Outra ação</a>
                <a class="dropdown-item" href="#">Sair</a>
              </div>
            </div>
            
          </div>
        </div>
        </div>
        </div>
        </div>
      </nav>

    <div class="container-fluid">
      <div class="row">

        <div class=" sidebar" id="sidebar">

          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-clipboard icone-sidebar"></i> Cadastro
                  </button>
                </h5>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <ul class="nav flex-column menu-lateral">
                    <li class="nav-item"><a class="nav-link" href="clientes.html">Cliente</a></li>
                    <li class="nav-item"><a class="nav-link" href="fornecedores.html">Fornecedor</a></li>
                    <li class="nav-item"><a class="nav-link" href="colaboradores.html">Colaborador</a></li>
                    <li class="nav-item"><a class="nav-link" href="equipamentos.html">Equipamento</a></li>
                    <li class="nav-item"><a class="nav-link" href="produtos.html">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="servicos.html">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link" href="categorias.html">Categorias</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-folder-open icone-sidebar"></i> Documentos
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <ul class="nav flex-column menu-lateral">
                    <li class="nav-item"><a class="nav-link" href="#">Lista mestra</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Documentos externos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Procedimentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Instruções de trabalho</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Obsoletos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Em revisão/Elaboração</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Manuais</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Anexos</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fas fa-edit icone-sidebar"></i> Registros
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <ul class="nav flex-column menu-lateral">
                    <li class="nav-item"><a class="nav-link" href="#">Organização</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pessoal</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Equipamentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Compras</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Análise crítica de contratos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Reclamações</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Trabalho não conforme</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Controle de registros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Gestão de riscos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Melhorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ações corretivas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Auditorias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Análise crítica pela gerencia</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Plano de ação</a></li>
                    </ul>
                </div>
              </div>
            </div>
          </div>



        </div>
        <div class="content" id="main-content">
          <h2>Novo Usuário</h2>
            <div class="row conteudo">
              <div class="col">
                <div class="card">
                  <div class="card-body">
                   <form>
                   <h5 id="">Dados de Login</h5>
                   <br />
                    <div class="row">
                      <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                          <label for="usuario">Login</label>
                          <input type="text" name="usuario" placeholder="Informe um novo nome de usuário" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                          <label for="senha">Senha</label>
                          <input type="password" name="senha" placeholder="Informe uma senha" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                          <label for="senha">Confirmação de Senha</label>
                          <input type="password" name="senha" placeholder="Confirme sua senha" class="form-control">
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
                           <input type="text" name="cpf" id="cpf" class="form-control">
                         </div>
                       </div>
                       <div class="col-md-9 col-sm-12">
                         <div class="form-group">
                           <label for="nome">Nome:</label>
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
                              <option value="MG">MG</option>
                              <option value="MS">MS</option>
                              <option value="MT">MT</option>
                              <option value="PA">PA</option>
                              <option value="PB">PB</option>
                              <option value="PE">PE</option>
                              <option value="PI">PI</option>
                              <option value="PR">PR</option>
                              <option value="RJ">RJ</option>
                              <option value="RN">RN</option>
                              <option value="RO">RO</option>
                              <option value="RR">RR</option>
                              <option value="RS">RS</option>
                              <option value="SC">SC</option>
                              <option value="SE">SE</option>
                              <option value="SP">SP</option>
                              <option value="TO">TO</option>
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


                  </div>
                </div>
              </div>
            </div>

        </div>
        
        </div>

      </div>
    </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
      $('#toggle').click(function() {
        $('#sidebar').toggle('slide');
          $('.content').animate({
              'margin-left' : $('.content').css('margin-left') == '230px' ? '0px' : '230px'
          }, 300);
      });
     
    </script>
    <script>
      function  busca_endereco(){
        var cep = $('#cep').val();

        $.ajax({
          url: "https://viacep.com.br/ws/"+cep+"/json/",
          success : function(resultado){
            console.log(resultado)
            $("#logradouro").val()resultado.logradouro;
            $("#bairro").val()resultado.bairro;
            $("#cidade").val()resultado.localidade;
            $("#estado").val()resultado.uf;
          }
        });
      }

    </script>
  </body>
</html>