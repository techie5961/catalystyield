@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
    <style class="css">
            .nav-links{
            user-select:none;
            -webkit-user-select:none;
            }
            .nav-links > div{
            display:flex;
            flex-direction: column;
            align-items:center;
            justify-content:center;
            width:100%;
            gap:5px;
            text-align: center;
            cursor: pointer;
            font-weight:600;
            }
            .nav-links .icon{
            width:50px;
            aspect-ratio:1;
            flex-shrink: 0;
            border-radius:50%;
            display:flex;
            align-items: center;
            justify-content: center;
            }
            .quick-actions{
            width:100%;
            padding:10px;
            border-radius:5px;
            display: flex;
            flex-direction: column;
            gap:10px;
            position: relative;
            overflow:hidden;


            }
            .quick-actions::after{
            content:'';
            position: absolute;
            bottom:0;
            right:0;
            width:50%;
            background:rgba(255,255,255,0.1);
            z-index:10;

            }
            .quick-actions > div{
            position: relative;
            z-index:100;

            }
            .package-card{
            width: 100%;
            border-radius:10px;
            overflow:hidden;
            background:var(--bg-light);
            padding:10px;


            }
            .package-card .img{
            /* max-height: 200px; */
            overflow:hidden;
            position: relative;
            border-radius:10px;
            height:100%;
            background-size:cover;
            background-position: center;
            padding-top:50%;
            }
            .package-card .img > div{
            position: relative;
            z-index:100;
            color:white;
            }
            .package-card .img::after{
            content:'';
            position: absolute;
            bottom:0;
            left:0;
            right:0;
            background:linear-gradient(to top,var(--bg-light) 0%,rgba(var(--bg-light-rgb),0.8) 65%,rgba(var(--bg-light-rgb),0.1) 100%);
            overflow:hidden;
            height:100%;
            z-index:10;
            width:100%;

            }
            .welcome-message{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,0.2);
            z-index:4000;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding:20px;
            display: flex;
            align-items:center;
            justify-content: center;
            flex-direction: column;
            display:none;
            }
            .welcome-message.active{
            display:flex;
            }

            .welcome-message  .child{
            width:100%;
            max-width:500px;
            background:var(--bg);
            padding:20px;
            border-radius:5px;
            max-height:70%;
            display:flex;
            flex-direction:column;
            gap:10px;
            }
            .welcome-message  .child.active{
            animation:bounceInDown 2s ease forwards;
            }
            .welcome-message  .child.inactive{
            animation:zoomInDown 2s ease reverse forwards;
            }



            body:has(.welcome-message.active){
            overflow: hidden;
            }

            div.banner{
            width:100%;
            position:relative;



            }
           .glitch-button,
           .glitch-button::after {
            padding: 16px 20px;
            font-size: 0.8rem;
            background: linear-gradient(45deg, transparent 5%, var(--secondary) 5%);
            border: 0;
            color: #fff;
            letter-spacing: 3px;
            line-height: 1;
            box-shadow: 6px 0px 0px var(--primary-light);
            outline: transparent;
            position: relative;
            width:100%;
            }

           .glitch-button::after {
            --slice-0: inset(50% 50% 50% 50%);
            --slice-1: inset(80% -6px 0 0);
            --slice-2: inset(50% -6px 30% 0);
            --slice-3: inset(10% -6px 85% 0);
            --slice-4: inset(40% -6px 43% 0);
            --slice-5: inset(80% -6px 5% 0);
            content: "HOVER ME";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 3%, var(--primary-light) 3%, var(--primary-light) 5%, var(--secondary) 5%);
            text-shadow: -3px -3px 0px var(--secondary), 3px 3px 0px var(--primary-light);
            clip-path: var(--slice-0);
            }

           .glitch-button:hover::after {
            animation: 1s glitch;
            animation-timing-function: steps(2, end);
            }

            @keyframes glitch {
            0% {
            clip-path: var(--slice-1);
            transform: translate(-20px, -10px);
            }

            10% {
            clip-path: var(--slice-3);
            transform: translate(10px, 10px);
            }

            20% {
            clip-path: var(--slice-1);
            transform: translate(-10px, 10px);
            }

            30% {
            clip-path: var(--slice-3);
            transform: translate(0px, 5px);
            }

            40% {
            clip-path: var(--slice-2);
            transform: translate(-5px, 0px);
            }

            50% {
            clip-path: var(--slice-3);
            transform: translate(5px, 0px);
            }

            60% {
            clip-path: var(--slice-4);
            transform: translate(5px, 10px);
            }

            70% {
            clip-path: var(--slice-2);
            transform: translate(-10px, 10px);
            }

            80% {
            clip-path: var(--slice-5);
            transform: translate(20px, -10px);
            }

            90% {
            clip-path: var(--slice-1);
            transform: translate(-10px, 0px);
            }

            100% {
            clip-path: var(--slice-1);
            transform: translate(0);
            }
            }


            /* media query for pc */
            @media(min-width:800px){
            img[alt=Banner]{
            max-height:150px;
            max-width:500px;
            margin:auto;
            }
            .quick-actions{
            max-width:70%;

            }
            }
           

            button.action-button {
  border-radius: .25rem;
  text-transform: uppercase;
  font-style: normal;
  font-weight: 400;
  padding-left: 20px;
  padding-right: 20px;
  color: #fff;
  -webkit-clip-path: polygon(0 0,0 0,100% 0,100% 0,100% calc(100% - 15px),calc(100% - 15px) 100%,15px 100%,0 100%);
  clip-path: polygon(0 0,0 0,100% 0,100% 0,100% calc(100% - 15px),calc(100% - 15px) 100%,15px 100%,0 100%);
  height: 40px;
  font-size: 0.7rem;
  line-height: 14px;
  transition: .2s .1s;
  background-image: linear-gradient(90deg,var(--secondary),var(--secondary-light));
  border: 0 solid;
  overflow: hidden;
  white-space: nowrap;
}

