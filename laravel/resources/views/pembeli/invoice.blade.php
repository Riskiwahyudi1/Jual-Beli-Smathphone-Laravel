<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 20px;
            width: 10px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        
            
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h4>TeraPhone</h4>
                            </td>
                            <td>
                                Invoice No : {{ $transaksi->id }}<br>
                                Diterbitkan : {{ $transaksi->created_at }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td colspan="2">Alamat Pengiriman :</td>
            </tr>
            <tr class="information">
                <td colspan="1">
                    <table>
                        <tr>
                            @php
                                $alamat = json_decode($transaksi->alamat, true);
                                $alamatString = implode(', ', $alamat);
                            @endphp
                            <td>
                                {{$alamatString}}
                            </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Metode Pembayaran 
                </td>
                <td>
                    Jenis Bank
                </td>
            </tr>
            <tr class="details">
                <td>
                    Transfer Bank
                </td>
                <td>
                    Bank Mandiri 
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Produk
                </td>
                <td>
                    Harga
                </td>
            </tr>
            <tr class="item">
                <td>
                    Website design
                </td>
                <td>
                    $300.00
                </td>
            </tr>
            <tr class="item">
                <td>
                    Hosting (3 months)
                </td>
                <td>
                    $75.00
                </td>
            </tr>
            <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>
                <td>
                    $10.00
                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td>
                   Total Transaksi: $385.00
                </td>
            </tr>
        </table>

    </div>
</body>
</html>
