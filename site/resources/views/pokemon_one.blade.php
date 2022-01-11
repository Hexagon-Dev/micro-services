@extends('default')

@section('content')
    <style>
        table, td, th {
            border: 1px solid black;
            margin: 50px auto;
        }
        td {
            padding: 10px;
        }
        table {
            border-collapse: collapse;
        }
        img {
            margin: 0 auto;
            display: block;
            height: 300px;
        }
    </style>
    <img src="{{ env('GATEWAY_URL') . '/pokemon/img/' . strtolower($pokemon['name']) . '.png' }}" alt="">
    <table>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Description</td>
            <td>HP</td>
            <td>Views</td>
        </tr>
        <tr>
            <td>{{ $pokemon['id'] }}</td>
            <td>{{ $pokemon['name'] }}</td>
            <td>{{ $pokemon['description'] }}</td>
            <td>{{ $pokemon['hp'] }}</td>
            <td>{{ $stats['views'] }}</td>
        </tr>
    </table>
@endsection
