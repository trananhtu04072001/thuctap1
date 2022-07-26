<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>Phiếu nhập kho</title>
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
                    @foreach ($data1 as $pdf)
                    <th width="300px">
                        <center>PHIẾU NHẬP KHO</center>
                        <center>Ngày lập phiếu: {{date('d-m-Y',strtotime($pdf->import->importdate))}}</center>
                    </th>
                    <th width="120px">
                        <center>Mã Nhập : {{$pdf->import->code_import}}</center>
                    </th>
                </tr>
            </thead>
@endforeach
        </table>
    </div>
    <hr>
    <center>
        <h2>PHIẾU NHẬP KHO</h2>
    </center>
    <table>
        <tr>
            @foreach ($data2 as $import)
            <td width="150px"><strong>Nhân viên lập phiếu:</strong></td>
            <td></td>
            <td><strong>{{$import->admin->name}}</strong></td>
            @endforeach
        </tr>
    </table><br><br>
    <table cellpadding="3px" style="border:thin solid;">
        <thead>
            <tr>

                <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Mã nhập</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Sản phẩm</strong></td>
                <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
                <td style="border:thin solid;" width="50px"><strong>Nơi nhập</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Đơn Giá</strong></td>
                <td style="border:thin solid;" width="100px"><strong>Ngày nhập</strong></td>
            </tr>
        </thead>
        <tbody>
                <tr width="5%">
                    <td style="border:thin blue solid;border-style:dashed;">{{$pdf->import->id}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$pdf->import->code_import}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$pdf->product->name}}</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$pdf->import->quantity}} C</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{$pdf->import->supplier}}</td>

                    <td style="border:thin blue solid;border-style:dashed;">{{number_format($pdf->import->unit_price, 0, ',', '.')}} VND</td>
                    <td style="border:thin blue solid;border-style:dashed;">{{date('d-m-Y',strtotime($pdf->import->importdate))}}</td>
                </tr>

        </tbody>
    </table>
    <table class="sumary-table">
        <br>
        <tr>
            <td width="600px">Tổng giá trị nhập:
                {{number_format(($pdf->import->unit_price)*($pdf->import->quantity), 0, ',', '.')}} VND
            </td>
        </tr>
    </table><br>
    <table style="margin-bottom:-300px;">
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
    </table>
</body>

</html>
