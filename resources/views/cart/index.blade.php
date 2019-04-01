@extends('layouts.master')

@section('title') BikeShop | ตะกร้าสินค้า @stop

@section('content')
<div class="container">
    <h1>สินค้าในตะกร้า</h1>
    <div class="breadcrumb">
        <li><a href="{{URL::to('home')}}"><i class="fa fa-home">หน้าร้าน</i></a></li>
        <li class="active">สินค้าในตะกร้า</li>

    </div>

<div class="panel panel-default">
        @if(count($cart_items))
        <?php $sum_price=0 ?>
        <?php $sum_qty=0 ?>
        <table class="table">
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
                <td><input type="number" class="form-control" value="{{$c['qty']}}" onkeyUp="updateCart({{$c['id']}},this)"  ></td>
                    <td>{{ number_format($c['price'],0) }}</td>
                    <td>
                    <a href="{{URL::to('cart/delete/'.$c['id'])}}" class="btn btn-danger"> <i class="fa fa-time"></i>X</a>
                    </td>
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
        @else
        <div class="panel-body"><strong>ไม่พบรายการสินค้า!</strong></div>
        @endif
        
</div>
<a href="{{URL::to('/home')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> ย้อนกลับ</a>
<div class="pull-right">
    <a href="{{URL::to('cart/checkout')}}" class="btn btn-primary">ชำระเงิน <i class="fa fa-chevron-right"></i></a>
</div>
</div>
<script>
    function updateCart(id,qty){
            window.location.href='/cart/update/'+id+'/'+qty.value;    
            }
</script>
@endsection