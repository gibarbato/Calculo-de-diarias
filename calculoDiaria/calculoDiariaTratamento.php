<html>
        <head>
            <title>Cálculo de Diárias</title>
        </head>
        <body>
                
<?php
        // acessar os dados enviados pelo método POST - supervariável
        // $_POST
       echo "<TABLE>";
                echo "<TR>";
                        echo "<td>Nome informado: </td>" . "<td>" . $_POST["nome"]." " . $_POST["sobrenome"] . "</td><BR><BR>";
                        //echo "Sobrenome informado: "  . "<BR><BR>";
                echo "</TR>";
                echo "<TR>";
                        echo "<td>Data de Saída: </td>" . "<td>" . $_POST["dataSaida"] . "</td><BR><BR>";
                echo "</TR>";
                echo "<TR>";
                        echo "<td>Horário de Saída: </td>" . "<td>" . $_POST["horaSaida"] . "</td><BR><BR>";
                echo "</TR>";
                echo "<TR>";
                        echo "<td>Data da Chegada: </td>" . "<td>" . $_POST["dataChegada"] . "</td><BR><BR>";
                echo "</TR>";
                echo "<TR>";
                        echo "<td>Horário da Chegada: </td>" . "<td>" . $_POST["horaChegada"] . "</td><BR><BR>";
                echo "</TR>";
                echo "<TR>";
                        echo "<td>Tipo de nível: </td>" . "<td>" . $_POST["nivel"] . "</td><BR><BR>";
                echo "</TR>";
        echo "<TABLE>";
        
        echo "<br><br>";
        
        $data1 = strtotime($_POST["dataSaida"]);
        $hora1 = strtotime($_POST["horaSaida"]);
        //echo "data de saída<br>";
        //echo $data1 . "<br>";
        //echo "hora de saída<br>";
        //echo $hora1. "<br>";
        //echo "<br><br>";
        $data2 = strtotime($_POST["dataChegada"]);
        $hora2 = strtotime($_POST["horaChegada"]);
        //echo "data de chegada<br>";
        //echo $data2. "<br>";
        //echo "hora da chegada<br>";
        //echo $hora2. "<br>";
        //
        //echo "<br><br>";
        //
        echo "diferença dos dias <br>";
        $d3 = ($data2 - $data1)/60/60;
        echo $d3. " horas. <br>";
       
        $d3 = ($data2 - $data1)/60/60/24;
        echo $d3. " dia(s). <br>";
        
        //$d3 = ($data2 - $data1)/60/60/24/12;
        //echo $d3. " meses. <br>";
        //
        //$d3 = ($data2 - $data1)/60/60/24/365;
        //echo $d3. " anos. <br>";
       
        echo "<br><br>";
        
                //tratamento dos valores das diárias
        $valorDiaria = 0;
        $tipoNivel = $_POST["nivel"];
        
        if($d3>=1){
                if($tipoNivel=="Médio"||$tipoNivel=="Superior"||$tipoNivel=="Gerência"||$tipoNivel=="Direção")
                {
                        $valorDiaria = 220.00;      
                }
                else if ($tipoNivel=="Presidência")
                {
                        $valorDiaria = 340.00;      
                }   
        }
        else {
                if($tipoNivel=="Médio")
                {
                        $valorDiaria = 100.00;      
                }
                else if ($tipoNivel=="Superior"||$tipoNivel=="Gerência")
                {
                        $valorDiaria = 110.00;      
                }
                else if ($tipoNivel=="Direção")
                {
                        $valorDiaria = 156.00;      
                }
                else if ($tipoNivel=="Presidência")
                {
                        $valorDiaria = 340.00;      
                }        
        }
        
        
        echo "Valor da Diária <br>";
        echo $valorDiaria;
        echo "<br><br>"; 
        
        
        
        echo "CÁLCULO DE DIÁRIAS <br>";
        
        $valorReceber = 0;
        //saída menor que 4 horas
        if(($data2 == $data1) && $hora2>$hora1 && ((($hora2 - $hora1)/60/60)<4))
        {
                echo "A - Limite inferior a 4 horas, solicitação não atendida.<br>";
        }
        //saída maior que 4 horas e menor que 12 horas
        else if (($data2 == $data1) && $hora2>$hora1 && ((($hora2 - $hora1)/60/60)>=4)&&((($hora2 - $hora1)/60/60)<12))
        {
                //echo "Meia diária <br>";
                echo "B - Período da saída: " . (($hora2 - $hora1)/60/60) . " horas<br>";
                $valorReceber = $valorDiaria * 0.5;
                echo "Valor da diária a receber: ". $valorReceber . "<br>";
        }
        //saída maior que 12 horas, mesmo dia
        else if (($data2 == $data1) && $hora2>$hora1 && (($hora2 - $hora1)/60/60)>=12)
        {
                //echo "Uma diária <br>";
                echo "C - Período da saída: " . (($hora2 - $hora1)/60/60) . " horas<br>";
                $valorReceber = $valorDiaria;
                echo "Valor da diária a receber: ". $valorReceber . "<br>";
        }
        //saída com um dia e total inferior ou igual a 24 horas
        else if(($data2 > $data1) && $hora2<=$hora1)
        {
                $h3=(($hora2 - $hora1)/60/60)+24;
                $d3=$d3;
                //echo "saída maior que 12 horas e menor 24<br>";
                echo $h3 . " horas";
                echo "<br><br>"; 
                $valorReceber = $valorDiaria * $d3;
                echo "Valor da diária a receber: ". $valorReceber . "<br>";
        }
        ////saída com um dia e inferior 4 horas (sem meia diária)
        else if(($data2 > $data1) && $hora2>$hora1 && ((($hora2 - $hora1)/60/60)<4))
        {
                $h3=(($hora2 - $hora1)/60/60);
                $d3=$d3;
                //echo "saída maior que 12 horas e menor 24<br>";
                echo "D " . $d3 . " dia(s) e " . $h3 . " horas";
                echo "   - sem meia diária a mais<br><br>"; 
                $valorReceber = $valorDiaria * $d3;
                echo "Valor da diária a receber: ". $valorReceber . "<br>";
        }
        //saída com um dia e entre 4 horas 12 horas (meia diária)
        else if(($data2 > $data1) && $hora2>$hora1  && ((($hora2 - $hora1)/60/60)>=4) && (($hora2 - $hora1)/60/60)<12)
        {
                $h3=(($hora2 - $hora1)/60/60);
                $d3=$d3;
                //echo "saída maior que 1 dia e entre 4 e 12 horas(meia diária)<br>";
                echo "D" . $d3 . " dia(s) e " . $h3 . " horas";
                echo "<br><br>"; 
                $valorReceber = $valorDiaria * $d3 + $valorDiaria * 0.5;
                echo "Valor da diária a receber: ". $valorReceber . "<br>";
        }
        
        
        else if(($data2 > $data1) && $hora2>$hora1  && (($hora2 - $hora1)/60/60)>=12)
        {
                $h3=(($hora2 - $hora1)/60/60);
                $d3=$d3;
                //echo "saída maior que 1 dia e entre 4 e 12 horas(meia diária)<br>";
                echo "G" . $d3 . " dia(s) e " . $h3 . " horas";
                echo "<br><br>"; 
                $valorReceber = $valorDiaria * $d3 + $valorDiaria;
                echo "<h1>Valor da diária a receber: ". $valorReceber . "</h1><br>";
        }
        
        

        
        


        
?>

        </body>
</html>