@extends('admin.layout')

@section('content')
<div class="max-w-4xl mx-auto mb-12">
    {{-- Header --}}
    <div class="flex items-center gap-4 mb-10">
        <a href="{{ route('admin.categories.index') }}" 
           class="w-12 h-12 rounded-2xl bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-primary hover:border-primary/20 transition-all shadow-sm group">
            <span class="material-symbols-outlined transition-transform group-hover:-translate-x-1">arrow_back</span>
        </a>
        <div>
            <h1 class="font-headline font-bold text-3xl text-gray-900 tracking-tight">Edit Category</h1>
            <nav class="flex text-sm font-medium text-gray-400 gap-2 mt-1">
                <span>Admin</span>
                <span>•</span>
                <span>Categories</span>
                <span>•</span>
                <span class="text-primary">{{ $category->name }}</span>
            </nav>
        </div>
    </div>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Main Info --}}
        <div class="bg-white rounded-[2.5rem] p-10 border border-gray-100 shadow-xl shadow-gray-200/40">
            <div class="grid md:grid-cols-2 gap-x-10 gap-y-8">
                
                <div class="col-span-2">
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-2 tracking-tight">Category Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required autofocus
                           class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 
                                  focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary focus:bg-white
                                  transition-all duration-200 text-base font-medium"
                           placeholder="e.g. Wireless Cameras">
                    @error('name')<p class="text-red-500 text-xs mt-2 font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="slug" class="block text-sm font-bold text-gray-700 mb-2 tracking-tight">URL Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $category->slug) }}"
                           class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 
                                  focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary focus:bg-white
                                  transition-all duration-200 text-base font-medium"
                           placeholder="e.g. wireless-cameras">
                    <p class="mt-2 text-[10px] text-gray-400 uppercase tracking-widest font-bold">Auto-generated if left blank</p>
                </div>

                <div>
                    <label for="icon" class="block text-sm font-bold text-gray-700 mb-2 tracking-tight">Icon <span class="text-gray-400 font-normal">(Material Symbol)</span></label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon', $category->icon) }}"
                           class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 
                                  focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary focus:bg-white
                                  transition-all duration-200 text-base font-medium"
                           placeholder="e.g. videocam, router, home">
                    <p class="mt-2 text-[10px] text-gray-400 uppercase tracking-widest font-bold">Find names at <a href="https://fonts.google.com/icons" target="_blank" class="text-primary hover:underline">Google Icons</a></p>
                </div>

                <div class="col-span-2">
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2 tracking-tight">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 
                                     focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary focus:bg-white
                                     transition-all duration-200 text-base font-medium resize-none"
                              placeholder="Brief description of this category for the home page...">{{ old('description', $category->description) }}</textarea>
                </div>

                <div>
                    <label for="sort_order" class="block text-sm font-bold text-gray-700 mb-2 tracking-tight">Sort Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}"
                           class="w-full px-5 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 
                                  focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary focus:bg-white
                                  transition-all duration-200 text-base font-medium">
                </div>

                <div class="flex items-center gap-4 pt-8">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ $category->is_active ? 'checked' : '' }}>
                        <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary"></div>
                    </label>
                    <div>
                        <span class="block text-sm font-bold text-gray-900 uppercase tracking-tight">Active Status</span>
                        <span class="text-xs text-gray-400 font-medium">Show this category on the home page</span>
                    </div>
                </div>

            </div>
        </div>

        {{-- Submit --}}
        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('admin.categories.index') }}" 
               class="px-8 py-4 rounded-2xl font-headline font-bold text-gray-500 hover:bg-gray-100 transition-colors">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-primary hover:bg-primary-dark text-white px-10 py-4 rounded-2xl font-headline font-bold text-base transition-all shadow-xl shadow-primary/20 transform active:scale-[0.98]">
                Update Category
            </button>
        </div>
    </form>
</div>
@endsection
