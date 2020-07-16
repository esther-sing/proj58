<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="info">
        <script>
            const info = document.querySelector('#info');


            const ar = [1, 2, 3, 4, [5, 6, 7], 8];

            const ar_1 = ar.concat(); //單層拷貝，串接兩個陣列
            const ar_2 = ar.slice(); //單層拷貝
            const ar_3 = [...ar]; //單層拷貝，陣列攤開來
            const ar_4 = JSON.parse(JSON.stringify(ar)); //深層拷貝 ,轉換成字串再轉乘物件

            ar[1] = 'hello';
            ar[4][1] = '熊熊';



            info.innerHTML += JSON.stringify(ar) + '<br>';
            info.innerHTML += JSON.stringify(ar_1) + '<br>';
            info.innerHTML += JSON.stringify(ar_2) + '<br>';
            info.innerHTML += JSON.stringify(ar_3) + '<br>';
            info.innerHTML += JSON.stringify(ar_4) + '<br>';

            //印出來
            //ar  [1,"hello",3,4,[5,"熊熊",7],8]
            //ar_1 [1,2,3,4,[5,"熊熊",7],8]
            //ar_2 [1,2,3,4,[5,"熊熊",7],8]
            //ar_3[1,2,3,4,[5,"熊熊",7],8]
            //ar_4 [1, 2, 3, 4, [5, 6, 7], 8]





            //object 物件

            const obj = {
                name: {
                    first: 'shinder',
                    family: 'lin'
                },
                age: 32,
                gender: 'male'
            }

            const obj_1 = Object.assign({}, obj); //單層拷貝
            const obj_2 = {
                ...obj
            }; //單層拷貝 //ES6  IE不能用
            const obj_3 = JSON.parse(JSON.stringify(obj)); //深層拷貝


            obj.age = 35;
            obj['name'].first = 'robin';

            info.innerHTML += JSON.stringify(obj) + '<br>';
            info.innerHTML += JSON.stringify(obj_1) + '<br>';
            info.innerHTML += JSON.stringify(obj_2) + '<br>';
            info.innerHTML += JSON.stringify(obj_3) + '<br>';

            //印出來
            // {"name":{"first":"robin","family":"lin"},"age":35,"gender":"male"}
            // {"name":{"first":"robin","family":"lin"},"age":32,"gender":"male"}
            // {"name":{"first":"robin","family":"lin"},"age":32,"gender":"male"}
            // {"name":{"first":"shinder","family":"lin"},"age":32,"gender":"male"}
        </script>
    </div>
</body>

</html>