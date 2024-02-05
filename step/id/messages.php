    <?php
        if (isset($_SESSION['messages']) && $_SESSION['messages'] !='')
        {
          ?>
          <script>
          swal({
                title: "<?php echo $_SESSION['messages'] ?>",
                text: "Returning Home!",
                icon: "success",
                button: "OKAY",
              });
        </script>
        <?php
        unset($_SESSION['messages']);
        } 
      ?>