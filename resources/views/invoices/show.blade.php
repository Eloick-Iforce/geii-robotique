<x-app-layout>



    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2, h3 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            color: #333;
            font-size: 24px;
        }
        h3 {
            color: #666;
            font-size: 20px;
        }
        p {
            color: #000000;
            font-size: 16px;
        }
        div {
            margin-bottom: 20px;
        }

        img {
            margin-top: -100px
        }
    </style>

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

<img src="{{ asset("img/headerfacture.png")}}">

    <h2>
        <h2>Devis pour la rencontre de {{ $team->competition->name }}</h2>
        <h2>Établi à la date du {{ now()->format('d/m/Y') }}</h2>
    </h2>
    <div>
        <div>
            <h3>Destinataire</h3>
            <p>{{ $billingAddress->name }} {{ $billingAddress->lastname }}</p>
            <p>{{ $billingAddress->etablisement }}</p>
            <p>{{ $billingAddress->address }}</p>
            <p>{{ $billingAddress->zip_code }} {{ $billingAddress->city }}</p>
            <p>{{ $billingAddress->country }}</p>
        </div>

        <div>
            <h3>Récapitulatif de votre Inscription</h3>
            <table>
                <tr>
                    <th>Robots</th>
                    <th>Nombre</th>
                    <th>Prix</th>
                </tr>
                <tr>
                    <td>Robots BUT 1</td>
                    <td>{{ $team->number_of_robots_but1 }}</td>
                    <td>{{ $cost_but1 + $additional_but1_cost  }} €</td>
                </tr>
                <tr>
                    <td>Robots BUT 2</td>
                    <td>{{ $team->number_of_robots_but2 }}</td>
                    <td>{{ $cost_but2 + $additional_but3_cost }} €</td>
                </tr>
                <tr>
                    <td>Robots BUT 3</td>
                    <td>{{ $team->number_of_robots_but3 }}</td>
                    <td>{{ $cost_but3 + $additional_but3_cost }} €</td>
                </tr>
                <tr>
                    <td>Total des inscriptions des robots</td>
                    <td></td>

                    <td>{{ $total_cost }}€</td>
                </tr>
                <tr>
                    <th>Étudiants</th>
                    <th>Nombre</th>
                    <th>Prix</th>
                </tr>
                <tr>
                    <td>Étudiants</td>
                    <td>{{ $team->number_of_members }}</td>
                    <td>
                        {{ $totaletu }}€
                    </td>
                </tr>
                <tr>
                    <th>Enseignants</th>
                    <th>Nombre</th>
                    <th>Prix</th>
                </tr>
                <tr>
                    <td>Enseignants</td>
                    <td>{{ $team->number_of_teachers }}</td>
                    <td>
                        {{ $totalprof }}€
                    </td>
                </tr>
                <tr>
                    <th>Total inscription TTC</th>
                    <td></td>
                    <td>{{ $total }}€</td>
                </tr>
            </table>
            <p>
                Lorsque votre inscription ne sera plus sujette à modification, vous devez envoyer un bon de commande (EJ-engagement juridique) du montant du devis qui confirmera l'inscription aux 2 adresses mail suivantes :
                <ul>
                    <li>
                frc@plateforme37.com</li>
                <li>
                monique.thomas@u-bordeaux.fr
                </li>
                </ul>
            </p>
        </div>
    </div>





</x-app-layout>
