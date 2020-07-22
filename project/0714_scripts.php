<script src="../lib/jquery-3.5.1.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>

<script>
    const  cart_count = $('.cart-count');  // span tag 抓到購物車class

    $.get('handle-cart.php',function(data){
        setCartCount(data);
    },'json');
    function setCartCount(data) {
        let count = 0;
        if(data && data.cart && data.cart.length){
            for(let i in data.cart){
                let item = data.cart[i];
                count += item.quantity;
            }
            cart_count.text(count);
        }
    }

</script>