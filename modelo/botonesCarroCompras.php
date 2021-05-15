
<script>
    function borrarDelCarro(idC, idP){
    
        var jsVar1 = idC;
        var jsVar2 = idP;
        window.location.href = window.location.href + "?w1=" + jsVar1 + "&w2=" + jsVar2;
    }
</script>
        
    <?php
        // comprobar si tenemos los parametros w1 y w2 en la URL
        if (isset($_POST["w1"]) && isset($_POST["w2"])) {
            // asignar w1 y w2 a dos variables
            $phpVar1 = $_POST["w1"];
            $phpVar2 = $_POST["w2"];
        
            // mostrar $phpVar1 y $phpVar2
            echo "<p>Parameters: " . $phpVar1 . " " . $phpVar1 . "</p>";
        } else {
            echo "<p>No parameters</p>";
        }
    ?>    



        
            


