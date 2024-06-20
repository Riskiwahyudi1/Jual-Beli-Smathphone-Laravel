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
            margin: 50px auto;
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
            width: 50%
        }
        .product-quantity {
            color: #666;
            font-size: 0.9em;
        }
        .product-discount {
            color: red;
            font-size: 12px;
            margin-left : 13px;
            margin-top : 3px;
        }
        .header-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .header-table td {
            padding: 0;
        }
        .header-left {
            text-align: left;
        }
        .header-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table class="header-table">
            <tr>
                <td class="header-left">
                    <h3>TeraPhone</h3>
                </td>
                <td class="header-right">
                    Invoice No: {{ $transaksi->id }}<br>
                    Diterbitkan: {{ $transaksi->created_at }}<br>
                </td>
            </tr>
        </table>
        <table>
            <tr class="heading">
                <td colspan="2">Alamat Pengiriman :</td>
            </tr>
            <tr class="information">
                <td colspan="2">
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
            @php
                $totalTransaksi = 0;
            @endphp
            @foreach ($transaksiProduks as $penjual => $transaksiListByTime)
                @if ($penjual == $transaksi->penjual)
                    @foreach ($transaksiListByTime as $createdAt => $transaksiList)
                        @if ($createdAt == $transaksi->created_at)
                            @foreach ($transaksiList as $transaksiItem)
                                <tr class="item">
                                    <td>
                                        {{ $transaksiItem->produk->nama_produk }}
                                        <span class="product-quantity">x {{ $transaksiItem->jumlah }} Pcs</span>
                                        @if($transaksiItem->produk->diskon > 0)
                                            <div class="product-discount">Diskon: {{ $transaksiItem->produk->diskon }}%</div>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $hitungDiskon = $transaksiItem->produk->diskon / 100 * $transaksiItem->produk->harga;
                                            $hargaSetelahDiskon = $transaksiItem->produk->harga - $hitungDiskon;
                                            $hargaSesuaiJumlah = $hargaSetelahDiskon * $transaksiItem->jumlah;
                                            $totalTransaksi += $hargaSesuaiJumlah;
                                        @endphp
                                        Rp. {{ number_format($hargaSesuaiJumlah, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="item">
                                <td>
                                    Ongkir
                                </td>
                                <td>
                                    Rp. {{ number_format($transaksi->ongkir, 0, ',', '.') }}
                                    @php
                                        $totalTransaksi += $transaksi->ongkir;
                                    @endphp
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <tr class="total">
                <td></td>
                <td>
                   Total Transaksi:   Rp. {{ number_format($totalTransaksi, 0, ',', '.') }}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
