<div class="content">
      <div class="container-fluid">
      <div class="card-tools flex">
                    <span>Ngày Bắt Đầu</span>
                    <input type='date' class='form-control' id='datezoneMin' placeholder='Ngày Bắt Đầu' data-val='true' data-val-required='Ng&#xE0;y sinh l&#xE0; b&#x1EAF;t bu&#x1ED9;c' name='product.timemin' value=''>
                    <span>Ngày Kết Thúc</span>
                    <input type='date' class='form-control' id='datezoneMax' placeholder='Ngày Bắt Kết Thúc' name='product.timemax' value=''>
                    <input type="button" class="btn btn-tool btn-sm" value="Thống Kê" onclick="DrawChart()">
        </div>
        <div class="row">
          <div class="col-lg-6">
            
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sản Phẩm Bán</h3>
                  
                  <!-- <a href="javascript:void(0);">View Report</a> -->
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Tổng Doanh Thu: </span>
                    <span class="text-bold text-lg sotiendaban"></span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>


              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Sản Phẩm Bán Ra</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <span>Loại Sản Phẩm</span>
                  <select style="height: 30px;" id="select-product" onchange="DrawChart()">
                                        <option value="all">Tất cả</option>
                                        <?php 
                                          foreach ($TypeData as $value) {
                                              echo "<option value='".$value["product_type_id"]."'>".$value["name"]."</option>";
                                          }
                                        ?>
                                        
                                    </select>
                  <span>Sắp Xếp</span>
                  <select style="height: 30px;" id="select-product-type" onchange="DrawChart()">
                    <option checked value="giam-soluong">Giảm Dần Theo Số Lượng Đã Bán</option>
                    <option value="tang-soluong">Tăng Dần Theo Số Lượng Đã Bán</option>
                    <option checked value="giam-loinhuan">Giảm Dần Theo Doanh Số</option>
                    <option value="tang-loinhuan">Tăng Dần Theo Doanh Số</option>
                  </select>
                  <input type="number" style="width: 50px;" id="chisobaodong" name="chisobaodong" onchange="DrawChart()" value="20" placeholder="chỉ số báo động">
                  <label style="cursor: pointer;" for="checksoluong">Hiện Mức Báo Động Kho</label>
                  <input type="checkbox" id="checksoluong" name="checksoluong" onchange="DrawChart()">
                </div>
                  <p class="d-flex flex-column">
                      <span>Tổng Số Lượng Sản Phẩm Đã Bán Được: </span>
                      <span class="text-bold text-lg soluongdaban">0</span>
                  </p>
              </div>
              <div class="card-body table-responsive p-0" style="max-height: 300px;overflow: auto;">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Sản Phẩm</th>
                    <th>Đã Bán</th>
                    <th>Tổng Doanh Thu</th>
                    <th>Số Lượng Tồn Kho</th>
                  </tr>
                  </thead>
                  <tbody style="max-height:500px;" id="thongkesoluongban">
                  </tbody>
                </table>
              </div>
              <h4 class="card-title daban">
              </h4>
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Hóa Đơn</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                    <span>Sắp Xếp</span>
                    <select style="height: 30px;" id="select-bill-type" onchange="DrawChart()">
                      <option checked value="bill-by-month">Hiện Tổng Doanh Thu Tháng</option>
                      <option value="bill-by-id">Hiện Tất Cả Hóa Đơn</option>
                    </select>
                </div>
              </div>
              <div style="max-height:400px;overflow: auto;"class="card-body">
              <table class="table table-striped table-valign-middle bill-top">
                  <thead>
                  <tr>
                    <th>Số Lượng Hóa Đơn</th>
                    <th>Thời Gian Lập Hóa Đơn</th>
                    <th>Tổng Tiền Hóa Đơn</th>
                    <!-- <th>test</th> -->
                  </tr>
                  </thead>
                  <tbody id="bill-scale">
                  </tbody>
                </table>
                <!-- /.d-flex -->
              </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Thương Hiệu</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <div style="display: flex;" class="d-flex flex-column">
                      <h5>Thương Hiệu Bán Chạy Nhất: </h5>
                      <h5 style="margin-left: 10px; font-weight:bold"  id="bestsalerBrand"></h5>
                  </div>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="400"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Thương Hiệu</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                    <span>Sắp Xếp</span>
                    <select style="height: 30px;" id="select-brand-type" onchange="DrawChart()">
                      <option checked value="giam-loinhuan">Giảm Dần Doanh Số</option>
                      <option value="tang-loinhuan">Tăng Dần Theo Doanh Số</option>
                      <option value="tang-id">Tăng Dần Mã Thương Hiệu</option>
                      <option checked value="giam-id">Giảm Dần Mã Thương Hiệu</option>
                    </select>
                </div>
              </div>
              <div style="max-height:400px;overflow: auto;"class="card-body">
              <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Mã Thương Hiệu</th>
                    <th>Tên Thương Hiệu</th>
                    <th>Tổng Tiền Thương Hiệu</th>
                    <!-- <th>test</th> -->
                  </tr>
                  </thead>
                  <tbody id="thongkehoadon">
                  </tbody>
                </table>
                <!-- /.d-flex -->
              </div>
            </div>

            
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
<script>
  let DoanhThu=[];
  let SoluongDaBan = 0;
  let SoTienDaBan = 0;
  window.onload = function() {
    $.ajax({
        type: 'POST',
        url: './index.php',
        data:{
            action: "getThongKe",
        },
        success: function(responseText) {
            DoanhThu =JSON.parse(responseText);
            DrawChart();
        }})
    }
  function ThongKe(){
    var minday = document.querySelector("#datezoneMin").value;
    var maxday = document.querySelector("#datezoneMax").value;
    $.ajax({
        type: 'POST',
        url: './index.php',
        data:{
            action: "getThongKe",
        },
        success: function(responseText) {
            DoanhThu =JSON.parse(responseText);
            // DrawChart();
        }})
  }
  let today = new Date();
  let year = today.getFullYear();
  let month = today.getMonth() + 1;
  let day = today.getDate();

