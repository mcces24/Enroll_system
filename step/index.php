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
        margin: 0; /* Remove default margin */
        height: 100vh; /* Full height for body */
        display: flex; /* Flexbox for centering */
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
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
        padding: 20px;
        border: 1px solid #888;
        border-radius: 8px; /* Rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Material shadow effect */
        width: 300px; /* Width of the modal */
        text-align: center;
        margin: auto; /* Center the modal content */
    }

    button {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 4px; /* Rounded corners for buttons */
        background-color: #4CAF50; /* Primary button color */
        color: white;
        cursor: pointer;
        transition: background-color 0.3s; /* Smooth transition */
    }

    button:hover {
        background-color: #45a049; /* Darker shade on hover */
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
        <button id="students">Students</button>
        <button id="staff">Staff</button>
    </div>
</div>
  <div class="main-container">
    <img class="logo" src="../icon.png" alt="">
    <h2>Madridejos Community College</h2>
    <div class="radio-buttons">
      <label class="custom-radio">
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
      <label class="custom-radio">
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
      <label class="custom-radio">
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

      <label class="custom-radio">
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

      <label class="custom-radio">
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

      <label class="custom-radio">
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

      <label class="custom-radio">
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

      <label class="custom-radio">
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

      <label class="custom-radio">
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

      <label class="custom-radio">
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

      <label class="custom-radio">
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

      <label class="custom-radio">
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

    document.getElementById('students').onclick = function() {
        alert('Students selected!');
    };

    document.getElementById('staff').onclick = function() {
        alert('Staff selected!');
    };
  </script>

</body>
</html>
