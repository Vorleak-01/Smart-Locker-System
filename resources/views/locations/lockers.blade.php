@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white flex flex-col">

    {{-- Header --}}
    <header class="bg-gradient-to-b from-blue-900 to-blue-950 text-white px-5 sm:px-10 pt-6 pb-5 flex items-center gap-4 flex-shrink-0">
        <a href="{{ url()->previous() }}" class="text-white">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"/>
            </svg>
        </a>
        <h1 class="text-lg sm:text-2xl font-bold">Locker Selection</h1>
    </header>

    <div class="px-5 sm:px-10 py-5 sm:py-8 flex-1">
        <div class="max-w-4xl mx-auto w-full">

            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">{{ $location->name }}</h2>
            <p class="text-sm text-gray-500 mt-1 flex items-center gap-1">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                {{ $location->address }}
            </p>

            <p class="text-base font-bold text-gray-900 mt-6 mb-3">Select a Locker</p>

            {{-- Locker grid --}}
            <div id="lockerGrid" class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-3"></div>

            {{-- Legend --}}
            <div class="flex items-center justify-center gap-6 mt-6 py-3 border border-gray-100 rounded-full text-sm">
                <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-green-500"></span>Available</span>
                <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-red-500"></span>In Use</span>
                <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-gray-400"></span>Maint.</span>
            </div>

            {{-- Selected locker panel --}}
            <div id="selectedPanel" class="hidden border border-gray-200 rounded-2xl p-4 mt-5">
                <div class="flex items-center justify-between">
                    <div>
                        <p id="selectedName" class="font-bold text-gray-900"></p>
                        <p id="selectedMeta" class="text-xs text-gray-500"></p>
                    </div>
                    <span id="selectedStatus" class="flex items-center gap-1.5 text-sm font-semibold"></span>
                </div>
            </div>

            <button id="selectBtn" disabled class="w-full bg-blue-900 text-white font-semibold rounded-2xl py-4 mt-5 disabled:opacity-40 disabled:cursor-not-allowed hover:bg-blue-950 transition-colors">
                Select Locker
            </button>
        </div>
    </div>
</div>

<script>
    const lockers = @json($lockers);
    let selected = null;

    function statusMeta(status) {
        if (status === 'available') return { cls: 'text-green-600', border: 'border-green-300 bg-green-50', dot: 'bg-green-500', label: 'Available' };
        if (status === 'in_use') return { cls: 'text-red-600', border: 'border-red-300 bg-red-50', dot: 'bg-red-500', label: 'In Use' };
        return { cls: 'text-gray-500', border: 'border-gray-200 bg-gray-50', dot: 'bg-gray-400', label: 'Maint.' };
    }

    function renderGrid() {
        const grid = document.getElementById('lockerGrid');
        grid.innerHTML = lockers.map(locker => {
            const s = statusMeta(locker.status);
            const isSelected = selected && selected.id === locker.id;
            return `
                <button
                    data-id="${locker.id}"
                    class="locker-btn border rounded-xl py-4 text-center transition-all ${s.border} ${isSelected ? 'ring-2 ring-blue-900' : ''}"
                    ${locker.status !== 'available' ? '' : ''}
                >
                    <p class="font-bold text-sm text-gray-900">${locker.locker_number}</p>
                    <p class="text-xs ${s.cls}">${s.label}</p>
                </button>`;
        }).join('');

        document.querySelectorAll('.locker-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = parseInt(btn.dataset.id);
                selected = lockers.find(l => l.id === id);
                renderGrid();
                renderSelected();
            });
        });
    }

    function renderSelected() {
        const panel = document.getElementById('selectedPanel');
        const btn = document.getElementById('selectBtn');

        if (!selected) {
            panel.classList.add('hidden');
            btn.disabled = true;
            return;
        }

        const s = statusMeta(selected.status);
        document.getElementById('selectedName').textContent = `Locker-${selected.locker_number}`;
        document.getElementById('selectedMeta').textContent = `${selected.location_id ? '' : ''}`.trim() || 'Standard locker';
        document.getElementById('selectedStatus').innerHTML = `<span class="w-2 h-2 rounded-full ${s.dot}"></span>${s.label}`;
        document.getElementById('selectedStatus').className = `flex items-center gap-1.5 text-sm font-semibold ${s.cls}`;
        panel.classList.remove('hidden');

        btn.disabled = selected.status !== 'available';
    }

    document.getElementById('selectBtn').addEventListener('click', () => {
        if (!selected || selected.status !== 'available') return;
        window.location.href = `/lockers/${selected.id}/confirm`;
    });

    renderGrid();
</script>
@endsection