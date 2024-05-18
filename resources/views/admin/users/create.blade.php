<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                </div>
            </div>
        </div> --}}
        <main class="flex-1 md:p-0 lg:pt-8 lg:px-8 md:ml-24 flex flex-col">
            <section class="bg-cream-lighter p-4 shadow">
            <div class="md:flex">
              <h2 class="md:w-1/3 uppercase tracking-wide text-sm sm:text-lg mb-6">Créer un nouveau utilisateur</h2>
            </div>
            <form>
              <div class="md:flex mb-8">
                <div class="md:w-1/3">
                  <legend class="uppercase tracking-wide text-sm">Location</legend>
                  <p class="text-xs font-light text-red">Tous les champs sont requis</p>
                </div>
              <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                <div class="md:flex mb-4">
                    <div class="md:flex-1 md:pr-3">
                      <label class="block uppercase tracking-wide text-xs font-bold">Prenom</label>
                      <input class="w-full shadow-inner p-4 border-0" type="text" name="prenom" placeholder="">
                    </div>
                    <div class="md:flex-1 md:pr-3">
                      <label class="block uppercase tracking-wide text-xs font-bold">Nom</label>
                      <input class="w-full shadow-inner p-4 border-0" type="text" name="nom" placeholder="">
                    </div>
                </div>
                <div class="md:flex mb-4">
                  <div class="md:flex-1 md:pr-3">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Adresse</label>
                    <input class="w-full shadow-inner p-4 border-0" type="text" name="adresse" placeholder="">
                  </div>
                  <div class="md:flex-1 md:pl-3">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Lieu de Naissance</label>
                    <input class="w-full shadow-inner p-4 border-0" type="text" name="lieu_naissance" placeholder="">
                  </div>
                </div>
                <div class="md:flex mb-4">
                    <div class="md:flex-1 md:pr-3">
                        <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Date Naissance</label>
                        <input class="w-full shadow-inner p-4 border-0" type="date" name="date_naissance" placeholder="">
                    </div>
                </div>
                </div>
              </div>
              <div class="md:flex mb-8">
                <div class="md:w-1/3">
                  <legend class="uppercase tracking-wide text-sm">Contacts</legend>
                </div>
                <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                  <div class="mb-4">
                    <label class="block uppercase tracking-wide text-xs font-bold">Telephone</label>
                    <input class="w-full shadow-inner p-4 border-0" type="tel" name="telephone" placeholder="">
                  </div>
                  <div class="mb-4">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">CIN</label>
                    <input class="w-full shadow-inner p-4 border-0" type="text" name="cin" placeholder="">
                  </div>
                  <div class="mb-4">
                    <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Email</label>
                    <input class="w-full shadow-inner p-4 border-0" type="email" name="email" placeholder="">
                  </div>
                </div>
              </div>
              <div class="md:flex">
                <div class="md:w-1/3">
                  <legend class="uppercase tracking-wide text-sm">Voiture</legend>
                  <p class="text-xs font-light text-red">Les champs ne sont pas requis</p>
                </div>
                <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                  <div class="md:flex mb-4">
                    <div class="md:flex-1 md:pr-3">
                      <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Matricule</label>
                      <div class="w-full flex">
                        {{-- <span class="text-xs py-4 px-2 bg-grey-light text-grey-dark">facebook.com/</span> --}}
                        <input class="flex-1 shadow-inner p-4 border-0" type="text" name="matricule" placeholder="">
                      </div>
                    </div>
                    <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                      <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Annee</label>
                      <div class="w-full flex">
                        {{-- <span class="text-xs py-4 px-2 bg-grey-light text-grey-dark">twitter.com/</span> --}}
                        <input class="flex-1 shadow-inner p-4 border-0" type="date" name="annee_voiture" placeholder="">
                      </div>
                    </div>
                  </div>
                  <div class="md:flex mb-4">
                    <div class="md:flex-1 md:pr-3">
                      <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Permis de conduire</label>
                      <div class="w-full flex">
                        {{-- <span class="text-xs py-4 px-2 bg-grey-light text-grey-dark">instagram.com/</span> --}}
                        <input class="flex-1 shadow-inner p-4 border-0" type="number" name="permis" placeholder="">
                      </div>
                    </div>
                    {{-- <div class="md:flex-1 md:pl-3 mt-2 md:mt-0">
                      <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Yelp</label>
                        <div class="w-full flex">
                          <span class="text-xs py-4 px-2 bg-grey-light text-grey-dark">yelp.com/</span>
                          <input class="flex-1 shadow-inner p-4 border-0" type="text" name="yelp" placeholder="acmeco">
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <div class="md:flex mb-6">
                  <div class="md:w-1/3">
                    <legend class="uppercase tracking-wide text-sm mt-5">Documents</legend>
                  </div>
                  <div class="md:flex-1 px-3 text-center">
                    <div class="button bg-gold hover:bg-gold-dark text-cream mx-auto cusor-pointer relative">
                      {{-- <input class="opacity-0 absolute pin-x pin-y" type="file" name="cover_image">
                      Add Cover Image
                    </div> --}}
                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Uploader les documents</span>
                        <input type='file' class="hidden" />
                    </label>
                
                  </div>
                </div>
                <div class="md:flex mb-6 border border-t-1 border-b-0 border-x-0 border-cream-dark">
                  <div class="md:flex-1 px-3 text-center md:text-right">
                    <input type="hidden" name="sponsor" value="0">
                    <input class="button text-white bg-brick hover:bg-brick-dark bg-chprimary py-3 px-8 mt-10 rounded-lg cursor-pointer hover:bg-chaccent " type="submit" value="Valider">
                  </div>
                </div>
              </form>
            </section>
            </main>
    </div>
</x-app-layout>
