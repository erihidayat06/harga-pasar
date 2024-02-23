@extends('layouts.main')
@section('container')
    <div class="jumbotron">
        <img src="/assets/img/jumbotron1.jpg" alt="">
        <div class="text-jumbotron position-absolute text-white">
            <div class="typing-container">

                <h2 class="fw-bold" id="typing-text"></h2>
            </div>

            <h2>Sistem Informsi</h2>
            <h2>Pemantauan Harga</h2>

            <a href="#masuk" class="btn btn-primary fw-bold mt-4">Jelajahi</a>
        </div>
    </div>
    <h1 class="fw-bold mt-5 text-center" id="masuk"> Harga Komoditi Kabupaten Brebes</h1>

    @include('harga')

    <h1 class="fw-bold mt-5 text-center" id="masuk"> Harga Komoditi Setiap Pasar</h1>
    <div class="container mt-5 text-center position-relative mb-5">
        {{-- Card Pencarian --}}

        <form action="/" method="POST" role="search">
            @csrf
            <div class="card mt-5 shadow rounded-5" style="width: 95%">
                <div class="card-body">
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
                        <div class="col-lg-3">
                            <select class="form-select form-select-sm text-dark custom-dropdown"
                                aria-label="Small select example" name="pasar">
                                @if (request('pasar') != null)
                                    <option value="{{ request('pasar') }}">{{ request('pasar') }}</option>
                                @endif
                                @foreach ($pasars as $pasar)
                                    @if (request('pasar') != null)
                                        @if (request('pasar') != $pasar)
                                            <option value="{{ $pasar }}">{{ $pasar }}</option>
                                        @endif
                                    @else
                                        <option value="{{ $pasar }}">{{ $pasar }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>


                        <div class="col-lg-3">
                            <select class="form-select form-select-sm text-dark custom-dropdown "
                                aria-label="Small select example" name="produk">

                                @if (request('produk') != null)
                                    <option value="{{ request('produk') }}">
                                        {{ ucwords(str_replace('_', ' ', request('produk'))) }}</option>
                                    @for ($i = 0; $i < count($produks['produk']); $i++)
                                        @if ($produks['barang'][$i] != request('produk'))
                                            <option value="{{ $produks['barang'][$i] }}">{{ $produks['produk'][$i] }}
                                            </option>
                                        @endif
                                    @endfor
                                @else
                                    @for ($i = 0; $i < count($produks['produk']); $i++)
                                        <option value="{{ $produks['barang'][$i] }}">{{ $produks['produk'][$i] }}</option>
                                    @endfor
                                @endif


                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="date"
                                value="{{ request('dari') == null ? date('Y-m-d', strtotime('-1 month')) : date('Y-m-d', strtotime(request('dari'))) }}"
                                class="text-dark custom-date-input" name="dari">
                        </div>


                        <div class="col-lg-3">
                            <input type="date"
                                value="{{ request('sampai') == null ? date('Y-m-d', strtotime('+7 day', strtotime(date('Y-m-d')))) : date('Y-m-d', strtotime(request('sampai'))) }}"
                                class="text-dark custom-date-input" name="sampai">
                        </div>

                    </div>
                </div>
            </div>

            {{-- Card Pencarian --}}



            {{-- Tombol Bulat --}}
            <button type="submit" onclick="formKirim(this,'none')"
                class="btn btn-primary btn-circle shadow position-absolute top-50 end-0 translate-middle-y"><i
                    class="bi bi-search"></i></button>
            {{-- Tombol Bulat --}}
            {{-- Tombol Bulat --}}
            <button type="submit" id="button-kirim" style="display:none"
                class="btn btn-primary btn-circle shadow position-absolute top-50 end-0 translate-middle-y">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
            {{-- Tombol Bulat --}}
        </form>
    </div>




    <div class="container">
        <h1 class="fw-bold">
            Data Harga
            {{ request('produk') == null ? 'Beras Premium' : ucwords(str_replace('_', ' ', request('produk'))) }}
        </h1>
        <h1 class="fw-bold text-danger">{{ request('pasar') == null ? 'Pasar Winduaji' : request('pasar') }}</h1>
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
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col ">
                <div class="card h-100 text-center rounded-4">
                    <h5 class="fw-bold">Kenaikan Harga</h5>
                    <h4>Minggu ini</h4>
                    <hr>
                    <table>
                        <tr>
                            <th>Awal</th>
                            <th>Sekarang</th>
                        </tr>
                        <tr>
                            <td>Rp {{ number_format($kenaikan_minggu['awal'], '0', '', '.') }}</td>
                            <td>Rp {{ number_format($kenaikan_minggu['akhir'], '0', '', '.') }}</td>
                        </tr>
                    </table>
                    <div class="card-body bg-card1">

                        <h3 class="card-title text-white fw-bold"><span>
                                @if ($kenaikan_minggu['naik'] > 0)
                                    <i class="bi bi-caret-up-square fs-5 p-2"></i>
                                @elseif ($kenaikan_minggu['naik'] < 0)
                                    <i class="bi bi-caret-down-square fs-5 p-2"></i>
                                @else
                                    <i class="bi bi-align-center fs-5 p-2"></i>
                                @endif
                            </span>Rp
                            {{ number_format($kenaikan_minggu['naik'], '0', '', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="card h-100 text-center rounded-4">
                    <h5 class="fw-bold">Kenaikan Harga</h5>
                    <h4>Bulan ini</h4>
                    <hr>
                    <table>
                        <tr>
                            <th>Awal</th>
                            <th>Sekarang</th>
                        </tr>
                        <tr>
                            <td>Rp {{ number_format($kenaikan_bulan['awal'], '0', '', '.') }}</td>
                            <td>Rp {{ number_format($kenaikan_bulan['akhir'], '0', '', '.') }}</td>
                        </tr>
                    </table>
                    <div class="card-body bg-card2">
                        <h3 class="card-title text-white fw-bold"><span>
                                @if ($kenaikan_bulan['naik'] > 0)
                                    <i class="bi bi-caret-up-square fs-5 p-2"></i>
                                @elseif ($kenaikan_bulan['naik'] < 0)
                                    <i class="bi bi-caret-down-square fs-5 p-2"></i>
                                @else
                                    <i class="bi bi-align-center fs-5 p-2"></i>
                                @endif
                            </span>Rp {{ number_format($kenaikan_bulan['naik'], '0', '', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="card h-100 text-center rounded-4">
                    <h5 class="fw-bold">Kenaikan Harga</h5>
                    <h4>Tahun ini</h4>
                    <hr>
                    <table>
                        <tr>
                            <th>Awal</th>
                            <th>Sekarang</th>
                        </tr>
                        <tr>
                            <td>Rp {{ number_format($kenaikan_tahun['awal'], '0', '', '.') }}</td>
                            <td>Rp {{ number_format($kenaikan_tahun['akhir'], '0', '', '.') }}</td>
                        </tr>
                    </table>
                    <div class="card-body bg-card3">
                        <h3 class="card-title text-white fw-bold"><span>
                                @if ($kenaikan_tahun['naik'] > 0)
                                    <i class="bi bi-caret-up-square fs-5 p-2"></i>
                                @elseif ($kenaikan_tahun['naik'] < 0)
                                    <i class="bi bi-caret-down-square fs-5 p-2"></i>
                                @else
                                    <i class="bi bi-align-center fs-5 p-2"></i>
                                @endif
                            </span>Rp {{ number_format($kenaikan_tahun['naik'], '0', '', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mb-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Grafik Harga Tanggal
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
                <div id="areaChart"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const series = {
                            "monthDataSeries1": {
                                "prices": {{ $harga }},
                                "dates": <?php echo $tanggal; ?>
                            },

                        }
                        new ApexCharts(document.querySelector("#areaChart"), {
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
        </div>
    </div>
@endsection
