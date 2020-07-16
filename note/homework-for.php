<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

.table{
    margin: 0 auto;
}
.box{
    border:solid 1px #ccc;
    color: lightseagreen;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    padding: 8px;
}
</style>
</head>

<body>
    <table class="table" >
        <?php for($i=1; $i<10; $i++): ?>
            
               
            <tr >

            <?php for($j=1; $j<10; $j++): ?>
                
                <td class="box"><?= sprintf('%s * %s = %s <br>', $i, $j, $i*$j); ?></td>
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