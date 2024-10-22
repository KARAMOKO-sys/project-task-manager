   document.getElementById('sendMessage').addEventListener('click', function() {
            var message = document.getElementById('messageInput').value;
            if (message) {
                var chatBox = document.getElementById('chatBox');
                var newMessage = document.createElement('div');
                newMessage.className = 'message';
                newMessage.innerHTML = `
                    <div class="sender">Vous:</div>
                    <div class="text">${message}</div>
                `;
                chatBox.appendChild(newMessage);
                chatBox.scrollTop = chatBox.scrollHeight; // Scroll to the bottom
                document.getElementById('messageInput').value = '';
            } else {
                alert('Veuillez entrer un message.');
            }
        });

        document.getElementById('attachFile').addEventListener('click', function() {
            alert('Fonctionnalité de fichier attaché à implémenter.');
        });

        document.getElementById('filterDate').addEventListener('change', function() {
            var filterDate = this.value;
            // Logique de filtrage par date à implémenter
            alert('Filtrage par date sélectionnée : ' + filterDate);
        });