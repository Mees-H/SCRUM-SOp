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
            width: 30vw;
        }

    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan="2">
                <h3>
                    Afmelding
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
                Datum:
            </td>
            <td>
                {{$date}}
            </td>
        </tr>
    </table>
</body>