<!DOCTYPE html>
<head>
    <style>
        table{
            padding: 3px;
            margin: auto;
            border: none;
            width: 60vw;
        }

        th{
            background-color: #4CAF50;
            color: white;
        }

        th, td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>{{$name}} heeft zich ingeschreven voor {{$eventName}} op {{ \Carbon\Carbon::parse($Date)->format('d-m-Y')}}.</h1>
    <table>
        <tr>
            <th colspan="2">
                <h3>
                    Persoonlijke Informatie
                </h3>
            </th>
        </tr>
        <tr>
            <td>
                Naam:
            </td>
            <td>
                {{$name}}
            </td>
        </tr>
        <tr>
            <td>
                E-mail:
            </td>
            <td>
                {{$email}}
            </td>
        </tr>
        <tr>
            <td>
                Telefoonnummer:
            </td>
            <td>
                {{$phonenumber}}
            </td>
        </tr>
        <tr>
            <td>
                Adres:
            </td>
            <td>
                {{$address}}, {{$city}}
            </td>
        </tr>
        <tr>
            <td>
                Leeftijd:
            </td>
            <td>
                {{$age}}
            </td>
        </tr>
        <tr>
            <td>
                Gender:
            </td>
            <td>
                {{$gender}}
            </td>
        </tr>
        <tr>
            <td>
                Golfhandicap:
            </td>
            <td>
                {{$golfhandicap}}
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <th colspan="2">
                <h3>
                    Evenement Informatie
                </h3>
            </th>
        </tr>
        <tr>
            <td>
                Evenement:
            </td>
            <td>
                {{$eventName}}
            </td>
        </tr>
        <tr>
            <td>
                Datum:
            </td>
            <td>
            {{ \Carbon\Carbon::parse($Date)->format('d-m-Y')}}
            </td>
        </tr>
    </table>
</body>


