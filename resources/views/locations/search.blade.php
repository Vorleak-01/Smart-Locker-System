@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white flex flex-col">

    {{-- Header --}}
    <header class="bg-gradient-to-b from-blue-900 to-blue-950 text-white px-5 sm:px-10 pt-6 sm:pt-10 pb-5 sm:pb-8 flex-shrink-0">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-xl sm:text-3xl font-bold mb-3">Find a Location</h1>
            <div class="bg-white rounded-2xl flex items-center gap-2 px-4 py-3 sm:max-w-md">
                <svg class="w-5 h-5 text-gray-400 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                </svg>
                <input
                    type="text"
                    id="searchInput"
                    placeholder="Mall, library, gym..."
                    class="w-full text-sm text-gray-900 placeholder-gray-400 outline-none border-none bg-transparent"
                />
            </div>
        </div>
    </header>

    {{-- Filter pills --}}
    <div class="max-w-5xl mx-auto w-full">
        <div id="filters" class="flex gap-2 px-5 sm:px-10 pt-4 pb-2 overflow-x-auto scrollbar-hide flex-shrink-0">
            <button data-filter="all" class="pill px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap bg-blue-900 text-white">All</button>
            <button data-filter="mall" class="pill px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap bg-gray-100 text-gray-600">Mall</button>
            <button data-filter="library" class="pill px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap bg-gray-100 text-gray-600">Library</button>
            <button data-filter="sports" class="pill px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap bg-gray-100 text-gray-600">Sports</button>
            <button data-filter="station" class="pill px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap bg-gray-100 text-gray-600">Station</button>
        </div>

        {{-- Location list --}}
        <div id="list" class="px-5 sm:px-10 pb-6 pt-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 flex-1"></div>
        <p id="emptyMsg" class="text-center text-gray-500 text-sm py-10 hidden">No locations match your search.</p>
    </div>
</div>

<style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
    const locations = @json($locations);

    const iconMap = {
        mall: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v18"/><path d="M6 12H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2"/><path d="M18 9h2a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>',
        library: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg>',
        sports: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v6a5 5 0 0 1-10 0z"/><path d="M17 5h2.5a1 1 0 0 1 1 1.5 4 4 0 0 1-4.5 3"/><path d="M7 5H4.5a1 1 0 0 0-1 1.5A4 4 0 0 0 8 9.5"/></svg>',
        station: '<svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="13" rx="2"/><path d="M4 11h16"/><path d="M12 3v8"/><path d="m8 19-2 3"/><path d="m18 22-2-3"/><path d="M8 15h.01"/><path d="M16 15h.01"/></svg>',
    };

    function status(free) {
        if (free === 0) return { cls: 'bg-red-100 text-red-600', dot: 'bg-red-600', label: 'Full' };
        if (free <= 3) return { cls: 'bg-orange-100 text-orange-600', dot: 'bg-orange-600', label: `${free} free` };
        return { cls: 'bg-green-100 text-green-600', dot: 'bg-green-600', label: `${free} free` };
    }

    let activeFilter = 'all';
    let query = '';

    function render() {
        const list = document.getElementById('list');
        const emptyMsg = document.getElementById('emptyMsg');

        const filtered = locations.filter(loc => {
            const matchesFilter = activeFilter === 'all' || loc.type === activeFilter;
            const matchesQuery = !query || loc.name.toLowerCase().includes(query) || loc.type.toLowerCase().includes(query);
            return matchesFilter && matchesQuery;
        });

        list.innerHTML = filtered.map(loc => {
            const s = status(loc.free_count);
            const icon = iconMap[loc.type] || iconMap.mall;
            return `
                <a href="/locations/${loc.slug ?? loc.id}" class="flex items-center gap-3 border border-gray-100 rounded-2xl px-4 py-3 hover:shadow-md transition-all">
                    <div class="w-11 h-11 rounded-xl bg-indigo-50 text-blue-900 flex items-center justify-center flex-shrink-0">${icon}</div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-sm text-gray-900 truncate">${loc.name}</p>
                        <p class="text-xs text-gray-500 truncate">${loc.address}</p>
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold whitespace-nowrap flex-shrink-0 ${s.cls}">
                        <span class="w-1.5 h-1.5 rounded-full ${s.dot}"></span>${s.label}
                    </div>
                </a>`;
        }).join('');

        emptyMsg.classList.toggle('hidden', filtered.length !== 0);
    }

    document.getElementById('filters').addEventListener('click', (e) => {
        const btn = e.target.closest('.pill');
        if (!btn) return;
        document.querySelectorAll('.pill').forEach(p => p.classList.remove('bg-blue-900', 'text-white'));
        document.querySelectorAll('.pill').forEach(p => p.classList.add('bg-gray-100', 'text-gray-600'));
        btn.classList.remove('bg-gray-100', 'text-gray-600');
        btn.classList.add('bg-blue-900', 'text-white');
        activeFilter = btn.dataset.filter;
        render();
    });

    document.getElementById('searchInput').addEventListener('input', (e) => {
        query = e.target.value.trim().toLowerCase();
        render();
    });

    render();
</script>
@endsection