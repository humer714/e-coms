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
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Information</h5>
                            </div>
                            <form action="{{ route('products.store') }}" method="POST" multipart enctype="multipart/form-data">
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
                                        <input class="form-control" type="text" name="type" placeholder="Type" value="{{ old('type', $product->type) }}">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Status</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="status" placeholder="Status" value="{{ old('status', $product->status) }}" required>
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
                                <div class="col-md-12 PT-10">
                                    <label class="font12 mb-5">Add Product Images</label>
                                    <form action="/upload_product_images" class="dropzone"
                                        id="dropzonewidgetexpenseImages" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input name="hidden_key_id" class="hidden_key_id" hidden type="text" />
                                        <input name="operation" class="operation" hidden type="text" />
                                    </form>
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
                                        <select class=" select2 form-control" name="category_id" required>
                                            <option value="">Select Category</option>
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