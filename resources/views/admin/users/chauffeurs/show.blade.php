<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="px-12 py-4">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center justify-center ">
          <div class="bg-white max-w-4xl shadow overflow-hidden sm:rounded-lg w-5/6  ">
            <div class="flex items-center justify-between py-2">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $chauffeur->prenom }} {{ $chauffeur->nom }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        {{ $chauffeur->email }}
                    </p>
                </div>
                
                <div class="pr-4">
                    <div class="items-center justify-center w-10 h-10 m-auto mr-4 sm:w-24 sm:h-24 ">
                        <img alt="profil"
                          src="https://images.unsplash.com/photo-1564564321837-a57b7070ac4f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                          class="object-cover mx-auto rounded-full sm:w-24 sm:h-24" />
                      </div>
                </div>
            </div>

           
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Prénom
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $chauffeur->prenom }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Nom
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $chauffeur->nom }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $chauffeur->email }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            CIN
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $chauffeur->cin }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Date de naissance
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $chauffeur->date_naissance }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Lieu de naissance
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $chauffeur->lieu_naissance }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Adresse
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $chauffeur->adresse }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Téléphone
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $chauffeur->telephone }}
                        </dd>
                    </div>
                    
                </dl>
            </div>
          </div>

        </div> --}}
        <div class="flex gap-2 ">
            <div class="bg-white w-1/3 min-h-40  p-4  flex flex-col gap-6">
                <div class="flex gap-4 items-center">
                    <div class="">
                        <div class="items-center justify-center w-10 h-10 m-auto mr-4 sm:w-20 sm:h-20 ">
                            <img alt="profil"
                              src="https://images.unsplash.com/photo-1564564321837-a57b7070ac4f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bWFufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                              class="object-cover mx-auto rounded-full sm:w-20 sm:h-20" />
                          </div>
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
                    <div class="flex flex-col ">
                        <span class="text-gray-500">Joined</span>
                        <span class="text-black">{{ $chauffeur->created_at->format('Y-m-d') }}</span>
                    </div>
                    <div class="flex items-start flex-col">
                        <span class="text-gray-500">Number of Courses</span>
                        <span class="text-black"> 100 </span>
                    </div>
                    <div class="flex items-start flex-col  ">
                        <span class="text-gray-500">Rating</span>
                        <span class="text-black">  100 </span>
                    </div>


                </div>
            </div>

            <div class="bg-white w-1/3 min-h-40  p-4  flex flex-col gap-6">
                <div class="flex gap-4 items-center">
                    <div class="">
                        <div class="items-center justify-center w-5 h-5 m-auto mr-4 sm:w-20 sm:h-20 bg-red-500 rounded-full ">
                            <img alt="profil"
                              src="https://static.vecteezy.com/ti/vecteur-libre/p3/5439465-conception-d-illustration-de-dessin-anime-de-voiture-de-couleur-rouge-gratuit-vectoriel.jpg"
                              class="object-cover sm:w-20 sm:h-20" />
                          </div>
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
                    <div class="flex flex-col ">
                        <span class="text-gray-500">Matricule</span>
                        <span class="text-black">{{ $chauffeur->matricule }}</span>
                    </div>
                    <div class="flex items-start flex-col">
                        <span class="text-gray-500">Plaque </span>
                        <span class="text-black"> A522 wwww </span>
                    </div>
                    <div class="flex items-start flex-col  ">
                        <span class="text-gray-500">Marque</span>
                        <span class="text-black">  Ford </span>
                    </div>


                </div>
            </div>

           
            <div class="bg-white w-1/3 min-h-40  p-4  flex flex-col gap-6">
                <div class="flex gap-4 items-center">
                    <div class="">
                        <div class="items-center justify-center w-5 h-5 m-auto mr-4 p-4 text-white sm:w-20 sm:h-20 bg-red-500 rounded-full ">
                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M12 10.5v2a1 1 0 0 1-1 1H1.5a1 1 0 0 1-1-1V5a3 3 0 0 1 3-3H10v2.5"/><path d="M13 7.5H9.5A.5.5 0 0 0 9 8v2a.5.5 0 0 0 .5.5H13a.5.5 0 0 0 .5-.5V8a.5.5 0 0 0-.5-.5m-1 0v-2a1 1 0 0 0-1-1H3.5"/></g></svg>
                        </div>
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
                    <div class="flex flex-col ">
                        <span class="text-gray-500">Economie realise</span>
                        <span class="text-black">123456 Fcfa</span>
                    </div>
                    <div class="flex items-start flex-col">
                        <span class="text-gray-500">Comission </span>
                        <span class="text-black"> 12000 Fcfa </span>

                    </div>
                   


                </div>
            </div>

        </div>

    </div>
</x-app-layout>


