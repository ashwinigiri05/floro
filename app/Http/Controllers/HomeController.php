<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exports\UsersExport;
use  Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        
        $users = User::sortable()->paginate(10);
        //$users = User::all()->simplePaginate(15);
        // $users = User::all();
        return view('home',compact('users'));
        
    }
    
    
    public function export()
    {
        
        return Excel::download( new UsersExport(),'users.xlsx' );
        
    }
    
    public function create()
    {
        return view('create');
    }
    
    public function store()
    {
        
        User::create( request()->validate([
            'username'=>['required','string','min:3','max:255'],
            'firstname'=>['required','string','min:3','max:255'],
            'lastname'=>['required','string','min:3','max:255'],
            'email'=>'required|email',
            'password' => 'min:6|required_with:confmpassword|same:confmpassword',
            'confmpassword' => 'required',
            'address'=>['required','min:3','max:2000'],
            'house_number'=>'required|numeric|min:2',
            'postal_code'=>'required|numeric|min:4',
            'city'=>'string|required',
            ]));
            
            
            //   $user = new User;
            
            //    $user->username = request('username');
            //    $user->firstname = request('firstname');
            //    $user->lastname = request('lastname');
            //    $user->email = request('email');
            //    $user->password = request('password');
            //    $user->address = request('address');
            //    $user->house_number= request('house_number');
            //     $user->postal_code = request('postal_code');
            //    $user->city = request('city');
            
            
            // $user->save();
            
            
            return redirect('/home');
        }
        
        public function search(Request $request)
        {
            $serach = $request->get('search');
            
            $users = \DB::table('users')->where('username','like','%'.$serach.'%')
            ->orWhere('firstname','like','%'.$serach.'%')
            ->orWhere('lastname','like','%'.$serach.'%')
            ->orWhere('email','like','%'.$serach.'%')->paginate(10);
            
            return view('/home',[ 'users' =>$users]);
        }
        
        
        public function edit($id)
        {
            $user = User::find($id);
            return view('edit',compact('user'));
        }
        
        public function update($id)
        {
            
            $user = User::find($id);
            
            $user->username = request('username');
            
            $user->firstname = request('firstname');
            $user->lastname = request('lastname');
            $user->email = request('email');
            $user->address = request('address');
            $user->house_number= request('house_number');
            $user->postal_code = request('postal_code');
            $user->city = request('city');
            
            $user->save();
            
            return redirect('/home');
        }
        
        public function destroy($id)
        {
            $user = User::find($id);
            $user->delete();
            return redirect('/home');
        }
        
    }
    