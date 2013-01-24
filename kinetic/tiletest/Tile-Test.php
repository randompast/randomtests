
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
            function loadImages(sources, callback){
                var images = {};
                var loadedImages = 0;
                var numImages = 0;
                // get num of sources
                for (var src in sources) {
                    numImages++;
                }
                for (var src in sources) {
                    images[src] = new Image();
                    images[src].onload = function(){
                        if (++loadedImages >= numImages) {
                            callback(images);
                        }
                    };
                    images[src].src = sources[src];
                }
            }
            
            window.onload = function(images){
                var canvas = document.getElementById("myCanvas");
                var context = canvas.getContext("2d");
                var tS = 32;
                var cw = 32;
                var ch = 48;
                var sources = {//http://silveiraneto.net/tag/tileset/
                               //https://github.com/silveira/openpixels/blob/master/open_chars.xcf
                    tileSet: "free_tileset_CC.png",
                    spaceguy: "space_guy.png"
                };
                
                loadImages(sources, function(images){
                   for(var j=15; j<24; j++)
                      for(var i=0; i<17; i++)
                        context.drawImage(images.tileSet, (0+tS*i), (0+tS*j), tS, tS, (tS*i), (tS*j), tS, tS);
                   for(var j=0; j<4; j++)
                      for(var i=0; i<3; i++)
                        context.drawImage(images.spaceguy, (0+(cw+4)*i), (7+ch*j), cw, ch, (cw*i), (ch*j), cw, ch);
                });
            };
        </script>
    </head>
    <body onmousedown="return false;">
        <canvas id="myCanvas" width="1000" height="1000">
        </canvas>
    </body>
</html>

