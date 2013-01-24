          //Quantum Fractal  http://quantumfractal.blogspot.com/2012/02/quantum-squiggle-kineticjs-demo.html
          Kinetic.QSquiggle = function(config){
              this.points = config.points;
              this.outerRadius = config.outerRadius;
              this.innerRadius = config.innerRadius;
              
              config.drawFunc = function(){
                  var context = this.getContext();
                  var pts = this.points;
                  var inR = this.innerRadius;
                  var outR = this.outerRadius;
                  var rot = this.rotation;

                  context.beginPath();
                for (var x = 0; x < this.points * 2; x += 2) {
                    context.bezierCurveTo(/*x*/inR* Math.cos(x * Math.PI / pts +  rot), /*y*/inR* Math.sin(x * Math.PI / pts +  rot), 
                      /*x*/ outR * Math.cos((x + 1) * Math.PI / pts +  rot), /*y*/ outR * Math.sin((x + 1) * Math.PI / pts +  rot), 
                      /*x*/inR* Math.cos((x + 2) * Math.PI / pts +  rot), /*y*/inR* Math.sin((x + 2) * Math.PI / pts +  rot));
                  }
                context.closePath(); // complete squiggle shape
                this.fillStroke();
              };
              
              // call super constructor
              Kinetic.Shape.apply(this, [config]);
          };

          /*
           * Squiggle methods
           */
          Kinetic.QSquiggle.prototype = {
              setPoints: function(points){
                  this.points = points;
              },
              getPoints: function(){
                  return this.points;
              },
              setOuterRadius: function(radius){
                  this.outerRadius = radius;
              },
              getOuterRadius: function(){
                  return this.outerRadius;
              },
              setInnerRadius: function(radius){
                  this.innerRadius = radius;
              },
              getInnerRadius: function(){
                  return this.innerRadius;
              }
          };

          //extend Geometry
          Kinetic.GlobalObject.extend(Kinetic.QSquiggle, Kinetic.Shape);


