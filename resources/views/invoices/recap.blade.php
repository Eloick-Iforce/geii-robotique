<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Récapitulatif Inscription') }}
        </h2>
    </x-slot>

    @php

    $robots_but1 = $team->number_of_robots_but1;
$robots_but2 = $team->number_of_robots_but2;
$robots_but3 = $team->number_of_robots_but3;

if ($robots_but1 > 0) {
    $cost_but1 = 150;
    
    $additional_but1_cost = ($robots_but1 - 1) * 50;
} else {
    $cost_but1 = 0;
    $additional_but1_cost = 0;
}

if ($robots_but2 > 0 && $cost_but1 == 0) {
    $cost_but2 = 150;
    
    $additional_but2_cost = ($robots_but2 - 1) * 50;
} else {
    $cost_but2 = $robots_but2 * 50;
    $additional_but2_cost = 0;
}

if ($robots_but3 > 0 && $cost_but1 == 0 && $cost_but2 == 0) {
    $cost_but3 = 150;
    
    $additional_but3_cost = ($robots_but3 - 1) * 50;
} else {
    $cost_but3 = $robots_but3 * 50;
    $additional_but3_cost = 0;
}

$total_cost = $cost_but1 + $additional_but1_cost + $cost_but2 + $additional_but2_cost + $cost_but3 + $additional_but3_cost;


$totaletu = 0;
if ($team->number_of_members <= 6) {
    $totaletu = $team->number_of_members * 80;
} else {
    $totaletu = (6 * 80) + (($team->number_of_members - 6) * 40);
}

$totalprof = $team->number_of_teachers * 45;

$total = $totalprof + $totaletu + $total_cost;

    @endphp

    <div class="p-4 bg-white m-8 rounded-lg shadow-sm">

        <h2 class="text-4xl font-bold mb-8">Récapitulatif du devis de l'équipe {{ $team->name}}</h2>


        <ul class="list-disc ml-6 text-xl mb-8">
            <li>Robots BUT 1 : {{ $team->number_of_robots_but1 }} robots pour un total de {{ $cost_but1 + $additional_but1_cost }} €</li>
            <li>Robots BUT 2 : {{ $team->number_of_robots_but2 }} robots pour un total de {{ $cost_but2 + $additional_but2_cost }} €</li>
            <li>Robots BUT 3 : {{ $team->number_of_robots_but3 }} robots pour un total de {{ $cost_but3 + $additional_but3_cost }} €</li>
            <li>Nombre d'étudiants : {{ $team->number_of_members }} pour un total de {{ $totaletu }} €</li>
            <li>Nombre d'enseignants : {{ $team->number_of_teachers }} pour un total de {{ $totalprof }} €</li>
        </ul>


        <h2 class="text-xl font-bold mb-8">Total : {{ $total }} €</h2>


        <a href="{{ route('invoices.mail', $team->id) }}" class="btn-edit">
            Valider mon inscription et recevoir le devis par mail
        </a>

    </div>

</x-app-layout>