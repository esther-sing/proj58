<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="info"></div>

    <script>
        const info = document.querySelector('#info');

        const p1 = {
            name: 'peter',
            age: 22
        };
        const p2 = {
            name: 'bill',
            age: 29
        };
        const p3 = {
            name: 'david',
            age: 25
        };

        p1.next = p2;
        p2.next = p3;

        info.innerHTML += JSON.stringify(p1) + '<br>';

        p3.next = p1;

        try {
            // 這裡會出錯,因為p1~p3是一個循環的圈
            info.innerHTML += JSON.stringify(p1) + '<br>';

            //程式執行到錯誤後面就不會執行,123不會顯示
            alert('123');
        } catch (ex) {
            console.log(ex)
        }

        //用try把錯誤程式包起來，後面的程式還是會執行,456會顯示
        alert('456');
    </script>
</body>

</html>