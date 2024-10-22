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