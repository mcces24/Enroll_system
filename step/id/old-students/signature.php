<?php 

 require_once '../../../database/connection.php';

if(isset($_GET['id']))
{
    $student_id = mysqli_real_escape_string($connection, $_GET['id']);
    $id_number = mysqli_real_escape_string($connection, $_GET['id_number']);
        if(isset($_POST['signaturesubmit'])){ 
            $signature = $_POST['signature'];
            $signatureFileName = uniqid().'.png';
            $signature = str_replace('data:image/png;base64,', '', $signature);
            $signature = str_replace(' ', '+', $signature);
            $data = base64_decode($signature);
            $file = '../upload/'.$signatureFileName;
            file_put_contents($file, $data);
            $msg = "<div class='alert alert-success'>Signature Uploaded</div>";

            $query = mysqli_query($connection,"UPDATE qrcode SET signature='$signatureFileName' WHERE student_id ='$id_number'");

            if($query)
            {
                 $status_type = "Enroll Old Students";
                $query1 = mysqli_query($connection,"UPDATE students SET status_type='$status_type' WHERE id='$student_id'");

                $query2 = mysqli_query($connection,"UPDATE que SET status='5' WHERE student_id='$student_id'");
                $_SESSION['message'] = "Image Upload/Update Successfully";
                
                header("Location: index.php?search=$id_number");
            }
            else
            {
                $_SESSION['messages'] = "Image Upload/Update Successfully";
                $_SESSION['messages_icon'] = 'success';
                header('Location: '. $_SERVER['HTTP_REFERER']);        
            }

            

        } 
}
?>
<html>
<head>
    <title>Student Signature</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image" href="../../../icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        
        

        @media screen and (orientation:portrait) {
         #canvasDiv{
            position: relative;
            border: 2px dashed grey;
            height: 30%;
            width: 100%;
                
        }
        }

        @media screen and (orientation:landscape) {
            #canvasDiv{

            position: relative;
            border: 2px dashed grey;
            height: 100%;
            width: 100%;
            
        }
        }
          
          /* Safari syntax */
:-webkit-full-screen #canvasDiv{
  height: 100%;
    width: 100%;
}


/* IE11 */
:-ms-fullscreen {
  
}

/* Standard syntax */
:fullscreen {
    
}


/* Style the button */
button {
  padding: 20px;
  font-size: 20px;
}

        



    </style>
</head>

<body style="position: fixed; height: 100vh; width: 100%;">
    <div class="">
        <div class="">
            <div class="col-md-12 col-md-offset-0">
                
                <?php echo isset($msg)?$msg:''; ?>
                
                
                <div id="canvasDiv"><div class="button" style="position: absolute;">
                <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
                <button type="button" class="btn btn-success" id="btn-save">Save</button></div></div>
                
                <br>
                
               
                
                <script>
                    var elem = document.documentElement;
                    function openFullscreen() {
                      if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                      } else if (elem.webkitRequestFullscreen) { /* Safari */
                        elem.webkitRequestFullscreen();
                      } else if (elem.msRequestFullscreen) { /* IE11 */
                        elem.msRequestFullscreen();
                      }
                    }

                    function closeFullscreen() {
                      if (document.exitFullscreen) {
                        document.exitFullscreen();
                      } else if (document.webkitExitFullscreen) { /* Safari */
                        document.webkitExitFullscreen();
                      } else if (document.msExitFullscreen) { /* IE11 */
                        document.msExitFullscreen();
                      }
                    }
                    </script>

               
            </div>
            <form id="signatureform" action="" style="display:none" method="post">
                <input type="hidden" id="signature" name="signature">
                <input type="hidden" name="signaturesubmit" value="1">
            </form>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>


    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        function drawLine() {

        context.lineWidth = 6;
         }

         drawLine();
         switch (screen.orientation.type) {
  case "landscape-primary":
    console.log("That looks good.");
    break;
  case "landscape-secondary":
    console.log("Mmmh… the screen is upside down!");
    break;
  case "portrait-secondary":
  case "portrait-primary":
    
        context = canvas.getContext("2d");
        function drawLine() {

        context.lineWidth = 3;
         }

         drawLine();
    break;
  default:
    console.log("The orientation API isn't supported in this browser :(");
}
       
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();

            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        $(document).on('click', '#btn-save', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);
            $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })

</script>
</html>