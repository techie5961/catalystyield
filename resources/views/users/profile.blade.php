@extends('layout.users.app')
@section('title')
    Profile
@endsection
@section('css')
    <style class="css">
        main{
            padding:0;
        }
    </style>
@endsection
@section('main')
    <section class="w-full g-10px column">
     
        {{-- new div --}}
        <section class="section pc-x-padding p-15px column g-10px body">
            <div class="w-full row br-15px align-center bg-light box-shadow p-20 g-10">
                <div class="w-full text-center align-center bg-rgt-005 p-10px br-5px column g-10">
                <strong class="font-1 font-weight-900 ws-nowrap overflow-hidden text-overflow-ellipsis">{{ $CurrencyHelper::format(Auth::guard('users')->user()->main_balance,'NGN',$display_currency) }}</strong>
                <span class="opacity-07">Withdrawal balance</span>
                <button onclick="Redirect('{{ url('users/withdraw') }}')" class="bg-secondary w-full secondary-text border-none no-select pointer p-5px br-5px">Withdraw</button>
            </div>
                   <div class="w-full text-center align-center bg-rgt-005 p-10px br-5px column g-10">
                <strong class="font-1 font-weight-900 ws-nowrap overflow-hidden text-overflow-ellipsis">{{ $CurrencyHelper::format(Auth::guard('users')->user()->deposit_balance,'NGN',$display_currency) }}</strong>
                <span class="opacity-07">Deposit balance</span>
                <button onclick="Redirect('{{ url('users/recharge') }}')" class="bg-primary w-full primary-text border-none no-select pointer p-5px br-5px">Recharge</button>
                </div>
            </div>

           {{-- content --}}
           <div class="contents box-shadow bg-light column br-10px p-15px w-full">
                {{-- new link pc-pointer no-select --}}
                <div onclick="Redirect('{{ url('users/bank') }}')" class="link pc-pointer no-select p-10px border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-01 w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <title>piggy-bank</title>
  <g fill="currentColor"><path d="M17 22V18.5V19" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M7 10.01V10" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 8H15" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M9 22V18.7577C7.17531 18.225 5.5 16.5 5 14.4973L2 13V8.09467L6 6.46664V2.5C7.43764 1.78118 9.27279 2.19602 9.9798 4L14.5 4C18.6421 4 22 7.35786 22 11.5C22 15.6421 18.6421 19 14.5 19H13" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>

                    </i>
                    <span class="block m-right-auto">Bank Account</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
                 {{-- new link pc-pointer no-select --}}
                <div onclick="Redirect('{{ url('users/salary') }}')" class="link pc-pointer no-select p-10px border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-01 w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <title>circle-half-dashed-check</title>
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <path d="m12,2c5.523,0,10,4.477,10,10s-4.477,10-10,10c-.685,0-1.354-.069-2-.2" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m6.122,3.91c.554-.403,1.136-.74,1.736-1.014" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m2.489,8.91c.212-.651.484-1.266.808-1.84" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m2.489,15.09c-.212-.651-.353-1.309-.428-1.964" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m6.122,20.09c-.554-.403-1.055-.851-1.501-1.337" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <polyline points="7 13 10 16 17 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
  </g>
</svg>

                    </i>
                    <span class="block m-right-auto">Tasks</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
                 {{-- new link pc-pointer no-select --}}
                <div onclick="Redirect('{{ url('users/transactions') }}')" class="link pc-pointer no-select p-10px border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-005 w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <title>grid-list</title>
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <rect x="3" y="3" width="6" height="6" rx="1" ry="1" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <line x1="14" y1="4" x2="21" y2="4" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <line x1="14" y1="8" x2="21" y2="8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <rect x="3" y="15" width="6" height="6" rx="1" ry="1" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <line x1="14" y1="16" x2="21" y2="16" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <line x1="14" y1="20" x2="21" y2="20" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
  </g>
</svg>
                    </i>
                    <span class="block m-right-auto">Transaction Records</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>

                  {{-- new link pc-pointer no-select --}}
                <div onclick="Redirect('{{ url('users/products/active') }}')" class="link pc-pointer no-select p-10px border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-005 w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <title>box-archive</title>
  <g fill="currentColor"><path d="M21 12L21 21L3 21L3 12" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M22 8L22 3L2 3L2 8L22 8Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M22 8L22 3L2 3L2 8L22 8Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M22 8L22 3L2 3L2 8L22 8Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M22 8L22 3L2 3L2 8L22 8Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M14 12L10 12" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M14 12L10 12" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M14 12L10 12" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M14 12L10 12" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path></g>
