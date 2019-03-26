
@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h3><p class="text-primary">Create User</p></h3>
            </div>
            
            <div class="card-body ">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            
            <form method="post" action = "/home/create/store">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="username">User Name:</label>
                    <input type="text" class="control{{ $errors->has('username') ? 'is-danger' : '' }}" id="username" name="username" required>
                    
                </div>
                
                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="control{{ $errors->has('firstname') ? 'is-danger' : '' }}" id="firstname" name="firstname" required>
                </div>
                
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="control{{ $errors->has('lastname') ? 'is-danger' : '' }}" id="lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="control{{ $errors->has('email') ? 'is-danger' : '' }}"id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="text" class="control{{ $errors->has('password') ? 'is-danger' : '' }}"id="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="confmpassword">Confirm Password:</label>
                    <input type="text" class="control{{ $errors->has('confmpassword') ? 'is-danger' : '' }}" id="confmpassword" name="confmpassword" >
                </div>
                
                {{--  <div class="form-group">
                    <label for="contact_num">Contact :</label>
                    <input type="text" class="control{{ $errors->has('contact_num') ? 'is-danger' : '' }}" id="contact_num" name="contact_num" >
                </div>  --}}
                
                <div class="form-group"> 
                    <label for=" address">Address :</label>
                    <textarea name="address" id="address" class="control{{ $errors->has('address') ? 'is-danger' : '' }}"required></textarea>
                    
                </div>
                <div class="form-group">
                    <label for="house_number">House Number:</label>
                    <input type="text" class="control{{ $errors->has('house_number') ? 'is-danger' : '' }}"id="house_number" name="house_number" required>
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code:</label>
                    <input type="text" class="control{{ $errors->has('postal_code') ? 'is-danger' : '' }}"id="postal_code" name="postal_code" required>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="control{{ $errors->has('city') ? 'is-danger' : '' }}" id="city" name="city" required>
                </div> 
                
                
                <button type="submit" class="btn btn-info">Save</button>
                
            </form>
            
            @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                    @endforeach
                </ul>
                
            </div>  
            @endif
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

