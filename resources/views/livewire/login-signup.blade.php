<div class="flex items-center justify-center">
    <div class="lg:w-1/3 sm:w-full md:w-1/2 border-2 p-9 rounded-lg">
        <div class="mb-5 flex justify-center items-center">
            <a href="#" class="border-2 text-gray-700 text-decoration-none px-8  py-2 mr-3 transition  @if($signIn) border-blue-500 text-blue-500 font-bold @endif " wire:click="toggle(true)">Sign in</a>
            <a href="#" class="border-2 text-gray-700 text-decoration-none px-8  py-2  transition @if(!$signIn) border-blue-500 text-blue-500 font-bold @endif " wire:click="toggle(false)">Sign up</a>
        </div>
        <h3 class="text-lg text-blue-600 font-bold text-center mb-4">@if($signIn) Sign in @else Sign up @endif to your account</h3>

        <div class="w-full flex justify-center items-center">
            @if($signIn)
                <a href="{{ route('google-auth') }}" class="cursor-pointer py-3 px-6 w-auto rounded shadow-md border-2 border-gray-50 flex justify-center w-10/12 sm:w-full flex justify-center items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2"  viewBox="0 0 48 48" width="48px" height="48px"><path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                    Sign in with Google
                </a>
            @else
                <a href="{{ route('google-auth') }}" class="cursor-pointer py-3 px-6 w-auto rounded shadow-md border-2 border-gray-50 flex justify-center w-10/12 flex justify-center items-center text-center md:w-full sm:w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2" viewBox="0 0 48 48" width="48px" height="48px"><path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                    Sign up with Google
                </a>
            @endif
        </div>


        <div class="w-full flex items-center justify-center">
            <img src="{{  asset('images/Krenovtae-logo.svg') }}" class="w-24 h-auto" alt="Company Logo" style="margin-top: 30px">
        </div>
    </div>
</div>
