@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                        <h2 class="fs-32 font-w700">{{ $totalKaryawan }}</h2>
                        <span class="fs-18 font-w500 d-block">Total Karyawan</span>
                        
                        <span class="d-block fs-16 font-w200">
                            <small class="text-danger">Data</small> Latest this month
                        </span>
                        <div class="progress-bar progress-animated"
                            style="width: 40%; height:10px;" role="progressbar">
                            <span class="sr-only">45% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex px-4 justify-content-between">
                    <div>
                        <h2 class="fs-32 font-w700">{{ $totalPenilaian }}</h2>
                        <span class="fs-18 font-w500 d-block">Total Penilaian</span>
                        <span class="d-block fs-16 font-w200">
                            <small class="text-danger">Data</small> Latest this month
                        </span>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6">
            <div class="card">
                <div class="card-body d-flex px-4 justify-content-between">
                @if($periodeAktif)
                    <div>
                        <h2 class="fs-20 font-w700">{{ $periodeAktif->nama }} </h2>
                        <span class="fs-18 font-w500 d-block">Periode Aktif</span>
                        <span class="d-block fs-16 font-100">
                            <small class="text-success">({{ $periodeAktif->tanggal_mulai }} s/d {{ $periodeAktif->tanggal_selesai }})</small>
                        </span>
                    </div>
                    @else
                        <div class="alert alert-warning">
                            Tidak ada periode penilaian yang aktif.
                        </div>
                    @endif
                    <div id="NewCustomers1" class="w-50"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0">

                    <h4 class="fs-20 font-w700">Statistika Penilaian</h4>

                    <div class="dropdown">
                        <div class="btn-link" data-bs-toggle="dropdown">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <circle cx="12.5" cy="3.5" r="2.5" fill="#A5A5A5"></circle>
                                <circle cx="12.5" cy="11.5" r="2.5" fill="#A5A5A5"></circle>
                                <circle cx="12.5" cy="19.5" r="2.5" fill="#A5A5A5"></circle>
                            </svg>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                            <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                        </div>
                    </div>

                </div>

                <div class="card-body pb-3">
                    <canvas id="chartBar" class="chartBar"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-progradient manage-project">
                        <div class="card-body">
                            <div class="row align-items-center">

                                <div class="col-xl-6 col-12">
                                    <h4 class="fs-24 font-w700 text-white">
                                        Manage your project in one touch
                                    </h4>

                                    <span class="fs-16 text-white d-block">
                                        Let SynergyTeam manage your project automatically with our best AI systems
                                    </span>
                                </div>

                                <div class="col-xl-6 col-12 text-end">
                                    <a href="https://synergyteam.id/" target="_blank" class="btn bg-white fs-18 btn-rounded">
                                        Try Free Now
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartBar').getContext('2d');

const chartLabels = @json($chartLabels);
const chartScores = @json($chartScores);

const maxScore = Math.max(...chartScores);

const barColors = chartScores.map(score => {
    if (score === 0) return "#b0b0b0";
    if (score === maxScore) return "#ff4b5c";
    return "#005F4A";
});

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: chartLabels,
        datasets: [{
            data: chartScores,
            backgroundColor: barColors,
            borderWidth: 1.5,
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: ctx => ctx.parsed.y === 0 ? "Belum Dinilai" : "Nilai: " + ctx.parsed.y
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    maxRotation: 60,
                    minRotation: 60,
                }
            },
            y: { beginAtZero: true }
        }
    }
});
</script>

@endsection
