@extends('layout.users.app')
@section('title')
    Gift Code
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
        <section class="section pc-x-padding column g-10px w-full p-20px body">
            
            <form method="POST" action="{{ url('users/post/redeem/gift/code/process') }}" onsubmit="PostRequest(event,this,Updated,null,'Redeeming...')" class="bg-light p-15px w-full br-10px box-shadow max-w-500 m-x-auto column g-10">
              
                {{-- csrf token --}}
               <input type="hidden" class="input inp required" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>Enter Gift Code</label>
                <div class="cont">
                    <input name="code" placeholder="Enter your gift code" type="text" class="inp input required">
                </div>
               </div>
               <small class="opacity-07">Enter a valid gift code to claim your reward</small>
                
              
             <button class="post">Redeem Code</button>
            </form>
        

              {{-- group --}}
          <section class="group w-full column g-10">
             

              {{-- new div --}}
            <div class="column w-full box-shadow bg-light br-10 g-10 p-20">
                <strong class="font-1 font-weight-900">How to get gift code</strong>
               
                 {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Ensure you are in the platforms official groups & communities on whatsapp & telegram.</span>
                </div>
                  {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Always stay active so you can get gift codes immediately admin drops.</span>
                </div>
                 
                 {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Gift codes are limited to certain amount of users and are rendered invalid when met so the trick is survival of the fastest.</span>
                </div>
            </div>
          </section>
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