@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row mt-2 mb-0">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <h4>Customer create</h4>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{route('customers.index')}}" class="btn btn-sm btn-outline-dark me-3 ">back</a>
                    </div>
                </div>
                <hr>
            <div class="card-body">
                <form action="{{route('customers.store')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}"
                                placeholder="name">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}"
                                placeholder="phone">
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="email" class="form-control" value="{{old('email')}}"
                                placeholder="email">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="password" name="password" class="form-control" value="{{old('password')}}"
                                placeholder="password">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="address" class="form-control" value="{{old('address')}}"
                                placeholder="address">
                            @error('address')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="dob" class="form-control" value="{{old('dob')}}">
                            @error('dob')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <select name="status" class="form-control" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection