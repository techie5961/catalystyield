@extends('layout.users.app')
@section('title')
    Checkout
@endsection
@section('main')
<section x-data="{ 
    Overlay : false,
 }" x-init="
 $watch('Overlay', (value) => {
    if(value){
        document.body.classList.add('overflow-hidden');
    }else{
        document.body.classList.add('overflow-hidden');

    }
 })
 " class="w-full column g-10px">
    <section class="w-full column g-10px">
          <div class="w-full bg-light column align-center br-10px box-shadow p-15px">

            
            {{-- new --}}
               <div class="w-full g-5px br-5px border-bottom-width-1px border-bottom-color-rgt-01 border-bottom-style-dashed p-10px column">
               <span class="opacity-05 font-size-07">Amount</span>
               <div class="row align-center g-10px">
               <strong class="font-size-1-3 font-weight-900">&#8358;{{ number_format($trx->amount) }}</strong>
                <span x-data="{ 
                    Copied : false
                 }" class="c-primary-light">
                    <svg x-on:click="
                    copy('{{ $trx->amount }}');
                    Copied = true;
                    setTimeout(() => {
                        Copied = false;
                    }, 2000);
                    " class="pc-pointer" x-show="!Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M180,64H40A12,12,0,0,0,28,76V216a12,12,0,0,0,12,12H180a12,12,0,0,0,12-12V76A12,12,0,0,0,180,64ZM168,204H52V88H168ZM228,40V180a12,12,0,0,1-24,0V52H76a12,12,0,0,1,0-24H216A12,12,0,0,1,228,40Z"></path></svg>
                 <svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M176.49,95.51a12,12,0,0,1,0,17l-56,56a12,12,0,0,1-17,0l-24-24a12,12,0,1,1,17-17L112,143l47.51-47.52A12,12,0,0,1,176.49,95.51ZM236,128A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z"></path></svg>

                </span>
               </div>
            </div>
             {{-- new --}}
               <div class="w-full g-5px br-5px border-bottom-width-1px border-bottom-color-rgt-01 border-bottom-style-dashed p-10px column">
               <span class="opacity-05 font-size-07">Account Number</span>
               <div class="row align-center g-10px">
               <strong class="font-size-1 font-weight-700">3002523887</strong>
                <span x-data="{ 
                    Copied : false
                 }" class="c-primary-light">
                    <svg x-on:click="
                    copy('3002523887');
                    Copied = true;
                    setTimeout(() => {
                        Copied = false;
                    }, 2000);
                    " class="pc-pointer" x-show="!Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M180,64H40A12,12,0,0,0,28,76V216a12,12,0,0,0,12,12H180a12,12,0,0,0,12-12V76A12,12,0,0,0,180,64ZM168,204H52V88H168ZM228,40V180a12,12,0,0,1-24,0V52H76a12,12,0,0,1,0-24H216A12,12,0,0,1,228,40Z"></path></svg>
                 <svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M176.49,95.51a12,12,0,0,1,0,17l-56,56a12,12,0,0,1-17,0l-24-24a12,12,0,1,1,17-17L112,143l47.51-47.52A12,12,0,0,1,176.49,95.51ZM236,128A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z"></path></svg>

                </span>
               </div>
            </div>
                  {{-- new --}}
               <div class="w-full br-5px g-5px border-bottom-width-1px border-bottom-color-rgt-01 border-bottom-style-dashed p-10px column">
               <span class="opacity-05 font-size-07">Bank</span>
               <div class="row align-center g-5px">
                <img src="{{ asset('banners/idsfwYAwKO_1784976973303.png') }}" alt="" class="w-20px">
               <strong class="font-size-1 font-weight-700">Kuda Microfinance Bank</strong>

               </div>
               </div>
                 {{-- new --}}
               <div class="w-full br-5px g-5px p-10px column">
               <span class="opacity-05 font-size-07">Account Name</span>
               <strong class="font-size-1 font-weight-700">David James</strong>
               </div>
               <div class="hr" vitecss-type="dotted"></div>
               <small class="opacity-07 m-top-5px text-center">Please ensure to send the exact amount after making the transfer</small>
            <button x-on:click="Overlay=true;" style="background:rgb(108,92,230);color:white;" class="p-10px min-h-50 m-top-20px br-10px w-full border-none no-select pointer">I have made this bank transfer</button>
            </div>
            
    </section>
    <section x-on:click="Overlay=false;" x-show="Overlay" x-transition:enter-start="fade-enter transition-all" x-transition:enter-end="fade-enter-end transition-all" x-transition:leave-start="fade-leave transition-all" x-transition:leave-end="fade-leave-end transition-all"  class="w-full align-center justify-end z-index-3000 column pos-fixed inset-0 bg-black-transparent">
        <div x-on:click.stop="" x-show="Overlay" x-transition:enter-start="bottom-enter" x-transition:enter-end="bottom-enter-end" x-transition:leave-start="bottom-leave" x-transition:leave-end="bottom-leave-end" class="w-full transition-all column p-20px g-10px bg br-top-right-15px br-top-left-15px">
            <strong  class="font-size-1 c-blueviolet font-weight-900">Enter sender details</strong>
            <div class="hr" vitecss-type="solid"></div>
            <form x-on:submit="PostRequest($event,$el,function(response){
                    let data=JSON.parse(response);
                    CreateNotify(data.status,data.message);
                    if(data.status == 'success'){
                        Vitecss.navigate('{{ url('users/transactions') }}')
                    }
            })" method="POST" action="{{ url('users/post/deposi/checkout/process') }}" class="w-full column g-10px">
             <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
             <input type="hidden" class="inp input" name="id" value="{{ $id }}">
             {{-- new input --}}
                <div class="column w-full g-5px">
                    <label>Sender Name</label>
                    <div class="cont">
                        <input name="full_name" placeholder="Enter sender full name" type="text" class="inp h-40px input required">
                    </div>
                </div>
                 {{-- new input --}}
                <div class="column w-full g-5px">
                    <label>Sender Bank</label>
                    <div class="cont">
                        <input name="bank_name" placeholder="Enter sender bank name" type="text" class="inp h-40px input required">
                    </div>
                </div>
                <div class="row align-center g-5px">
                    <span class="font-weight-700 m-top-20px row align-center g-5px font-size-07">
                        <svg class="c-blueviolet" height="15" width="15" viewBox="0 0 135 140" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><rect y="10" width="15" height="120" rx="6"><animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"/><animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"/></rect><rect x="30" y="10" width="15" height="120" rx="6"><animate attributeName="height" begin="0.25s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"/><animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"/></rect><rect x="60" width="15" height="140" rx="6"><animate attributeName="height" begin="0s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"/><animate attributeName="y" begin="0s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"/></rect><rect x="90" y="10" width="15" height="120" rx="6"><animate attributeName="height" begin="0.25s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"/><animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"/></rect><rect x="120" y="10" width="15" height="120" rx="6"><animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"/><animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"/></rect></svg>

                        Submit the details to quickly confirm your transaction</span>
                </div>
                <button class="w-full h-50px br-10px border-none bg-blueviolet c-white no-select pointer">Submit sender details</button>
            </form>
        </div>
    </section>
    </section>
@endsection