<!--
  @project    Pure CSS Radio Button Tiles
  @author     Jamshid Elmi
  @created    2022-09-18 13:19:39
  @modified   2022-09-18 13:19:39
  @tutorial   https://youtu.be/UShd9wHTR-o
-->
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
  <title>LOGIN | Madridejos Community College</title>
</head>

<body>

  <div class="loader-wrapper" id="preloader">
    <span class="loader"><span class="loader-inner"></span></span>
  </div>
  <link rel="stylesheet" type="text/css" href="../loader/styles.css" />
  <script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function() {
      loader.style.display = "none"
    })
  </script>
  <div class="main-container">
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


</body>

</html>