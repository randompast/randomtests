
Players = new Meteor.Collection("greeting");

if (Meteor.is_client) {
    var MyTest = {};
    
      var initialize = function() {
        var stage = new Kinetic.Stage({
          container: "container",
          width: 578,
          height: 200
        });

        MyTest.layer = new Kinetic.Layer();
       
        MyTest.rect = new Kinetic.Rect({
          x: 0,
          y: 75,
          width: 100,
          height: 50,
          fill: "#00D2FF",
          stroke: "black",
          strokeWidth: 4,
          draggable: true
        });

        MyTest.rect.on("dragmove", function() {
          Players.update({name: "Rect"}, {$set: {xpos: this.attrs.x}});
        });
        // add the shape to the layer
        MyTest.layer.add(MyTest.rect);

        // add the layer to the stage
        stage.add(MyTest.layer);
      };

  Players.find().observe({
    changed: function(new_doc, idx, old_doc) {
      if(MyTest.rect) {
        MyTest.rect.attrs.x = new_doc.xpos;
        MyTest.layer.draw();
      }
    }                      
  });
      
  Template.hello.greeting = function () {
    return "Welcome to freshapp.";
  };

  Template.hello.events = {
    'click input' : function () {
      initialize();
    }
  };
}


if (Meteor.is_server) {
  Meteor.startup(function () {
    // code to run on server at startup
    if (Players.find().count() === 0) {
      var names = ["Rect",
                   "Rect1",
                   "Rect2"];
      for (var i = 0; i < names.length; i++)
        Players.insert({name: names[i], xpos: 100});
    }
  });
}
