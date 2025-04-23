{{-- resources/views/requetes/addition-pdf.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition d'addition</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
        h1, h5 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>LuDo ReSTo</h1>

    @if ($additions->isEmpty())
        <p>Aucune addition disponible.</p>
    @else
        <p><strong>Nom du client:</strong> {{ $validated['nomcli'] }}</p>
        <p><strong>Table:</strong> {{ $validated['table_id'] }}</p>

        <h5>Votre facture en detail</h5>

        <table>
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>PU (Ar)</th>
                    <th>Unité</th>
                    <th>Total (Ar)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($additions as $addition)
                    <tr>
                        <td>{{ $addition->nomplat }}</td>
                        <td>{{ $addition->pu }}</td>
                        <td>{{ $addition->unite }}</td>
                        <td>{{ $addition->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>TOTAL (Ar): {{ $totalGeneral }}</h3>
    @endif
</body>
</html>
