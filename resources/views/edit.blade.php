
@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h3><p class="text-primary">Edit User Account</p></h3>
            </div>
            
            <div class="card-body ">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            
            <form method="post" action = "/home/{{ $user-> id }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="username">User Name:</label>
                    <input type="text" class=" control"  id="username" name="username" value = "{{ $user-> username}}">
                </div>
                
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" class=" control" id="firstname" name="firstname" value = "{{ $user-> firstname}}" >
                </div>
                
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text"class=" control"  id="lastname" name="lastname" value = "{{ $user-> lastname}}" >
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class=" control" id="email" name="email" value = "{{ $user-> email}}" >
                </div>
                
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" class="control" id="password" name="password" >
                </div>
                
                <div class="form-group">
                    <label for="confmpassword">Confirm Password:</label>
                    <input type="text" class=" control" id="confmpassword" name="confmpassword" value = "{{ $user-> contact_num}}" >
                </div>
                
                {{-- <div class="form-group">
                    <label for="contact_num">Contact:</label>
                    <input type="text" class=" control" id="contact_num" name="contact_num" value = "{{ $user-> contact_num}}" >
                </div> --}}
                <div class="form-group"> 
                    <label for=" address">Address :</label>
                    <textarea name="address" id="address" class="control" value="{{ $user->address }}"></textarea>
                    
                </div>
                <div class="form-group">
                    <label for="house_number">House Number:</label>
                    <input type="text" class=" control" id="house_number" name="house_number" value = "{{ $user-> house_number}}">
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code:</label>
                    <input type="text" class=" control" id="postal_code" name="postal_code" value = "{{ $user-> postal_code}}">
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class=" control" id="city" name="city" value = "{{ $user-> city}}" >
                </div> 
                
                
                <button type="submit" class="btn btn-info">Update</button>
            </form>
            
            
            <div class="container">
                <div class = "row">
                    
                    @yield('content')
                    
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
    
</div>
</div>
</div>
@endsection

