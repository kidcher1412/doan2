<?php
$currentPage = empty($_GET["page"]) ? "0" : $_GET["page"];
                                $currentType = empty($_GET["type"]) ? "" : $_GET["type"];
                                // $currentBrand = empty($_GET["brand"]) ? "" : $_GET["brand"];
                                $itemsPerPage = 12;
                                $indexItem = $currentPage*$itemsPerPage;
                                if($currentType == ""){
                                    $productData = $shopmodel->getProduct();
                                    $url = "?";
                                }
                                else{
                                    $productData = $shopmodel->getProduct_byTYPE($currentType);
                                    if(!$productData) {
                                        echo "không tìm thấy loại sản phẩm";
                                        include('../view/BannerView.php');
                                        include "../page/footer.php";
                                        exit();
                                    }
                                    $url = "?type=".$_GET["type"]."&";
                                }
                                if($currentPage>count($productData)/$itemsPerPage){
                                    echo "Lỗi Truy Xuất Trang";
                                    include('../view/BannerView.php');
                                    include "../page/footer.php";
                                    exit();
                                }
?>
<section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Danh mục</h4>
                        <ul class="filter-catagories">
                                    <!-- <li><a href="/Shop/Index/?Type=1">Trang &#x111;i&#x1EC3;m</a></li> -->
                            <?php 
                                $demcatelogry = 0;
                                foreach ($shopmodel->getType() as $value) {
                                    $demcatelogry++;
                                    echo "
                                    <li><a href='../home/shop.php?type=$demcatelogry'>".$value["name"]."</a></li>
                                    ";
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Thương hiệu</h4>
                        <div class="fw-brand-check scrollpane">
                                    <!-- <div class="bc-item">
                                        <label for=1>
                                            LUSTRE MAKEUP 
                                            <input type="checkbox" id=1 onclick="BrandAjax(1)">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> -->
                            <?php 
                                $dembrand = 0;
                                foreach ($shopmodel->getBrand() as $value) {
                                    $dembrand++;
                                    echo "
                                    <div class='bc-item'>
                                        <label for=$dembrand>
                                            ".$value["name"]."
                                            <input class='checkerBrand' type='checkbox' id=$dembrand onclick='loadProductByBrand()'>
                                            <span class='checkmark'></span>
                                        </label>
                                    </div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Giá</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="number" id="minamounts" maxlength="10" value="0" min="0" >
                                    <input type="number" id="maxamounts" maxlength="10" value="" min="100">
                                    <!-- <input type="range" class="form-range" min="0" max="1000000" id="range-costs" value="0" style="min-width: 90%;margin-top: 30px;" onchange="changecost()"> -->
                                    <div id="slider" style="max-width: 90%;margin-top: 30px;"></div>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.css">
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js"></script>
                                    <script>
                                        $(document).ready(function() {
                                            // Tạo một UiSlider với range: true để tạo input có hai đầu kéo
                                            var slider = document.getElementById('slider');

                                            noUiSlider.create(slider, {
                                                start: [0, 100000000],
                                                connect: true,
                                                range: {
                                                    'min': 0,
                                                    'max': 1000000
                                                }
                                            });

                                            // Sự kiện update
                                            slider.noUiSlider.on('update', function(values, handle) {
                                                // Lấy giá trị của input
                                                $('#minamounts').val(values[0]);
                                                $('#maxamounts').val(values[1]);
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <a class="filter-btn" onclick="filterData_ByCost()" style="cursor: pointer;">Lọc</a>
                    </div>
                    
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                            <p id="TypeSeacher" style="font-weight: bold;">Kết quả tìm kiếm: 
                                                                Tất Cả
                                            </p>
                            </div>
                            <div class="col-lg-4 col-md-4 text-right">
                                <div class="select-option">
                                    <select class="thien-sort" id="sort" onchange="changesort()">
                                        <option value="">Sắp xếp: Mặc định</option>
                                        <option value="name-asc">Sắp xếp theo tên từ A-Z</option>
                                        <option value="name-desc">Sắp xếp theo tên từ Z-A</option>
                                        <option value="price-asc">Sắp xếp theo giá tăng dần</option>
                                        <option value="price-desc">Sắp xếp theo giá giảm dần</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                
                            <?php 
                                    for ($i = $indexItem; $i < $indexItem+$itemsPerPage; $i++) {
                                        if($i>=count($productData)){
                                            break;
                                        }
                                        $keyproduct = $i+1;
                                        if($productData[$i]["status"]!=0)
                                            echo "
                                        <div class='col-lg-4 col-sm-6'>
                                        <div class='product-item'>
                                                                            <div class='pi-pic'>
                                                                                <img src='".$productData[$i]["img"]."' alt=''>
                                                                                <ul>
                                                                                    <li class='w-icon active'><a onclick='ShopThemSPAjax(".$productData[$i]["product_id"].")'><i class='icon_bag_alt'></i></a></li>
                                                                                    <li class='quick-view'><a href='../home/product.php?product_id=".$productData[$i]["product_id"]."'>Xem chi tiết</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class='pi-text'>
                                                                                            <div class='catagory-name'>".$productData[$i]["type"]."</div>
                                                                                
                                                                                <a href='../home/product.php?product_id=".$productData[$i]["product_id"]."'>
                                                                                    <h5>".$productData[$i]["name"]."</h5>
                                                                                </a>
                                                                                <div class='product-price'>
                                                                                ".number_format($productData[$i]["price"], 0, ',', '.')." đ"."
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                        ";
                                      }
                            ?>
                        </div>
                    </div>
                    <div class="loading-more">
                        <?php 
                                for($i = 0;$i<count($productData)/$itemsPerPage;$i++){
                                    $pagei = $i+1;
                                    echo "
                                            
                                            <a style='color: ";
                                                if($i == $currentPage)
                                                    echo "#f07c29;";
                                                else 
                                                    echo "#80736a";
                                            echo "' href='".$url."page=".$i."'>".$pagei."</a>
                        
                                    ";
                                  }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    let filteredData=[];
    // function changecost(){
    //     document.querySelector("#maxamounts").value = $('#maxamounts').val(values[1]);
    //     // console.log(document.querySelector("#range-costs").value)
    //     // filterData_ByCost()
    // }
    // changecost();
    function filterData_ByCost(){
        const keymin =  parseInt(document.querySelector("#minamounts").value)
        const keymax =  parseInt(document.querySelector("#maxamounts").value)
        if(document.getElementById("valueSearcher").value){
        const valueSearcher = document.getElementById("valueSearcher").value;
        console.log("gọi lệnh khi có searcher "+document.getElementById("valueSearcher").value)
        $.ajax({
            type: 'POST',
            url: './shop.php',
            data:{
                action: "findProduct",
                SearchString: valueSearcher
            },
            success: function(responseText) {
                dataView = JSON.parse(responseText);
                filteredData = dataView.filter(function(item) {
                    return parseInt(item.price) >= keymin && parseInt(item.price) <= keymax;});
                console.log(filteredData)
                filteredData.sort((a, b) => {
                        if (parseInt(a.price) > parseInt(b.price)) {
                            return -1;
                        }
                        if (parseInt(a.price) < parseInt(b.price)) {
                            return 1;
                        }
                        return 0;
                    });
            dataView=filteredData;
            RenderView(0)
            }
        });
    }
    else{
            filteredData = dataView.filter(function(item) {
            return parseInt(item.price) >= keymin && parseInt(item.price) <= keymax;
        });
        filteredData.sort((a, b) => {
                        if (parseInt(a.price) > parseInt(b.price)) {
                            return -1;
                        }
                        if (parseInt(a.price) < parseInt(b.price)) {
                            return 1;
                        }
                        return 0;
                    });
            dataView=filteredData;
            RenderView(0)
        }
    }
    var dataView = [];
    function ShopThemSPAjax(ProductID){
    $.ajax({
        type: 'POST',
        url: './shop.php',
        data:{
            action: "addCartProduct",
            ProductID: ProductID
        },
        success: function(responseText) {
            if(responseText=='false-login'){
                Swal.fire({
                    type: 'error',
                    title: 'Vui Lòng Đăng Nhập để Thêm Giỏ Hàng',
                    html: "<a href='./login.php'>Đăng Nhập Ngay</a>"
                });
                return;
            }
            if(responseText=='false-slg'){
                Swal.fire({
                    type: 'error',
                    title: 'Hàng Không Đủ để có thể thêm vào giỏ hàng',
                    html: "liên hệ với chúng tôi để phản ảnh tình trạng hàng hóa"
                });
                return;
            }
            else{
                Swal.fire({
                    type: 'success',
                    title: responseText
                });
            }
            getCartByAjaxinNav();
        }
    });
}
//
function changesort(){
    if(dataView.length < 1){
        console.log("không có dữ liệu")
        $.ajax({
        type: 'POST',
        url: './shop.php',
        data:{
            action: "getallProduct",
        },
        success: function(responseText) {
                dataView = [];
            JSON.parse(responseText).forEach(element => {
            dataView.push(element);
            });
            if(document.querySelector("#sort").value == 'name-asc')
                dataView.sort((a, b) => {
                    if (a.name < b.name) {
                        return -1;
                    }
                    if (a.name > b.name) {
                        return 1;
                    }
                    return 0;
                });
            if(document.querySelector("#sort").value == 'name-desc')
                dataView.sort((a, b) => {
                        if (a.name > b.name) {
                            return -1;
                        }
                        if (a.name < b.name) {
                            return 1;
                        }
                        return 0;
                    });
            if(document.querySelector("#sort").value == 'price-asc')
                dataView.sort((a, b) => {
                        if (parseFloat(a.price) < parseFloat(b.price)) {
                            return -1;
                        }
                        if (parseFloat(a.price) > parseFloat(b.price)) {
                            return 1;
                        }
                        return 0;
                    });
            if(document.querySelector("#sort").value == 'price-desc')
                dataView.sort((a, b) => {
                        if (parseFloat(a.price) > parseFloat(b.price)) {
                            return -1;
                        }
                        if (parseFloat(a.price) < parseFloat(b.price)) {
                            return 1;
                        }
                        return 0;
                    });
            RenderView(0);
        }
    });
    }
    else{
        if(document.querySelector("#sort").value == 'name-asc')
                dataView.sort((a, b) => {
                    if (a.name < b.name) {
                        return -1;
                    }
                    if (a.name > b.name) {
                        return 1;
                    }
                    return 0;
                });
            if(document.querySelector("#sort").value == 'name-desc')
                dataView.sort((a, b) => {
                        if (a.name > b.name) {
                            return -1;
                        }
                        if (a.name < b.name) {
                            return 1;
                        }
                        return 0;
                    });
            if(document.querySelector("#sort").value == 'price-asc')
                dataView.sort((a, b) => {
                        if (parseFloat(a.price) < parseFloat(b.price)) {
                            return -1;
                        }
                        if (parseFloat(a.price) > parseFloat(b.price)) {
                            return 1;
                        }
                        return 0;
                    });
            if(document.querySelector("#sort").value == 'price-desc')
                dataView.sort((a, b) => {
                        if (parseFloat(a.price) > parseFloat(b.price)) {
                            return -1;
                        }
                        if (parseFloat(a.price) < parseFloat(b.price)) {
                            return 1;
                        }
                        return 0;
                    });
            RenderView(0);
    }
}
function BrandAjax(ID_brand, callback) {
    if(document.getElementById("valueSearcher").value){
        const valueSearcher = document.getElementById("valueSearcher").value;
        console.log("gọi lệnh khi có searcher "+document.getElementById("valueSearcher").value)
        $.ajax({
            type: 'POST',
            url: './shop.php',
            data:{
                action: "findProduct",
                SearchString: valueSearcher
            },
            success: function(responseText) {
                dataView = JSON.parse(responseText);
                console.log(dataView)
                var temp =[];
                var checkboxes = document.querySelectorAll(".checkerBrand");
                for (var i = 0; i < checkboxes.length; i++) // Lặp lại danh sách các phần tử
                    if (checkboxes[i].checked) {
                        dataView.filter((item) => {
                            return item.brand_id == i+1;
                        }).forEach(element => {
                            temp.push(element);
                        });
                    }
                dataView=temp;
                RenderView(0);
            }
        });
        return;
    }
    else{
        var xhr = new XMLHttpRequest();

        // Thiết lập hàm xử lý sự kiện để xử lý kết quả trả về từ máy chủ
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                JSON.parse(xhr.responseText).forEach(element => {
                dataView.push(element);
                });
                if(urlParams.get('type')!=null)
                    dataView=dataView.filter((item)=>{return item.product_type_id==urlParams.get('type')})
                console.log("thêm " + ID_brand + " thành công")
            // document.getElementById("TypeSeacher").innerHTML = "Kết quả tìm kiếm: "+JSON.parse(xhr.responseText).name
            // Hiển thị kết quả trả về từ máy chủ
                callback();
            } else {
        console.log('Lỗi khi thực hiện cuộc gọi AJAX.');
        }
        }
        };

        // Gửi cuộc gọi AJAX đến máy chủ để lấy dữ liệu
        // xhr.open('POST', '../valueapi/getData.php', true);
        // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        // xhr.send('value=' + ID_brand + '&action=GetProduct_ByBrand');
        xhr.open('POST', '../valueapi/getData.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('value=' + ID_brand + '&action=GetProduct_ByBrand');
    }
}
function loadProductByBrand() {
dataView = [];
var checkboxes = document.querySelectorAll(".checkerBrand"); // Lấy danh sách các phần tử có class "checkmark"
var checkboxChecked = document.querySelectorAll('.checkerBrand:checked').length;
var count = 0;
for (var i = 0; i < checkboxes.length; i++) { // Lặp lại danh sách các phần tử
if (checkboxes[i].checked) { // Kiểm tra xem phần tử hiện tại có được chọn hay không
BrandAjax(i + 1, function() {
count++;

if (count === checkboxChecked) {
    if(dataView.length>0)  
        return RenderView(0);
    else
        document.querySelector(".product-list .row").innerHTML ="Không Tìm Thấy Kết Quả";
        document.querySelector(".loading-more").innerHTML = '';
        return document.querySelector(".product-list .row").style="overflow-y: auto;overflow-x: hidden;max-height: 103vh;";
}
});
}
}
}

function RenderView(Page) {
document.querySelector('.logo').scrollIntoView({
        behavior: "smooth",
        block: "end",
        duration: 500
})
document.querySelector(".product-list .row").innerHTML ="";
document.querySelector(".loading-more").innerHTML = '';
if(dataView.length==0){
    document.querySelector(".product-list .row").innerHTML ="Không Tìm Thấy Kết Quả Phù Hợp";
    document.querySelector(".loading-more").innerHTML = '';
    return;
}
const itemsPerPage = 12;
const indexItem = Page*itemsPerPage;
for (let i = indexItem; i < indexItem+itemsPerPage; i++){
if(i>=dataView.length)
    break;
else{
    document.querySelector(".product-list .row").innerHTML +=`
<div class='col-lg-4 col-sm-6'>
                                <div class='product-item'>
                                                                    <div class='pi-pic'>
                                                                        <img src='${dataView[i].img}' alt=''>
                                                                        <ul>
                                                                            <li class='w-icon active'><a onclick='ShopThemSPAjax(${dataView[i].product_id})'><i class='icon_bag_alt'></i></a></li>
                                                                            <li class='quick-view'><a href='../home/product.php?product_id=${dataView[i].product_id}'>Xem chi tiết</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class='pi-text'>
                                                                                    <div class='catagory-name'>${dataView[i].type}</div>
                                                                        
                                                                        <a href='../home/product.php?product_id=${dataView[i].product_id}'>
                                                                            <h5>${dataView[i].name}</h5>
                                                                        </a>
                                                                        <div class='product-price'>
                                                                        ${dataView[i].price}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
`;
document.querySelector(".loading-more").innerHTML = '';
for(let i = 0;i<dataView.length/itemsPerPage;i++){
    
    document.querySelector(".loading-more").innerHTML +=`
                                    
                                    <a style='color:#80736a' onclick='RenderView(${i})'>${i+1}</a>
                
                            `;
}
confillloadmore(Page,(parseInt(dataView.length/itemsPerPage)+1));
}
}
// return document.querySelector(".product-list .row").style="overflow-y: auto;overflow-x: hidden;max-height: 103vh;";
}
function RenderViewItem(Page,Item) {
    dataView = Item;
document.querySelector('.logo').scrollIntoView({
        behavior: "smooth",
        block: "end",
        duration: 500
})
document.querySelector(".product-list .row").innerHTML ="";
if(Item.length==0){
    document.querySelector(".product-list .row").innerHTML ="Không Tìm Thấy Kết Quả Phù Hợp";
    document.querySelector(".loading-more").innerHTML = '';
    return;
}
const itemsPerPage = 12;
const indexItem = Page*itemsPerPage;
for (let i = indexItem; i < indexItem+itemsPerPage; i++){
if(i>=Item.length)
    break;
else{
    document.querySelector(".product-list .row").innerHTML +=`
<div class='col-lg-4 col-sm-6'>
                                <div class='product-item'>
                                                                    <div class='pi-pic'>
                                                                        <img src='${Item[i].img}' alt=''>
                                                                        <ul>
                                                                            <li class='w-icon active'><a onclick='ShopThemSPAjax(${Item[i].product_id})'><i class='icon_bag_alt'></i></a></li>
                                                                            <li class='quick-view'><a href='../home/product.php?product_id=${Item[i].product_id}'>Xem chi tiết</a></li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class='pi-text'>
                                                                                    <div class='catagory-name'>${Item[i].type}</div>
                                                                        
                                                                        <a href='../home/product.php?product_id=${Item[i].product_id}'>
                                                                            <h5>${Item[i].name}</h5>
                                                                        </a>
                                                                        <div class='product-price'>
                                                                        ${Item[i].price}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
`;
document.querySelector(".loading-more").innerHTML = '';
for(let i = 0;i<Item.length/itemsPerPage;i++){
    document.querySelector(".loading-more").innerHTML +=`
                                    
                                    <a style='color:#80736a' onclick='RenderViewItem(${i},filteredData)'>${i+1}</a>
                
                            `;
}
}
}
// return document.querySelector(".product-list .row").style="overflow-y: auto;overflow-x: hidden;max-height: 103vh;";
}
function reloadLoadmore(){
        // Lấy vị trí của trang hiện tại trong chuỗi nút trang
    var currentPage = parseInt(new URLSearchParams(window.location.search).get("page"));
    if(isNaN(currentPage)) currentPage=0;
    var nodes = document.querySelectorAll(".loading-more a");
    var currentIndex = -1;
    for (var i = 0; i < nodes.length; i++) {
    var node = nodes[i];
    var pageNumber = parseInt(node.getAttribute("href").match(/page=(\d+)/)[1]);
    if (pageNumber === currentPage) {
        currentIndex = i;
        break;
    }
    }

    // Tính toán vị trí của các nút trang cần hiển thị
    var minIndex = Math.max(currentIndex - 3, 0);
    var maxIndex = Math.min(currentIndex + 3, nodes.length - 1);

    // Hiển thị các nút trang
    var container = document.querySelector(".loading-more");
    container.innerHTML = "";
    if (minIndex > 0) {
    container.innerHTML += '<a style="color: #f07c29;" href="?page=' + (currentPage - 1) + '">Prev</a>';
    }
    for (var i = minIndex; i <= maxIndex; i++) {
    var node = nodes[i].cloneNode(true);
    if (i === currentIndex) {
        node.style.color = "#f07c29";
    }
    container.appendChild(node);
    }
    if (maxIndex < nodes.length - 1) {
        const gettype = url.indexOf("type=")>-1 ? "type="+urlParams.get('type')+"&": "";
    container.innerHTML += '<a style="color: #f07c29;" href="?'+gettype+'page=' + (currentPage + 1) + '">Next</a>';
    }
}
document.addEventListener("DOMContentLoaded", function(event) {
    reloadLoadmore();
});
function confillloadmore(current_page, total_pages) {
    var page_links = document.querySelector(".loading-more");
    var page_range = 3; // số trang xung quanh trang hiện tại
    var page_start = Math.max(current_page - page_range, 1);
    var page_end = Math.min(current_page + page_range, total_pages);
    page_links.innerHTML = "";
  // Nút "Trang trước"
  if (current_page > 0) {
    var prev_link = document.createElement("a");
    prev_link.textContent = "Prev";
    prev_link.style.color = "#f07c29";
    prev_link.onclick = function () {
      RenderView(current_page - 1);
    };
    page_links.appendChild(prev_link);
  }

  // Các số trang
  for (var i = page_start; i <= page_end; i++) {
    var page_link = document.createElement("a");
    page_link.textContent = i;
    page_link.style.color="#80736a";
    if (i == current_page+1) {
        page_link.style.color = "#f07c29";
    } else {
      page_link.onclick = (function (i) {
        return function () {
          RenderView(i-1);
        };
      })(i);
    }
    page_links.appendChild(page_link);
  }

  // Nút "Trang sau"
  if (current_page == parseInt(total_pages)) {
    return false;
  }
  if (current_page+1 < total_pages && total_pages>=2) {
    var next_link = document.createElement("a");
    next_link.textContent = "Next";
    next_link.style.color = "#f07c29";
    next_link.onclick = function () {
      RenderView(current_page + 1);
    };
    page_links.appendChild(next_link);
  }
}
    </script>