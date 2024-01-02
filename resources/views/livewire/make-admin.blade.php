<div>
    @if (!session('random'))
    @php
        $this->redirect('/adminlogin', navigate: true);
    @endphp
    @else
        <div class="makeadminmsg" wire:poll.10s="updatemakeadminmsg">
            {{ $makeadminmsg }}
        </div>
        <div class="make-user-admin-container">
            <form wire:submit.prevent="updateadmin">
                <label for="user">Users:</label>
                <select name="user" id="user" wire:model="userid">
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <button>Make Admin</button>
            </form>
        </div>
    @endif
</div>
