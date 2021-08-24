<div class="w-full">
    <x-validation></x-validation>

    <x-user-name :user="$user"/>

    <h1 class="text-md text-700 mt-6">Change Role @if($user->roles->first() ) from {{ $user->roles->first()->name }} to @endif</h1>

    @if(auth()->user()->hasRole('super-admin') && auth()->user()->id !== $user->id)
    <form wire:submit.prevent="changeRole">
        <div class="w-1/3 mt-6">
            <x-label for="name" :value="__('Select New Role')"/>
            <x-select  wire:model="selectedRole" id="name" class="block mt-1 w-full" type="text"  :options="$options"/>

            <x-button  class="mt-3">
                {{ __('Change Role') }}
            </x-button>
        </div>
    </form>
    @else
        <p class="text-sm text-red-600 mt-6">You cannot change your role, if you are a superadmin. You can only be demoted by other super-admin user.</p>
    @endif
</div>
