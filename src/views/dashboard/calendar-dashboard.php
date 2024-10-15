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
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        #calendar {
            max-width: 100%;
            margin: 20px auto;
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

        .btn-custom {
            background-color: #28a745;
            color: white;
        }

        .btn-custom:hover {
            background-color: #218838;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-footer {
            justify-content: space-between;
        }

        .add-event {
            margin: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Calendrier</h1>
        <div class="add-event">
            <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#addEventModal">Ajouter un Événement</button>
        </div>
        <div id="calendar"></div>
    </div>

    <!-- Add Event Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Ajouter un Événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addEventForm">
                        <div class="mb-3">
                            <label for="eventTitle" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="eventTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventStart" class="form-label">Date de Début</label>
                            <input type="date" class="form-control" id="eventStart" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventEnd" class="form-label">Date de Fin</label>
                            <input type="date" class="form-control" id="eventEnd" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-custom" id="saveEvent">Ajouter Événement</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                selectable: true,
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
                                        <h5 class="modal-title" id="eventModalLabel">Détails de l'Événement</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Titre:</strong> ${title}</p>
                                        <p><strong>Date de Début:</strong> ${start}</p>
                                        <p><strong>Date de Fin:</strong> ${end}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" id="deleteEvent" data-id="${info.event.id}">Supprimer</button>
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

                    $('#deleteEvent').on('click', function() {
                        var eventId = $(this).data('id');
                        calendar.getEventById(eventId).remove();
                        // Here you would send a request to delete the event from the server
                        eventModal.hide();
                    });
                }
            });
            calendar.render();

            // Add Event functionality
            document.getElementById('saveEvent').addEventListener('click', function() {
                var title = document.getElementById('eventTitle').value;
                var start = document.getElementById('eventStart').value;
                var end = document.getElementById('eventEnd').value;

                if (title && start && end) {
                    calendar.addEvent({
                        id: Date.now(), // Use a unique ID for the event
                        title: title,
                        start: start,
                        end: end,
                        allDay: true
                    });
                    $('#addEventModal').modal('hide');
                    document.getElementById('addEventForm').reset();
                }
            });
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
