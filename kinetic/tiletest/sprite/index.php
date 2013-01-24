<head>
        <style>
            #container {
                background-image: url('randomgrass1.gif');
                width: 700px;
                height: 700px;
            }

        </style>
<script src="http://www.html5canvastutorials.com/libraries/kinetic-v3.8.3.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script> 
        function loadImages(sources, callback){
            var images = [];
            var loadedImages = 0;
            var numImages = 0;
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
 
        function initStage(images){
            var stage = new Kinetic.Stage("container", 700, 700);
            var spaceGuyGroup = new Kinetic.Group({
                x: 0,
                y: 0
            });
            var layer = new Kinetic.Layer();
            var stuffLayer = new Kinetic.Layer();

            layer.add(spaceGuyGroup);
            stage.add(layer);
            stage.add(stuffLayer);
 
            var spaceGuyImg = new Kinetic.Image({
                x: 0,
                y: 0,
                image: images[7],
                width: 32, //width of sprite
                height: 48,//height of sprite
                name: "image"
            });
 
            spaceGuyGroup.add(spaceGuyImg);
            stage.draw();

              var speed = 2;
              var spriteCols = 3; //3 cols
              var spriteRow = 2;  //3rd row
              var spriteIndex = 1 + spriteCols*spriteRow;
              var count = 0;


                var input = {};
                document.addEventListener('keydown', function (e) {
                    var keyCode = e.which;
                    input[keyCode] = true;
                    count = 10;
                    if (keyCode == 38 || keyCode == 40 || keyCode == 32) e.preventDefault();
                });
                document.addEventListener('keyup', function (e) {
                    var keyCode = e.which;
                    input[keyCode] = false;
                    count = 10;
                });

            stage.onFrame(function(frame){//wasd, arrows
                if(input[40] || input[83])
                  {
                    spaceGuyImg.y += speed;
                    if( !(input[39] || input[68]) && !(input[37] || input[65]) )
                    {
                      spriteRow = 2;
                      if(count > 10)
                        {
                          spaceGuyImg.image = images[spriteIndex];
                          spriteIndex++;
                          count %= count;
                        }
                      if(spriteIndex > spriteCols*spriteRow + (spriteCols-1) || spriteIndex < spriteCols*spriteRow -1)
                        spriteIndex = spriteCols*spriteRow;
                   }
                  }
                if(input[38] || input[87])
                    {
                    spaceGuyImg.y -= speed;
                    if( !(input[39] || input[68]) && !(input[37] || input[65]) )
                    {
                      spriteRow = 0;
                      if(count > 10)
                        {
                          spaceGuyImg.image = images[spriteIndex];
                          spriteIndex++;
                          count %= count;
                        }
                      if(spriteIndex > spriteCols*spriteRow + (spriteCols-1) || spriteIndex < spriteCols*spriteRow -1)
                        spriteIndex = spriteCols*spriteRow;
                    }
                  }
                if(input[39] || input[68])
                    {
                    spaceGuyImg.x += speed;
                    spriteRow = 1;
                    if(count > 10)
                      {
                        spaceGuyImg.image = images[spriteIndex];
                        spriteIndex++;
                        count %= count;
                      }
                    if(spriteIndex > spriteCols*spriteRow + (spriteCols-1) || spriteIndex < spriteCols*spriteRow -1)
                      spriteIndex = spriteCols*spriteRow;
                    }

                if(input[37] || input[65])
                    {
                    spaceGuyImg.x -= speed;
                    spriteRow = 3;
                    if(count > 10)
                      {
                        spaceGuyImg.image = images[spriteIndex];
                        spriteIndex++;
                        count %= count;
                      }
                    if(spriteIndex > spriteCols*spriteRow + (spriteCols-1) || spriteIndex < spriteCols*spriteRow -1)
                      spriteIndex = spriteCols*spriteRow;
                    }
                  if(spaceGuyImg.x > 730)
                    spaceGuyImg.x -= 745;
                  if(spaceGuyImg.y > 700)
                    spaceGuyImg.y -= 715;
                  if(spaceGuyImg.x < -20)
                    spaceGuyImg.x += 700;
                  if(spaceGuyImg.y < -20)
                    spaceGuyImg.y += 700;
                  if(input[32] && count>8)//spacebar
                    {
                      addImagetoMap(spaceGuyImg, stuffLayer);
                    }

                count++;
                stage.draw();
            });

            stage.start();
         }

        function addImagetoMap(spaceGuyImg, stuffLayer) {
          var context = stuffLayer.getContext();
          var tileSet = new Image();
          tileSet.onload = function(){  
            context.drawImage(tileSet, 0, 11*32, 32, 32, spaceGuyImg.x, spaceGuyImg.y + 30, 32, 32);
            console.log("here?");
          };
          tileSet.src = "../free_tileset_CC.png";
        }

        window.onload = function(){
            var sources = [
                "space_guy00.png",
                "space_guy01.png",
                "space_guy02.png",
                "space_guy10.png",
                "space_guy11.png",
                "space_guy12.png",
                "space_guy20.png",
                "space_guy21.png",
                "space_guy22.png",
                "space_guy30.png",
                "space_guy31.png",
                "space_guy32.png",
                "../free_tileset_CC.png"
                    //http://silveiraneto.net/tag/tileset/
                    //https://github.com/silveira/openpixels/blob/master/open_chars.xcf
            ];
            loadImages(sources, initStage);
        };
    </script>
</head>
<body onmousedown="return false;">
    <div id="container">
    </div>
</body>
