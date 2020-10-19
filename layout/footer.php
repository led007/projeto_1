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
  </body>
</html>