@extends('layout.users.auth')
@section('title')
    Register
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
       
        <form action="{{ url('users/post/register/process') }}" method="POST" onsubmit="PostRequest(event,this,Registered)" class="w-full max-w-500 column g-10">
      <div class="column g-10 w-full">
           <img src="{{ asset(config('settings.logo')) }}" alt="Logo" class="w-half no-pointer no-select max-w-500 m-bottom-40px m-x-auto">
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
            <label>Password</label>
            <div class="cont">
                <input name="password" type="password" placeholder="Enter password" class="inp input required">
            </div>
           </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Confirm Password</label>
            <div class="cont">
                <input name="confirm_password" type="password" placeholder="Enter password again" class="inp input required">
            </div>
           </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Verification Code</label>
            <div class="cont">
                <input inputmode="numeric" name="verification_code" type="number" placeholder="Enter verification code" class="inp input required">
                <canvas x-init="
            let canvas=document.querySelector('canvas');
        let ctx=canvas.getContext('2d');
        ctx.fillStyle='white';
        ctx.fillRect(0,0,100,50);
        ctx.fillStyle='{{ ['red','green','blue','black','goldenrod','purple'][rand(0,5)] }}';
        ctx.textBaseline='middle';
        ctx.font='14px monospace';
        ctx.fillText('{{ substr($captcha,0,1) }}',20,canvas.height/2);
        ctx.fillStyle='{{ ['red','green','blue','black','goldenrod','purple'][rand(0,5)] }}';
        ctx.fillText('{{ substr($captcha,1,1) }}',40,canvas.height/2)
         ctx.fillStyle='{{ ['red','green','blue','black','goldenrod','purple'][rand(0,5)] }}';
        ctx.fillText('{{ substr($captcha,2,1) }}',60,canvas.height/2)
         ctx.fillStyle='{{ ['red','green','blue','black','goldenrod','purple'][rand(0,5)] }}';
        ctx.fillText('{{ substr($captcha,3,1) }}',80,canvas.height/2);
 
" height="50" width="100"></canvas>
            </div>
           </div>
           {{-- captcha code --}}
           <input type="hidden" class="inp input" name="captcha" value="{{ $captcha }}">
            {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Invite Code</label>
            <div class="cont">
                <input {{ $ref != '' ? 'readonly' : '' }} value="{{ $ref }}" name="ref" type="text" placeholder="Enter invite code" class="inp input">
            </div>
           </div>

           <button class="post br-5">Register</button>
       <div x-data="{  }" class="row align-center m-x-auto g-5">Have an account? <a style="color: var(--primary-light)" x-on:click="Vitecss.navigate('{{ url('login') }}')" class="c-primar no-u">Login</a></div> 
      
    </div>
  </form>
    </section>
@endsection
@section('js')
    <script class="js">
  
       
        function Registered(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                 window.location.href='{{ url('users/login') }}';
            }
            
        }
    </script>
@endsection