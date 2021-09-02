<div class="mr-3">
    <x-jet-dropdown id="settingsDropdown">
        <x-slot name="trigger">
            {{-- Notificaciones
             <span class="badge badge-warning">4</span --}}
            <button type="button" class="btn btn-light" wire:click="markAsRead">
                Notificaciones
                @if ($count > 0)
                    <span class="badge badge-danger">
                        {{ $count }}
                    </span>
                @endif
            </button>
        </x-slot>

        <x-slot name="content">
            <!-- Account Management -->
            <h6 class="dropdown-header small text-muted">
                {{ __('Manage Account') }}
            </h6>

            {{-- x-jet-dropdown-link --}}
            @foreach ($notifications as $notification)
                <hr class="dropdown-divider">

                <a href="{{ $notification->data['url'] }}" style="cursor: pointer;text-decoration: none;"
                    class="text-dark w-100">
                    {{ $notification->data['message'] }}
                    <br>
                    <span class="text-sm font-weight-bold">{{ $notification->created_at->diffForHumans() }}</span>


                </a>


            @endforeach







            <hr class="dropdown-divider">


        </x-slot>
    </x-jet-dropdown>
</div>
