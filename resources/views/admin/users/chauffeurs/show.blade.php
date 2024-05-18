<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="px-12 py-4">
        <div class="flex gap-2">
            <div class="bg-white w-1/3 min-h-40 px-4 py-2 flex flex-col gap-6">
                <div class="flex  py-4">
                    <div class="items-center justify-center w-10 h-10  mr-4 sm:w-20 sm:h-20">
                        <img alt="profil"
                             src="https://images.unsplash.com/photo-1564564321837-a57b7070ac4f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                             class="object-cover mx-auto rounded-full sm:w-20 sm:h-20" />
                    </div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $chauffeur->prenom }} {{ $chauffeur->nom }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Email: {{ $chauffeur->email }}
                        </p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Phone Number: {{ $chauffeur->telephone }}
                        </p>
                    </div>
                </div>
                <div class="flex items-start justify-between">
                    <div class="flex flex-col">
                        <span class="text-gray-500">Joined</span>
                        <span class="text-black">{{ $chauffeur->created_at->format('Y-m-d') }}</span>
                    </div>
                    <div class="flex items-start flex-col">
                        <span class="text-gray-500">Number of Courses</span>
                        <span class="text-black">100</span>
                    </div>
                    <div class="flex items-start flex-col">
                        <span class="text-gray-500">Rating</span>
                        <div class="flex items-center">
                            {{-- <span class="text-gray-500">Rating</span> --}}
                            <div class="">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= 3)
                                        <span class="text-yellow-500">&#9733;</span> <!-- Étoile pleine -->
                                    @else
                                        <span class="text-gray-400">&#9734;</span> <!-- Étoile vide -->
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white w-1/3 min-h-40  px-4 py-2 flex flex-col gap-6">
                <div class="flex py-4">
                    <div class="items-center justify-center w-5 h-5  mr-4 sm:w-20 sm:h-20 bg-red-500 rounded-full">
                        <img alt="profil"
                             src="https://static.vecteezy.com/ti/vecteur-libre/p3/5439465-conception-d-illustration-de-dessin-anime-de-voiture-de-couleur-rouge-gratuit-vectoriel.jpg"
                             class="object-cover sm:w-20 sm:h-20" />
                    </div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Ford Fiesta
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            4 places assises
                        </p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            Rouge
                        </p>
                    </div>
                </div>
                <div class="flex items-start justify-between">
                    <div class="flex flex-col">
                        <span class="text-gray-500">Matricule</span>
                        <span class="text-black">{{ $chauffeur->matricule }}</span>
                    </div>
                    <div class="flex items-start flex-col">
                        <span class="text-gray-500">Plaque</span>
                        <span class="text-black">A522 wwww</span>
                    </div>
                    <div class="flex items-start flex-col">
                        <span class="text-gray-500">Marque</span>
                        <span class="text-black">Ford</span>
                    </div>
                </div>
            </div>

            <div class="bg-white w-1/3 min-h-40   px-4 py-2 flex flex-col gap-6">
                <div class="flex py-4">
                    <div class="items-center justify-center w-5 h-5  mr-4 p-4 text-white sm:w-20 sm:h-20 bg-red-500 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 10.5v2a1 1 0 0 1-1 1H1.5a1 1 0 0 1-1-1V5a3 3 0 0 1 3-3H10v2.5"/><path d="M13 7.5H9.5A.5.5 0 0 0 9 8v2a.5.5 0 0 0 .5.5H13a.5.5 0 0 0 .5-.5V8a.5.5 0 0 0-.5-.5m-1 0v-2a1 1 0 0 0-1-1H3.5"/></g></svg>
                    </div>
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            125
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            courses realisées
                        </p>
                    </div>
                </div>
                <div class="flex items-start justify-between">
                    <div class="flex flex-col">
                        <span class="text-gray-500">Economie realise</span>
                        <span class="text-black">123456 Fcfa</span>
                    </div>
                    <div class="flex items-start flex-col">
                        <span class="text-gray-500">Comission</span>
                        <span class="text-black">12000 Fcfa</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Charts --}}
        <div class="flex flex-wrap items-center justify-between mt-8 p-4 bg-white">

            <div class="w-full md:w-1/2 lg:w-1/3">
                <canvas id="coursesChart"></canvas>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <canvas id="distancesChart"></canvas>
            </div>
            
            <div class="w-full md:w-1/2 lg:w-1/3">
                <canvas id="evaluationsChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Inclure les scripts directement si `@section('scripts')` ne fonctionne pas --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const coursesData = @json($data['courses']);
            const distancesData = @json($data['distances']);
            const evaluationsData = @json($data['evaluations']);

            alert(coursesData);
            alert(distancesData);
            alert(evaluationsData);


            const ctx1 = document.getElementById('coursesChart').getContext('2d');
            const ctx2 = document.getElementById('distancesChart').getContext('2d');
            const ctx3 = document.getElementById('evaluationsChart').getContext('2d');

            new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Courses',
                        data: coursesData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
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
                        label: 'Evaluations',
                        data: evaluationsData,
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
