 document.getElementById('addIntegration').addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'flex';
        });

        document.querySelectorAll('.btn-danger').forEach(button => {
            button.addEventListener('click', function () {
                if (confirm('Voulez-vous vraiment supprimer cette intégration ?')) {
                    alert('Intégration supprimée');
                }
            });
        });

        document.getElementById('saveIntegration').addEventListener('click', function () {
            const name = document.getElementById('integrationName').value;
            const status = document.getElementById('integrationStatus').value;
            const description = document.getElementById('integrationDescription').value;

            if (name && status && description) {
                alert('Nouvelle intégration ajoutée');
                document.getElementById('overlay').style.display = 'none';
            } else {
                alert('Veuillez remplir tous les champs');
            }
        });

        document.getElementById('cancelIntegration').addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'none';
        });