@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Customer Update') }}</div>

                <div class="card-body">
                    <form action="{{route('customers.update',$customer->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" value="{{$customer->name}}"
                                    placeholder="First name" aria-label="First name">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="phone" class="form-control" value="{{$customer->phone}}"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="email" class="form-control" value="{{$customer->email}}"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="address" class="form-control" value="{{$customer->address}}"
                                    placeholder="Last name" aria-label="Last name">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="dob" class="form-control" value="{{$customer->dob}}"
                                    placeholder="Last name" aria-label="Last name">
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection