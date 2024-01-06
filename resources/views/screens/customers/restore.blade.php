@extends('layouts.app')

@section('content')
<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row mt-2 mb-0">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <h4>Customers</h4>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{route('customers.index')}}" class="btn btn-sm btn-outline-secondary me-2 ">back</a>
                    </div>
                </div>
                <hr>
                <div class="card-body table-responsive">
                    <table class="table">
                        <tr>
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>dob</th>
                                <th>status</th>
                                <th class="text-center">Action</th>
                            </thead>
                        </tr>
                        <tbody>

                            @foreach($customers as $customer)

                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->dob}}</td>
                                <td>
                                    @if($customer->status == true)
                                    <button class="btn-primary btn btn-sm ">Active</button>
                                    @else
                                    <button class="btn-danger btn btn-sm">InActive</button>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{url('customer/restore')}}/{{$customer->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex gap-1">

                                            <button type="submit" class="btn btn-outline-warning text-black btn-sm ">restore</button>

                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $customers->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>

    @if (Session:: has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session:: has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif

    @if (Session:: has('warning'))
    toastr.warning("{{session()->get('warning')}}");
    @endif

    @if (Session:: has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif

</script>
@endsection