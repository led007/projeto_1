<?php
//$senha = 'M0jh#ç54562';

/*if (password_verify('12345', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.'. '<br>';
}*/

/*echo password_hash('$2y$10$dOCWkCgKERjt1h.UxioQ2.LCkmTwdTyS4vPGPtpWk3wH4M0XUE9am', PASSWORD_BCRYPT); exit;*/

  include_once('layout/header.php');
  include_once('layout/menu.php'); 
  include_once('layout/sidebar.php'); 
?>

  <div class="col">
    Conteúdo gerado no dia <?php echo date('d/m/Y H:i') ?>



  </div>
        
<?php include_once('layout/footer.php'); ?>