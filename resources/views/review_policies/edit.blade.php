@extends('adminlte::page')
@section('title', 'Edit Review Policy')
@section('content_header')
    <h1>Edit Review Policy</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('shipping-policies.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5" required>{{ $item->description }}</textarea>
                            </div>
                             <!-- Preview of description -->
                        <div class="col-md-12">
                            <h4>{{ __('Preview') }}</h4>
                            <div id="descriptionPreview" class="border p-3"></div>
                        </div>
                            <button type="submit" class="btn btn-primary">Update Policy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
  
   $(document).ready(function() {
    const description = $('#description');
    
    description.summernote({
        height: 200,
        placeholder: 'Enter product description',
        callbacks: {
            onChange: function(contents, $editable) {
                $('#descriptionPreview').html(contents);
            }
        }
    });

    // Trigger preview if editing existing description
    const initialContent = description.val();
    if (initialContent) {
        $('#descriptionPreview').html(initialContent);
    }
});
</script>
@endsection