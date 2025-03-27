<div>
    <div class="row">
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="bi bi-people-fill"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Karyawan</span>
                    <span class="info-box-number">{{ $jumlahKaryawan }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon text-bg-success shadow-sm">
                    <i class="bi bi-people-fill"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Karyawan Aktif</span>
                    <span class="info-box-number">{{ $jumlahKaryawanAktif }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
                <span class="info-box-icon text-bg-secondary shadow-sm">
                    <i class="bi bi-people-fill"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Karyawan Non Aktif</span>
                    <span class="info-box-number">{{ $jumlahKaryawanNonAktif }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">

            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Detail Karyawan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-12">
                            <div id="pie-chart"></div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </div>
            </div>
        </div>
    </div>


    <script>
        //-------------
        // - PIE CHART -
        //-------------
        const departments = @json($departments->pluck('name_department'));
        const colors = @json($assignedColors);
        const series = @json($employeeCounts);
        const pie_chart_options = {
            series: series,
            chart: {
                type: 'donut',
            },
            labels: departments,
            dataLabels: {
                enabled: false,
            },
            colors: colors,
        };

        const pie_chart = new ApexCharts(document.querySelector('#pie-chart'), pie_chart_options);
        pie_chart.render();

        //-----------------
        // - END PIE CHART -
        //-----------------
    </script>
</div>
