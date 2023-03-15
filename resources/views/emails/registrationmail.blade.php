<!DOCTYPE html>
<head>
    <style>
        table{
            padding: 10px;
            margin: auto;
            border: none;
        }

    </style>
    </head>
<body>
<h1>{{$name}} heeft zich ingeschreven voor {{$eventName}} op {{$date}}.</h1>
<table>
    <tr>
        <th colspan="2">
            <h3>
                persoon informatie
            </h3>
        </th>
    </tr>
    <tr>
        <td>
            naam:
        </td>
        <td>
            {{$name}}
        </td>
    </tr>
    <tr>
        <td>
            email:
        </td>
        <td>
            {{$email}}
        </td>
    </tr>
    <tr>
        <td>
            telefoonnummer:
        </td>
        <td>
            {{$phonenumber}}
        </td>
    </tr>
    <tr>
        <td>
            adres:
        </td>
        <td>
            {{$address}}, {{$city}}
        </td>
    </tr>
    <tr>
        <td>
            leeftijd:
        </td>
        <td>
            {{$age}}
        </td>
    </tr>
    <tr>
        <td>
            beperking:
        </td>
        <td>
            {{$disability}}
        </td>
    </tr>
</table>

<table>
    <tr>
        <th colspan="2">
            <h3>
                evenement informatie
            </h3>
        </th>
    </tr>
    <tr>
        <td>
            naam:
        </td>
        <td>
            {{$eventName}}
        </td>
    </tr>
    <tr>
        <td>
            datum:
        </td>
        <td>
            {{$date}}
        </td>
    </tr>
</table>
</body>