button.action-button:hover {
  cursor: pointer;
  transition: all .3s ease-in;
  padding-right:25px;
  padding-left: 25px;
}
          
    </style>
@endsection
@section('main')

    <section x-data="{ 
        Overlay : false,
        Package : {
            ID : '',
            Name : '',
            Cost : '',
            DailyIncome : '',
            Cycle : '',
            TotalIncome : '',
           
        },
         Populate : true
     }" x-init="
     document.body.classList.add('overflow-hidden');
     $watch('Overlay', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden');
            $refs.Group.classList.add('overlayed');
            document.querySelector('header').classList.add('overlayed');
        }else{
            document.body.classList.remove('overflow-hidden');
            $refs.Group.classList.remove('overlayed');
            document.querySelector('header').classList.remove('overlayed');


        }
     });
     $watch('Populate', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden')
        }else{
            document.body.classList.remove('overflow-hidden')

        }
     })
     " class="w-full column">
     {{-- modal --}}
     <section x-show="Populate" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-on:click="
     Populate = false;
     " class="pos-fixed transition-all p-20px column align-center justify-center inset-0 bg-black-transparent z-index-3000 backdrop-blur-5px">
        <div x-on:click.stop="" style="max-width:500px;max-height:90%;" class="w-full overflow-hidden h-fit bg br-10px column align-center">
            {{-- head --}}
            <div class="p-20px w-full column g-10px align-center">
               <div x-on:click="Populate = false;" class="h-30px pc-pointer m-left-auto perfect-square circle bg-rgt-01 column align-center justify-center">
                <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

               </div>
            <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-100px">
                <strong class="font-size-1 text-center font-weight-900">✨Welcome to {{ config('app.name') }} official platform✨</strong>

            </div>
            {{-- body --}}
            <div class="w-full overflow-auto border-top-width-1px border-top-style-solid border-top-color-rgt-01 border-bottom-width-1px border-bottom-style-solid border-bottom-color-rgt-01 bg-rgt-003 p-20px column g-10px">
            {{-- new --}}
            <div class="font-weight-800">💵 Welcome Bonus: {{ $CurrencyHelper::format($finance_settings->welcome_bonus,'NGN',$display_currency) }}</div>
            <div class="font-weight-800">🎁 Daily Gift code: up to {{ $CurrencyHelper::format(1000,'NGN',$display_currency) }}</div>
            <div class="font-weight-800">🔥 Referral Bonus: up to {{ $CurrencyHelper::format(1000000,'NGN',$display_currency) }}</div>
            <div class="font-weight-800">🔥 Earn up to {{ number_format($referral_settings->level_1) }}% commission through referral program</div>
            <div class="font-weight-800">🔥 The more members in your team, the higher your earnings! the larger your team size, the greater the rewards!</div>
            </div>
            <div class="w-full pos-sticky bottom-0 column p-20px g-10px">
                <button x-on:click="window.open('{{ $social_settings->telegram_community }}')" class="btn-telegram p-10px br-10px">Join Telegram</button>
                <button x-on:click="window.open('{{ $social_settings->whatsapp_community }}')" class="btn-whatsapp p-10px br-10px">Join Whatsapp</button>
            </div>

        </div>
     </section>
     {{-- main section --}}
       <section x-ref="Group" class="w-full g-10px column transition-all group">
    
        <div x-data="{ 
            HideBalance : $persist(false).as('dashboard-balance')
          }" style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:var(--primary-text)" class="w-full p-bottom-0 g-10px br-10px column p-20px">
            {{-- new row --}}
            <div class="w-full row align-center g-10px space-between">
                <span class="opacity-07">AVAILABLE BALANCE</span>
                <span x-on:click="Vitecss.navigate('{{ url('users/transactions') }}')" class="font-size-07 pc-pointer row no-select align-center opacity-07">
                    Transaction History
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z"></path></svg>

                </span>
            </div>
            {{-- new row --}}
            <div class="w-full row align-center g-10px space-between">
              <div class="row align-center g-10px">
                   <strong x-show="!HideBalance" class="font-size-1-3 font-weight-900">
            {{ $total_balance }}
        </strong>
