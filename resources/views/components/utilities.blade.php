{{-- meta tags --}}
@isset($meta_tags)
     <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="apple-mobile-web-app-title" content="ProfitPort" />
<meta name="format-detection" content="telephone=no">

@endisset
{{-- favicon tags --}}
@isset($favicon)
<link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}" />
<link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />
<meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}" />
<link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />
@endisset

{{-- vite css --}}
@isset($vite_css)
    <link rel="stylesheet" href="{{ asset('vitecss/css/app.min.css?v='.config('versions.vite_version').'') }}">
  
@endisset

{{-- vite js --}}
@isset($vite_js)
          <script src="{{ asset('vitecss/js/app.min.js?v='.config('versions.vite_version').'') }}"></script>
@endisset

{{-- action loader --}}
@isset($action_loader)
    <div style="z-index:20000" class="pos-fixed action-loader display-none column justify-center align-center top-0 bottom-0 left-0 right-0 gbg-black-transparent">
        <div style="background: rgba(0,0,0,0.7)" class="p-20 w-fit align-center justify-center perfect-square c-white column g-10 br-primary">
           <svg height="50" width="50" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2,12A10.94,10.94,0,0,1,5,4.65c-.21-.19-.42-.36-.62-.55h0A11,11,0,0,0,12,23c.34,0,.67,0,1-.05C6,23,2,17.74,2,12Z"><animateTransform attributeName="transform" type="rotate" dur="0.6s" values="0 12 12;360 12 12" repeatCount="indefinite"/></path></svg>

            <span class="font-1">Loading....</span>
        </div>
    </div>
@endisset

{{-- null/empty --}}
@isset($empty)
 <div style="margin-top:30px;margin-bottom:30px;" class="column opacity-05 no-select g-10 w-full grid-full align-center text-center justify-center">
                <span>
             @isset($icon)
             {!! $icon !!}
                 @else
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="50" width="50"><path d="M200,32H163.74a47.92,47.92,0,0,0-71.48,0H56A16,16,0,0,0,40,48V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V48A16,16,0,0,0,200,32Zm-72,0a32,32,0,0,1,32,32H96A32,32,0,0,1,128,32Zm32,128H96a8,8,0,0,1,0-16h64a8,8,0,0,1,0,16Zm0-32H96a8,8,0,0,1,0-16h64a8,8,0,0,1,0,16Z"></path></svg>

             @endisset
                </span>
                <span>{{ $text ?? 'No Record Found' }}</span>
            </div>
@endisset
{{-- paginate --}}
 @isset($paginate)
     <div class="paginate">
           <div class="row align-center g-10 m-left-auto w-fit">
             <div onclick="spa('{{ url()->current().'?'.http_build_query(array_merge(request()->query(),['page' => $data->currentPage() - 1])) }}')" class="action-btn {{ $data->currentPage() <= 1 ? 'disabled' : '' }} previous">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M168.49,199.51a12,12,0,0,1-17,17l-80-80a12,12,0,0,1,0-17l80-80a12,12,0,0,1,17,17L97,128Z"></path></svg>

            </div>
             <div class="action-btn disabled current">
               <span>{{ $data->currentPage() }}</span>  
            </div>
            
             <div onclick="spa('{{ url()->current().'?'.http_build_query(array_merge(request()->query(),['page' => $data->currentPage() + 1])) }}')" class="action-btn {{ $data->currentPage() >= $data->lastPage() ? 'disabled' : '' }} next">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

            </div>
           </div>
        </div>
 @endisset
 {{-- general codes --}}
 @isset($general_codes)
     {{-- loading state --}}
     <div class="loading-state">
        <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><rect x="1" y="4" width="6" height="14" opacity="1"><animate id="spinner_rQ7m" begin="0;spinner_2dMV.end-0.25s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></rect><rect x="9" y="4" width="6" height="14" opacity=".4"><animate begin="spinner_rQ7m.begin+0.15s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></rect><rect x="17" y="4" width="6" height="14" opacity=".3"><animate id="spinner_2dMV" begin="spinner_rQ7m.begin+0.3s" attributeName="opacity" dur="0.75s" values="1;.2" fill="freeze"/></rect></svg>
     </div>
 @endisset