if (month < 10) {
  month = '0' + month;
}

if (day < 10) {
  day = '0' + day;
}

let todayes = year + '-' + month + '-' + day;
document.querySelector("#datezoneMax").value = todayes;
document.querySelector("#datezoneMin").value = year+"-01-01";
  

  function getValueChart(){
    
  }
  function DrawChart(){
    ThongKe();
    SoTienDaBan = 0;
    const filteredData = {};
    SoluongDaBan=0;
    const core = DoanhThu;
    var amountByProductIdOutput=[];
    const daymax = document.querySelector("#datezoneMax").value;
    const daymin = document.querySelector("#datezoneMin").value;
    if(document.getElementById("checksoluong").checked){
      DoanhThu = DoanhThu.filter(item => {
        return parseInt(item.soluongton)<=document.getElementById("chisobaodong").value;
      })
    }
    DoanhThu = DoanhThu.filter(item => {
      const date = new Date(item.date_order.split('-').reverse().join('-'));
      return date > new Date(daymin) && date <= new Date(daymax);
    });
    switch (document.getElementById("select-product").value) {
      case "all":
        break;
      default:
      DoanhThu = DoanhThu.filter(item => parseInt(item.product_type_id) == document.getElementById("select-product").value)
        break;
    }
    DoanhThu.forEach(element => {
              SoTienDaBan+=parseInt(element.total)
    });

        // Xử Lý Dữ Liệu Trước Khi vào Biểu Đồ
  const groupedData = DoanhThu.reduce((acc, curr) => {
    const [day, month, year] = curr.date_order.split('-');
    const key = `${month}-${year}-${curr.product_id}`;
    
    if (!acc[key]) {
      acc[key] = {
        month,
        year,
        price: parseInt(curr.price),
      };
    } else {
      acc[key].price += parseInt(curr.price);
    }

    return acc;
  }, {});

const group = Object.values(groupedData);

const countUniqueBillsByDate = (DoanhThu) => {
  const counts = {};
  DoanhThu.forEach((item) => {
    const monthYear = item.date_order.substr(3);
    if (!counts[monthYear]) counts[monthYear] = {};
    if (!counts[monthYear][item.bill_id]) counts[monthYear][item.bill_id] = 1;
  });
  return Object.entries(counts).map(([monthYear, bills]) => ({
    monthYear,
    countofBill: Object.keys(bills).length
  }));
};

// console.log(countUniqueBillsByDate(DoanhThu)); 

const result = new Map();
for (const {month, year, price} of group) {
  const key = `${month}-${year}`;
  if (result.has(key)) {
    const value = result.get(key);
    result.set(key, { price: value.price + price, countbill: value.countbill + 1 });
  } else {
    result.set(key, { price, countbill: 1 });
  }
}

const resultArray = [];
let countbill=0;
for (const [key, value] of result) {
  resultArray.push({ 'monthyear': key, price: value.price, 'countbill': countUniqueBillsByDate(DoanhThu)[countbill].countofBill });
  countbill++;
}

console.log(resultArray);

let dataBillView=[];
    switch (document.querySelector("#select-bill-type").value) {
      case "bill-by-month":
        dataBillView=resultArray;
        document.querySelector("#bill-scale").innerHTML=''
        dataBillView.forEach(element => {
          document.querySelector("#bill-scale").innerHTML+=`
                  <tr>
                    <td>${parseInt(element.countbill)}</td>
                    <td>${element.monthyear}</td>
                    <td>${parseInt(element.price).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</td>
                  </tr>
          `;
        });
        break;
      case "bill-by-id":
        dataBillView=resultArray;
        document.querySelector("#bill-scale").innerHTML=''
        dataBillView.forEach(element => {
          document.querySelector("#bill-scale").innerHTML+=`
            bill
          `;
        });
        break;
      default:
        break;
    }

  filteredDataArray = resultArray


    console.log(filteredDataArray)
    
    const products = {};
    for (let item of DoanhThu) {
      if (products[item.product_id]) {
        products[item.product_id].amount += parseInt(item.amount);
        products[item.product_id].price += parseInt(item.price);
      } else {
        products[item.product_id] = {
          amount: parseInt(item.amount),
          price: parseInt(item.price),
          image: item.image,
          soluongton: item.soluongton,
          name_sp: item.tensanpham,
        };
      }
    }

    amountByProductIdOutput = Object.entries(products).map(([key, value]) => ({product_id: key, ...value}));
    


    var temp = 0;
    amountByProductIdOutput.forEach(element => {
      temp+=element.amount;
    });
    document.querySelector(".soluongdaban").innerHTML = temp;
    // Tạo biểu đồ
    let labels = filteredDataArray.map(item => item.monthyear);
    let data = filteredDataArray.map(item => item.price);

    let ctx = document.getElementById('visitors-chart').getContext('2d');

    // Xóa Biểu Đồ Cũ
    var oldChart = Chart.getChart("visitors-chart");
    if (oldChart) {
      oldChart.destroy();
    }
    oldChart = Chart.getChart("sales-chart");
    if (oldChart) {
      oldChart.destroy();
    }

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Doanh thu theo thời gian',
          data: data,
          borderColor: '#0070C0',
          backgroundColor: '#0070C0',
          fill: false
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value, index, values) {
                return value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
              }
            }
          }
        }
      }
    });

    document.querySelector("#thongkesoluongban").innerHTML="";
    switch (document.getElementById("select-product-type").value) {
      case "tang-soluong":
        amountByProductIdOutput.sort((a, b) => parseInt(a.amount) - parseInt(b.amount));
        break;
      case "giam-soluong":
        amountByProductIdOutput.sort((a, b) => parseInt(b.amount) - parseInt(a.amount));
        break;
      case "tang-loinhuan":
        amountByProductIdOutput.sort((a, b) => parseInt(a.price) - parseInt(b.price));
        break;
      case "giam-loinhuan":
        amountByProductIdOutput.sort((a, b) => parseInt(b.price) - parseInt(a.price));
        break;
    }
    temp = 0
