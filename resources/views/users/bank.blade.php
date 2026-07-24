@extends('layout.users.app')
@section('title')
    Bank Details
@endsection
@section('main')
     <section x-data="{ 
        Bankselected : false,
        BankOverlay : false,
        Bank : {
            Code : '',
            Name : ''
        },
        AccountVerified : false,
        AccountNumber : '',
        AccountName : '',
        IsChanged : 0,
        Verifying : false,
        VerifyError : false
      }" x-init="
      $watch('BankOverlay', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden');
            document.querySelector('header').classList.add('overlayed');
            document.querySelector('.main-body').classList.add('overlayed');
            
        }else{
            document.body.classList.remove('overflow-hidden');
            document.querySelector('header').classList.remove('overlayed');
            document.querySelector('.main-body').classList.remove('overlayed');
        }
      });
      $watch('AccountNumber', (value) => {
        if(value.length == 10){
            IsChanged++;
        }
      });
      $watch('Bank.Code', (value) => {
        if(value != ''){
            IsChanged++;
        }
      });
      $watch('IsChanged', (value) => {
        if(Bank.Code != '' && AccountNumber.length == 10){
            Verifying = true;
            VerifyError = false;
            AccountVerified = false;
            AccountName = '';
            SendGetRequest('{{ url('users/get/korapay/bank/verify') }}',{
                'account_number' : AccountNumber,
                'bank_code' : Bank.Code
            },function(response,error){
                Verifying = false;
              let data=JSON.parse(response);
              if(data.status == 'success'){
                AccountVerified = true;
                AccountName = data.message;
              }else{
                VerifyError= true;
              }

              if(error){
                CreateNotify('error','Internal server error, please try again')
              }
            });
        }
      })
      " class="w-full g-10px column">
      <section class="w-full main-body group transition-all column g-10px">
         <section class="column w-full g-10px">
          
          @isset(Auth::guard('users')->user()->bank)

            <div class="w-full column g-5px border-bottom-width-2px border-bottom-style-solid border-bottom-color-primary-light box-shadow bg-primary primary-text max-w-500 m-x-auto br-10 p-20 column g-10">
                <strong class="font-weight-800">Current Linked Account</strong>
               <span class="uppercase">{{ json_decode(Auth::guard('users')->user()->bank)->account_name }}</span>
               <span class="opacity-07">{{ json_decode(Auth::guard('users')->user()->bank)->bank_name }} <br> ....{{ substr(json_decode(Auth::guard('users')->user()->bank)->account_number,6,4) }}</span>
           
            </div>
            @endisset
        </section>
        {{-- new section /body --}}
        <section class="section column w-full g-10px body">
            <form method="POST" action="{{ url('users/post/add/bank/process') }}" x-on:submit="PostRequest(event,$el,function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    Vitecss.navigate('{{ $next ? url('users/withdraw') : url()->current() }}');
                
                }
            })" class="analytics p-20px w-full br-10px max-w-500 m-x-auto bg-light column g-10">
               {{-- csrf token --}}
               <input type="hidden" class="input inp required" name="_token" value="{{ @csrf_token() }}">
               {{-- new input --}}
                <div x-bind:class="Verifying ? 'no-pointer' : ''" class="column g-5 w-full">
                 <label>Account Number</label>
                <div class="cont">
                    <input x-model="AccountNumber" name="account_number" placeholder="Enter 10-digits account number" inputmode="numeric" type="number" class="inp input required">
                </div>
               </div>
                {{-- new input --}}
                <div x-bind:class="Verifying ? 'no-pointer' : ''" class="column g-5 w-full">
                 <label>Bank Name</label>
                <div x-on:click="
                BankOverlay = true;
                " class="no-select bank-cont pc-pointer cont">
                <input type="hidden" x-bind:value="Bank.Name" name="bank_name" class="inp input required">
                <input type="hidden" x-bind:value="Bank.Code" name="bank_code" class="inp input required">
                 {{-- new --}}
                 <template x-if="!Bankselected">
                    <div class="row align-center no-select opacity-07 p-10px w-full g-10px space-between">
                        <span>Select bank</span>
                        <i>
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                        </i>
                    </div>
                 </template>
                  <template x-if="Bankselected">
                    <div class="row align-center no-select p-10px w-full g-10px space-between">
                        <span x-text="Bank.Name"></span>
                      
                    </div>
                 </template>
                </div>
                 {{-- new --}}
               <div x-show="Verifying" class="p-5px row align-center g-5px w-fit font-size-07 m-left-auto p-x-10px br-5px bg-green-transparent no-select no-pointer c-green font-weight-700">
               <?xml version="1.0" encoding="utf-8"?><svg height="15" width="15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

                Verifying...
               </div>
               </div>
               <div x-show="VerifyError" class="p-10px br-10px bg-red-transparent c-red no-select no-pointer">We could not verify this account, please check the details and try again</div>
              
               {{-- new input --}}
                <div x-show="AccountVerified" class="column g-5 w-full">
                 <label>Account Name</label>
                <div class="cont">
                  <input readonly x-bind:value="AccountName" name="account_name" type="text" placeholder="Enter account name" class="inp input required">
                </div>
               </div>
              
             <button x-bind:class="!AccountVerified ? 'disabled' : ''" class="post">Update Bank Details</button>
            </form>
          {{-- group --}}
          <section class="group w-full column g-10">
             

              {{-- new div --}}
            <div class="column w-full bg-light br-10 g-10 p-20">
                <strong class="font-1">Instructions</strong>
               
                 {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>Please ensure the account entered is correct to avoid issues with withdrawal.</span>
                </div>
                  {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>You can always come back here to update your bank details.</span>
                </div>
                 
                 {{-- new row --}}
                <div class="row g-5">
                    <i class="c-green">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="15" width="15"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM17.4571 9.45711L11 15.9142L6.79289 11.7071L8.20711 10.2929L11 13.0858L16.0429 8.04289L17.4571 9.45711Z"></path></svg>

                    </i>
                    <span>If you encounter any difficulties in adding your bank account do well to contact our support team.</span>
                </div>
            </div>
          </section>

            
        </section>
    </section>
    <section x-on:click="
    BankOverlay = false;
    " x-show="BankOverlay" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed transition-all overflow-hidden justify-end column align-center backdrop-blur-10px inset-0 z-index-3000 bg-black-transparent">
        {{-- child --}}
        <div x-on:click.stop="" x-show="BankOverlay" x-transition:enter-start="bottom-enter" x-transition:enter-end="bottom-enter-end" x-transition:leave-start="bottom-leave" x-transition:leave-end="bottom-leave-end" class="w-full max-h-half transition-all column bg-light overflow-hidden br-top-left-15px br-top-right-15px">
           {{-- new row --}}
            <div class="w-full pos-sticky bg-inherit p-20px row align-center space-between">
                <strong class="font-size-1 font-weight-800">Select bank</strong>
                <div x-on:click="
    BankOverlay = false;
    " class="h-30px w-30px circle bg-rgt-005 perfect-square no-shrink column align-center justify-center">
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

                </div>
            </div>
            {{-- bank loop --}}
          <div class="w-full overflow-auto column">
              @foreach (collect(json_decode(file_get_contents(database_path('data/korapayBanks.json'))))->sortBy('name') as $data)
                <div x-on:touchstart="$el.classList.add('bg-rgt-01')" x-on:touchend="$el.classList.remove('bg-rgt-01')" x-on:click="
                Bank.Code = '{{ $data->code }}';
                Bank.Name = '{{ $data->name }}';
                Bankselected = true;
                BankOverlay=false;
                " class="w-full border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-005 p-y-15 no-select pc-pointer row g-10px align-center p-x-20px p-10px">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M24,108H44v48H32a12,12,0,0,0,0,24H224a12,12,0,0,0,0-24H212V108h20a12,12,0,0,0,6.29-22.22l-104-64a12,12,0,0,0-12.58,0l-104,64A12,12,0,0,0,24,108Zm44,0H92v48H68Zm72,0v48H116V108Zm48,48H164V108h24ZM128,46.09,189.6,84H66.4ZM252,208a12,12,0,0,1-12,12H16a12,12,0,0,1,0-24H240A12,12,0,0,1,252,208Z"></path></svg>

                    </i>
                    <span>{{ $data->name }}</span>
                </div>
            @endforeach
          </div>
        </div>
    </section>
</section>
@endsection
