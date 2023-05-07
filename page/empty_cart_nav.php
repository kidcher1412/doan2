<style>
    .container-cart {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: gray;
        transition: 0.5s;
        cursor: pointer;
    }

    .container-cart:hover {
        color: red;
        transform: translateX(50px);
        transition: transform 0.5s ease-in-out;
    }
</style>
<div class="container-cart">
    <a href="/web2/home/shop.php" class="table">
        <p>Không có gì trong giỏ hàng</p>
        <img class="empty" src="https://2.bp.blogspot.com/-VYC7hvhUz4U/WdcPLAr86jI/AAAAAAAABuA/G3y27JwIL_0S5OsVIp6maXjsdgLRumaTwCLcBGAs/s1600/emptycart.png" style="width:200px;">
        <div class="col1-name"></div>
        <div class="col2-price"></div>
    </a>
</div>