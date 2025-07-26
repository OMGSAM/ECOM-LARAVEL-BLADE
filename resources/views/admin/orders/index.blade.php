@extends('layouts.admin')

@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Orders List
                    <!-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right">
                        Create
                    </a> -->
                </h3>     
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>phone</th>
                                <th>adresse</th>
                                <th>montant</th>
                                <th>date</th>
                                <th>email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $product)
                                 <tr>
                                 <td>   {{$product->user_id}} </td>

                                 <td>   {{$product->customer_first_name}} </td>
                                 <td>   {{$product->customer_phone}} </td>
                                 <td>   {{$product->customer_address}} </td>
                                 <td>   {{$product->grand_total}} DH </td>
<td>{{ \Carbon\Carbon::parse($product->payment_due)->format('Y:m:d') }} à {{ \Carbon\Carbon::parse($product->payment_due)->format('H:i') }}</td>
                                                                  <td>   {{$product->customer_email}} </td>

                                                                   <td>  
<form action="{{ route('orders.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                                            @csrf 
                                                            @method('delete')
    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                            </form>    
                                                                </td>


                                 </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection