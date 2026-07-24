@extends('layout.users.app')
@section('title')
    Withdraw
@endsection

@section('main')
     <section class="w-full g-10px column">
       
          <section class="column w-full g-10px">
           
            <div class="w-full border-bottom-width-2px border-bottom-style-solid border-bottom-color-secondary box-shadow bg-primary primary-text max-w-500 m-x-auto br-10 p-20 column g-10">
                <strong class="desc font-weight-900">{{ $CurrencyHelper::format(Auth::guard('users')->user()->main_balance,'NGN',$display_currency) }}</strong>
                <span class="opacity-07">Available for Withdrawal</span>
            </div>
        </section>
        {{-- new section /body --}}
        <section class="section column g-10px body">
            <form onsubmit="PostRequest(event,this,Withdrawn)" method="POST" action="{{ url('users/post/withdraw/process') }}" class="analytics box-shadow bg-light w-full column br-10px g-5px p-20px max-w-500 m-x-auto column g-5">
                {{-- csrf token --}}
                <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
               {{-- new input --}}
                <div class="column g-10 w-full">
                 <label>Withdrawal Amount</label>
                <div class="cont">
                    <strong class="font-1 h-full  row perfect-square align-center justify-center g-10 no-shrink">{{ $CurrencyHelper::symbol($display_currency) }}</strong>
                    <input name="amount" data-fee="{{ $finance_settings->withdrawal->fee }}" oninput="CalculateToReceive(this)" placeholder="0.00" inputmode="numeric" type="number" class="inp input required">
                </div>
               </div>
               {{-- new row --}}
               <div class="row align-center g-10 space-between">
                <span class="opacity-07 text-overflow-ellipsis ws-nowrap">You will receive: {{ $CurrencyHelper::symbol($display_currency) }}<span class="to-receive">0</span></span>
                <span class="opacity-07 ws-nowrap">Fee: {{ $finance_settings->withdrawal->fee }}%</span>
               </div>
              @isset (Auth::guard('users')->user()->bank)
                  
               @if ($finance_settings->withdrawal->portal == 'off')
                  <div style="border:1px solid coral;color:coral;background:rgba(255, 127, 80,0.1)" class="g-5 m-top-10 w-full h-50 br-5 row align-center justify-center no-select no-pointer">
                 <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12 2 6.47715 6.47715 2 12 2 17.5228 2 22 6.47715 22 12 22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12 20 7.58172 16.4183 4 12 4 7.58172 4 4 7.58172 4 12 4 16.4183 7.58172 20 12 20ZM13 10.5V15H14V17H10V15H11V12.5H10V10.5H13ZM13.5 8C13.5 8.82843 12.8284 9.5 12 9.5 11.1716 9.5 10.5 8.82843 10.5 8 10.5 7.17157 11.1716 6.5 12 6.5 12.8284 6.5 13.5 7.17157 13.5 8Z"></path></svg>

                    <span>Withdrawal Portal is currently off</span>   
                </div> 
               @else
               <button class="post">Withdraw Now</button>
                   
               @endif
              @else
                  <div onclick="Redirect('{{ url('users/bank?next=withdrawal') }}')" style="border:1px solid orange;color:orange;background:rgba(255, 127, 80,0.1)" class="g-5 text-center p-5 m-top-10 w-full h-50 br-5 row align-center justify-center no-select pointer">

                    <span>Add bank account to place-withdrawals</span>   
                </div> 
              @endisset
            </form>
          {{-- group --}}
          <section class="group w-full column g-10">
              {{-- new div --}}
            <div class="column w-full text-center box-shadow bg-light br-10 g-10 p-20">
                <strong class="font-1">Bank Account Details</strong>
             @isset(Auth::guard('users')->user()->bank)
                 
                  <div class="w-full bg-primary-01 border-color-primary-02 border-width-1px border-style-solid text-start br-5 p-20 column g-5">
               <span class="uppercase">{{ json_decode(Auth::guard('users')->user()->bank)->account_name }}</span>
               <span class="opacity-07">{{ json_decode(Auth::guard('users')->user()->bank)->bank_name }}  ....{{ substr(json_decode(Auth::guard('users')->user()->bank)->account_number,6,4) }}</span>
            <span onclick="Redirect('{{ url('users/bank?next=withdrawal') }}')" class="c-primary row no-select pointer g-2 align-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M16.7574 2.99678L14.7574 4.99678H5V18.9968H19V9.23943L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

                <span>Edit bank details</span>
            </span>
            </div>
             @else 
              <i>
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="40" width="40"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11 7H13V9H11V7ZM11 11H13V17H11V11Z"></path></svg>
                </i>
                <span class="opacity-05 text-center">You haven't linked a bank account for withdrawals yet.</span>
                <button onclick="Redirect('{{ url('users/bank?next=withdrawal') }}')" class="btn-primary br-5 clip-5 w-full">Add Bank Account</button>
         
             @endisset
            </div>

              {{-- new div --}}
            <div class="column w-full box-shadow bg-light br-10 g-10 p-20">
                <strong class="font-1">Withdrawal Instruction</strong>
                {{-- new row --}}
                <div class="row align-center g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Minimum withdrawal: {{ $CurrencyHelper::format($finance_settings->withdrawal->minimum,'NGN',$display_currency) }}</span>
                </div>
               @if ($finance_settings->withdrawal->maximum > 0)
                    {{-- new row --}}
                <div class="row align-center g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Maximum withdrawal: {{ $CurrencyHelper::format($finance_settings->withdrawal->maximum,'NGN',$display_currency) }}</span>
                </div>
               @endif
                  {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Withdrawal Fee: {{ number_format($finance_settings->withdrawal->fee) }}%</span>
                </div>
                 {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Double check your withdrawal account very well to avoid loss of funds.</span>
                </div>
                  {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Referral is Optional, you dont have to refer before you withdraw.</span>
                </div>
                  {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>All withdrawals are processed under 1 - 5 minutes upon placing withdrawal but might exceed at times if we have lots of requests to attend to.</span>
                </div>
                 {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>If you encounter any issues in your withdrawal do well to contact our support team and we would get it resolved.</span>
                </div>
            </div>
          </section>

            
        </section>
    </section>
@endsection
@section('js')
    <script class="js">
        function CalculateToReceive(element){
         try{
              let fee=element.dataset.fee;
            let amt=element.value;
           amt=parseInt(amt);
           fee=parseInt(fee);
           fee=(fee*amt)/100;
           amt=amt - fee;
           amt=Math.round(amt);
           document.querySelector('.to-receive').innerHTML=amt.toLocaleString() + '.00';

         }catch(error){
            alert(error)
         }
           
        }

        function Withdrawn(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url('users/transactions') }}');
            }
        }
    </script>
@endsection