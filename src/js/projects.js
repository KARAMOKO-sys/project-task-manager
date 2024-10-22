    var ctx = document.getElementById('projectStatusChart').getContext('2d');
        var projectStatusChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Projet 1', 'Projet 2', 'Projet 3', 'Projet 4'],
                datasets: [{
                    label: 'Projets terminés',
                    data: [2, 3, 1, 5],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }, {
                    label: 'Projets en cours',
                    data: [3, 2, 4, 1],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [5, 5]
                        }
                    }
                }
            }
        });