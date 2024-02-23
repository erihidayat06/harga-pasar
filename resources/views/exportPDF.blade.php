<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
        }

        .card h5 {
            color: #333;
        }

        .card hr {
            margin-top: 10px;
            margin-bottom: 10px;
            border: 0;
            border-top: 1px solid #ccc;
        }

        .card table {
            width: 100%;
            margin-bottom: 20px;
        }

        .card table th {
            padding: 8px;
            text-align: left;
            font-weight: bold;
        }

        .card table td {
            padding: 8px;
            text-align: left;
        }

        .card-body {
            padding: 15px;
            border-radius: 5px;
        }

        .card-title {
            margin-bottom: 0;
        }

        .row-cols-1>.col {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .row-cols-md-3>* {
            flex: 0 0 calc(33.333% - 1rem);
            max-width: calc(33.333% - 1rem);
        }

        @media print {
            .cart {
                display: block !important;
                visibility: visible !important;
            }

            .apexcharts-canvas {
                display: block !important;
                visibility: visible !important;
            }
        }
    </style>
</head>

<body>
    <h1>Harga Komoditi Kabupaten Brebes</h1>
    <?php


    use App\Models\Hargabarang;

    $i = 0;
    foreach (config('dataproduk.barang') as $produk) {
        ${'tanggal' . $i} = [date('d M Y')];
     ${'harga' . $i} = [0];
        // Perhitungan Perminggu
     ${'perhari' . $i} = Hargabarang::tanggal(request(['dari', 'sampai']))
            ->orderBy('created_at', 'asc')
            ->get()
            ->unique('created_at');
        if (count(${'perhari' . $i}) > 0) {
         ${'tanggal' . $i} = [];
         ${'harga' . $i} = [];
            foreach (${'perhari' . $i} as $hari) {
             ${'model' . $i} = Hargabarang::where('created_at', $hari->created_at);
             ${'tanggal' . $i}[] = date('d M Y', strtotime($hari->created_at));
             ${'harga' . $i} = number_format(${'model' . $i}->sum($produk) / count(${'model' . $i}->get()), 2, '.', '');
             ${'total' . $i}[] = (float) ${'harga' . $i};
            }
        }



        // Data Kenikan
        $perminggu1 = Hargabarang::minggu()->orderBy('created_at', 'asc')->get()->pluck($produk)->toArray();

        $data_minggu1 = ['naik' => 0, 'awal' => 0, 'akhir' => 0];
        if (count($perminggu1)) {
            $awal_minggu1 = array_sum($perminggu1) / count($perminggu1);
            $akhir_minggu1 = end($perminggu1);
            $data_minggu1 = ['naik' => $akhir_minggu1 - $awal_minggu1, 'awal' => $awal_minggu1, 'akhir' => $akhir_minggu1];
        }

        // Data Kenikan Perbulan
        $perbulan1 = Hargabarang::bulanlalu()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();
        $perbulan2 = Hargabarang::bulan()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();

        $data_bulan1 = ['naik' => 0, 'awal' => 0, 'akhir' => 0];

        if (count($perbulan1)) {
            $awal_bulan1 = array_sum($perbulan1) / count($perbulan1);
            $akhir_bulan1 = array_sum($perbulan2) / count($perbulan2);
            $data_bulan1 = ['naik' => $akhir_bulan1 - $awal_bulan1, 'awal' => $awal_bulan1, 'akhir' => $akhir_bulan1];
        }

        // Data Kenikan PerTahun
        $pertahun1 = Hargabarang::tahunlalu()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();
        $pertahun2 = Hargabarang::tahun()->orderBy('created_at', 'asc')->get()->unique('created_at')->pluck($produk)->toArray();
        $data_tahun1 = ['naik' => 0, 'awal' => 0, 'akhir' => 0];

        if (count($pertahun1)) {
            $awal_tahun1 = array_sum($pertahun1) / count($pertahun1);
            $akhir_tahun1 = array_sum($pertahun2) / count($pertahun2);
            $data_tahun1 = ['naik' => $akhir_tahun1 - $awal_tahun1, 'awal' => $awal_tahun1, 'akhir' => $akhir_tahun1];
        }

?>
    <div class="container">
        <h1 class="fw-bold">
            Data Harga
            {{ ucwords(str_replace('_', ' ', $produk)) }}
        </h1>

        <p>Perubahan Harga tanggal
            @if (!request('dari'))
                {{ date('d F Y', strtotime('-1 month')) }}
            @else
                {{ date('d F Y', strtotime(request('dari'))) }}
            @endif

            -
            @if (!request('dari'))
                {{ date('d F Y', strtotime('+7 day', strtotime(date('Y-m-d')))) }}
            @else
                {{ date('d F Y', strtotime(request('sampai'))) }}
            @endif

        </p>
    </div>

    <div class="container mt-5 mb-5">
        <table>
            <td>
                <div class="col ">
                    <div class="card h-100 text-center rounded-4">
                        <h5 class="fw-bold">data Harga</h5>
                        <h4>Minggu ini</h4>
                        <hr>
                        <table>
                            <tr>
                                <th>Awal</th>

                            </tr>
                            <tr>
                                <td>Rp {{ number_format($data_minggu1['awal'], '0', '', '.') }}</td>
                                <td>Rp {{ number_format($data_minggu1['akhir'], '0', '', '.') }}</td>
                            </tr>
                        </table>
                        <div class="card-body bg-card1">
                            <hr>
                            <h3 class="card-title text-white fw-bold"><span>

                                </span>Rp
                                {{ number_format($data_minggu1['naik'], '0', '', '.') }}
                            </h3>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="col ">
                    <div class="card h-100 text-center rounded-4">
                        <h5 class="fw-bold">data Harga</h5>
                        <h4>Bulan ini</h4>
                        <hr>
                        <table>
                            <tr>
                                <th>Awal</th>
                                <th>Sekarang</th>
                            </tr>
                            <tr>
                                <td>Rp {{ number_format($data_bulan1['awal'], '0', '', '.') }}</td>
                                <td>Rp {{ number_format($data_bulan1['akhir'], '0', '', '.') }}</td>
                            </tr>
                        </table>
                        <div class="card-body bg-card2">
                            <hr>
                            <h3 class="card-title text-white fw-bold"><span>
                                </span>Rp {{ number_format($data_bulan1['naik'], '0', '', '.') }}
                            </h3>
                        </div>
                    </div>
                </div>
            </td>
            <td>

                <div class="col ">
                    <div class="card h-100 text-center rounded-4">
                        <h5 class="fw-bold">data Harga</h5>
                        <h4>Tahun ini</h4>
                        <hr>
                        <table>
                            <tr>
                                <th>Awal</th>
                                <th>Sekarang</th>
                            </tr>
                            <tr>
                                <td>Rp {{ number_format($data_tahun1['awal'], '0', '', '.') }}</td>
                                <td>Rp {{ number_format($data_tahun1['akhir'], '0', '', '.') }}</td>
                            </tr>
                        </table>
                        <div class="card-body bg-card3">
                            <hr>
                            <h3 class="card-title text-white fw-bold"><span>
                                </span>Rp {{ number_format($data_tahun1['naik'], '0', '', '.') }}
                            </h3>
                        </div>
                    </div>
                </div>
            </td>
        </table>



    </div>


    <div class="container mb-5" style="margin-bottom: 700px">

        <h5>Grafik Harga Tanggal
            @if (!request('dari'))
                {{ date('d F Y', strtotime('-1 month')) }}
            @else
                {{ date('d F Y', strtotime(request('dari'))) }}
            @endif

            -
            @if (!request('dari'))
                {{ date('d F Y', strtotime('+7 day', strtotime(date('Y-m-d')))) }}
            @else
                {{ date('d F Y', strtotime(request('sampai'))) }}
            @endif
        </h5>

        <!-- Area Chart -->
        <div id="{{ $produk }}" class="apexcharts-canvas" style="width: 50%"></div>

        <script>
            var produk = 1;
            document.addEventListener("DOMContentLoaded", () => {
                const series = {
                    "monthDataSeries1": {
                        "prices": {{ json_encode(${'total' . $i}) }},
                        "dates": <?php echo json_encode(${'tanggal' . $i}); ?>
                    },

                }
                new ApexCharts(document.querySelector("#{{ $produk }}"), {
                    series: [{
                        name: "Harga Produk",
                        data: series.monthDataSeries1.prices
                    }],
                    chart: {
                        type: 'area',
                        height: 350,
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    subtitle: {
                        text: 'Price Movements',
                        align: 'left'
                    },
                    labels: series.monthDataSeries1.dates,
                    xaxis: {
                        type: 'datetime',
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            }
                        },
                        opposite: true
                    },
                    legend: {
                        horizontalAlign: 'left'
                    }
                }).render();
            });
        </script>
        <!-- End Area Chart -->

    </div>



    <?php
$i ++;
} ?>

    <!-- Vendor JS Files -->






    <!-- Template Main JS File -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>




</html>
