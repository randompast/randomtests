
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

        MyTest.rect.on("dragend", function() {
          if(Players.findOne({name: "Rect"}))
          //MyTest.rect.attrs.x = 
            console.log(Players.findOne({name: "Rect"}).xpos);

          console.log(this);
          Players.update({name: "Rect"}, {xpos: this.attrs.x});
        });
        // add the shape to the layer
        MyTest.layer.add(MyTest.rect);

        // add the layer to the stage
        stage.add(MyTest.layer);
      };
      
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
      var names = ["Rect"];
      for (var i = 0; i < names.length; i++)
        Players.insert({name: names[i], xpos: 100});
    }
  });
}
