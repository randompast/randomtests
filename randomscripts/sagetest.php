<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Sage Cell Server</title>
    <script type="text/javascript" src="http://aleph.sagemath.org/static/jquery.min.js"></script>
    <script type="text/javascript" src="http://aleph.sagemath.org/embedded_sagecell.js"></script>

    <script>
$(function() {
    var makecells = function() {
        sagecell.makeSagecell({
            inputLocation: '#mycell',
            template: sagecell.templates.minimal,
            evalButtonText: 'Make Live'});
    }
    sagecell.init(makecells);
})</script>

 </head>
  <body>
    <div id="mycell"><script type="text/code">
@interact
def _(a=(1,10)):
      print factorial(a)
</script></div>
  </body>
</html>
