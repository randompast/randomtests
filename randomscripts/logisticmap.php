
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Flot Examples</title>
    <link href="layout.css" rel="stylesheet" type="text/css">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../excanvas.min.js"></script><![endif]-->
    <script language="javascript" type="text/javascript" src="quantumfractal.info/MathGame/flot/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="quantumfractal.info/MathGame/flot/jquery.flot.js"></script>
    <script language="javascript" type="text/javascript" src="quantumfractal.info/MathGame/flot/jquery.flot.resize.js"></script>
    <style type="text/css">
    html, body {
        height: 100%; /* make the percentage height on placeholder work */
    }
    .message {
        padding-left: 50px;
        font-size: smaller;
    }
    </style>
 </head>
 <body>
    <h1>Flot Examples</h1>

    <div id="placeholder" style="width:80%;height:40%;"></div>

    <p class="message"></p>

    <p>Sometimes it makes more sense to just let the plot take up the
    available space. In that case, we need to redraw the plot each
    time the placeholder changes its size. If you include the resize
    plugin, this is handled automatically.</p>

    <p>Try resizing the window.</p>


<script type="text/javascript">
$(function () {
    var d1 = [
							<?php

							$x = 0.00059; 
							$r=4; 

							for($i = 0; $i<200; $i++)
							{ 
								echo "[".$i.", ".$x."],";  
								$x = $r*$x*(1-$x);
							}
							echo "[".$i.", ".$x."]";
							?>
						];



    var d2 = [
							<?php

							$x = 0.00079; 
							$r=4; 

							for($i = 0; $i<200; $i++)
							{ 
								echo "[".$i.", ".$x."],";  
								$x = $r*$x*(1-$x);
							}
							echo "[".$i.", ".$x."]";
							?>
							];
    var d3 = [
							<?php

							$x = 0.00039; 
							$r=4; 

							for($i = 0; $i<200; $i++)
							{ 
								echo "[".$i.", ".$x."],";  
								$x = $r*$x*(1-$x);
							}
							echo "[".$i.", ".$x."]";
							?>
							];

    var placeholder = $("#placeholder");
    
    var plot = $.plot(placeholder, [d1, d2, d3]);
    
    // the plugin includes a jQuery plugin for adding resize events to
    // any element, let's just add a callback so we can display the
    // placeholder size
    placeholder.resize(function () {
        $(".message").text("Placeholder is now "
                           + $(this).width() + "x" + $(this).height()
                           + " pixels");
    });
});
</script>

 </body>
</html>

