<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($demandes as $demande)
                    <div class=" bg-white my-6 p-5">
                        <div class="tracking-wide text-lg text-gray font-semibold">{{$demande->user->prenom}} {{$demande->user->nom}}</div>
                        <p class="block mt-1 leading-tight text-black">{{$demande->created_at}}</p>
                        <span
                            class="rounded-full text-xs font-semibold bg-yellow-100"
                        >
                            <p class="mt-2 text-gray-500">{{$demande->etat}} </p>
                                
                        </span>
                        <button class="mt-5 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Voir Details
                        </button>
                        <button class="mt-5 ml-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Refuser Demande
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


