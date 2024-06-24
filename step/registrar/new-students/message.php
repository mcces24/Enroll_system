<?php
if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
?>
  <script>
    swal({
      title: "<?php echo $_SESSION['message'] ?>",
      text: "Have a nice day!",
      icon: "<?php echo $_SESSION['message_icon'] ?>",
      button: "OKAY",
    });
  </script>
<?php
  unset($_SESSION['message']);
}
?>