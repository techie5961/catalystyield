@extends('layout.users.auth')
@section('title')
    Login
@endsection
@section('css')
    <style class="css">
        label{
            padding-left:10px;
           
        }
      
    </style>
@endsection
@section('main')
    <section class="w-full align-center justify-center column g-10">
      
        <form action="{{ url('users/post/login/process') }}" method="POST" onsubmit="PostRequest(event,this,LoggedIn)" class="w-full max-w-500 column g-10">
      <div class="w-full column g-10">
           <img src="{{ asset(config('settings.logo')) }}" alt="Logo" class="w-half no-pointer no-select m-bottom-40px max-w-500 m-x-auto">
            {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input">
          {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Mobile Number</label>
            <div class="cont">
                <input inputmode="numeric" name="phone" type="number" placeholder="Enter your mobile number" class="inp input required">
            </div>
           </div>
           {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Account Password</label>
            <div class="cont">
                <input name="password" type="password" placeholder="Enter account password" class="inp input required">
            </div>
           </div>
           
           
         
           
           <button class="post br-5">Login</button>
       <div x-data="{  }" class="row align-center m-x-auto g-5">New user? <a style="color: var(--primary-light)" x-on:click="Vitecss.navigate('{{ url('register') }}')" class="c-primar no-u">Register</a></div> 
      
      </div>
        </form>
    </section>
      
@endsection
@section('js')
    <script class="js">
      
        function LoggedIn(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                 window.location.href='{{ url('users/dashboard') }}';
            }
            
        }
        Debug();
    </script>
@endsection