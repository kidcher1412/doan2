<?php
$currentPage = empty($_GET["page"]) ? "0" : $_GET["page"];
$currentType = empty($_GET["type"]) ? "" : $_GET["type"];
$currentBrand = empty($_GET["brand"]) ? "" : $_GET["brand"];
$currentSeacher = empty($_GET["SearchString"]) ? "" : $_GET["SearchString"];
$currentTypeUrl = empty($_GET["type"]) ? "" : "&type=" . $_GET["type"];
$currentBrandUrl = empty($_GET["brand"]) ? "" : "&brand=" . $_GET["brand"];
$currentSeacherUrl = empty($_GET["SearchString"]) ? "" : "&SearchString=" . $_GET["SearchString"];
$url = "?" . $currentTypeUrl . $currentBrandUrl . $currentSeacherUrl;
$itemsPerPage = 12;
$indexItem = $currentPage * $itemsPerPage;
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.php"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Danh sách sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Chỉ Hiện Danh mục</h4>
                    <ul class="filter-catagories">
                        <!-- <li><a href="/Shop/Index/?Type=1">Trang &#x111;i&#x1EC3;m</a></li> -->
                        <?php
                        $demcatelogry = 0;
                        foreach ($shopmodel->getType() as $value) {
                            $demcatelogry++;
                            echo "
                                    <li>
                                        <input type='checkbox' class='checkerType' id='type" . $demcatelogry . "' style='cursor:pointer' onclick='reloadpageview(0)'>
                                        <label for='type" . $demcatelogry . "' style='cursor:pointer'>" . $value["name"] . "</label>
                                    </li>
                                    ";
                        }
                        ?>
                    </ul>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Chỉ Hiện Thương hiệu</h4>
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
                                            " . $value["name"] . "
                                            <input class='checkerBrand' type='checkbox' id=$dembrand onclick='reloadpageview(0)'>
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
                                <input type="number" id="minamounts" maxlength="10" value="0" min="0">
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
                                            start: [0, 2000000],
                                            connect: true,
                                            range: {
                                                'min': 0,
                                                'max': 2000000
                                            }
                                        });

                                        // Sự kiện update
                                        slider.noUiSlider.on('update', function(values, handle) {
                                            // Lấy giá trị của input
                                            $('#minamounts').val(parseInt(values[0]));
                                            $('#maxamounts').val(parseInt(values[1]));
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <a class="filter-btn" onclick="filterData_ByCost()" style="cursor: pointer;">Lọc</a>
                    <a class="filter-btn" onclick="cancel_filterData_ByCost()" style="cursor: pointer; background:red">Hủy Tham số lọc</a>
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
                                <select class="thien-sort" id="sort" onchange="reloadpageview(0)">
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
                        $getcherdata = $shopmodel->getProductbystock($currentType, $currentSeacher, $currentBrand, $currentPage, '', '');
                        if ($getcherdata == false) {
                            // echo "Yêu Cầu Truy Xuất Không Hợp Lệ, Vui Lòng Kiểm Tra Lại Hoặc Báo cho ADMIN Được Biết</div></div></div></section>";
                            // echo "</div>";
                            // echo "</div>";
                            // echo "</div>";
                            echo "<div style='margin-left: 19%;'><h3>Không tìm thấy sản phẩm theo yêu cầu</h3></div>";
                            echo "<div style='margin-left: 30%;'><img class='empty' src='../page/404.png'></div> ";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        } else {
                            $totalPage = $getcherdata["amount"] / $itemsPerPage;
                            $productData = $getcherdata["result"];

                            for ($i = 0; $i < $itemsPerPage; $i++) {
                                if ($i >= count($productData)) {
                                    break;
                                }
                                $keyproduct = $i + 1;
                                echo "
                                        <div class='col-lg-4 col-sm-6'>
                                        <div class='product-item'>
                                                                            <div class='pi-pic'>
                                                                                <img src='" . $productData[$i]["img"] . "' alt=''>
                                                                                <ul>
                                                                                    <li class='w-icon active'><a onclick='ShopThemSPAjax(" . $productData[$i]["product_id"] . ")'><i class='icon_bag_alt'></i></a></li>
                                                                                    <li class='quick-view'><a href='../home/product.php?product_id=" . $productData[$i]["product_id"] . "'>Xem chi tiết</a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class='pi-text'>
                                                                                            <div class='catagory-name'>" . $productData[$i]["type"] . "</div>
                                                                                
                                                                                <a href='../home/product.php?product_id=" . $productData[$i]["product_id"] . "'>
                                                                                    <h5>" . $productData[$i]["name"] . "</h5>
                                                                                </a>
                                                                                <div class='product-price'>
                                                                                " . number_format($productData[$i]["price"], 0, ',', '.') . " đ" . "
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                        ";
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="loading-more">
                    <?php
                    for ($i = 0; $i < $totalPage; $i++) {
                        $pagei = $i + 1;
                        echo "
                                            
                                            <a style='color: ";
                        if ($i == $currentPage)
                            echo "#f07c29;";
                        else
                            echo "#80736a";
                        echo "' onclick='reloadpageview($i)'>" . $pagei . "</a>
                        
                                    ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let filteredData = [];
    let backdoordata = [];
    var dataView = [];
    var costercheck = ''
    var urlParamscheckerfind = new URLSearchParams(window.location.search);
    if(urlParamscheckerfind.get('SearchString')!=null)
        document.querySelector("#valueSearcher").value=urlParamscheckerfind.get('SearchString');
    function filterData_ByCost() {
        const keymin = parseInt(document.querySelector("#minamounts").value);
        const keymax = parseInt(document.querySelector("#maxamounts").value);
        costercheck = keymin.toString() + "," + keymax.toString();
        reloadpageview(0);
    }

    function cancel_filterData_ByCost() {
        costercheck = '';
        $('#minamounts').val(0);
        $('#maxamounts').val(0);
        reloadpageview(0);
    }

    function ShopThemSPAjax(ProductID) {
        $.ajax({
            type: 'POST',
            url: './shop.php',
            data: {
                action: "addCartProduct",
                ProductID: ProductID
            },
            success: function(responseText) {
                if (responseText == 'false-login') {
                    Swal.fire({
                        type: 'error',
                        title: 'Vui Lòng Đăng Nhập để Thêm Giỏ Hàng',
                        html: "<a href='./login.php'>Đăng Nhập Ngay</a>"
                    });
                    return;
                }
                if (responseText == 'false-slg') {
                    Swal.fire({
                        type: 'error',
                        title: 'Hàng Không Đủ để có thể thêm vào giỏ hàng',
                        html: "liên hệ với chúng tôi để phản ảnh tình trạng hàng hóa"
                    });
                    return;
                } else {
                    Swal.fire({
                        type: 'success',
                        title: responseText
                    });
                }
                getCartByAjaxinNav();
            }
        });
    }

    function reloadpageview(page) {
        const typebox = document.querySelectorAll(".checkerType");
        const brandbox = document.querySelectorAll(".checkerBrand");
        let ajaxType = '';
        let ajaxBrand = '';
        for (let index = 0; index < typebox.length; index++) {
            if (typebox[index].checked)
                ajaxType += (index + 1) + ","
        }
        for (let index = 0; index < brandbox.length; index++) {
            if (brandbox[index].checked)
                ajaxBrand += (index + 1) + ","
        }
        if (ajaxType != "")
            ajaxType = ajaxType.slice(0, -1);
        if (ajaxBrand != "")
            ajaxBrand = ajaxBrand.slice(0, -1);
        const searcher = document.querySelector("#valueSearcher").value != "" ? document.querySelector("#valueSearcher").value : "";
        const sorter = document.querySelector(".thien-sort").value;
        $.ajax({
            type: 'POST',
            url: './shop.php',
            data: {
                action: "stockdataProduct",
                type: ajaxType,
                brandA: ajaxBrand,
                name: searcher,
                page: page,
                sort: sorter,
                coster: costercheck
            },
            success: function(responseText) {
                console.log(JSON.parse(responseText));
                dataView = JSON.parse(responseText);
                RenderView(page)
            }
        });

    }

    function RenderView(Page) {
        document.querySelector('.logo').scrollIntoView({
            behavior: "smooth",
            block: "end",
            duration: 500
        })
        document.querySelector(".product-list .row").innerHTML = "";
        document.querySelector(".loading-more").innerHTML = '';
        if (dataView == false) {

            document.querySelector(".product-list .row").innerHTML = "<div style='margin-left: 19%;'><h3>Không tìm thấy sản phẩm theo yêu cầu</h3></div><div style='margin-left: 30%;'><img class='empty' src='../page/404.png'></div></div></div></div></div></div>";
            document.querySelector(".loading-more").innerHTML = '';
            return;
        }
        const itemsPerPage = 12;
        const indexItem = 0;
        for (let i = indexItem; i < indexItem + itemsPerPage; i++) {
            if (i >= dataView.result.length)
                break;
            else {
                document.querySelector(".product-list .row").innerHTML += `
    <div class='col-lg-4 col-sm-6'>
                                    <div class='product-item'>
                                                                        <div class='pi-pic'>
                                                                            <img src='${dataView.result[i].img}' alt=''>
                                                                            <ul>
                                                                                <li class='w-icon active'><a onclick='ShopThemSPAjax(${dataView.result[i].product_id})'><i class='icon_bag_alt'></i></a></li>
                                                                                <li class='quick-view'><a href='../home/product.php?product_id=${dataView.result[i].product_id}'>Xem chi tiết</a></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class='pi-text'>
                                                                                        <div class='catagory-name'>${dataView.result[i].type}</div>
                                                                            
                                                                            <a href='../home/product.php?product_id=${dataView.result[i].product_id}'>
                                                                                <h5>${dataView.result[i].name}</h5>
                                                                            </a>
                                                                            <div class='product-price'>
                                                                            ${Number(dataView.result[i].price).toLocaleString('vi-VN')+" đ"}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>
    `;
                document.querySelector(".loading-more").innerHTML = '';
                for (let i = 0; i < dataView.amount / itemsPerPage; i++) {

                    document.querySelector(".loading-more").innerHTML += `
                                        
                                        <a style='color:#80736a' onclick='reloadpageview(${i})'>${i+1}</a>
                    
                                `;
                }
                confillloadmore(Page, (parseInt(dataView.amount / itemsPerPage) + 1));
            }
        }
        // return document.querySelector(".product-list .row").style="overflow-y: auto;overflow-x: hidden;max-height: 103vh;";
    }

    function reloadLoadmore() {
        // Lấy vị trí của trang hiện tại trong chuỗi nút trang
        var currentPage = parseInt(new URLSearchParams(window.location.search).get("page"));
        if (isNaN(currentPage)) currentPage = 0;
        var nodes = document.querySelectorAll(".loading-more a");
        var currentIndex = -1;
        for (var i = 0; i < nodes.length; i++) {
            var node = nodes[i];
            var pageNumber = parseInt(node.getAttribute("onclick").match(/\d+/)[0]);
            if (pageNumber === currentPage) {
                currentIndex = i;
                break;
            }
        }

        // Tính toán vị trí của các nút trang cần hiển thị
        var minIndex = Math.max(currentIndex - 3, 0);
        var maxIndex = Math.min(currentIndex + 3, nodes.length - 1);
        console.log(parseInt(currentPage));
        // Hiển thị các nút trang
        var container = document.querySelector(".loading-more");
        container.innerHTML = "";
        if (currentPage > 0) {
            container.innerHTML += "<a style='color: #f07c29;' onclick='reloadpageview("+(parseInt(currentPage) - 1)+")'>Prev</a>";
        }
        for (var i = minIndex; i <= maxIndex; i++) {
            var node = nodes[i].cloneNode(true);
            if (i === currentIndex) {
                node.style.color = "#f07c29";
            }
            container.appendChild(node);
        }
        console.log(currentPage+"  "+ nodes.length)
        if (currentPage < nodes.length - 1) {
            container.innerHTML += "<a style='color: #f07c29;' onclick='reloadpageview("+(parseInt(currentPage) + 1)+")'>Next</a>";
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
            prev_link.onclick = function() {
                reloadpageview(current_page - 1);
            };
            page_links.appendChild(prev_link);
        }

        // Các số trang
        for (var i = page_start; i <= page_end; i++) {
            var page_link = document.createElement("a");
            page_link.textContent = i;
            page_link.style.color = "#80736a";
            if (i == current_page + 1) {
                page_link.style.color = "#f07c29";
            } else {
                page_link.onclick = (function(i) {
                    return function() {
                        reloadpageview(i - 1);
                    };
                })(i);
            }
            page_links.appendChild(page_link);
        }

        // Nút "Trang sau"
        if (current_page == parseInt(total_pages)) {
            return false;
        }
        if (current_page + 1 < total_pages && total_pages >= 2) {
            var next_link = document.createElement("a");
            next_link.textContent = "Next";
            next_link.style.color = "#f07c29";
            next_link.onclick = function() {
                reloadpageview(current_page + 1);
            };
            page_links.appendChild(next_link);
        }
    }
</script>