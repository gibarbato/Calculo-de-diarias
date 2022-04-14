<html>
        <head>
            <title>Cálculo de Diárias</title>
        </head>
        <body>
            
        <form method=post action="calculoDiariaTratamento.php">
                
                Nome:
                <input type=text name="nome"><br>
                <br>Sobrenome:
                <input type=text name="sobrenome"><br>
                <br>Data saída:
                <input type=date name="dataSaida"><br>
                <br>Hora saída:
                <input type=time name="horaSaida"><br>
                
                <br>Data retorno:
                <input type=date name="dataChegada"><br>
                <br>Hora da chegada:
                <input type=time name="horaChegada"><br>
                
                
                <br>Ocupação:
                <select name= "nivel">
                        <option>Médio</option>
                        <option>Superior</option>
                        <option>Gerência</option>
                        <option>Direção</option>
                        <option>Presidência</option>
                </select><br>

                <br>
                <input type=reset value="Limpar">
                <input type=submit value="Enviar">
                
        </form>





<?php
        

        

?>
        </body>
</html>