@props(['title'=>'', 'bodyClass'=>''])
<x-base-layout :$title :$bodyClass>
    <main>
    <div class="container-small page-login">
        <div class="flex" style="gap: 5rem">
          <div class="auth-page-form">
            <div class="text-center">
              <a href="/">
                <img src="/img/logoipsum-265.svg" alt="" />
              </a>
            </div>
            {{$slot}}
            <div class="grid grid-cols-2 gap-1 social-auth-buttons">
                <button class="btn btn-default flex justify-center items-center gap-1">
                    <img src="/img/google.png" alt="" style="width: 20px" />
                    Google
                </button>
                <button class="btn btn-default flex justify-center items-center gap-1">
                    <img src="/img/facebook.png" alt="" style="width: 20px" />
                    Facebook
                </button>
            </div>
            <div class="login-text-dont-have-account">
                {{$footerLink}}
            </div>
          </div>
          <div class="auth-page-image">
            <img src="/img/car-png-39071.png" alt="" class="img-responsive" />
          </div>
        </div>
    </div>
  </main>


</x-base-layout>