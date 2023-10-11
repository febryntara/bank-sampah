@extends('layouts.dashboard')

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Laporan Umum
                        </h2>
                    </div>
                    <div class="report-box-2 intro-y mt-5">
                        <div class="box grid grid-cols-12">
                            <div class="col-span-12 lg:col-span-3 px-8 py-12 flex flex-col justify-center">
                                <i data-lucide="wallet" class="w-10 h-10 text-primary"></i>
                                <div class="justify-start flex items-center text-slate-600 dark:text-slate-300 mt-12">
                                    Sampah Diterima <i data-lucide="alert-circle" class="tooltip w-4 h-4 ml-1.5"
                                        title="Total Sampah Diterima {{ number_format($total_kg) }} Kg"></i> </div>
                                <div class="flex items-center justify-start mt-4">
                                    <div class="text-2xl font-medium pl-3 relative ml-0.5"> <span
                                            class="text-xl font-medium top-0 -ml-[15px]">Kg</span>
                                        {{ number_format($total_kg) }}
                                    </div>
                                    <a class="text-slate-500 ml-4" href=""> <i data-lucide="refresh-ccw"
                                            class="w-4 h-4"></i> </a>
                                </div>
                                {{-- <div class="mt-4 text-slate-500 text-xs">Last updated 1 hour ago</div> --}}
                            </div>
                            <div
                                class="col-span-12 lg:col-span-9 p-8 border-t lg:border-t-0 lg:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                                <div class="tab-content px-5 pb-5">
                                    <div class="tab-pane active grid grid-cols-12 gap-y-8 gap-x-10" id="weekly-report"
                                        role="tabpanel" aria-labelledby="weekly-report-tab">
                                        <div class="col-span-6 sm:col-span-6 md:col-span-3">
                                            <div class="text-slate-500">Jenis Sampah</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base font-semibold">{{ $jenis_sampah }}</div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                            <div class="text-slate-500">Total Setoran</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base font-semibold">{{ $total_setoran }} Kali</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <div class="col-span-12 mt-8">
                    <!-- BEGIN: grafik Setoran -->
                    <div class="sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Grafik Setoran
                            </h2>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <div class="mt-3">
                                <div class="h-[213px]">
                                    <canvas id="setoran-chart"></canvas>
                                </div>
                            </div>
                            <div class="w-52 sm:w-auto mx-auto mt-8">
                                @foreach ($sampah as $item)
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                        <span class="truncate">{{ $item }}</span> <span
                                            class="font-medium ml-auto">{{ number_format(($sampah_setoran[$loop->index] / $total_kg) * 100, 1) }}%</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- END: Weekly Top Seller -->
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Contoh data sampel
        let sampah = @json($sampah);
        let sampah_setoran = @json($sampah_setoran);

        const barchart = document.getElementById('setoran-chart');

        new Chart(barchart, {
            type: 'bar',
            data: {
                labels: sampah,
                datasets: [{
                    label: 'Setoran',
                    data: sampah_setoran,
                    backgroundColor: 'rgb(22,78,99)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var value = context.raw;
                                var formattedValue = new Intl.NumberFormat('id-ID', {
                                    style: 'decimal',
                                    minimumFractionDigits: 0
                                }).format(value);
                                return "Disetor: " + formattedValue + " Kg";
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: 11,
                            },
                            color: 'rgb(30, 58, 138)',
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                        }
                    },
                    y: {
                        ticks: {
                            display: false,
                        },
                        grid: {
                            color: 'rgb(226, 232, 240)',
                            borderDash: [2, 2],
                            drawBorder: false,
                        }
                    }
                }
            }
        });
    </script>
@endpush
