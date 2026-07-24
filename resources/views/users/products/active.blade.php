@extends('layout.users.app')
@section('title')
    Active Products
@endsection

@section('main')
    <section class="w-full column g-10">
       <section class="column w-full g-10px">
           <div class="column max-w-500 m-x-auto w-full">
                <strong class="desc font-weight-900">My Orders</strong>
                <span class="opacity-07">Track and manage your active orders</span>
             </div>
            <div class="w-full border-bottom-width-2px border-bottom-style-solid border-bottom-color-secondary box-shadow bg-primary primary-text max-w-500 m-x-auto br-10 p-20 column g-10">
                <strong class="desc font-weight-900">{{ $CurrencyHelper::format($income,'NGN',$display_currency) }}</strong>
                <span class="opacity-07">Total Daily Income</span>
            </div>
        </section>
       <div class="w-full column g-10">
        <span class="cd"></span>
        @if ($packages->isEmpty())
            @include('components.utilities',[
              'empty' => 'true',
              'text' => 'No package purchased'
            ])
        @else
        <section style="grid-template-columns:repeat(auto-fit,minmax(min(400px,100%),1fr))" class="w-full g-10 place-center grid">
             
            @foreach ($packages as $data)
                 <div class="w-full p-15px box-shadow column bg-light br-5 g-10">
            {{-- new --}}
           {{-- new row --}}
            <div class="row align-center w-full h-auto g-10">
               
                {{-- new column --}}
                <div class="column">
               <strong class="font-size-1 font-weight-900">{{ $data->package->name }}</strong>
               <small class="opacity-07">Purchased {{ $data->frame }}</small>

                </div>
            </div>
               {{-- new row --}}
               {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Investment Cycle</span>
                <span>{{ number_format($data->package->validity) }} Days</span>
               </div>
               {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Purchase Price</span>
                <span>{{ $CurrencyHelper::format($data->package->cost,'NGN',$display_currency) }}</span>
               </div>
 {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Daily Payout</span>
                <span>{{ $CurrencyHelper::format($data->package->earning,'NGN',$display_currency) }}</span>
               </div>
               {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Settlement Method</span>
                <span>Daily Repayment</span>
               </div>
               {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Investment Status</span>
               <div style="background:#4caf50;" class="p-5px p-x-10px br-5px bg-whatsapp c-white">In Progress</div>
               </div>
               {{-- new --}}
               <div class="column w-full g-2">
                <div class="roow w-full align-center space-between">
                  {{-- new row --}}
               <div class="row w-full align-center space-between">
                <span class="opacity-07">Product Progress</span>
                <span>{{ round((($data->package->validity - $data->cycle)/$data->package->validity)*100) }}%</span>
               </div>
                </div>
  <div style="background:var(--rgt-005)" class="w-full br-1000 h-5 overflow-hidden">
                <div style="background:#4caf50;width:{{ (($data->package->validity - $data->cycle)/$data->package->validity)*100 }}%;" class="w-full br-1000 h-full"></div>
               </div>
               </div>
             
               {{-- new row --}}
               <div class="w-full font-weight-900 br-5px countdown row min-h-40 align-center justify-center bg-secondary no-select no-pointer secondary-text">
                <span>Next Income:</span>
                <span>{{ $data->next }}</span>
               </div>
        </div>
            @endforeach
        </section>
        
        @endif
       </div>
    </section>

    
@endsection
@section('js')
   
@endsection