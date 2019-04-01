@extends('layouts.master')

@section('content')

<div class="container">
    <h1>ชำระเงิน</h1>
    <div class="breadcrumb">
        <li><a href="{{URL::to('home')}}"><i class="fa fa-home">หน้าร้าน</i></a></li>
    <li> <a href="{{URL::to('cart/view')}}">สินค้าในตะกร้า</a></li>
        <li class="active">ชำระเงิน</li>

    </div>
    <div class="row">
        <div class="col-md-6">
                <?php $sum_price=0 ?>
                <?php $sum_qty=0 ?>
                <strong>รายการสินค้า</strong>
            <table class="table bs-table">
                <thead>
                    <th>รูปสินค้า</th>
                    <th>รหัส</th>
                    <th>ชื่อสินค้า</th>
                    <th>จำนวน</th>
                    <th>ราคา</th>
                    <th width="50px"> </th>
                </thead>
                <tbody>
                    @foreach($cart_items as $c)
                    <tr>
                        <td><img src="{{ asset($c['image_url']) }}" height="36"></td>
                        <td>{{$c['code']}}</td>
                        <td>{{$c['name']}}</td>
                    <td>  {{$c['qty']}}</td>
                        <td>{{ number_format($c['price'],0) }}</td>
                        
                    </tr>
                    <?php $sum_price += $c['price']*$c['qty']?>
                    <?php $sum_qty += $c['qty']?>
                    @endforeach
                </tbody>
                <tfoot>
                        <tr>
                            <th colspan="3">รวม</th>
                        <th>{{ number_format($sum_qty,0)}}</th>
                        <th>{{ number_format($sum_price,0)}}</th>
                        <th></th>
                        </tr>
                    </tfoot>
            </table>
        </div>
        <div class="col-md-6">
            <div class="panel panel-body">
                <div class="panel-title">
                    <strong>ข้อมูลลูกค้า</strong>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-group">
                    <label>ชื่อ-นามสกุล</label>
                    <input type="text" class="form-control" id="cust_name" placeholder="ชื่อ-นามสกุล">
                </div>
                <div class="form-group">
                    <label>อีเมล์</label>
                    <input type="text" class="form-control" id="cust_email" placeholder="อีเมล์ขิงท่าน">
                </div>
            </div>
        </div>
    </div>
    <a href="{{URL::to('cart/view')}}" class="btn btn-default">ย้อนกลับ</a>
    <div class="pull-right">
    <a href="{{URL::to('cart/complete')}}" class="btn btn-warning">พิมพ์ใบสั่งสินค้า</a>
        <a href="javascript:complete()" class="btn btn-primary"><i class="fa fa-check"></i>จบการขาย</a>
    </div>
</div>
<script type="text/javascript">
function complete(){
    window.open(
        "{{URL::to('cart/complete')}}?cust_name="+$('#cust_name').val() +'&cust_email='+$('#cust_email').val(),"_blank",
    );
    window.location.href="{{URL::to('cart/finish')}}";
}
</script>
@endsection