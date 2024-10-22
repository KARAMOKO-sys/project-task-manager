 document.getElementById('addFile').addEventListener('click', function() {
            var fileName = prompt('Entrez le nom du fichier:');
            if (fileName) {
                var table = document.getElementById('fileTable').getElementsByTagName('tbody')[0];
                var newRow = table.insertRow();
                newRow.innerHTML = `
                    <td>${fileName}</td>
                    <td>${new Date().toLocaleDateString()}</td>
                    <td>0 KB</td>
                    <td>
                        <button class="btn btn-primary btn-sm">Télécharger</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                `;
                document.getElementById('message').innerText = 'Fichier ajouté avec succès !';
                document.getElementById('message').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('message').style.display = 'none';
                }, 3000);
            }
        });

        document.getElementById('searchFile').addEventListener('keyup', function() {
            var filter = this.value.toLowerCase();
            var rows = document.querySelectorAll('.file-table tbody tr');
            rows.forEach(row => {
                var fileName = row.cells[0].textContent.toLowerCase();
                row.style.display = fileName.includes(filter) ? '' : 'none';
            });
        });