<strong x-show="HideBalance" class="font-size-1 font-weight-900">****</strong>
<i class="opacity-07 pc-pointer" x-on:click="HideBalance = !HideBalance">
<svg x-show="!HideBalance" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"></path></svg>
<svg x-show="HideBalance" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M9.34268 18.7819L7.41083 18.2642L8.1983 15.3254C7.00919 14.8874 5.91661 14.2498 4.96116 13.4534L2.80783 15.6067L1.39362 14.1925L3.54695 12.0392C2.35581 10.6103 1.52014 8.87466 1.17578 6.96818L3.14386 6.61035C3.90289 10.8126 7.57931 14.0001 12.0002 14.0001C16.4211 14.0001 20.0976 10.8126 20.8566 6.61035L22.8247 6.96818C22.4803 8.87466 21.6446 10.6103 20.4535 12.0392L22.6068 14.1925L21.1926 15.6067L19.0393 13.4534C18.0838 14.2498 16.9912 14.8874 15.8021 15.3254L16.5896 18.2642L14.6578 18.7819L13.87 15.8418C13.2623 15.9459 12.6376 16.0001 12.0002 16.0001C11.3629 16.0001 10.7381 15.9459 10.1305 15.8418L9.34268 18.7819Z"></path></svg>

            </i>
              </div>
              {{-- btn --}}
            <button x-on:click="Vitecss.navigate('{{ url('users/recharge') }}')" class="action-button">
                  RECHARGE
            </button>
            </div>
            {{-- new row --}}
            <div class="w-full p-20px column g-5px br-top-right-10px br-top-left-10px bg-secondary secondary-text">
                {{-- new row --}}
                 {{-- new row --}}
            <div class="row w-full align-center space-between g-10px">
                <span class="opacity-07 font-size-07 font-weight-800 uppercase text-shadow">Deposit</span>
<strong x-show="!HideBalance" class="font-weight-900">{{ $deposit_balance }}</strong>
<strong x-show="HideBalance" class="font-weight-900">****</strong>
            </div>
             {{-- new row --}}
            <div class="row w-full align-center space-between g-10px">
                <span class="opacity-07 font-size-07 font-weight-800 uppercase text-shadow">Withdrawal</span>
<strong x-show="!HideBalance" class="font-weight-900">{{ $main_balance }}</strong>
<strong x-show="HideBalance" class="font-weight-900">****</strong>
            </div>
            </div>
        </div>


        {{-- quick links --}}
        <div x-data="{  }" class="w-full bg-light p-15px br-10px row align-center g-10px">
          {{-- new column --}}
          <div x-on:click="Vitecss.navigate('{{ url('users/recharge') }}')" class="column g-5px w-full align-center pc-pointer">
               <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:white;" class="column box-shadow w-50px perfect-square br-10px bg-rgt-005 align-center justify-center">
<svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.4105 9.86058C20.3559 9.8571 20.2964 9.85712 20.2348 9.85715L20.2194 9.85715H17.8015C15.8086 9.85715 14.1033 11.4382 14.1033 13.5C14.1033 15.5618 15.8086 17.1429 17.8015 17.1429H20.2194L20.2348 17.1429C20.2964 17.1429 20.3559 17.1429 20.4105 17.1394C21.22 17.0879 21.9359 16.4495 21.9961 15.5577C22.0001 15.4992 22 15.4362 22 15.3778L22 15.3619V11.6381L22 11.6222C22 11.5638 22.0001 11.5008 21.9961 11.4423C21.9359 10.5506 21.22 9.91209 20.4105 9.86058ZM17.5872 14.4714C18.1002 14.4714 18.5162 14.0365 18.5162 13.5C18.5162 12.9635 18.1002 12.5286 17.5872 12.5286C17.0741 12.5286 16.6581 12.9635 16.6581 13.5C16.6581 14.0365 17.0741 14.4714 17.5872 14.4714Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.2341 18.6C20.3778 18.5963 20.4866 18.7304 20.4476 18.8699C20.2541 19.562 19.947 20.1518 19.4542 20.6485C18.7329 21.3755 17.8183 21.6981 16.6882 21.8512C15.5902 22 14.1872 22 12.4158 22H10.3794C8.60803 22 7.20501 22 6.10697 21.8512C4.97692 21.6981 4.06227 21.3755 3.34096 20.6485C2.61964 19.9215 2.29953 18.9997 2.1476 17.8608C1.99997 16.7541 1.99999 15.3401 2 13.5548V13.4452C1.99998 11.6599 1.99997 10.2459 2.1476 9.13924C2.29953 8.00031 2.61964 7.07848 3.34096 6.35149C4.06227 5.62451 4.97692 5.30188 6.10697 5.14876C7.205 4.99997 8.60802 4.99999 10.3794 5L12.4158 5C14.1872 4.99998 15.5902 4.99997 16.6882 5.14876C17.8183 5.30188 18.7329 5.62451 19.4542 6.35149C19.947 6.84817 20.2541 7.43804 20.4476 8.13012C20.4866 8.26959 20.3778 8.40376 20.2341 8.4L17.8015 8.40001C15.0673 8.40001 12.6575 10.5769 12.6575 13.5C12.6575 16.4231 15.0673 18.6 17.8015 18.6L20.2341 18.6ZM5.61446 8.88572C5.21522 8.88572 4.89157 9.21191 4.89157 9.61429C4.89157 10.0167 5.21522 10.3429 5.61446 10.3429H9.46988C9.86912 10.3429 10.1928 10.0167 10.1928 9.61429C10.1928 9.21191 9.86912 8.88572 9.46988 8.88572H5.61446Z" fill="CurrentColor" "=""></path>
<path d="M7.77668 4.02439L9.73549 2.58126C10.7874 1.80625 12.2126 1.80625 13.2645 2.58126L15.2336 4.03197C14.4103 3.99995 13.4909 3.99998 12.4829 4H10.3123C9.39123 3.99998 8.5441 3.99996 7.77668 4.02439Z" fill="CurrentColor" "=""></path>
</svg>

</div>
            <span class="font-weight-700 font-size-07">Recharge</span>
          </div>
           {{-- new column --}}
          <div x-on:click="Vitecss.navigate('{{ url('users/withdraw') }}')" class="column g-5px w-full align-center pc-pointer">
             <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:white;" class="column box-shadow w-50px perfect-square br-10px bg-rgt-005 align-center justify-center">
<svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M14 4H10C6.22876 4 4.34315 4 3.17157 5.17157C2.32803 6.01511 2.09185 7.22882 2.02572 9.25H21.9743C21.9082 7.22882 21.672 6.01511 20.8284 5.17157C19.6569 4 17.7712 4 14 4Z" fill="CurrentColor" "=""></path>
<path d="M10 20H14C17.7712 20 19.6569 20 20.8284 18.8284C22 17.6569 22 15.7712 22 12C22 11.5581 22 11.142 21.9981 10.75H2.00189C2 11.142 2 11.5581 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20Z" fill="CurrentColor" "=""></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 16C5.25 15.5858 5.58579 15.25 6 15.25H10C10.4142 15.25 10.75 15.5858 10.75 16C10.75 16.4142 10.4142 16.75 10 16.75H6C5.58579 16.75 5.25 16.4142 5.25 16Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.75 16C11.75 15.5858 12.0858 15.25 12.5 15.25H14C14.4142 15.25 14.75 15.5858 14.75 16C14.75 16.4142 14.4142 16.75 14 16.75H12.5C12.0858 16.75 11.75 16.4142 11.75 16Z" fill="CurrentColor"></path>
</svg>

            </div>
            <span class="font-weight-700 font-size-07">Withdraw</span>
          </div>
           {{-- new column --}}
          <div x-on:click="Vitecss.navigate('{{ url('users/gift/code') }}')" class="column g-5px w-full align-center pc-pointer">
             <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:white;" class="column box-shadow w-50px perfect-square br-10px bg-rgt-005 align-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48"><title>gift</title><g fill="CurrentColor"> <path fill-rule="evenodd" clip-rule="evenodd" d="M24.0001 8.57621C23.7602 8.1237 23.4869 7.6524 23.1778 7.17943C21.5919 4.75267 18.8623 2 14.6667 2C11.3126 2 8.5 4.63512 8.5 8C8.5 11.3649 11.3126 14 14.6667 14H33.3335C36.6876 14 39.5002 11.3649 39.5002 8C39.5002 4.63512 36.6876 2 33.3335 2C29.1379 2 26.4083 4.75267 24.8224 7.17943C24.5133 7.6524 24.2399 8.1237 24.0001 8.57621ZM11.5 8C11.5 6.39388 12.8657 5 14.6667 5C17.3746 5 19.3116 6.74733 20.6665 8.82057C21.1603 9.57623 21.5502 10.3381 21.8453 11H14.6667C12.8657 11 11.5 9.60612 11.5 8ZM33.3335 11H26.1548C26.45 10.3381 26.8398 9.57623 27.3337 8.82058C28.6885 6.74733 30.6255 5 33.3335 5C35.1345 5 36.5002 6.39388 36.5002 8C36.5002 9.60612 35.1345 11 33.3335 11Z" fill="CurrentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M27 24H42V38C42 41.3137 39.3137 44 36 44H27V24Z" fill="CurrentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M21 24H6V38C6 41.3137 8.68629 44 12 44H21V24Z" fill="CurrentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 11H46V21H2V11Z" fill="CurrentColor"></path> </g></svg>

            </div>
            <span class="font-weight-700 font-size-07">Gift Code</span>
          </div>
          {{-- new column --}}
          <div x-on:click="Vitecss.navigate('{{ url('users/referrals') }}')" class="column g-5px w-full align-center pc-pointer">
             <div style="background:linear-gradient(to bottom right,var(--primary),var(--primary-light));color:white;" class="column box-shadow w-50px perfect-square br-10px bg-rgt-005 align-center justify-center">
<svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5 7.5C15.5 9.433 13.933 11 12 11C10.067 11 8.5 9.433 8.5 7.5C8.5 5.567 10.067 4 12 4C13.933 4 15.5 5.567 15.5 7.5Z" fill="CurrentColor" "=""></path>
<path d="M18 16.5C18 18.433 15.3137 20 12 20C8.68629 20 6 18.433 6 16.5C6 14.567 8.68629 13 12 13C15.3137 13 18 14.567 18 16.5Z" fill="CurrentColor" "=""></path>
<path d="M7.12205 5C7.29951 5 7.47276 5.01741 7.64005 5.05056C7.23249 5.77446 7 6.61008 7 7.5C7 8.36825 7.22131 9.18482 7.61059 9.89636C7.45245 9.92583 7.28912 9.94126 7.12205 9.94126C5.70763 9.94126 4.56102 8.83512 4.56102 7.47063C4.56102 6.10614 5.70763 5 7.12205 5Z" fill="CurrentColor" "=""></path>
<path d="M5.44734 18.986C4.87942 18.3071 4.5 17.474 4.5 16.5C4.5 15.5558 4.85657 14.744 5.39578 14.0767C3.4911 14.2245 2 15.2662 2 16.5294C2 17.8044 3.5173 18.8538 5.44734 18.986Z" fill="CurrentColor" "=""></path>
<path d="M16.9999 7.5C16.9999 8.36825 16.7786 9.18482 16.3893 9.89636C16.5475 9.92583 16.7108 9.94126 16.8779 9.94126C18.2923 9.94126 19.4389 8.83512 19.4389 7.47063C19.4389 6.10614 18.2923 5 16.8779 5C16.7004 5 16.5272 5.01741 16.3599 5.05056C16.7674 5.77446 16.9999 6.61008 16.9999 7.5Z" fill="CurrentColor" "=""></path>
<path d="M18.5526 18.986C20.4826 18.8538 21.9999 17.8044 21.9999 16.5294C21.9999 15.2662 20.5088 14.2245 18.6041 14.0767C19.1433 14.744 19.4999 15.5558 19.4999 16.5C19.4999 17.474 19.1205 18.3071 18.5526 18.986Z" fill="CurrentColor" "=""></path>
</svg>


            </div>
            <span class="font-weight-700 font-size-07">Team</span>
          </div>
            
        </div>
      

        {{-- group --}}
        <section class="w-full column g-10">
     
     
       {{-- packages loop --}}
        @if ($packages->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'data' => $packages
            ])
        @else
        
            <div class="row align-center g-10px space-between">
            <strong class="font-size-1 font-weight-900 m-top-10">Available Products</strong>
                <span x-on:click="Vitecss.navigate('{{ url('users/products/active') }}')" class="font-weight-800 c-primary-light no-select pc-pointer row align-center font-size-07">
                    My products
                    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                </span>
            </div>
        <div class="grid pc-grid-2 g-20 w-full">
         @foreach ($packages as $data)
          <div style="overflow-x: hidden" class="w-full h-fit column bg-light box-shadow br-5 p-15px g-10">
            {{-- new row --}}
            <div class="row w-full h-auto g-10">
                <div class="h-full br-5px w-100px bg-primary-01">
                    <img src="{{ asset('packages/'.$data->photo.'') }}" alt="" class="w-full no-pointer no-select max-h-full br-inherit h-full">
                </div>
                {{-- new --}}
                <div class="column flex-auto overflow-hidden g-10px">
                    <div class="row align-center g-10 space-between w-full">
                    <strong class="font-weight-800 uppercase">{{ $data->name }}</strong>
                    <div class="p-5 p-x-10px bg-primary-light primary-text font-size-05 br-5 no-select font-weight-900">{{ number_format($data->validity) }} days</div>
                    </div>
                    {{-- new row --}}
                    <div class="row w-full align-center g-10px space-between">
                        <span class="opacity-08">Investment</span>
                        <strong class="font-weight-900 w-fit text-overflow-ellipsis c-primary-dark font-size-1">{{ $CurrencyHelper::format($data->cost,'NGN',Auth::guard('users')->user()->display_currency) }}</strong>
                    </div>
                    {{-- new row --}}

                    <div class="row w-full g-10px">
                        <div style="width:clamp(30%,100%,50%);" class="column w-full bg-rgt-005 br-5px p-10px g-2px align-center">
                            <small class="opacity-07">Daily Income</small>
                            <strong class="font-weight-900 break-word font-size-07 ws-nowrap">{{ $CurrencyHelper::format($data->earning,'NGN',Auth::guard('users')->user()->display_currency) }}</strong>
                        </div>
                          <div style="width:clamp(30%,100%,50%);" class="column w-full bg-rgt-005 br-5px p-10px g-2px align-center">
                            <small class="opacity-07">Total Income</small>
                            <strong class="font-weight-900 font-size-07 break-word ws-nowrap">{{ $CurrencyHelper::format($data->earning * $data->validity,'NGN',Auth::guard('users')->user()->display_currency) }}</strong>
                        </div>
                    </div>
                    <div x-on:click="
                    Overlay = true;
                    Package.ID = '{{ $data->id }}';
                    Package.Name='{{ $data->name }}';
                    Package.Cost='{{ $CurrencyHelper::format($data->cost,'NGN',Auth::guard('users')->user()->display_currency) }}';
                    Package.DailyIncome='{{ $CurrencyHelper::format($data->earning,'NGN',Auth::guard('users')->user()->display_currency) }}';
                    Package.Cycle='{{ number_format($data->validity) }} Days';
                    Package.TotalIncome='{{ $CurrencyHelper::format($data->earning*$data->validity,'NGN',Auth::guard('users')->user()->display_currency) }}';
                    " class="p-5 p-x-10px secondary-text row align-center justify-center br-5px bg-secondary no-select pointer">Invest</div>
                </div>
            </div>
           
          </div>
        @endforeach
       </div>


        @endif

        </section>
       </section>
     
        
       
       

        {{-- overlay --}}
