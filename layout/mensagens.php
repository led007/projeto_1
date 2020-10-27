  <?php if(isset($_GET['mensagem'])): ?>
    <div class="alert alert-<?php echo $_GET['alert'] ?? 'success'; ?>" id="alert-mensagem">
      <?php echo $_GET['mensagem']; ?>
    </div>
  <?php endif; ?>