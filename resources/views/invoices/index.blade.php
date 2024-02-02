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
            color: #999;
            font-size: 16px;
        }
        div {
            margin-bottom: 20px;
        }
    </style>

@php
$robots_but1 = $team->number_of_robots_but1;
$robots_but2 = $team->number_of_robots_but2;

$cost_but1 = ($robots_but1 > 0 ? 150 : 0) + 50 * ($robots_but1 - 1 > 0 ? $robots_but1 - 1 : 0);
$cost_but2 = ($robots_but2 > 0 ? 150 : 0) + 50 * ($robots_but2 - 1 > 0 ? $robots_but2 - 1 : 0);

$total_cost = $cost_but1 + $cost_but2;

$totaletu = 0;
        if ($team->number_of_members <= 6) {
            $totaletu = $team->number_of_members * 80;
        } else {
            $totaletu = (6 * 80) + (($team->number_of_members - 6) * 40);
        }

$totalprof = $team->number_of_teachers * 45;

$total = $totalprof + $totaletu + $total_cost;
@endphp

    <h2>
        Devis pour la rencontre de Robotique 2024 de Haguenau à la date du {{ now()->format('d/m/Y') }}
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
                    <td>{{ $cost_but1 }} €</td>
                </tr>
                <tr>
                    <td>Robots BUT 2</td>
                    <td>{{ $team->number_of_robots_but2 }}</td>
                    <td>{{ $cost_but2 }} €</td>
                </tr>
                <tr>
                    <td>Robots BUT 3</td>
                    <td>{{ $team->number_of_robots_but3 }}</td>
                    <td>0 €</td>
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
        </div>
    </div>





</x-app-layout>
