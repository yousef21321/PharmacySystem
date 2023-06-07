@extends('layouts.app')

@section('content')


    <div class="container mt-5">
        @csrf

        @if ($order->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nameOfMedicine</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Name</th>
                        <th scope="col">PhoneNumber</th>
                        <th scope="col">Address</th>
                        <th scope="col">created_at</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp

                    @foreach ($order as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item->nameOfMedicine }}</td>
                            <td>{{ $item->Quantity }}</td>
                            <td>{{ $item->Name }}</td>
                            <td>{{ $item->PhoneNumber }}</td>
                            <td>{{ $item->Address }}</td>
                            <td>{{ $item->created_at }}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    No medicines!
                </div>
            </div>
        @endif

    </div>
@endsection
