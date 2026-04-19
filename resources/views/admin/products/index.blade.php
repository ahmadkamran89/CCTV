@extends('admin.layout')

@section('title', 'Products')
@section('page-title', 'Products')
@section('page-subtitle', 'Manage your CCTV product catalogue')

@section('header-actions')
    <a href="{{ route('admin.products.create') }}"
       class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-xl font-headline font-semibold text-sm transition-colors shadow-sm">
        <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1">add</span>
        Add Product
    </a>
@endsection

@section('content')

{{-- Stats Cards --}}
<div class="flex flex-wrap gap-4 mb-8">
    <div class="flex-1 min-w-[150px] bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">
        <div class="text-2xl font-headline font-extrabold text-on-surface">{{ $stats['total'] }}</div>
        <div class="text-xs text-gray-500 mt-1 font-body uppercase tracking-widest">Total</div>
    </div>
    <div class="flex-1 min-w-[150px] bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">
        <div class="text-2xl font-headline font-extrabold text-emerald-600">{{ $stats['active'] }}</div>
        <div class="text-xs text-gray-500 mt-1 font-body uppercase tracking-widest">Active</div>
    </div>
    @foreach($allCategories as $cat)
    <div class="flex-1 min-w-[150px] bg-white rounded-2xl border border-gray-100 p-5 shadow-sm">
        <div class="text-2xl font-headline font-extrabold text-primary">{{ $stats[$cat->slug] ?? 0 }}</div>
        <div class="text-xs text-gray-500 mt-1 font-body uppercase tracking-widest truncate">{{ $cat->name }}</div>
    </div>
    @endforeach
</div>

{{-- Filters --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5 mb-6">
    <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-wrap gap-3 items-end">
        <div class="flex-1 min-w-[200px]">
            <label class="block text-xs font-semibold text-gray-500 mb-1.5 uppercase tracking-wider">Search</label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-base">search</span>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search products..."
                       class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-gray-200 text-sm font-body focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
            </div>
        </div>
        <div>
            <label class="block text-xs font-semibold text-gray-500 mb-1.5 uppercase tracking-wider">Category</label>
            <select name="category_id"
                    class="pr-10 py-2.5 pl-4 rounded-xl border border-gray-200 text-sm font-body focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary appearance-none bg-white">
                <option value="">All Categories</option>
                @foreach($allCategories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit"
                class="px-5 py-2.5 bg-primary text-white rounded-xl text-sm font-headline font-semibold hover:bg-primary-dark transition-colors">
            Filter
        </button>
        @if(request('search') || request('category_id'))
        <a href="{{ route('admin.products.index') }}"
           class="px-5 py-2.5 bg-gray-100 text-gray-600 rounded-xl text-sm font-headline font-semibold hover:bg-gray-200 transition-colors">
            Clear
        </a>
        @endif
    </form>
</div>

{{-- Products Table --}}
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    @if($products->isEmpty())
    <div class="py-20 text-center">
        <span class="material-symbols-outlined text-5xl text-gray-300 block mb-4" style="font-variation-settings:'FILL' 1">inventory_2</span>
        <p class="font-headline font-semibold text-gray-500 text-lg mb-2">No products found</p>
        <p class="font-body text-gray-400 text-sm mb-6">Try adjusting your filters or add a new product.</p>
        <a href="{{ route('admin.products.create') }}"
           class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-xl font-headline font-semibold text-sm hover:bg-primary-dark transition-colors">
            <span class="material-symbols-outlined text-base" style="font-variation-settings:'FILL' 1">add</span>
            Add Product
        </a>
    </div>
    @else
    <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Product</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Category</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Price</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Badge</th>
                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($products as $product)
            <tr class="hover:bg-gray-50/60 transition-colors">
                {{-- Product --}}
                <td class="px-6 py-4">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0 border border-gray-100">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                 class="w-full h-full object-cover">
                        </div>
                        <div>
                            <div class="font-headline font-semibold text-on-surface text-sm">{{ $product->name }}</div>
                            <div class="text-xs text-gray-400 mt-0.5 line-clamp-1 max-w-xs">{{ $product->description }}</div>
                        </div>
                    </div>
                </td>
                {{-- Category --}}
                <td class="px-6 py-4">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-700">
                        <span class="material-symbols-outlined text-xs">{{ $product->category?->icon_name ?? 'category' }}</span>
                        {{ $product->category_label }}
                    </span>
                </td>
                {{-- Price --}}
                <td class="px-6 py-4">
                    <span class="font-headline font-bold text-primary text-sm">{{ $product->formatted_price }}</span>
                </td>
                {{-- Badge --}}
                <td class="px-6 py-4">
                    @if($product->badge)
                    <span class="inline-block px-2 py-0.5 bg-primary-light text-primary text-xs font-bold rounded">
                        {{ $product->badge }}
                    </span>
                    @else
                    <span class="text-gray-300 text-xs">—</span>
                    @endif
                </td>
                {{-- Status --}}
                <td class="px-6 py-4">
                    <form action="{{ route('admin.products.toggle', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold transition-colors {{ $product->is_active ? 'bg-emerald-100 text-emerald-700 hover:bg-emerald-200' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $product->is_active ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                            {{ $product->is_active ? 'Active' : 'Hidden' }}
                        </button>
                    </form>
                </td>
                {{-- Actions --}}
                <td class="px-6 py-4">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="p-2 rounded-lg bg-gray-100 hover:bg-primary hover:text-white text-gray-500 transition-colors"
                           title="Edit">
                            <span class="material-symbols-outlined text-base">edit</span>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                              onsubmit="return confirm('Delete \'{{ addslashes($product->name) }}\'? This cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="p-2 rounded-lg bg-gray-100 hover:bg-red-500 hover:text-white text-gray-500 transition-colors"
                                    title="Delete">
                                <span class="material-symbols-outlined text-base">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    @if($products->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $products->links() }}
    </div>
    @endif
    @endif
</div>

@endsection