</svg>
                    </i>
                    <span class="block m-right-auto">My Orders</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>

                 {{-- new link pc-pointer no-select --}}
                <div onclick="Redirect('{{ url('users/gift/code') }}')" class="link pc-pointer no-select p-10px border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-005 w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <title>gift</title>
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <path d="m13,29h-6c-1.657,0-3-1.343-3-3v-9" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m28,17v9c0,1.657-1.343,3-3,3h-6" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <rect x="2" y="8" width="28" height="5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <path d="m7,5c0-1.657,1.343-3,3-3,4.438,0,6,6,6,6h-6c-1.657,0-3-1.343-3-3Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m25,5c0-1.657-1.343-3-3-3-4.438,0-6,6-6,6h6c1.657,0,3-1.343,3-3Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <polyline points="19 8 19 29 13 29 13 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
  </g>
</svg>
                    </i>
                    <span class="block m-right-auto">Redeem Gift Code</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>

                 {{-- new link pc-pointer no-select --}}
                <div onclick="Redirect('{{ url('users/referrals') }}')" class="link pc-pointer no-select p-10px border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-01 w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <title>users</title>
  <g fill="currentColor">
    <circle cx="6.5" cy="8.5" r="2.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
    <circle cx="13.5" cy="5.5" r="2.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
    <path d="m10.875,11.845c.739-.532,1.645-.845,2.625-.845,1.959,0,3.626,1.252,4.244,3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    <path d="m2.256,17c.618-1.748,2.285-3,4.244-3s3.626,1.252,4.244,3" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
  </g>
</svg>

                    </i>
                    <span class="block m-right-auto">My Team</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
                 {{-- new link pc-pointer no-select --}}
                <div onclick="CreateNotify('info','Official App is coming soon....')" class="link pc-pointer no-select p-10px border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-01 w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <title>download-4</title>
  <g fill="currentColor">
    <path d="m19,22H5c-1.654,0-3-1.346-3-3v-4h2v4c0,.551.449,1,1,1h14c.551,0,1-.449,1-1v-4h2v4c0,1.654-1.346,3-3,3Z" stroke-width="0" fill="currentColor"></path>
    <polygon points="17 8.586 13 12.586 13 2 11 2 11 12.586 7 8.586 5.586 10 12 16.414 18.414 10 17 8.586" fill="currentColor" stroke-width="0"></polygon>
  </g>
</svg>

                    </i>
                    <span class="block m-right-auto">Download App</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>

                 {{-- new link pc-pointer no-select --}}
                <div onclick="Redirect('{{ url('users/password/update') }}')" class="link pc-pointer no-select p-10px border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-01 w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <title>lock</title>
  <g fill="currentColor">
    <path d="M5.75,8.25v-3.25c0-1.795,1.455-3.25,3.25-3.25h0c1.795,0,3.25,1.455,3.25,3.25v3.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <line x1="9" y1="11.75" x2="9" y2="12.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <rect x="3.25" y="8.25" width="11.5" height="8" rx="2" ry="2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></rect>
  </g>
</svg>

                    </i>
                    <span class="block m-right-auto">Update Password</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
                 {{-- new link pc-pointer no-select --}}
                <div onclick="window.location.href='{{ url('users/logout') }}'" class="link pc-pointer no-select p-10px w-full row space-between align-center g-10">
                    <i>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <title>arrow-door-out-3</title>
  <g fill="currentColor">
    <path d="M11.75,5.75V3.25c0-.552-.448-1-1-1H4.25c-.552,0-1,.448-1,1V14.75c0,.552,.448,1,1,1h6.5c.552,0,1-.448,1-1v-2.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <polyline points="14.5 6.25 17.25 9 14.5 11.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></polyline>
    <line x1="17.25" y1="9" x2="11.25" y2="9" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <path d="M3.457,2.648l3.321,2.059c.294,.182,.473,.504,.473,.85v6.887c0,.346-.179,.667-.473,.85l-3.322,2.06" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
  </g>
</svg>

                    </i>
                    <span class="block m-right-auto">Logout</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
           </div>
        </section>
    </section>
@endsection