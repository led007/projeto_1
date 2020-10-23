<?php include_once('bd/itens_menu.php'); ?>
<div class="container-fluid">
  <div class="row">
    <div class=" sidebar" id="sidebar">
      <div class="accordion" id="accordionExample">
        <?php foreach($itens_menu as $chave => $menu) : ?>
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#subitens<?php echo $chave; ?>" aria-expanded="true" aria-controls="collapseOne">
                  <i class="fas fa-<?php echo $menu['icon']; ?> icone-sidebar"></i> <?php echo $menu['item'] ?>
                </button>
              </h5>
            </div>
            <div id="subitens<?php echo $chave; ?>" class="collapse <?php echo ($chave == 0 ? 'show' : ''); ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <ul class="nav flex-column menu-lateral">
                  <?php foreach($menu['opcoes'] as $subitem): ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $subitem['link']; ?>"><?php echo $subitem['nome']; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
       

      </div>
    </div>
    <div class="content" id="main-content">
        <div class="row conteudo">