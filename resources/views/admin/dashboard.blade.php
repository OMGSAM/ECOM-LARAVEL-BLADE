 

@extends('layouts.admin')


@section('main')

<main class="p-6">
  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <div>
      <h1 class="text-3xl font-bold text-teal-400">Analytics</h1>
      <ul class="text-sm text-gray-500">
        <li><a href="#" class="hover:text-teal-600">Les Derniers Chiffres</a></li>
      </ul>
    </div>
     
  </div>

  <!-- Insights -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    <div class="bg-white shadow rounded p-4 flex items-center gap-4">
      <i class="fa-solid fa-bed text-2xl text-indigo-500"></i>
      <div>
        <h3 class="text-xl font-bold">{{$y->count('id')}}</h3>
        <p class="text-gray-500 text-sm">Products</p>
      </div>
    </div>
    <div class="bg-white shadow rounded p-4 flex items-center gap-4">
      <i class="fas fa-eye text-2xl text-blue-500"></i>
      <div>
        <h3 class="text-xl font-bold">3,944</h3>
        <p class="text-gray-500 text-sm">Site Visit</p>
      </div>
    </div>
    <div class="bg-white shadow rounded p-4 flex items-center gap-4">
      <i class="fa-solid fa-stethoscope text-2xl text-green-500"></i>
      <div>
        <h3 class="text-xl font-bold">{{$x->count('id')}}</h3>
        <p class="text-gray-500 text-sm">Orders</p>
      </div>
    </div>
    <div class="bg-white shadow rounded p-4">
      <div class="flex items-center gap-2">
        <i class="fas fa-dollar-sign text-2xl text-yellow-500"></i>
        <h3 class="text-xl font-bold">{{$x->sum('grand_total')}} <span class="text-sm font-normal">DH</span></h3>
      </div>
      <p class="text-gray-500 text-sm mt-1">Les revenus</p>
    </div>
  </div>

  <!-- Bottom Data -->
  <div class="grid md:grid-cols-3 gap-6">
    <!-- Dernieres Consultations -->
    <div class="col-span-2 bg-white shadow rounded p-4">
      <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-2">
          <i class="fas fa-receipt text-teal-400"></i>
          <h3 class="text-lg font-semibold">Dernières Orders</h3>
        </div>
        <div class="flex gap-2 text-gray-400">
          <i class="fas fa-filter cursor-pointer"></i>
          <i class="fas fa-search cursor-pointer"></i>
        </div>
      </div>
      <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600">
          <tr>
            <th class="p-2">Client</th>
            <th class="p-2">Date</th>
            <th class="p-2">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($x->take(3) as $order)
           
        @endforeach

          <tr class="border-t">
            <td class="p-2 flex items-center gap-2">
              <img src="assets/img/z.jpg" alt="MARWANE" class="w-8 h-8 rounded-full">
              MARWANE
            </td>
            <td class="p-2">20-03-2025</td>
            <td class="p-2"><span class="text-yellow-500 font-semibold">Pending</span></td>
          </tr>
          <tr class="border-t">
            <td class="p-2 flex items-center gap-2">
              <img src="assets/img/z.jpg" alt="MORAD" class="w-8 h-8 rounded-full">
              MORAD
            </td>
            <td class="p-2">20-03-2025</td>
            <td class="p-2"><span class="text-blue-500 font-semibold">Processing</span></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- LES ANNONCES -->
    <div class="bg-white shadow rounded p-4">
      <div class="flex justify-between items-center mb-4">
        <div class="flex items-center gap-2">
          <i class="fas fa-bullhorn text-indigo-500"></i>
          <h3 class="text-lg font-semibold">LES ANNONCES</h3>
        </div>
        <div class="flex gap-2 text-gray-400">
          <i class="fas fa-filter cursor-pointer"></i>
          <i class="fas fa-plus cursor-pointer"></i>
        </div>
      </div>
      <ul class="space-y-3">
        <li class="flex justify-between items-center p-2 bg-green-100 rounded">
          <div class="flex items-center gap-2">
            <i class="fas fa-check-circle text-green-600"></i>
            <p>New Category Added</p>
          </div>
          <i class="fas fa-ellipsis-v text-gray-400"></i>
        </li>
        <li class="flex justify-between items-center p-2 bg-green-100 rounded">
          <div class="flex items-center gap-2">
            <i class="fas fa-check-circle text-green-600"></i>
            <p>Produit out of stock -> iphone 13</p>
          </div>
          <i class="fas fa-ellipsis-v text-gray-400"></i>
        </li>
        <li class="flex justify-between items-center p-2 bg-red-100 rounded">
          <div class="flex items-center gap-2">
            <i class="fas fa-times-circle text-red-600"></i>
            <p>New order Shipped</p>
          </div>
          <i class="fas fa-ellipsis-v text-gray-400"></i>
        </li>
      </ul>
    </div>
  </div>
</main>

@endsection

 