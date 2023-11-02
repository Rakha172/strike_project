<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>{{$title->name}} | Events</title>
  </head>
  <body>
    @extends('componen.layout')

@section('content')

    <div class="container">
        <div class="card">
                <h1 class="text-center fs-2 mt-4">DATA EVENTS</h1>
            <div class="card-body">

        <a href="{{ route('event.create')}}" class="btn btn-success">Add</a>

        @if ($pesan = session('berhasil'))
        <div class="alert alert-primary" role="alert">
           {{ $pesan }}
        </div>
        @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Total Booth</th>
                <th scope="col">Event Date</th>
                <th scope="col">Location</th>
                <th scope="col">Description</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($events as $key => $evnt)
              <tr>
                <td>{{ $evnt->name }}</td>
                <td><img src="{{ asset($evnt->image) }}" width="100"></td>
                <td>Rp. {{ number_format($evnt->price, 0, '.', '.')}}</td>
                <td>{{ $evnt->total_booth }}</td>
                <td>{{ $evnt->event_date }}</td>
                <td>{{ $evnt->location }}</td>
                <td>
                    {{ strlen($evnt->description) > 100 ? substr($evnt->description, 0, 100) . '...' : $evnt->description }}
                </td>
                <td>
                <td>

                    <form action="{{ route('event.destroy', $evnt->id) }}" method="POST">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-dark m-1" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini?')">Delete</button>
			            <a href="{{ route('result.index', $evnt->id) }}" class="btn btn-primary m-1">Result</a>
			            <a href="{{ route('events.chart-result', $evnt->id) }}" class="btn btn-primary m-1">Chart Result</a>

                        <a href="{{ route('event.show', $evnt->id) }}" class="btn btn-info m-1">Read</a>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    {{-- <td colspan="n">
        <div style="text-align: center;"> --}}

    @endsection
