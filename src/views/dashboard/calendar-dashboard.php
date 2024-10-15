<!-- calendar-dashboard.php -->
<head>
    <!-- Header and style -->
    <?php
    $file = __DIR__ . '/partials-dashboard/header-dashboard.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Le fichier $file n'existe pas.";
    }
    ?>

    <!-- Navigation -->
    <?php
        $file = __DIR__ . '/partials-dashboard/nav-bar-dashboard.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            echo "Le fichier $file n'existe pas.";
        }
    ?>
</head>

<?php
    require_once __DIR__ . '/partials-dashboard/navigation.php';
?>
<!-- Sidebar -->
<?php renderSidebar(); ?>

<div class="container">

    <!-- Main Content -->
    <style>
        body {
            background-color: #f4f6f9;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }

        #calendar {
            max-width: 100%;
            margin: 0 auto;
        }

        .fc .fc-daygrid-day-number {
            color: #007bff;
        }

        .fc .fc-event {
            background-color: #007bff;
            border: none;
            color: white;
        }

        .fc .fc-event:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Calendrier</h1>
        <div id="calendar"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                events: 'fetch-events.php', // URL to fetch events
                eventClick: function(info) {
                    var title = info.event.title;
                    var start = info.event.start.toLocaleDateString();
                    var end = info.event.end ? info.event.end.toLocaleDateString() : 'N/A';
                    
                    var modalHtml = `
                        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="eventModalLabel">Détails de l'événement</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Titre:</strong> ${title}</p>
                                        <p><strong>Date de début:</strong> ${start}</p>
                                        <p><strong>Date de fin:</strong> ${end}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    $('body').append(modalHtml);
                    var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                    eventModal.show();
                    
                    eventModal.on('hidden.bs.modal', function () {
                        $('#eventModal').remove();
                    });
                }
            });
            calendar.render();
        });
    </script>

    <footer>
        <?php
            $file = __DIR__ . '/partials-dashboard/footer-dashboard.php';
            if (file_exists($file)) {
                require_once $file;
            } else {
                echo "Le fichier $file n'existe pas.";
            }
        ?>
    </footer>
</div>

