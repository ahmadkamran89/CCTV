@extends('admin.layout')

@section('content')
<div class="space-y-8">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-8 rounded-[2rem] border border-gray-100 shadow-sm">
        <div>
            <h1 class="font-headline font-bold text-2xl text-gray-900 tracking-tight">Product Categories</h1>
            <p class="text-gray-500 text-sm mt-1 font-medium">Manage how your products are grouped on the storefront.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" 
           class="inline-flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-6 py-3 rounded-xl font-headline font-bold text-sm transition-all shadow-lg shadow-primary/20 transform active:scale-[0.98]">
            <span class="material-symbols-outlined text-lg">add</span>
            New Category
        </a>
    </div>

    {{-- Category List --}}
    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Icon & Name</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Slug</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Sort Order</th>
                        <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($categories as $category)
                    <tr class="hover:bg-gray-50/30 transition-colors group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center group-hover:bg-primary-light transition-colors">
                                    <span class="material-symbols-outlined text-gray-400 group-hover:text-primary transition-colors">
                                        {{ $category->icon_name }}
                                    </span>
                                </div>
                                <div>
                                    <div class="font-bold text-gray-900 uppercase tracking-tight text-sm">{{ $category->name }}</div>
                                    <div class="text-xs text-gray-400 font-medium">{{ Str::limit($category->description, 40) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <code class="text-xs font-mono bg-gray-100 px-2 py-1 rounded-md text-gray-600">{{ $category->slug }}</code>
                        </td>
                        <td class="px-6 py-5">
                             <span class="text-sm font-bold text-gray-700">{{ $category->sort_order }}</span>
                        </td>
                        <td class="px-6 py-5">
                            <form action="{{ route('admin.categories.toggle', $category) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest transition-all {{ $category->is_active ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-red-100 text-red-700 hover:bg-red-200' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $category->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                    {{ $category->is_active ? 'Active' : 'Hidden' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                   class="p-2 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-primary transition-all">
                                    <span class="material-symbols-outlined text-xl">edit</span>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" 
                                      onsubmit="return confirm('Delete this category? Products in this category will be unlinked.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg text-gray-400 hover:bg-red-50 hover:text-red-500 transition-all">
                                        <span class="material-symbols-outlined text-xl">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <span class="material-symbols-outlined text-6xl text-gray-200">category</span>
                                <div class="text-gray-400 font-medium italic">No categories created yet.</div>
                                <a href="{{ route('admin.categories.create') }}" class="text-primary hover:underline font-bold text-sm">Create your first category</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
