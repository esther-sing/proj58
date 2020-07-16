<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
td{
    width: 30px;
    height: 30px;
}

</style>
</head>


<body>
    <table class="table" >
        <?php for($red=0; $red<255; $red+=17): ?>
            
               
            <tr >

            <?php for($green=0; $green<255; $green+=17): ?>
                
                <td style="background-color: #<?= sprintf("%'.06x",$red*256*256 + $green*256) ?>"></td>
               
             <?php endfor ?>  

            </tr>
           
            <?php endfor ?>
    </table>



    <?php
    // printf('%s * %s = %s <br>', 3, 5, 3*5);
    //直接印出來

   

    // $s = sprintf('%s * %s = %s <br>', 7, 8, 7*8);

    // echo $s;
?>
</body>
</html>