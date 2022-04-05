<div>
    @section('title', 'TISTO - Редагування товару')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Редагування товару</h3>
                    </div>
                    <!-- /.card-header -->
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Категорія</label>
                            <select wire:model="category_id" name="category_id" class="form-control">
                                @forelse($categories as $category)
                                    <option value="{{ $category -> id }}">{{ $category -> title }}</option>
                                @empty
                                    <option value="0" active >Немає категорій</option>
                                @endforelse
                            </select>
                            @error('category_id"') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="productTitle">Назва товару</label>
                            <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror " id="productTitle" placeholder="Введіть назву товару">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>Опис товару</label>
                            <textarea wire:model="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="Опис..."></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Ціна</label>
                            <input wire:model="price" type="text" class="form-control  @error('price') is-invalid @enderror" id="title" placeholder="Ціна">
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Вага</label>
                            <input wire:model="weight" name="weight" type="text" class="form-control @error('weight') is-invalid @enderror" id="title" placeholder="Вага">
                            @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo_input">Зображення</label>
                            <div class="custom-file">
                                <input wire:model="newImage" type="file" class="custom-file-input @error('newImage') is-invalid @enderror" id="photo_input" required>
                                <label class="custom-file-label" for="photo_input">Виберіть зображення...</label>
                                @error('newImage')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            @if(! $newImage)
                                <img width="250" src="/storage/{{ $image }}">
                            @else
                                <img width="250" src="{{ $newImage->temporaryUrl() }}">
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button wire:click="save" type="button" class="btn btn-primary">Оновити</button>
                    </div>
                    {{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
</div>
