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
        <?php for($i=0; $i<255; $i+=17): ?>
            
               
            <tr >

         
                
                <td style="background-color: #<?= sprintf("%'.06x",$i*256*256) ?>"></td>
                <!-- X16進位  i藍色 / i*256綠色 / i*256*256紅色 -->
              

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