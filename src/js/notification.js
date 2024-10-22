       document.getElementById('clearNotifications').addEventListener('click', function () {
            if (confirm('Voulez-vous vraiment effacer toutes les notifications ?')) {
                alert('Toutes les notifications ont été effacées');
                document.querySelectorAll('.notification-item').forEach(item => item.remove());
            }
        });

        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function () {
                if (confirm('Voulez-vous vraiment supprimer cette notification ?')) {
                    alert('Notification supprimée');
                    this.closest('.notification-item').remove();
                }
            });
        });

        document.getElementById('searchButton').addEventListener('click', function () {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            document.querySelectorAll('.notification-item').forEach(item => {
                const message = item.querySelector('p').textContent.toLowerCase();
                if (message.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        document.getElementById('applyFilter').addEventListener('click', function () {
            const statusFilter = document.getElementById('statusFilter').value;
            const dateFilter = document.getElementById('dateFilter').value;

            document.querySelectorAll('.notification-item').forEach(item => {
                const itemStatus = item.getAttribute('data-status');
                const itemDate = item.querySelector('p').textContent.split(' ')[1];

                let statusMatch = statusFilter === 'all' || itemStatus === statusFilter;
                let dateMatch = !dateFilter || itemDate === dateFilter;

                if (statusMatch && dateMatch) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });