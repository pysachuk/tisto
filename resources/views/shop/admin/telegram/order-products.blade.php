@foreach($products as $orderProduct)
{{ $orderProduct->product->title }}
Ціна: {{ $orderProduct->price }} грн
Кількість: {{ $orderProduct->count }}
Сума: {{ round($orderProduct->price * $orderProduct->count, 2) }} грн
______________________________________
@endforeach
