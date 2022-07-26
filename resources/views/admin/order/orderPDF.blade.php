<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Phiếu Mua hàng</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif, font-size: 10px;
        }
    </style>
</head>

<body class="import">
    <div>
        <table>
            <thead>
                <tr>
                    <th width="300px">
                        Cửa hàng thời trang <br> Anh Tú Boutique
                        <br>
                        Địa chỉ: 
                    </th>
                    @foreach ($data as $order)
                    @endforeach
                    <th width="300px">
                        <center>PHIẾU MUA HÀNG</center>
                        <center>Ngày lập phiếu: {{date('d-m-Y',strtotime($order->create_at))}}</center>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <hr>
    <center>
        <h2>PHIẾU MUA HÀNG</h2>
    </center>
    <table>
        <tr>
            <td width="150px"><strong>Nhân viên lập phiếu:</strong></td>
            <td></td>
            <td><strong>{{Auth::guard('admin')->user()->name}}</strong></td>
        </tr>
    </table><br><br>
    <table cellpadding="3px" style="border:thin solid;">
        <thead>
            <tr>

                <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Sản phẩm</strong></td>
                <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Đơn Giá</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Tổng giá</strong></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $order)
                <tr width="5%">
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->product->id}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->product->name}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->single_quantity}} sp</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{number_format($order->product->price, 0, ',', '.')}} VND</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{number_format(($order->product->price)*($order->single_quantity), 0, ',', '.')}} VND</td>
                </tr>
                @endforeach

        </tbody>
    </table>
    <br><br>
    <table cellpadding="3px" style="border:thin solid;">
        <thead>
            <tr>

                <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Người đặt</strong></td>
                <td style="border:thin solid;" width="50px"><strong>PT thanh toán</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Vận chuyển</strong></td>
            </tr>
        </thead>
        <tbody>
                <tr width="25%">
                    @foreach ($data2 as $val)
                    @endforeach
                    <td style="border:thin blue solid;border-style:dashed;">{{$val->id}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$val->users->name}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->payment->method}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->ship->name}}</td>
                </tr>

        </tbody>
    </table>
    <br><br>
    <table cellpadding="3px" style="border:thin solid;">
        <thead>
            <tr>

                <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Người nhận</strong></td>
                <td style="border:thin solid;" width="50px"><strong>email</strong></td>
                <td style="border:thin solid;" width="100px"><strong>SĐT</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Địa chỉ</strong></td>
            </tr>
        </thead>
        <tbody>
                <tr width="25%">
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->receiver->id}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->receiver->name}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->receiver->email}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->receiver->phone}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$order->receiver->address}}</td>
                </tr>

        </tbody>
    </table>
    <table class="sumary-table">
        <br>
        <tr>
            <td width="300px">
                Tổng sản phẩm:
                {{$order->order->quantity}}
            </td>
            <td width="300px">Tổng giá trị thanh toán:
                {{number_format($order->order->total, 0, ',', '.')}} VND
            </td>
        </tr>
    </table><br>
    {{-- <table style="margin-bottom:-300px;">
        <tr>
            <td width="200px"></td>
            <td width="200px"></td>
        </tr>
        <tr>
            <td width="250px" class="customer-title"> <strong>Người lập phiếu</strong></td>
            <td width="250px" class="writer-title"><strong>Người phụ trách vật tư</strong></td>
            <td width="250px" class="writer-title"><strong>Thủ kho</strong></td>
        </tr>
        <tr>
            <td>(Ký và ghi rõ họ tên)</td>
            <td>(Ký và ghi rõ họ tên)</td>
            <td class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
        </tr>
    </table> --}}
</body>

</html>
