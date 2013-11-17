<head>
        <style>
            #container {
                background-image: url('randomgrass1.gif');
                width: 700px;
                height: 700px;
            }

        </style>
<script src="barkinetic-v3.8.3.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script> 

        window.onload = function(){
          var canvas = document.getElementById("container");
          var context = canvas.getContext("2d");
          var tileSet = new Image();
          tileSet.onload = function(){  
            context.drawImage(tileSet, 50, 50);
          };
          tileSet.src = "space_guy00.png";
        };
    </script>
</head>
<body onmousedown="return false;">
    <canvas id="container"/>
</body>
