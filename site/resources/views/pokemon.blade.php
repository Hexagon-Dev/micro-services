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
    </style>
    <table>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Description</td>
            <td>HP</td>
            <td>Views</td>
        </tr>
    @foreach($pokemons as $pokemon)
        <tr>
            <td>{{ $pokemon['id'] }}</td>
            <td><a href="{{ route('pokemon_one', $pokemon['id']) }}">{{ $pokemon['name'] }}</a></td>
            <td>{{ $pokemon['description'] }}</td>
            <td>{{ $pokemon['hp'] }}</td>
            <td>{{ $stats[$pokemon['id'] - 1]['views'] }}</td>
        </tr>
    @endforeach
    </table>
@endsection
