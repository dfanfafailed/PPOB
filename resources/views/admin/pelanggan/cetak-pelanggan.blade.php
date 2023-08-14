<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center
        }

    </style>
    <title>Cetak Data Pelanggan</title>
</head>

<body>
    <div class="form-group">
        <h2 align="center"><b>Laporan Data Pelanggan</b></h2>
        <table class="static" align="center" rules="all" border="1" style="width:95%">
            <thead>
                <tr>
                    <th>No Pelanggan</th>
                    <th>No KWH</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Tarif</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td class="text-center" width="20">{{ $item->id_pelanggan }}</td>
                    <td class="text-center">{{ $item->nomor_kwh }}</td>
                    <td class="text-center">{{ $item->nama_pelanggan }}</td>
                    <td class="text-center">{{ $item->alamat }}</td>
                    <td class="text-center">{{ $item->tarif->daya }}</td>
                    <td class="text-center">{{ $item->tagihan->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();

    </script>
</body>

</html>
