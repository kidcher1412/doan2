</div>
<footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>
        </div>
</div>

<?php
    if(isset($_GET["typeview"])&&$_GET["typeview"]==2)
        include "./form/editsp.php";
    if(isset($_GET["typeview"])&&$_GET["typeview"]==3)
        include "./form/editcateglory.php";
    if(isset($_GET["typeview"])&&$_GET["typeview"]==4)
        include "./form/editbrand.php";    
    if(isset($_GET["typeview"])&&$_GET["typeview"]==5)
        include "./form/editpermision.php";
    if(isset($_GET["typeview"])&&$_GET["typeview"]==6)
        include "./form/editstaff.php";
    if(isset($_GET["typeview"])&&$_GET["typeview"]==7)
        include "./form/editcustomer.php";
    if(isset($_GET["typeview"])&&$_GET["typeview"]==8)
        include "./form/editNCC.php";
    if(isset($_GET["typeview"])&&$_GET["typeview"]==9)
        include "./form/editbill.php";
    if(isset($_GET["typeview"])&&$_GET["typeview"]==11)
        include "./form/editHero.php";
    
?>


<!--   Core JS Files   -->
<script src="./assets/js/jquery.3.2.1.min.js"></script>
<script src="./assets/js/bootstrap.min1.js"></script>
<script>
    document.querySelector(".navbartoggle").addEventListener("click",function(){
    document.querySelector(".sidebar").style.transform = "translate3d(2px, 0, 0)";
    document.querySelector(".sidebar").addEventListener("click",function(){
        document.querySelector(".sidebar").style.transform = "translate3d(268px, 0, 0)";
        document.querySelector(".sidebar").removeEventListener("click",function(){
            document.querySelector(".sidebar").style.transform = "translate3d(268px, 0, 0)";
        });
    })
})
</script>
<!--  Charts Plugin -->
<script src="./assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="./assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script src="./assets/js/js.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="./assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="./assets/js/demo.js"></script>
<script src="./js/Validate-client/jquery-2.2.0.min.js"></script>
<script src="./js/Validate-client/jquery.validate.min.js"></script>
<script src="./js/Validate-client/jquery.validate.unobtrusive.min.js"></script>
<script src="./js/js/sweetalert2@8.js"></script>
<script src="./assets/js/Modal/jquery.min.js"></script>
<script src="./assets/js/Modal/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function Render(type){
                $.ajax({
                type: 'POST',
            url: './index.php',
            data: {
                action: 'rederType2',
                typeView: type
            },
            success: (response) => {
                document.querySelector('.root').innerHTML =response;
                document.querySelector('.pull-left').scrollIntoView({
                behavior: "smooth",
                block: "end",
                duration: 500
                })
                // document.querySelectorAll("#suasp1 tr")[document.querySelectorAll("#suasp1 tr").length-1].querySelector('td').scrollIntoView({
                // behavior: "smooth",
                // block: "end",
                // duration: 200
                // })
            },
            error: function (e) {
                Swal.fire({
                    type: 'error',
                    title: 'Lỗi Render',
                    html: e.responseText
                });
            }
        })
    }
    function DangXuat(){
        Swal.fire({
            type: "question",
            title: "Xác nhận",
            text: "Bạn có muốn Đăng Xuất",
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.value) {
                window.location.href = "./logout.php";
            }
        });
    }
</script>
</body>
</html>