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
    <h1>{{$name}} heeft een vraag.</h1>
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
    </table>
    <table>
        <tr>
            <th colspan="2">
                <h3>
                    Vraag
                </h3>
            </th>
        </tr>
        <tr>
            <td>
                {{$question}}
            </td>
        </tr>
    </table>
</body>