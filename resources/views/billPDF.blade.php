<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center; font-family: fantasy; font-size: 50px; padding-bottom: 0px; margin-bottom: 0px;">
        Hi-Tech-ies
    </h2>
    <p style="text-align: center; font-family: fantasy; font-size: 20px; padding-top: 0px; margin-top: 0px;">Industrial
        Engineering Services</p>
    <div style="text-align: center;">
        <h2
            style="border: 3px solid black; display:inline-flex; padding: 0.5%; font-family: fantasy; letter-spacing: 1px;">
            {{ $site_name }}</h2>
    </div>
    <table id="customers" style="width: 90%; margin-left:auto; margin-right: auto;">
        <tr>
            <th>Financial Status</th>
            <td>
                @if ($site->credit < $site->excellent && $site->credit >= 0)
                    Marvelous
                @elseif ($site->credit >= $site->excellent && $site->credit < $site->good)
                    Excellent
                @elseif ($site->credit >= $site->good && $site->credit < $site->allowed)
                    Good
                @elseif ($site->credit >= $site->allowed && $site->credit < $site->blacklist)
                    Allowed
                @else
                    Blacklist
                @endif
            </td>
        </tr>
    </table>
    <br>
    <table id="customers" style="width: 80%; margin-left:auto; margin-right: auto;">
        <tr>
            <th>Bill Id</th>
            <td> {{ $bill_id }}</td>
        </tr>
        <tr>
            <th>Entry Date</th>
            <td>{{ $generation_date }}</td>
        </tr>

        <tr>
            <th>Submitter</th>
            <td>{{ $made_by }}</td>
        </tr>

        <tr>
            <th>Repairing Item</th>
            <td>{{ $repairing_item }}</td>
        </tr>

        <tr>
            <th>Client Complaint</th>
            <td>{{ $client_complaint }}</td>
        </tr>
        <tr>
            <th>Working Remedy</th>
            <td>{{ $working_remedy }}</td>
        </tr>
    </table>
    <br>
    <table id="customers" style="width:90%; margin-left: auto; margin-right: auto;">
        <tr>
            <th>Sr#</th>
            <th>Product Name</th>
            <th>Price</th>
        </tr>
        @foreach ($product_detail as $key => $product)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <table id="customers" style="width: 90%; margin-left:auto; margin-right: auto;">
        <tr>
            <th>Total Price</th>
            <td>{{ $total_price }}</td>
        </tr>
        <tr>
            <th>Due Amount</th>
            <td>{{ $site->credit - $total_price }}</td>
        </tr>
        <tr>
            <th>Payable Amount</th>
            <td>{{ $site->credit }}</td>
        </tr>
    </table>

</body>

</html>
