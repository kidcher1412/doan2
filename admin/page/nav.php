<div class="sidebar" data-color="purple" data-image="./assets/img/sidebar-5.jpg">

<!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    <div class="sidebar-wrapper">
        <div class="logo">
            <a class="simple-text">
                Admin
            </a>
        </div>

        <ul class="nav scrollnav">
            <!-- <li class="active"> -->
            <li>
                <a href="?typeview=1">
                    <i class="pe-7s-user"></i>
                    <p>Thông tin tài khoản</p>
                </a>
            </li>
            <?php 
                foreach ($permissionList as $key => $value) {
                    if($value['valueread']!='0')
                        echo '<li >
                        <a href="?typeview='.($key+2).'">
                            <i class="'.$value['icon'].'"></i>
                            <p>'.$value['name'].'</p>
                        </a>';
                }
?>
        </ul>
    </div>
</div>
<script>
    const listItems = document.querySelectorAll('.scrollnav li');
    const url = window.location.href;
    const typeViewParam = url.split("typeview=")[1];
    if (typeViewParam) {
        const typeViewValue = typeViewParam.split("&")[0];
        console.log(Number.parseInt(typeViewValue));
        getactivetype(Number.parseInt(typeViewValue))
        listItems[0].classList.remove("active")
    }
    function getactivetype(type){
        switch(type) {
            case 1:

                break;
            case 2:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Sản Phẩm')
                        element.classList.add("active");
                });
                break;
            case 3:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Loại Sản Phẩm')
                        element.classList.add("active");
                });
                break;
            case 4:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Thương Hiệu')
                        element.classList.add("active");
                });
                break;
            case 5:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Quyền')
                        element.classList.add("active");
                });
                break;
            case 6:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Nhân Viên')
                        element.classList.add("active");
                });
                break;
            case 7:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Khách Hàng')
                        element.classList.add("active");
                });
                break;
            case 8:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Nhà Cung Cấp')
                        element.classList.add("active");
                });
                break;
            case 9:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Hóa Đơn')
                        element.classList.add("active");
                });
                break;
            case 10:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Phiếu Nhập')
                        element.classList.add("active");
                });
                break;
            case 11:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='MAKETING')
                        element.classList.add("active");
                });
                break;
            case 12:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Hỗ Trợ Khách Hàng')
                        element.classList.add("active");
                });
                break;
            case 13:
                listItems.forEach(element => {
                    if(element.querySelector('p').innerHTML=='Thống Kê')
                        element.classList.add("active");
                });
                break;
        }
    }
</script>