amountByProductIdOutput.forEach(element => {
    temp +=parseInt(element.price);
    document.querySelector("#thongkesoluongban").innerHTML+=`
    <tr>
                      <td>
                        <img style="max-width: 30px;max-height: 30px;object-fit: cover;" src="${element.image}" alt="Product" class="img-circle img-size-32 mr-2">
                        ${element.name_sp}
                      </td>
                      <td>
                        ${element.amount} Sold
                      </td>
                      <td>`+parseInt(element.price).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })+`</td>
                      <td>
                        <span class=" `+ (parseInt(element.soluongton)>20? "text-success" : "text-danger") +`">
                            ${element.soluongton}
                        </span>

                      </td>
                    </tr>
    `

  });
  document.querySelector(".daban").innerHTML = "Tổng số doanh thu: "+parseInt(temp).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
  document.querySelector(".sotiendaban").innerHTML = parseInt(temp).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });

  const priceByBrand = {};
  const priceByBrandOutput = [];
  for (let item of DoanhThu) {
        if (priceByBrand[item.brand_id]) {
          priceByBrand[item.tenthuonghieu] += parseInt(item.price);
          const ojpush = {id_brand:item.brand_id,name_brand:item.tenthuonghieu,total:priceByBrand[item.tenthuonghieu]};
          priceByBrandOutput.push(ojpush);
        } else {
          priceByBrand[item.tenthuonghieu] = parseInt(item.price);
          const ojpush = {id_brand:item.brand_id,name_brand:item.tenthuonghieu,total:priceByBrand[item.tenthuonghieu]};
          priceByBrandOutput.push(ojpush);
        }
      }
      
      const groupedBrands = new Map();
      priceByBrandOutput.forEach(product => {
        const { id_brand, name_brand, total } = product;
        if (groupedBrands.has(id_brand)) {
          const existingBrand = groupedBrands.get(id_brand);
          groupedBrands.set(id_brand, { 
            id_brand, 
            name_brand, 
            total: existingBrand.total + total 
          });
        } else {
          groupedBrands.set(id_brand, { id_brand, name_brand, total });
        }
      });

      const aggregatedBrands = Array.from(groupedBrands.values());

      console.log(aggregatedBrands);
      const maxTotal = Math.max(...aggregatedBrands.map(item => item.total));
      let maxTotalItem = null;
      maxTotalItem = aggregatedBrands.find(item => item.total === maxTotal);
      if( typeof maxTotalItem != "undefined")
        document.getElementById("bestsalerBrand").innerHTML = maxTotalItem.name_brand
      else
        document.getElementById("bestsalerBrand").innerHTML = "Không có Doanh Thu trong trường này";
      labels = aggregatedBrands.map(item => item.name_brand);
      values = aggregatedBrands.map(item => item.total);
      ctx = document.getElementById('sales-chart').getContext('2d');
      new Chart(ctx, {
        type: 'pie',
        data: {
          labels: labels,
          datasets: [{
            label: 'Doanh thu theo thương hiệu',
            data: values,
            backgroundColor: [
              'rgba(255, 99, 132, 0.5)',
              'rgba(54, 162, 235, 0.5)',
              'rgba(255, 206, 86, 0.5)',
              'rgba(75, 192, 192, 0.5)',
              'rgba(153, 102, 255, 0.5)',
              'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'bottom'
            },
            title: {
              display: true,
              text: 'Doanh thu theo thương hiệu'
            }
          }
        }
      });
      switch (document.getElementById("select-brand-type").value) {
      case "tang-id":
        aggregatedBrands.sort((a, b) => parseInt(a.id_brand) - parseInt(b.id_brand));
        break;
      case "giam-id":
        aggregatedBrands.sort((a, b) => parseInt(b.id_brand) - parseInt(a.id_brand));
        break;
      case "tang-loinhuan":
        aggregatedBrands.sort((a, b) => parseInt(a.total) - parseInt(b.total));
        break;
      case "giam-loinhuan":
        aggregatedBrands.sort((a, b) => parseInt(b.total) - parseInt(a.total));
        break;
    }
      document.querySelector("#thongkehoadon").innerHTML = "";
      aggregatedBrands.forEach(element => {
        const total = parseInt(element.total).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })
        document.querySelector("#thongkehoadon").innerHTML+=`
        <tr>
          <td>${element.id_brand}</td>
          <td>${element.name_brand}</td>
          <td>${total}</td>
          
        </tr>
        `
      });
  }
// lgtm [js/unused-local-variable]
</script>