$(document).ready(function () {
            var reportsTable = $('#reportsTable').DataTable({
                ajax: 'fetch-reports.php',
                columns: [
                    { data: 'nom' },
                    { data: 'date' },
                    { data: 'type' },
                    { data: 'description' },
                    {
                        data: null,
                        render: function (data) {
                            return '<button class="btn-view btn btn-sm me-2">Voir</button>' +
                                '<button class="btn-download btn btn-sm me-2">Télécharger</button>' +
                                '<button class="btn-details btn btn-sm">Détails</button>';
                        }
                    }
                ]
            });

            $('#exportReports').click(function () {
                alert('Exporter les rapports');
            });

            $('#reportsTable').on('click', '.btn-view', function () {
                var data = reportsTable.row($(this).parents('tr')).data();
                alert('Voir le rapport: ' + data.nom);
            });

            $('#reportsTable').on('click', '.btn-download', function () {
                var data = reportsTable.row($(this).parents('tr')).data();
                window.location.href = 'download-report.php?id=' + data.id;
            });

            $('#reportsTable').on('click', '.btn-details', function () {
                var data = reportsTable.row($(this).parents('tr')).data();
                $('#reportName').val(data.nom);
                $('#reportDate').val(data.date);
                $('#reportType').val(data.type);
                $('#reportDescription').val(data.description);
                $('#viewReportModal').show();
            });

            $('.close, .btn-modal-cancel').click(function () {
                $('#viewReportModal').hide();
            });

            $('#searchReport').on('keyup', function () {
                reportsTable.search(this.value).draw();
            });

            $('#filterType').change(function () {
                var filterType = $(this).val();
                reportsTable.column(2).search(filterType).draw();
            });

            $('#filterDate').change(function () {
                var filterDate = $(this).val();
                reportsTable.ajax.url('fetch-reports.php?date=' + filterDate).load();
            });
        });