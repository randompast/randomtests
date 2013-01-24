  function DoStuffForGraph2() {
    listeners = [];
    var WIN;
    var stage = new Kinetic.Stage("container", 800, 800);
    var layer = new Kinetic.Layer();
    var lineLayer = new Kinetic.Layer();
    var complexText = new Array();
    var statements = [ "Yes!", "Find the peak of the mountain!", "Radical!", "Totally Rhombus!", "Mathematical!",
                       "Along the Y-axis", "The river flows downhill.", "That is illogical.",
                       "Order These Boxes", "Look for the edge." ];

    //Make the Text fields.
    for (var i = 0; i < 10; i++) {
      complexText[i] = createText(Math.random()*(stage.width-200)+100,  Math.random()*(stage.height-200)+100, statements[i], 15)
      complexText[i].draggable(true);
      layer.add(complexText[i]);
    }

    //link the text fields together
    for (var i = 0; i < 10; i++) {
      if (i - 1 >= 0) {
        complexText[i].before = complexText[i - 1];
      }
      if (i + 1 < 10) {
        complexText[i].next = complexText[i + 1];
      }
      //Redraw lines
      addListener(complexText[i], "dragmove", function() {
        Graph2drawLine(this, lineLayer);

        //check for win state
        var checkWin = CheckOrder(complexText);
        console.log(checkWin);
        if (Math.abs(checkWin) === Math.abs(complexText.length - 1))
          winstate(WIN, layer);
      });
    }

    // add the layer to the stage
    stage.add(lineLayer);
    stage.add(layer);
  };


  //Draw lines (just like in the flower tutorial)
  function Graph2drawLine(complexText, lineLayer) {
    var stage = complexText.getStage();
    var context = lineLayer.getContext();

    if (complexText.before == undefined) complexText.before = complexText;
    if (complexText.next == undefined) complexText.next = complexText;

    context.save();
    context.beginPath();
    lineLayer.clear();
    context.strokeStyle = "green";
    context.lineWidth = 10;
    context.moveTo(complexText.x, complexText.y);
    context.lineTo(complexText.before.x, complexText.before.y);
    context.lineTo(complexText.next.x, complexText.next.y);
    context.stroke();
    context.closePath();
    context.restore();
  }
