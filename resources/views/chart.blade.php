@extends("layouts.master")
@section("title") BikeShop | รายงาน
@endsection

@section("content")
<div class="content">
    <h1>รายงาน</h1>
    <ul class="breadcrumb">
    <li><a href="{{URL::to('product')}}">หน้าแรก</a></li>
    <li class="active">รายงาน</li>
    </ul>
</div>
<div class="content">
<div class="low">
    <div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <strong>มูลคา่าสินค้า</strong>
            </div>
        </div>
        <div class="panel-body"> <canvas id="myBarChart" height="100"></canvas></div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title"><strong>มูลค่าสินค้าแยกตามประเภท</strong></div>
        </div>
        <div class="panel-body">
            <canvas id="myPieChart" height="100"></canvas>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
$.get("/api/product/chart/list",function(response){
    
    var colorc=[];
//   array.forEach(response.product_prices => {
//     //colorc.push("rgba("+Math.floor(Math.random() * 256)+","+Math.floor(Math.random() * 256)+","+Math.floor(Math.random() * 256)+",1)");
//   });
for(i=0;i<response.product_prices.length;i++){
    colorc.push("rgba("+Math.floor(Math.random() * 255)+","+Math.floor(Math.random() * 255)+","+Math.floor(Math.random() * 255)+",1)");
}

    console.log( response.product_names);
    var ctx = document.getElementById("myBarChart").getContext('2d');
    var myChart = new Chart(ctx,{
        type:'bar',
        data:{
            
            labels: response.product_names,
            datasets: [{
                backgroundColor: colorc,
                                borderColor:colorc,
                label: '# of votes',
                data: response.product_prices
            }]
        },
        option: {scales: { yAxes:[{ ticks: {beginAtZero:true } }] }}
        
    });
});
$.get("/api/category/chart/list",function(response){
    var colorc=[];
    for(i=0;i<response.cat_names.length;i++){
    colorc.push("rgba("+Math.floor(Math.random() * 255)+","+Math.floor(Math.random() * 255)+","+Math.floor(Math.random() * 255)+",1)");
}
    console.log(response.cat_names);
    var ctx= document.getElementById("myPieChart");
        var myPieChat = new Chart(ctx,{
            type : 'pie',
            data: {
                datasets:[{
                    data: response.cat_prices,
                    backgroundColor:colorc,
                }],
                labels:response.cat_names
            },
        });
});
</script>
@endsection