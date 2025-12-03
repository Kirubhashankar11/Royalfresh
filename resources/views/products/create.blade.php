@extends('adminlte::page')

@section('content_header')
<h1>{{ __('Add Product') }}</h1>
@stop

@section('content')

<!-- ⭐ REQUIRED FIX FOR AJAX + CSRF ⭐ -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="row" id="test">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="m-0 text-dark col-md-6 float-left">Create Product</h4>
                    </div>
                </div>
                <br>

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" role="form"
                    id="variantForm" autocomplete="off">

                    @csrf

                    <!-- Full-page overlay spinner -->
                    <div id="loadingOverlay" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;
                background-color:rgba(255,255,255,0.8);z-index:9999;text-align:center;">
                        <div class="spinner"
                            style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);">
                            <div class="double-bounce1"></div>
                            <div class="double-bounce2"></div>
                        </div>
                    </div>

                    <!-- TAGS -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tag:</label>
                        <div class="col-sm-10">
                            <label class="mr-3"><input type="checkbox" name="sale" value="1"> Sale</label>
                            <label class="mr-3"><input type="checkbox" name="new" value="1"> New</label>
                            <label><input type="checkbox" name="not_for_sale" value="1"> Not For Sale</label>
                        </div>
                    </div>

                    <div class="row">

                        <!-- PRODUCT NAME -->
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" required>
                        </div>

                        <!-- SLUG -->
                        <div class="col-md-6">
                            <label>Slug</label>
                            <input type="text" name="product_slug" id="product_slug" class="form-control" required>
                            <span id="span1"></span>
                        </div>

                        <!-- FEATURED IMAGE -->
                        <div class="col-md-6">
                            <label>Featured Image</label>
                            <input type="file" name="featured_image" class="form-control" required>
                        </div>

                        <!-- GALLERY IMAGE -->
                        <div class="col-md-6">
                            <label>Gallery Images</label>
                            <input type="file" name="gallery_image[]" class="form-control" multiple required>
                        </div>

                        <!-- CATEGORY -->
                        <div class="col-md-6">
                            <label>Category</label>
                            <select name="category_id" id="category" class="form-control" required>
                                <option value=""></option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SUBCATEGORY -->
                        <div class="col-md-6">
                            <label>Sub Category</label>
                            <select name="sub_category_id" id="subcategory" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>

                        <!-- VARIANT TYPE -->
                        <div class="col-md-6">
                            <label>Product Variant Type</label>
                            <select name="variant_type" id="variant_type_id" class="form-control" required>
                                <option value=""></option>
                                <option value="simple">Simple Product</option>
                                <option value="safety">Variable Product</option>
                            </select>

                            <input type="hidden" id="variant_type_hidden" name="product_type">
                        </div>

                        <!-- FILTER CATEGORY -->
                        <div class="col-md-6">
                            <label>Filter Category</label>
                            <select name="filter_category" class="form-control" required>
                                <option value=""></option>
                                <option value="cow">Cow</option>
                                <option value="goat">Goat</option>
                                <option value="camel">Camel</option>
                                <option value="hen">Hen</option>
                                <option value="buffalo">Buffalo</option>
                                <option value="sea_food">Sea Food</option>
                            </select>
                        </div>

                        <!-- CITY -->
                        <div class="col-md-6">
                            <label>City</label>
                            <select name="city_id" class="form-control" required>
                                <option value=""></option>
                                @foreach($cities as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- DESCRIPTION -->
                        <div class="col-md-12 mt-3">
                            <label>Short Description</label>
                            <textarea id="description" name="description"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="mt-2 border p-3" id="descriptionPreview"></div>
                        </div>

                        <!-- LONG DESCRIPTION -->
                        <div class="col-md-12 mt-3">
                            <label>Long Description</label>
                            <textarea id="long_description" name="long_description"></textarea>

                            <div class="mt-2 border p-3" id="longDescriptionPreview"></div>
                        </div>

                        <!-- SPECIFICATIONS -->
                        <div class="col-md-12 mt-3">
                            <label>Specifications</label>
                            <textarea id="specifications" name="specifications"></textarea>

                            <div class="mt-2 border p-3" id="specificationsPreview"></div>
                        </div>
                    </div>

                    <!-- SIMPLE PRODUCT CARD -->
                    <div id="simpleCard" class="card mt-4" style="display:none;">
                        <div class="card-header">
                            <h3>Simple Product</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3">
                                    <label>SKU</label>
                                    <input type="text" name="simple_sku" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>Image</label>
                                    <input type="file" name="simple_image" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>Price</label>
                                    <input type="text" name="simple_price" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>Discount Price</label>
                                    <input type="text" name="simple_discount_price" class="form-control" value="0">
                                </div>

                                <div class="col-md-3">
                                    <label>Tax</label>
                                    <select name="simple_tax" class="form-control">
                                        <option value=""></option>
                                        @foreach($taxes as $t)
                                            <option value="{{ $t->id }}">{{ $t->tax_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Tax Type</label>
                                    <select name="simple_tax_type" class="form-control">
                                        <option value="inclusive">Inclusive</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Weight</label>
                                    <input type="text" name="simple_weight" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>Stock</label>
                                    <input type="text" name="simple_stock" class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label>Unit</label>
                                    <select name="simple_unit_id" class="form-control">
                                        <option value=""></option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>Status</label>
                                    <select name="simple_status" class="form-control">
                                        <option value="available">Available</option>
                                        <option value="soldout">Sold Out</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">Create Product</button>
                    </div>

                </form>


                <button type="submit" class="btn btn-primary col-md-2 offset-md-5 btn-sm"
                    style="display: none;">Create</button>
                <!-- <span id="loadingSpinner" class="spinner-border text-primary" role="status" style="display: none;"></span> -->
                <a class="btn btn-danger col-md-2 btn-sm" href='#'>Cancel</a>
            </div>
        </div>

        <!-- variable -->
        <div id="variableCard" class="card" style="display: none;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs" id="tabMenu" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1"
                                        role="tab">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="tab2-tab" data-toggle="tab" href="#tab2"
                                        role="tab">Attributes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" id="tab3-tab" data-toggle="tab" href="#tab3"
                                        role="tab">Variations</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Tab 1 Content -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                    <form id="form-tab1" method="post">
                                        <div class="form-group" id="sku_group">
                                            <label for="name">SKU</label>
                                            <input type="text" class="form-control" id="sku" name="v_sku">
                                        </div>
                                        <div class="form-group" id="stock_group">
                                            <label for="name">Total Stock</label>
                                            <input type="text" class="form-control" id="total_stock"
                                                name="v_total_stock">
                                        </div>

                                        <div class="form-group">
                                            <label for="unit_id">Unit</label>
                                            <select name="v_unit_id" class="form-control" id="v_unit_id">
                                                <option value=""></option>
                                                @foreach($units as $unit)
                                                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Status</label>
                                            <select name="va_status" id="status" class="form-control">
                                                <option value="in_stock">In Stock</option>
                                                <option value="out_stock">Out of Stock</option>

                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="tab1-ok">OK</button>
                                    </form>
                                </div>

                                <!-- Tab 2 Content -->


                                <div class="tab-pane fade" id="tab2" role="tabpanel">
                                    <form action="" id="form-tab2" method="post">
                                        <div id="attributes-container">
                                            <div class="row attribute-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Select Attributes</label>
                                                        <select name="v_attributes[]" id="attributes[]"
                                                            class="form-control attributes-dropdown">
                                                            <option value="">Select an attribute</option>
                                                            @foreach($attributes as $item)
                                                                <option value="{{$item->id}}">{{$item->type}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="attribute_value">Attribute Value</label>
                                                        <select class="form-control attribute-value-dropdown"
                                                            id="attribute_value[]" name="v_attribute_value[]" multiple>
                                                            <option value="">Select Attribute Value</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                    <button type="button" class="btn btn-danger remove-row"
                                                        style="display: none;">Remove</button>
                                                </div>
                                            </div>
                                            <button type="button" id="add-row" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-primary float-right" id="tab2-ok"
                                                disabled>Next</button>
                                        </div>
                                    </form>
                                </div>



                                <!-- Tab 3 Content -->
                                <div class="tab-pane fade" id="tab3" role="tabpanel">
                                    <div id="tab3-content">
                                        <!-- Attributes and values will be dynamically inserted here -->
                                    </div>

                                    <button type="submit" class="btn btn-primary col-md-2 offset-md-5 btn-sm"
                                        style="display: none;">Create</button>
                                    <!-- <span id="loadingSpinner" class="spinner-border text-primary" role="status" style="display: none;"></span> -->
                                    <a class="btn btn-danger col-md-2 btn-sm" href='#'>Cancel</a>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <!-- <button type="submit" class="btn btn-primary col-md-2 offset-md-5 btn-sm" style="display: none;">Create</button>
                        <a class="btn btn-danger col-md-2 btn-sm" href='#'>Cancel</a> -->
            </form>
        </div>
    </div>
</div>
</div>

<style>
    /* Circle Spinner CSS */
    .spinner {
        width: 40px;
        height: 40px;
        position: relative;
    }

    .double-bounce1,
    .double-bounce2 {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #3498db;
        opacity: 0.6;
        position: absolute;
        top: 0;
        left: 0;
        animation: bounce 2.0s infinite ease-in-out;
    }

    .double-bounce2 {
        animation-delay: -1.0s;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: scale(0);
        }

        50% {
            transform: scale(1);
        }
    }
</style>
@stop

@section('js')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
@section('js')

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Plugins -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
/* ---------------------------------------------------
   ⭐ SUMMERNOTE INITIALIZATION + LIVE PREVIEW
----------------------------------------------------*/
function initSummernote(selector, previewBox) {
    $(selector).summernote({
        height: 200,
        callbacks: {
            onChange: function(contents) {
                $(previewBox).html(contents);
            }
        }
    });

    let initial = $(selector).val();
    if (initial) $(previewBox).html(initial);
}

$(document).ready(function() {
    initSummernote('#description', '#descriptionPreview');
    initSummernote('#long_description', '#longDescriptionPreview');
    initSummernote('#specifications', '#specificationsPreview');
});


/* ---------------------------------------------------
   ⭐ SLUG GENERATION
----------------------------------------------------*/
function convertToSlug(text) {
    return text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
}

let prefix = '{{ config("app.url") }}/products/';

$('#product_name').on('input', function () {
    let slug = convertToSlug($(this).val());
    $('#product_slug').val(slug);
    $('#span1').text(prefix + slug);
});


/* ---------------------------------------------------
   ⭐ CATEGORY → SUBCATEGORY AJAX
----------------------------------------------------*/
$('#category').on('change', function () {
    let id = $(this).val();

    if (!id) {
        $('#subcategory').html('<option value=""></option>');
        return;
    }

    $.get('/get-subcategories/' + id, function (data) {
        $('#subcategory').html('<option value=""></option>');
        $.each(data, function (i, s) {
            $('#subcategory').append(`<option value="${s.id}">${s.name}</option>`);
        });
    });
});


/* ---------------------------------------------------
   ⭐ VARIANT TYPE SWITCHING (Simple / Variable)
----------------------------------------------------*/
$('#variant_type_id').on('change', function () {
    let type = $(this).val();

    $('#variant_type_hidden').val(type);

    if (type === 'simple') {
        $('#simpleCard').show();
        $('#variableCard').hide();
    } else if (type === 'safety' || type === 'variable') {
        $('#simpleCard').hide();
        $('#variableCard').show();
    } else {
        $('#simpleCard,#variableCard').hide();
    }
});


/* ---------------------------------------------------
   ⭐ AJAX FORM SUBMISSION (MAIN FIX)
----------------------------------------------------*/
$('#variantForm').on('submit', function (e) {
    e.preventDefault();

    $('#loadingOverlay').show();

    let formData = new FormData(this);

    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,

        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },

        success: function (res) {
            alert("Product created successfully!");
            window.location.href = "/products";
        },

        error: function (xhr) {
            if (xhr.status === 422 && xhr.responseJSON.errors) {
                let err = xhr.responseJSON.errors;
                let msg = "Please fix the following:\n\n";

                $.each(err, function (key, val) {
                    msg += "- " + val[0] + "\n";
                });

                alert(msg);
            } else {
                alert("Form submission failed. Please try again.");
            }
        },

        complete: function () {
            $('#loadingOverlay').hide();
        }
    });
});


