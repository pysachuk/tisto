<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Статус оплати замовлення # {{ $data['order_id'] }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if($data['status'])
                <h4>Статус: {{ ($data['status'] == 'success') ? 'Оплата успішна' : 'Помилка оплати!' }}</h4>
                @foreach($data['payment_details'] as $key => $value)
                    <p>{{$key}} : {{ $value }}</p>
                @endforeach
            @else
                <h4>Статус: Оплата не знайдена!</h4>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        </div>
    </div>
</div>
