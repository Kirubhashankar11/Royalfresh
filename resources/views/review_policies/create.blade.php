@extends('adminlte::page')
@section('title', 'Create Review Policy')
@section('content_header')
    <h1>Create Review Policy</h1>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('shipping-policies.store') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('Description') }} <i class="text-danger">*</i></label>
                                <textarea id="description" name="description" placeholder=""></textarea>
                                 <!-- Error message -->
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                            </div>
                        </div>

                        <!-- Preview of description -->
                        <div class="col-md-12">
                            <h4>{{ __('Preview') }}</h4>
                            <div id="descriptionPreview" class="border p-3"></div>
                        </div>
                    </div>
                            <button type="submit" class="btn btn-primary">Create Policy</button>
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