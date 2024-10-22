// Sample Data for additional archives
        var additionalArchives = [
            { title: 'Rapport d\'audit interne', date: '12/09/2023' },
            { title: 'Plan de projet - Phase 2', date: '01/08/2023' },
            { title: 'Résultats des ventes - Juin 2023', date: '30/06/2023' },
            { title: 'Compte-rendu de réunion de stratégie', date: '15/06/2023' }
        ];

        document.getElementById('loadMore').addEventListener('click', function() {
            var archiveList = document.getElementById('archiveList');
            additionalArchives.forEach(function(archive) {
                var newArchive = document.createElement('div');
                newArchive.className = 'archive-item';
                newArchive.innerHTML = `
                    <div class="title">${archive.title}</div>
                    <div class="date">${archive.date}</div>
                `;
                archiveList.appendChild(newArchive);
            });
            additionalArchives = []; // Clear additional archives once loaded
        });

        document.getElementById('filterDate').addEventListener('change', function() {
            var filterDate = this.value;
            // Implement date filtering logic here
            alert('Filtrage par date sélectionnée : ' + filterDate);
        });