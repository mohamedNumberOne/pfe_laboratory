<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>Bienvenu : {{ Auth::user()-> name }}  {{ Auth::user()-> prenom }}  </b>
        </h2>  
        <i class="fa-solid fa-location-dot"></i>   {{  $user_wilaya -> name  }}, {{ $commune -> name  }} 
        <br>
        <i class="fa-solid fa-envelope"></i> {{ Auth::user()-> email }}  
    </x-slot>

    <div class="py-12 " style="background-image: url('images/7.jpg') ; background-size : cover; height: 50vh;  ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg ">
                <x-welcome />
            </div>
        </div>
    </div>

</x-app-layout>
