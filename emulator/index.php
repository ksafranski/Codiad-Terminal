<!--
/*
*  PHP+JQuery Temrinal Emulator by Fluidbyte <http://www.fluidbyte.net>
*
*  This software is released as-is with no warranty and is complete free
*  for use, modification and redistribution
*/
-->
<?php

require_once('../../../common.php');
    
//////////////////////////////////////////////////////////////////
// Verify Session or Key
//////////////////////////////////////////////////////////////////

checkSession();

?>
<!doctype html>

<head>
    <meta charset="utf-8">
    <title>Terminal</title>
    <link rel="stylesheet" href="css/screen.css">
    <script>
        var commands = [];
        var which_command = 0;

        $('#the_input_term').keydown(function (e) {
            if (e.keyCode === 13) {
                commands.push($('#the_input_term').val());
            }
        });

        $(document).keydown(function(e){
            if(e.keyCode == 38 && $("#the_input_term").is(":focus")){
                var cc = (commands.length - which_command++ - 1);
                if(cc >= 0) { $('#the_input_term').value = commands[cc]; }
            } else if(e.keyCode == 40 && $("#the_input_term").is(":focus")) {
                var cc = (commands.length - which_command-- - 1);
                if(cc < commands.length) { $('#the_input_term').value = commands[cc]; }
            }
        });
    </script>
</head>

<body>

    
    <div id="terminal">
    
        <div id="output"></div>
    
        <div id="command">
            <div id="prompt">&gt;</div>
            <input type="text" id='the_input_term'>
        </div>
    
    </div>

    <script src="js/jquery-1.8.2.js"></script>
    <script src="js/system.js"></script>

</body>
</html>
