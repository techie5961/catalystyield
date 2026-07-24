@extends('layout.users.app')
@section('title')
    Salary
@endsection
@section('css')
    <style class="css">
        main{
            padding:0;
        }
    </style>
@endsection
@section('main')
    <section class="w-full column g-10px">
 <section class="column w-full g-10px">
          
            {{-- new --}}
          <section class="w-full pc-x-padding column g-10px p-20px">
           <div class="w-full column">
             <strong class="desc font-weight-900">Tasks</strong>
            <span class="opacity-07">Complete each task to earn rewards.</span>
           </div>
            @if (!$salary->isEmpty())
              <div style="grid-template-columns:repeat(auto-fit,minmax(min(100%,400px),1fr))" class="w-full grid g-10px place-center">
                 @foreach ($salary as $data)
                   <div x-data="{ 
                    Processing : false
                    }" class="w-full pos-relative br-10px p-20px bg-light box-shadow row g-10px">
                 @if ($data->earned == 1)
                       <div x-init="
                   $el.closest('.pos-relative').style.marginTop=($el.offsetHeight / 2) + 'px'
                   " style="transform:translateY(-50%)" class="pos-absolute claimed p-5px p-x-10px font-size-06 top-0 right-0 br-5px bg-green c-white no-select">Completed</div>
              
                 @endif
                 <div class="column w-full g-10px">
                      {{-- new row --}}
                    <div class="row align-center space-between g-10px">
                        <span>You invite {{ number_format($data->referrals) }} user(s) and they invest.</span>
                    <div class="p-10px row align-center g-4px p-y-5px ws-nowrap br-5px bg-primary primary-text no-select no-pointer">
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM13.0049 10.0028H11.0049V20.0028H13.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>

                       {{ $CurrencyHelper::format($data->reward,'NGN',$display_currency) }}</div>
                    </div>
                    {{-- new column --}}
                    <div class="column g-5px w-full">
                        {{-- new row --}}
                        <div class="opacity-07 space-between align-center row font-size-06">
                            <span>{{ min($ref,$data->referrals) }}/{{ $data->referrals }}</span>
                            <span>{{ round((min($ref,$data->referrals) * 100)/$data->referrals) }}%</span>
                        </div>
                        {{-- new  --}}
                        <div class="w-full overflow-hidden h-5px br-1000px bg-rgt-01">
                            <div style="width:{{ round((min($ref,$data->referrals) * 100)/$data->referrals) }}%" class="h-full bg-primary br-1000"></div>
                        </div>
                    </div>
                     
                    @if (round((min($ref,$data->referrals) * 100)/$data->referrals) >= 100 && $data->earned == 0)
                        <button x-data="{  }" x-on:click="
                        Processing = true;
                        SendGetRequest('{{ url('users/get/claim/salary') }}',{
                            'id' : '{{ $data->id }}'
                        },function(response,error){
                            Processing = false;
                            if(error){
                                alert(error);
                            }
                            if(response){
                                let data=JSON.parse(response);
                                CreateNotify(data.status,data.message);
                                if(data.status == 'success'){
                                    Vitecss.navigate('{{ url()->current() }}');
                                }
                            }
                        })
                        " x-text="Processing ? 'Claiming...' : 'Claim Reward'" x-bind:class="Processing ? 'disabled' : ''" class="btn-primary w-full br-5px clip-5"></button>
                    @endif
                  </div>
                </div>
               @endforeach 
              </div>
            @endif
          </section>
        </section>
    </section>
@endsection