<?php
include_once '../MainFunction.php';
if (isStudentLogin()) {
  header("Location: ./students/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800&display=swap" rel="stylesheet" />
  <!-- Line Awesome CDN Link -->
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image" href="../icon.png">
  <link rel="stylesheet" type="text/css" href="../loader/styles.css" />
  <title>LOGIN | Madridejos Community College</title>

  <style>
    body {
        font-family: Arial, sans-serif;
    }

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto; 
        top: calc(50% - 100px);
        padding: 20px;
        position: relative;
        border: 1px solid #888;
        width: 300px; /* Width of the modal */
        text-align: center;
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    }

    button {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    }

    button:hover {
        background-color: #45a049;
    }

    .hide {
        display: none;
    }

  </style>
</head>

<body>

  <div class="loader-wrapper" id="preloader">
    <span class="loader"><span class="loader-inner"></span></span>
  </div>
  
  <div id="myModal" class="modal">
    <div class="modal-content">
        <h2>Select Role</h2>
        <button id="students_btn">Students</button>
        <button id="staff_btn">Staff</button>
    </div>
</div>
  <div class="main-container">
    <img class="logo" src="../icon.png" alt="">
    <h2>Madridejos Community College</h2>
    <div class="radio-buttons">
      <label class="custom-radio students hide" id="students">
        <a href="students/?id=0">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-users"></i>
              <h3>Students Portal</h3>
            </div>
          </span>
        </a>
      </label>
      <label class="custom-radio guidance hide" id="guidance">
        <a href="guidance/home/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-handshake"></i>
              <h3>Guidance Office</h3>
            </div>
          </span>
        </a>
      </label>
      <label class="custom-radio bsit hide" id="bsit">
        <a href="bsit/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-laptop-code"></i>
              <h3>BSIT Portal</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio bsba hide" id="bsba">
        <a href="bsba-fm/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-business-time"></i>
              <h3>BSBA Portal</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio bshm hide" id="bshm">
        <a href="bshm/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-glass-cheers"></i>
              <h3>BSHM Portal</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio beed hide" id="beed">
        <a href="beed/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-pencil-ruler"></i>
              <h3>BEED Portal</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio bsed hide" id="bsed">
        <a href="bsed/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-swatchbook"></i>
              <h3>BSED Portal</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio registrar hide" id="registrar">
        <a href="registrar/home/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-user-plus"></i>
              <h3>Registrar Office</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio id hide" id="id">
        <a href="id/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-camera"></i>
              <h3>ID Section</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio cor hide" id="cor">
        <a href="cor/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-file-alt"></i>
              <h3>COR Section</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio admin hide" id="admin">
        <a href="../admin/">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-cogs"></i>
              <h3>Admin Portal</h3>
            </div>
          </span>
        </a>
      </label>

      <label class="custom-radio home hide" id="home">
        <a href="../">
          <input type="radio" name="radio" />
          <span class="radio-btn"><i class="las la-check"></i>
            <div class="hobbies-icon">
              <i class="las la-home"></i>
              <h3>Back Home</h3>
            </div>
          </span>
        </a>
      </label>


    </div>
  </div>

  <script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function() {
      loader.style.display = "none"
      document.getElementById('myModal').style.display = 'block';
    })

    document.getElementById('students_btn').onclick = function() {
        document.getElementById('students').classList.remove('hide');
        document.getElementById('home').classList.remove('hide');
        document.getElementById('myModal').style.display = 'none';
    };

    document.getElementById('staff_btn').onclick = function() {
        alert('Staff selected!');
    };
  </script>

</body>
</html>
