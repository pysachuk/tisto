@section('title')
    TISTO - Telegram сповіщення
@endsection
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button wire:click="showCreateModal" class="btn btn-success">Створити</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Ім'я чату</th>
                                    <th>ID чату (користувача)</th>
                                    <th>Сповіщати про замовлення</th>
                                    <th>Локації</th>
                                    <th>Управління</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($chats as $chat)
                                    <tr>
                                        <td>{{ $chat->name }}</td>
                                        <td>{{ $chat->chat_id }}</td>
                                        <td>
                                            @if($chat->order_notifications)
                                                <span class="badge badge-success"><i class="fas fa-bell"></i></i> Сповіщати</span>
                                            @else
                                                <span class="badge badge-danger"><i class="fas fa-bell-slash"></i></i> Не сповіщати</span>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($chat->locations as $location)
                                                <span class="badge badge-success">{{ $location->city }}</span>
                                                <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <button wire:click="editChat({{ $chat }})"  class="btn btn-info btn-sm mr-0 ml-0 border-0">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <button wire:click="removeChat({{ $chat }})"  class="btn btn-danger btn-sm mr-0 ml-0 border-0">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Немає чатів. Ви можете додати</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 mb-5">
            {{ $chats->links() }}
        </div>
    </div>

{{--    CREATE MODAL START--}}
    <div class="modal" @if ($showCreateModal) style="display:block" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form >
                    <div class="modal-header">
                        <h5 class="modal-title">Створення чату</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeCreateModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Ім'я чату:
                        <br/>
                        <input type="text" wire:model="newChat.name" class="form-control"/>
                        @error('newChat.name')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br/>
                        ID чату (користувача):
                        <br/>
                        <input type="text" wire:model="newChat.chat_id" class="form-control"/>
                        @error('newChat.chat_id')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br/>
                        <div class="form-group">
                            <h4>Сповіщення</h4>
                            <div class="form-check">
                                <input wire:model="newChat.order_notifications" class="form-check-input" type="checkbox" id="order-notifications-2">
                                <label class="form-check-label" for="order-notifications-2">
                                    Сповіщати про замовлення
                                </label>
                                @error('newChat.order_notifications')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <h4>Локації</h4>
                            @foreach($locations as $location)
                                <div class="form-check">
                                    <input wire:model="newChatLocations.{{ $location->key }}" class="form-check-input" type="checkbox" id="location-2-{{ $location->key }}">
                                    <label class="form-check-label" for="location-2-{{ $location->key }}">
                                        {{ $location->city }}
                                    </label>
                                    @error('newChatLocations')
                                    <div style="font-size: 11px; color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

{{--                        Сповіщати про замовлення:--}}
{{--                        <br/>--}}
{{--                        <input type="checkbox" wire:model="newChat.order_notifications" class="form-control"/>--}}
{{--                        @error('newChat.order_notifications')--}}
{{--                        <div style="font-size: 11px; color: red">{{ $message }}</div>--}}
{{--                        @enderror--}}
{{--                        <br/>--}}
{{--                        Локації:--}}
{{--                        <br/>--}}
{{--                        @foreach($locations as $location)--}}
{{--                            <h4>{{ $location->city }}</h4>--}}
{{--                            <input type="checkbox" wire:model="newChatLocations.{{ $location->key }}" class="form-control"/>--}}
{{--                            @error('newChat.locations')--}}
{{--                            <div style="font-size: 11px; color: red">{{ $message }}</div>--}}
{{--                            @enderror--}}
{{--                        @endforeach--}}

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="saveNewChat">Зберегти</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeCreateModal" data-dismiss="modal">Закрити
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    CREATE MODAL END--}}
{{--    EDIT MODAL START--}}
    <div class="modal" @if ($showEditModal) style="display:block" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form >
                    <div class="modal-header">
                        <h5 class="modal-title">Редагування чату</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeEditModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Ім'я чату:
                        <br/>
                        <input type="text" wire:model="editChat.name" class="form-control"/>
                        @error('editChat.name')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br/>
                        ID чату (користувача)
                        <br/>
                        <input type="text" wire:model="editChat.chat_id" class="form-control"/>
                        @error('editChat.chat_id')
                        <div style="font-size: 11px; color: red">{{ $message }}</div>
                        @enderror
                        <br/>
                        <div class="form-group">
                            <h4>Сповіщення</h4>
                            <div class="form-check">
                                <input wire:model="editChat.order_notifications" class="form-check-input" type="checkbox" id="order-notifications">
                                <label class="form-check-label" for="order-notifications">
                                    Сповіщати про замовлення
                                </label>
                                @error('editChat.order_notifications')
                                <div style="font-size: 11px; color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <h4>Локації</h4>
                            @foreach($locations as $location)
                                <div class="form-check">
                                    <input wire:model="editChatLocations.{{ $location->key }}" class="form-check-input" type="checkbox" id="location-{{ $location->key }}">
                                    <label class="form-check-label" for="location-{{ $location->key }}">
                                        {{ $location->city }}
                                    </label>
                                    @error('editChat.order_notifications')
                                    <div style="font-size: 11px; color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" wire:click="saveEditChat">Зберегти</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeEditModal" data-dismiss="modal">Закрити
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{--    EDIT MODAL END--}}
</div>
