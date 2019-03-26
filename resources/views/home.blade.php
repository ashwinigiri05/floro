@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left h5" style="margin-right 10px">User Managment</span>
                    <span class="pull-right">
                        <a href="/home/create" class=" flex-sm-row" >Create User Account</a>
                    </span>
                    <div class="col-md-9 text-right">
                        <span class="pull-right">
                            <a href={{ route('export') }} class="  float-sm-right " >
                                Expoart to XSLX
                            </a>
                        </span>
                        <br />
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="">
                        <form action="/search" method="GET">
                            <div class="input-group my-4">
                                
                                <input class="pull-right mr-sm-2" type="search" placeholder="Search by User Name,firstname,lastname,email" name="search" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <table class="table table-striped table-hover">
                            
                            <thead>
                                
                                <tr>
                                    <th scope="col">@sortablelink('username')</th>
                                    <th scope="col">@sortablelink('firstname')</th>
                                    <th scope="col">@sortablelink('lastname')</th>
                                    <th scope="col">@sortablelink('email')</th>
                                    <th scope="col">@sortablelink('created_at')</th>
                                    <th scope="col">@sortablelink('Last_login')</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    @if($users->count())
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->firstname }}</td>
                                        <td>{{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><small>{{ $user->created_at }}</small></td> 
                                        <td><small>{{ $user->Last_login }}</small></td> 
                                        
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    
                                                    <a href="/home/{{ $user->id }}/edit"class="btn text-primary"  ><i class="fa fa-edit"></i></a> 
                                                    
                                                    <a class="btn text-danger" href="/home/{{ $user->id }}" onclick="myFunction('{{ $user->username }}');" ><i class="fa fa-trash"></i></a>
                                                    <script>
                                                        function myFunction(username) {
                                                            var txt;
                                                            var message = "Are you sure you wnat to delete this :" + username;
                                                            alert(message);
                                                            
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach  
                                    @endif
                                </tr>
                                
                            </tbody>
                            
                        </table>
                        
                        {!! $users->appends(\Request::except('page'))->render() !!}
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
    