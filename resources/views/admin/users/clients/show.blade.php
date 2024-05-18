<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client Details') }}
        </h2>
    </x-slot>

    <div class="px-12 py-4">
        <!-- Client Information -->
        <div class="bg-gradient-to-br from-purple-400 to-blue-500 p-4 rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <img   src="https://images.unsplash.com/photo-1564564321837-a57b7070ac4f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Profile" class="w-24 h-24 rounded-full object-cover avatar">
                    <div>
                        <h3 class="text-2xl font-semibold text-white">{{ $client->prenom }} {{ $client->nom }}</h3>
                        <p class="text-gray-200">{{ $client->email }}</p>
                        <p class="text-gray-200">{{ $client->telephone }}</p>
                    </div>
                </div>
               
            </div>
            <div class="mt-4 flex items-center justify-between">
                <div>
                    <span class="text-white text-lg">Nombre de courses: {{ array_sum($data['trips']) }}</span>
                </div>
                <div>
                    <span class="text-white text-lg">Distance totale: {{ array_sum($data['distances']) }} km</span>
                </div>
                <div>
                    <span class="text-white text-lg">Dépense totale: {{ array_sum($data['expenses']) }} Fcfa</span>
                </div>
                <div>
                    <span class="text-white text-lg">Joined: {{ $client->created_at->format('Y-m-d') }}</span>
                </div>
            </div>
        </div>
        

        <!-- Charts -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-8">
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <canvas id="tripsChart"></canvas>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <canvas id="distancesChart"></canvas>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <canvas id="expensesChart"></canvas>
            </div>
        </div>

        

    </div>

    <!-- Inclure les scripts directement -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tripsData = @json($data['trips']);
            const distancesData = @json($data['distances']);
            const expensesData = @json($data['expenses']);

            const ctx1 = document.getElementById('tripsChart').getContext('2d');
            const ctx2 = document.getElementById('distancesChart').getContext('2d');
            const ctx3 = document.getElementById('expensesChart').getContext('2d');

            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Courses',

                        data: tripsData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,   
                        },
                        x: {
                            beginAtZero: true,
                            ticks: {
                                color: '', // Couleur des labels
                                font: {
                                    size: 14, // Taille de la police
                                    family: 'Arial', // Famille de la police
                                    style: 'bold', // Style de la police
                                },
                                padding: 10, // Espace entre les labels et l'axe des x
                            }
                        },
                    }
                }
            });

            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Distances (km)',
                        data: distancesData,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            ticks: {
                                color: '', // Couleur des labels
                                font: {
                                    size: 14, // Taille de la police
                                    family: 'Arial', // Famille de la police
                                    style: 'bold', // Style de la police
                                },
                                padding: 10, // Espace entre les labels et l'axe des x
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(ctx3, {
                type: 'radar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Dépenses en Fcfa',
                        data: expensesData,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
