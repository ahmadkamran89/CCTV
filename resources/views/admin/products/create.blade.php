@extends('admin.layout')

@section('title', 'Add Product')
@section('page-title', 'Add New Product')
@section('page-subtitle', 'Fill in the details below to add a product to the store')

@section('header-actions')
    <a href="{{ route('admin.products.index') }}"
       class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-xl font-headline font-semibold text-sm transition-colors">
        <span class="material-symbols-outlined text-base">arrow_back</span>
        Back to Products
    </a>
@endsection

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Basic Info --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <h2 class="font-headline font-bold text-on-surface mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" style="font-variation-settings:'FILL' 1">info</span>
                Basic Information
            </h2>
            <div class="space-y-5">
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Product Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           placeholder="e.g. Aero Battery Cam"
                           class="w-full px-4 py-3 rounded-xl border @error('name') border-red-400 @else border-gray-200 @enderror
                                  font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    @error('name')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="3"
                              placeholder="Brief product description shown on the store card..."
                              class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm
                                     focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary resize-none">{{ old('description') }}</textarea>
                </div>

                {{-- Price --}}
                <div>
                    <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                        Price (AED) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 font-semibold text-sm">AED</span>
                        <input type="number" id="price" name="price" value="{{ old('price') }}"
                               placeholder="0.00" step="0.01" min="0"
                               class="w-full pl-14 pr-4 py-3 rounded-xl border @error('price') border-red-400 @else border-gray-200 @enderror
                                      font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                    </div>
                    @error('price')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Category & Display --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <h2 class="font-headline font-bold text-on-surface mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" style="font-variation-settings:'FILL' 1">category</span>
                Category & Display
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Category --}}
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Carousel Category <span class="text-red-500">*</span>
                    </label>
                    <select id="category_id" name="category_id" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm
                                   focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary cursor-pointer">
                        <option value="" disabled selected>Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Badge --}}
                <div>
                    <label for="badge" class="block text-sm font-semibold text-gray-700 mb-2">Badge Label</label>
                    <select id="badge" name="badge"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm
                                   focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <option value="">No Badge</option>
                        @foreach($badges as $badge)
                        <option value="{{ $badge }}" {{ old('badge') === $badge ? 'selected' : '' }}>{{ $badge }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Sort Order --}}
                <div>
                    <label for="sort_order" class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}"
                           min="0"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm
                                  focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                </div>

                {{-- Visibility --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Visibility</label>
                    <label class="flex items-center gap-3 cursor-pointer mt-1">
                        <div class="relative">
                            <input type="checkbox" name="is_active" value="1"
                                   {{ old('is_active', '1') ? 'checked' : '' }}
                                   class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-primary transition-colors"></div>
                            <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5"></div>
                        </div>
                        <span class="font-body text-sm text-gray-700">Show on home page</span>
                    </label>
                </div>
            </div>
        </div>

        {{-- Technical Specifications --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <h2 class="font-headline font-bold text-on-surface mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" style="font-variation-settings:'FILL' 1">settings_suggest</span>
                Technical Specifications
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="resolution" class="block text-sm font-semibold text-gray-700 mb-2">Resolution</label>
                    <input type="text" id="resolution" name="resolution" value="{{ old('resolution') }}"
                           placeholder="e.g. 4K UHD (3840 x 2160)"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                </div>
                <div>
                    <label for="night_vision" class="block text-sm font-semibold text-gray-700 mb-2">Night Vision</label>
                    <input type="text" id="night_vision" name="night_vision" value="{{ old('night_vision') }}"
                           placeholder="e.g. Color Night Vision (30m)"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                </div>
                <div>
                    <label for="weatherproof" class="block text-sm font-semibold text-gray-700 mb-2">Weatherproof</label>
                    <input type="text" id="weatherproof" name="weatherproof" value="{{ old('weatherproof') }}"
                           placeholder="e.g. IP67 Rated"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                </div>
                <div>
                    <label for="storage" class="block text-sm font-semibold text-gray-700 mb-2">Storage</label>
                    <input type="text" id="storage" name="storage" value="{{ old('storage') }}"
                           placeholder="e.g. MicroSD / Cloud Storage"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                </div>
            </div>
        </div>

        {{-- Features List (JSON) --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <h2 class="font-headline font-bold text-on-surface mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" style="font-variation-settings:'FILL' 1">featured_play_list</span>
                Overview Highlights
            </h2>
            <div id="features-container" class="space-y-3 mb-4">
                {{-- Dynamic Inputs --}}
                @if(old('features'))
                    @foreach(old('features') as $feature)
                        <div class="flex items-center gap-2 feature-item">
                            <input type="text" name="features[]" value="{{ $feature }}" placeholder="Enter a key feature..." 
                                   class="flex-1 px-4 py-3 rounded-xl border border-gray-200 font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                            <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 transition-colors">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                    @endforeach
                @else
                    <div class="flex items-center gap-2 feature-item">
                        <input type="text" name="features[]" placeholder="Enter a key feature..." 
                               class="flex-1 px-4 py-3 rounded-xl border border-gray-200 font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
                        <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 transition-colors">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </div>
                @endif
            </div>
            <button type="button" onclick="addFeature()" 
                    class="text-primary font-bold text-sm flex items-center gap-1 hover:opacity-80 transition-all">
                <span class="material-symbols-outlined text-lg">add_circle</span>
                Add Another Highlight
            </button>
        </div>

        {{-- Image --}}
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8">
            <h2 class="font-headline font-bold text-on-surface mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" style="font-variation-settings:'FILL' 1">image</span>
                Product Image
            </h2>

            {{-- Image Preview --}}
            <div class="mb-5">
                <img id="image-preview" src="" alt="Preview"
                     class="w-40 h-40 object-cover rounded-xl border border-gray-200 bg-gray-50 hidden">
                <div id="image-placeholder"
                     class="w-40 h-40 rounded-xl border-2 border-dashed border-gray-200 bg-gray-50 flex flex-col items-center justify-center text-gray-300">
                    <span class="material-symbols-outlined text-4xl">image</span>
                    <span class="text-xs mt-1">No image</span>
                </div>
            </div>

            {{-- Upload File --}}
            <div class="mb-4">
                <label for="image_file" class="block text-sm font-semibold text-gray-700 mb-2">
                    Upload Image <span class="text-gray-400 font-normal">(JPEG, PNG, WebP — max 4MB)</span>
                </label>
                <input type="file" id="image_file" name="image_file" accept="image/*"
                       class="block w-full text-sm text-gray-500 font-body
                              file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0
                              file:text-sm file:font-semibold file:bg-primary-light file:text-primary
                              hover:file:bg-primary hover:file:text-white file:transition-colors file:cursor-pointer"
                       onchange="previewImage(this)">
            </div>

            {{-- OR URL --}}
            <div class="relative flex items-center gap-3 my-5">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-400 font-semibold uppercase">or enter URL</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <div>
                <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">Image URL</label>
                <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                       placeholder="https://example.com/camera.jpg"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 font-body text-sm
                              focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary"
                       onchange="previewFromUrl(this.value)">
                <p class="mt-1 text-xs text-gray-400">Uploaded file takes priority over URL.</p>
            </div>

            {{-- Additional Images --}}
            <div class="mt-8 pt-8 border-t border-gray-100">
                <label class="block text-sm font-semibold text-gray-700 mb-3">
                    Additional Gallery Images <span class="text-gray-400 font-normal">(Optional, select multiple)</span>
                </label>
                <input type="file" name="additional_images[]" multiple accept="image/*"
                       class="block w-full text-sm text-gray-500 font-body
                              file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                              file:text-xs file:font-bold file:bg-gray-100 file:text-gray-600
                              hover:file:bg-gray-200 transition-all cursor-pointer">
                <p class="mt-2 text-xs text-gray-400">These will be stored as secondary images for the product.</p>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-4">
            <button type="submit"
                    class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-8 py-3.5 rounded-xl
                           font-headline font-bold text-sm transition-colors shadow-sm">
                <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1">add_circle</span>
                Create Product
            </button>
            <a href="{{ route('admin.products.index') }}"
               class="px-6 py-3.5 rounded-xl border border-gray-200 text-gray-600 font-headline font-semibold text-sm hover:bg-gray-50 transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const div = document.createElement('div');
    div.className = 'flex items-center gap-2 feature-item';
    div.innerHTML = `
        <input type="text" name="features[]" placeholder="Enter a key feature..." 
               class="flex-1 px-4 py-3 rounded-xl border border-gray-200 font-body text-sm focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
        <button type="button" onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-600 transition-colors">
            <span class="material-symbols-outlined">delete</span>
        </button>
    `;
    container.appendChild(div);
}

function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('image-preview').src = e.target.result;
            document.getElementById('image-preview').classList.remove('hidden');
            document.getElementById('image-placeholder').classList.add('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function previewFromUrl(url) {
    if (url) {
        document.getElementById('image-preview').src = url;
        document.getElementById('image-preview').classList.remove('hidden');
        document.getElementById('image-placeholder').classList.add('hidden');
    }
}
</script>
@endpush
