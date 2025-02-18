@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('admin/css/select2.min.css')}}">

<style>
    #dropzone {
        min-height: 200px !important;
        border: 2px dashed #007bff !important;
        background: #f8f9fa !important;
        padding: 20px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8 m-auto">

                    <!-- old card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Information</h5>
                            </div>
                            <form class="theme-form theme-form-2 mega-form" action="{{ route('products.store') }}" method="POST" multipart enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="name" placeholder="Product Name" value="{{ old('name', $product->name) }}" required>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Type</label>
                                    <div class="col-sm-9">
                            
                                        <select class="js-example-basic-single w-100" name="type" value="{{ old('type', $product->type) }}">
                                            <option disabled>Type Menu</option>
                                            <option value="normal" @if($product->type == 'normal') selected @endif>Normal</option>
                                            <option value="featured"  @if($product->type == 'featured') selected @endif>Featured</option>
                                            <option value="topselling" @if($product->type == 'topselling') selected @endif>Topselling</option>
                                            <option value="new" @if($product->type == 'new') selected @endif>New</option>
                                            <option value="discount" @if($product->type == 'discount') selected @endif>Discount</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Status</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="status" value="{{ old('status', $product->status) }}">
                                            <option disabled>Status Menu</option>
                                            <option value="active" @if($product->status == 'active') selected @endif>Active</option>
                                            <option value="inactive" @if($product->status == 'inactive') selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="description" placeholder="Description" required>{{ old('description', $product->description) }}</textarea>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Price</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" name="price" placeholder="Price" value="{{ old('price', $product->price) }}" required>
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Compare Price</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" name="compare_price" placeholder="Compare Price" value="{{ old('compare_price', $product->compare_price) }}">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Image</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="image" placeholder="Image URL" value="{{ old('image', $product->image) }}">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Thumbnail</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="thumbnail" accept="image/*">
                                        <div class="mt-2">
                                            <img id="imagePreview" src="{{ $product->thumbnail ? asset($product->thumbnail) : 'https://via.placeholder.com/150' }}" alt="Product Thumbnail" class="img-thumbnail" width="150">
                                        </div>
                                    </div>
                                </div>
                                <!-- Dropzone for Multiple Images -->
                               
                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Images</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-choose" type="file"
                                            id="formFile" multiple>
                                    </div>
                                </div>
                            

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Stock</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" name="stock" placeholder="Stock" value="{{ old('stock', $product->stock) }}" required>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label
                                        class="col-sm-3 col-form-label form-label-title">Category</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" name="category_id">
                                            <option disabled>Category Menu</option>
                                             @foreach(@$categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<!-- select2 js -->
<script src="{{asset('admin/js/select2.min.js')}}"></script>
<script src="{{asset('admin/js/select2-custom.js')}}"></script>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
    $(document).ready(function() {
        Dropzone.autoDiscover = false;

        $('.select2').select2();
        myDropzone = new Dropzone("#dropzonewidgetexpenseImages", {
            url: "/upload_product_images",
            addRemoveLinks: true,
            maxFiles: 4,
            acceptedFiles: 'image/*',
            maxFilesize: 5,
            init: function() {
                if (this.files.length) {
                    this.removeAllFiles();
                }
            },
            success: function(file, response) {
                uploadedImages.push(response.filePath);
                document.getElementById('images').value = JSON.stringify(uploadedImages);
            },
            removedfile: function(file) {
                let filename = file.name;
                uploadedImages = uploadedImages.filter(img => !img.includes(filename));
                document.getElementById('images').value = JSON.stringify(uploadedImages);
                file.previewElement.remove();
            }
        });
    });
</script>
@endpush