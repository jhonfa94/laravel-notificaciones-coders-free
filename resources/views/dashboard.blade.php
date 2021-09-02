<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <x-jet-welcome /> --}}
    <div class="container">
        <div class="row">
            <div class="col card">
                @if (session()->has('saveMessage'))
                    <div class="alert alert-success mt-4" role="alert">
                        {{ session('saveMessage') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row card">
            {{-- {{Auth::user()->id}} --}}
            {{-- {{dd(Auth::user()->id)}} --}}
            {{-- {{auth()->user()->id}} --}}
            <div class="col">
                <form action="{{ route('messages.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="subject">Asunto</label>
                        <input id="subject" class="form-control" type="text" name="subject"
                            value="{{ old('subject') }}" required>
                    </div>
                    @error('subject')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group">
                        <label for="body">Descripción</label>
                        <textarea id="body" class="form-control" name="body" rows="2"
                            required>{{ old('body') }}</textarea>
                    </div>
                    @error('body')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="form-group">
                        <label for="destinatario">Destinatario</label>
                        <select id="destinatario" class="form-control" name="to_user_id">
                            <option disabled {{ old('to_user_id') ? '' : 'selected' }}>Seleccione un usuario</option>
                            @foreach ($users as $user)
                                <option {{ old('to_user_id') == $user->id ? 'selected' : '' }}
                                    value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('to_user_id')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-primary mb-3">
                        Enviar
                    </button>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