/* ---------------------------------------------------
   ⭐ VARIABLE PRODUCT — ATTRIBUTE HANDLING
----------------------------------------------------*/
$(document).on('change', '.attributes-dropdown', function () {
    let row = $(this).closest('.row');
    let id = $(this).val();
    let dropdown = row.find('.attribute-value-dropdown');

    dropdown.html("");

    if (!id) return;

    $.get('/get-attributesValue/' + id, function (data) {
        $.each(data, function (i, v) {
            dropdown.append(`<option value="${v.id}">${v.name}</option>`);
        });

        dropdown.multiselect('rebuild');
    });
});


/* ---------------------------------------------------
   ⭐ ADD NEW ATTRIBUTE ROW
----------------------------------------------------*/
$('#add-row').on('click', function () {
    let first = $('.attribute-row').first();
    let newRow = first.clone();

    newRow.find('select').val('');
    newRow.find('.remove-row').show();

    $('#attributes-container').append(newRow);

    newRow.find('.attribute-value-dropdown').multiselect({
        includeSelectAllOption: true,
        buttonWidth: '100%',
        nonSelectedText: 'Select Attribute Values'
    });
});


/* ---------------------------------------------------
   ⭐ REMOVE ATTRIBUTE ROW
----------------------------------------------------*/
$(document).on('click', '.remove-row', function () {
    $(this).closest('.attribute-row').remove();
});


/* ---------------------------------------------------
   ⭐ VARIANT COMBINATIONS (Tab 3)
----------------------------------------------------*/
$('#tab2-ok').on('click', function () {
    $('#tab3-tab').removeClass('disabled').attr('data-toggle', 'tab').tab('show');

    let attributeSets = [];

    $('.attribute-row').each(function () {
        let values = $(this).find('.attribute-value-dropdown').val();
        if (values && values.length > 0) attributeSets.push(values);
    });

    let combinations = generateCombinations(attributeSets);

    let html = "";
    let index = 0;

    combinations.forEach(function (combo) {
        html += `
            <div class="row mb-3 border p-2">

                <div class="col-md-4">
                    <label>SKU</label>
                    <input type="text" class="form-control" name="v_skus[${index}]">
                </div>

                <div class="col-md-4">
                    <label>Stock</label>
                    <input type="text" class="form-control" name="v_stock[${index}]">
                </div>

                <div class="col-md-4">
                    <label>Weight (gm)</label>
                    <input type="text" class="form-control" name="v_weights[${index}]">
                </div>

                <div class="col-md-4">
                    <label>Price</label>
                    <input type="text" class="form-control" name="v_prices[${index}]">
                </div>

                <div class="col-md-4">
                    <label>Discount Price</label>
                    <input type="text" class="form-control" name="v_discount_price[${index}]" value="0">
                </div>

                <div class="col-md-4">
                    <label>Image</label>
                    <input type="file" class="form-control" name="v_image[${index}]">
                </div>
            </div>
        `;
        index++;
    });

    $('#tab3-content').html(html);
});


/* ---------------------------------------------------
   ⭐ HELPER — GENERATE COMBINATIONS
----------------------------------------------------*/
function generateCombinations(arr) {
    if (arr.length === 0) return [];
    if (arr.length === 1) return arr[0].map(v => [v]);

    let result = [];
    let rest = generateCombinations(arr.slice(1));

    arr[0].forEach(v => {
        rest.forEach(r => {
            result.push([v].concat(r));
        });
    });

    return result;
}

</script>
@stop

@stop