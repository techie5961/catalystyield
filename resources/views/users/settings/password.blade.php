@extends('layout.users.app')
@section('title')
    Update Password
@endsection
@section('css')
   <style class="css">
        main{
            padding:0;
        }
    </style>
@endsection
@section('main')
     <section class="w-full column">
       
        {{-- new section /body --}}
        <section class="section p-20px body">
            <form action="{{ url('users/post/update/password/process') }}" onsubmit="PostRequest(event,this,Updated)" class="analytics max-w-500 m-x-auto column bg-light w-full p-20px br-10px box-shadow g-10">
               {{-- csrf token --}}
               <input type="hidden" class="input inp required" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>Current Password</label>
                <div class="cont">
                    <input name="current" placeholder="Enter current account password"  autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" type="password" class="inp input required">
                </div>
               </div>
                {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>New Password</label>
               <div class="cont">
                    <input name="new" placeholder="Enter new account password" type="password" autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="inp input required">
                </div>
               </div>
               {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>Confirm New Password</label>
               <div class="cont">
                    <input name="confirm" placeholder="Re-Type new account password" type="password" autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="inp input required">
                </div>
               </div>
              
             <button class="post">Update Password</button>
            </form>
        

            
        </section>
    </section>

    
@endsection
@section('js')
    <script class="js">
        function Updated(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url()->current() }}');
            }
        }
    </script>
@endsection