<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg">
                <div class="">

                  <div class="w-full flex items-center justify-end">
                    <button class="group gap-1  h-12 flex items-center justify-center  text-center  overflow-hidden rounded-xl bg-chprimary text-sm hover:bg-white font-bold text-white px-5 mb-5  hover:text-chprimary hover:border-chprimary hover:border-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6" class=text-white"/></svg>
                      Ajouter un chauffeur
                    </button>
                  </div>
                    <div class="overflow-hidden rounded-lg ">

                  
                      
                        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nom</th>
                              <th scope="col" class="px-6 py-4 font-medium text-gray-900">CIN</th>
                              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone</th>
                              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Matricule</th>
                              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Adresse</th>
                              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
                            </tr>
                          </thead>
                          <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach ($chauffeurs as $chauffeur)                    
                            <tr class="hover:bg-gray-50">
                              <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                <div class="relative h-10 w-10">
                                  
                                  <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                </div>
                                <div class="text-sm">
                                  <div class="font-medium text-gray-700">{{$chauffeur->prenom}} {{$chauffeur->nom}} </div>
                                  <div class="text-gray-400">{{$chauffeur->email}}</div>
                                </div>
                             </th>
                              <td class="px-6 py-4">{{$chauffeur->cin}}</td>
                              <td class="px-6 py-4">
                                <span
                                  class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                                >
                                  <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                  {{$chauffeur->telephone}}
                                </span>
                              </td>
                              {{-- test --}}
                              <td class="px-6 py-4">{{$chauffeur->matricule}}</td>
                              <td class="px-6 py-4">
                                <div class="flex gap-2">
                                  <span
                                    class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600"
                                  >
                                    {{$chauffeur->adresse}}
                                  </span>
                                </div>
                              </td>
                              <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                  <a x-data="{ tooltip: 'View' }" href={{route("users.chauffeurs.show", ['id'=>$chauffeur->id]) }}>
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
                                  <a x-data="{ tooltip: 'Delete' }" href="#">
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
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                      />
                                    </svg>
                                  </a>
                                  <a x-data="{ tooltip: 'Edite' }" href="#">
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
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                      />
                                    </svg>
                                  </a>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                            
                <div class="mt-3">
                    {{-- {{ $chauffeurs->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
