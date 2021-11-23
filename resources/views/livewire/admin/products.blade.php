<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.products.create') }}" class="btn btn-success">Створити</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Категорія</label>
                            <input type="hidden" wire:model="selectedCategoryId" value="" class="selectedCategoryId">
                            <select wire:model="selectedCategoryId" name="category" class="form-control select_category">
                                @forelse($categories as $category)
                                    <option value="{{ $category -> id }}">{{ $category -> title }}</option>
                                @empty
                                    <option>Створіть категорію</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 products">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Назва</th>
                                <th>Опис</th>
                                <th>Ціна</th>
                                <th>Вага</th>
                                <th>Фото</th>
                                <th class="text-right">Правка</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product -> id }}</td>
                                    <td>{{ $product -> title }}</td>
                                    <td>{{ $product -> description }}</td>
                                    <td>{{ $product -> price }}</td>
                                    <td>{{ $product -> weight }}</td>
                                    <td><img src="/storage/{{ $product -> image -> image ?? '' }}" style="width: 100px"></td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <button wire:click="removeProduct({{ $product }})" class="btn btn-danger delete" type="button"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </td>
                                    @empty
                                        <h2>Товарів немає</h2>
                                    @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>
{{--                        <div class="card-footer clearfix">--}}
{{--                            {{ $products->links() }}--}}
{{--                        </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script>
        $('.select_category').on('change', function (){
            Livewire.emit('categorySelected', $('.select_category').val());
        })
    </script>
@endsection