<section x-on:click="Overlay=false;" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-show="Overlay" class="pos-fixed transition-all column align-center inset-0 bg-black-transparent z-index-4000 backdrop-blur-10px">
{{-- child --}}
<div x-show="Overlay" x-transition:enter-start="bottom-enter" x-transition:enter-end="bottom-enter-end" x-transition:leave-start="bottom-leave" x-transition:leave-end="bottom-leave-end" x-on:click.stop="" style="max-height:95%" class="child transition-all m-top-auto bg-light w-full max-w-500px br-top-left-15px br-top-right-15px column p-20px g-10px">
{{-- new row --}}
<div class="row align-center space-between w-full pos-sticky top-0">
    <strong class="font-weight-900 font-size-1-3rem">Confirm Investment</strong>
    <div x-on:click="Overlay=false;" class="h-30px w-30px perfect-square no-shrink circle bg-rgt-01 column align-center justify-center">
        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z"></path></svg>

    </div>
</div>
{{-- main --}}
<div class="w-full m-top-30px column g-10px">
    {{-- new row --}}
    <div class="row w-full font-weight-700 align-center space-between">
        <span class="opacity-07">Package Name</span>
        <span x-html="Package.Name" class="uppercase"></span>
    </div>
    {{-- new row --}}
    <div class="row w-full font-weight-700 align-center space-between">
        <span class="opacity-07">Package Cost</span>
        <span x-html="Package.Cost" class="uppercase"></span>
    </div>
      {{-- new row --}}
    <div class="row w-full font-weight-700 align-center space-between">
        <span class="opacity-07">Daily Income</span>
        <span x-html="Package.DailyIncome" class="uppercase"></span>
    </div>
      {{-- new row --}}
    <div class="row w-full font-weight-700 align-center space-between">
        <span class="opacity-07">Total Income</span>
        <span x-html="Package.TotalIncome" class="uppercase"></span>
    </div>
      {{-- new row --}}
    <div class="row w-full font-weight-700 align-center space-between">
        <span class="opacity-07">Cycle</span>
        <span x-html="Package.Cycle" class="uppercase"></span>
    </div>
    
      <div class="w-full row align-center space-between g-10px bg-primary-light primary-text p-10px br-5px">
        <span class="opacity-07">Available Balance</span>
        <strong class="font-size-1 font-weight-900">{{ $deposit_balance }}</strong>
    </div>
    <div class="hr" vitecss-type="dashed"></div>
    <button x-data="{ 
        Submitting : false
     }" x-on:click="
     Submitting = true;
     $el.classList.add('disabled');
     SendPostRequest('{{ url('users/post/purchase/package/process') }}',{
        'id' : Package.ID,
        '_token' : '{{ @csrf_token() }}'
     },function(response,error){
        let data=JSON.parse(response);
        CreateNotify(data.status,data.message);
        Submitting = false;
        $el.classList.remove('disabled');
      if(data.status == 'success'){
        Overlay = false;
        Vitecss.navigate('{{ url('users/products/active') }}')
      }

     })
     " class="w-full bg-secondary secondary-text border-none box-shadow font-weight-900 p-15px br-1000px">
      <span x-show="!Submitting">INVEST NOW</span>
       <span x-show="Submitting">INVESTING...</span>
    </button>
</div>
</div>
</section>
    </section>


@endsection
