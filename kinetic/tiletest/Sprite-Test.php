<!DOCTYPE HTML>
<html>
    <head>
        <style>
            body {
                margin: 0px;
                padding: 0px;
            }
            
            #myCanvas {
                border: 1px solid #9C9898;
            }
        </style>
    <script>
        window.onload = function(){
            var canvas = document.getElementById("myCanvas");
            var context = canvas.getContext("2d");
            var imageObj = new Image();
            var tS = 32;
            var cw = 32;
            var ch = 48;
            var tileSet = new Image();
            var spaceguy = new Image();


            tileSet.onload = function(){
                // draw cropped image
               for(var x=0; x<32; x++)
                  for(var y=0; y<32; y++)
                    context.drawImage(tileSet, (0+tS*Math.floor(Math.random()*2+5)), (0+tS*Math.floor(Math.random()*2+18)), tS, tS, (tS*x), (tS*y), tS, tS);
               for(var x=0; x<32; x++)
                  for(var y=0; y<32; y++)
                    {
                      y += Math.floor(Math.random()*15)%33;
                      context.drawImage(tileSet, (0+tS*Math.floor(Math.random()*5)), (0+tS*35), tS, tS, (tS*x), (tS*y), tS, tS);
                    }
            };

/*            spaceguy.onload = function(){
               for(var j=0; j<4; j++)
                  for(var i=0; i<3; i++)
                    context.drawImage(spaceguy, (0+(cw+4)*i), (7+ch*j), cw, ch, (cw*i), (ch*j), cw, ch);
            };*/
                //http://silveiraneto.net/tag/tileset/
                //https://github.com/silveira/openpixels/blob/master/open_chars.xcf
                tileSet.src = "free_tileset_CC.png";
                spaceguy.src = "space_guy.png";   
        };
    </script>
    </head>
    <body onmousedown="return false;">
        <canvas id="myCanvas" width="1000" height="1000">
        </canvas>
    </body>
</html>
