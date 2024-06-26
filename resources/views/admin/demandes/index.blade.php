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
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Etat</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Telephone</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Adresse</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                          @foreach ($demandes as $demande)                    
                          <tr class="hover:bg-gray-50">
                            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                              <div class="relative h-10 w-10">
                                
                                <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                              </div>
                              <div class="text-sm">
                                <div class="font-medium text-gray-700">{{$demande->user->prenom}} {{$demande->user->nom}} </div>
                                <div class="text-gray-400">{{$demande->user->email}}</div>
                              </div>
                            </th>
                            <td class="px-6 py-4">
                              <span
                                class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                              >
                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                {{$demande->etat}}
                              </span>
                            </td>
                            {{-- test --}}
                            <td class="px-6 py-4">{{$demande->user->telephone}}</td>
                            <td class="px-6 py-4">
                              <div class="flex gap-2">
                                <span
                                  class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"
                                >
                                  {{$demande->user->adresse}}
                                </span>
                              </div>
                            </td>
                            <td class="px-6 py-4">
                              <div class="flex justify-end gap-4">
                                <a x-data="{ tooltip: 'View' }" href={{route('demandes.show', ["id"=>$demande->id])}}>
                                  <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-6 w-6"
                                    x-tooltip="tooltip"
                                  >
                                    <path
                                      stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M15 12c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3zM2.458 12C3.732 7.943 7.607 5 12 5c4.393 0 8.268 2.943 9.542 7-.001.001-.001.003-.002.005a1.5 1.5 0 010 1.99A13.09 13.09 0 0112 19c-4.393 0-8.268-2.943-9.542-7A1.5 1.5 0 012.458 12z"
                                    />
                                  </svg>
                                </a>                                  
                              </div>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                    {{-- @foreach ($demandes as $demande)
                    <div class=" bg-white my-6 p-5">
                        <div class="tracking-wide text-lg text-gray font-semibold">{{$demande->demande->prenom}} {{$demande->demande->nom}}</div>
                        <p class="block mt-1 leading-tight text-black">{{$demande->created_at}}</p>
                        <span
                            class="rounded-full text-xs font-semibold bg-yellow-100"
                        >
                            <p class="mt-2 text-gray-500">{{$demande->etat}} </p>
                                
                        </span>
                        <a href={{route('demandes.show', ["id"=>$demande->demande->id])}} class="btn mt-5 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Voir Details
                        </a>
                        <button onclick="window.location.href='{{route('demandes.destroy', ['id'=>$demande->demande->id])}}'" class="btn mt-5 ml-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Refdemande Demande
                            
                        </button>

                        <form hidden method="POST" action = {{route('demandes.destroy', ["id" => $demande->demande->id])}}>
                            @csrf
                            <input type="hidden" name="id" value="{{$demande->demande->id}}">
                            <input type="submit" value="Valider Demande" class="btn mt-5 ml-3 px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">

                        </form>

                    </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this item?');
        }

    </script>

</x-app-layout>


