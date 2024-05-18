<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg h-full flex justify-between items-center p-8 transform transition-transform hover:scale-105 duration-500">
                <div class="p-6 text-gray-900 w-3/5">
                    <div>
                        <div class="px-4 sm:px-0 flex justify-between items-center">
                            <h3 class="font-semibold leading-7 text-gray-900 text-2xl flex items-center gap-2">
                                <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 14.67c-1.1 0-2-.9-2-2h-6v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4h-6c0 1.1-.9 2-2 2zm0-10.67c1.1 0 2 .9 2 2h6v4h-6c0 1.1-.9 2-2 2-1.1 0-2-.9-2-2h-6v-4h6c0-1.1.9-2 2-2zm0 4c.55 0 1-.45 1-1s-.45-1-1-1-.99.45-1 .99c.01.55.45 1 .99 1z"/>
                                </svg>
                                Informations du demandeur
                            </h3>
                        </div>
                        <div class="mt-6 border-t border-gray-200">
                            <dl class="divide-y divide-gray-200">
                                <div class="py-4 flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-900">Nom complet</dt>
                                    <dd class="text-sm text-gray-700 sm:mt-0 sm:ml-4">{{$user->prenom}} {{$user->nom}}</dd>
                                </div>
                                <div class="py-4 flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-900">CIN</dt>
                                    <dd class="text-sm text-gray-700 sm:mt-0 sm:ml-4">{{$user->cin}}</dd>
                                </div>
                                <div class="py-4 flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-900">Adresse Email</dt>
                                    <dd class="text-sm text-gray-700 sm:mt-0 sm:ml-4">{{$user->email}}</dd>
                                </div>
                                <div class="py-4 flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-900">Téléphone</dt>
                                    <dd class="text-sm text-gray-700 sm:mt-0 sm:ml-4">{{$user->telephone}}</dd>
                                </div>
                                <div class="py-4 flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-900">Adresse</dt>
                                    <dd class="text-sm text-gray-700 sm:mt-0 sm:ml-4">{{$user->adresse}}</dd>
                                </div>
                                <div class="py-4 flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-900">Matricule</dt>
                                    <dd class="text-sm text-gray-700 sm:mt-0 sm:ml-4">{{$user->matricule}}</dd>
                                </div>
                                <div class="py-4 flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-900">N° Permis</dt>
                                    <dd class="text-sm text-gray-700 sm:mt-0 sm:ml-4">125570000578</dd>
                                </div>
                            </dl>
                        </div>
                        <div class="flex justify-start mt-6 gap-3">
                            <a href="#" class="inline-flex items-center px-7 py-3 bg-chprimary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-chsecondary
                             active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">Valider</a>
                            <a href="#" class="inline-flex items-center px-7 py-3 bg-chsecondary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">Rejeter</a>
                        </div>
                    </div>
                </div>
                <div class="w-2/5 flex flex-col items-center justify-start space-y-6">
                    <h3 class="font-semibold leading-7 text-gray-900 text-2xl flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14.67c-1.1 0-2-.9-2-2h-6v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4h-6c0 1.1-.9 2-2 2zm0-10.67c1.1 0 2 .9 2 2h6v4h-6c0 1.1-.9 2-2 2-1.1 0-2-.9-2-2h-6v-4h6c0-1.1.9-2 2-2zm0 4c.55 0 1-.45 1-1s-.45-1-1-1-.99.45-1 .99c.01.55.45 1 .99 1z"/>
                        </svg>
                        Documents
                    </h3>
                   <div class="flex gap-4 text-center">
                    
                        <div>
                            <img class="w-60 h-60 rounded-full shadow-md" src="https://picsum.photos/200" alt="Chauffeur Photo">
                            <span class="mt-4  text-gray-900 font-semibold">Photo de Profil</span>
                        </div>
                   </div>



                    {{-- <div class="flex flex-col items-center">
                        <img class="w-24 h-24 rounded-full border-4 border-blue-500 shadow-md" src="https://picsum.photos/200" alt="Chauffeur Photo">
                        <span class="mt-2 text-gray-900 font-semibold">Photo de Profil</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <svg class="w-24 h-24 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14.67c-1.1 0-2-.9-2-2h-6v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4h-6c0 1.1-.9 2-2 2zm0-10.67c1.1 0 2 .9 2 2h6v4h-6c0 1.1-.9 2-2 2-1.1 0-2-.9-2-2h-6v-4h6c0-1.1.9-2 2-2zm0 4c.55 0 1-.45 1-1s-.45-1-1-1-.99.45-1 .99c.01.55.45 1 .99 1z"/>
                        </svg>
                        <span class="mt-2 text-gray-900 font-semibold">Permis de Conduire</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <svg class="w-24 h-24 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM2 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM14 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM10 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM14 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 14a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                        </svg>
                        <span class="mt-2 text-gray-900 font-semibold">Carte d'Identité</span>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
