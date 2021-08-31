<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="card-body">
    <form method="POST" action="{{ route('admin.pages.info.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="/storage/{{ $data -> image }}" style="max-width: 100%">
                        <div class="custom-file" style="margin-top: 20px">
                            <input name="image" value="" type="file" class="custom-file-input" id="photo_input">
                            <label class="custom-file-label" for="photo_input">Нове зображення...</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Текст</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                                    <textarea name="text" id="summernote" class="form-control" rows="3" placeholder="Enter ...">
                                        {{ $data -> text }}
                                    </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="page" value="contacts">
                        <button type="submit" class="btn btn-primary">Зберегти</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
