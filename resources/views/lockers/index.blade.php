@extends('layouts.app')

@section('title', 'Manage Lockers')

@section('content')
<!-- <div class="mx-auto max-w-6xl space-y-6">
    <section class="rounded-2xl bg-blue-800 px-6 py-6 text-white shadow-md sm:px-8">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-4">
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-600">
                    <i class="fa-solid fa-box" aria-hidden="true"></i>
                </span>
                <div>
                    <h1 class="text-xl font-semibold">Lockers - Central Mall</h1>
                    <p class="text-sm text-blue-200">36 total lockers</p>
                </div>
            </div>
            <button type="button" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-blue-800 shadow-sm hover:bg-blue-50">
                <i class="fa-solid fa-plus text-xs" aria-hidden="true"></i>
                Add locker
            </button>
        </div>
    </section>

    <section class="grid gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-sm text-slate-500">Total lockers</p>
            <p class="mt-2 text-2xl font-bold text-slate-900">36</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-sm text-slate-500">Free lockers</p>
            <p class="mt-2 text-2xl font-bold text-emerald-600">18</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-sm text-slate-500">Needs attention</p>
            <p class="mt-2 text-2xl font-bold text-orange-600">4</p>
        </div>
    </section>

    <section class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="flex flex-col gap-3 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-slate-900">Locker list</h2>
                <p class="mt-1 text-xs text-slate-500">View and manage lockers at this location.</p>
            </div>
            <label class="relative block sm:w-48">
                <span class="sr-only">Search lockers</span>
                <i class="fa-solid fa-magnifying-glass pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 text-xs text-slate-400" aria-hidden="true"></i>
                <input type="search" placeholder="Search locker" class="w-full rounded-lg border border-slate-200 py-2 pl-8 pr-3 text-sm text-slate-700 outline-none placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
            </label>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[560px] text-left text-sm">
                <thead class="border-b border-slate-200 bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-semibold">ID</th>
                        <th class="px-5 py-4 font-semibold">Type</th>
                        <th class="px-5 py-4 font-semibold">Status</th>
                        <th class="px-5 py-4 text-right font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-5 py-4 font-semibold text-slate-700">L01</td>
                        <td class="px-5 py-4 text-slate-500">Small</td>
                        <td class="px-5 py-4"><span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700"><i class="fa-solid fa-circle mr-1 text-[8px]" aria-hidden="true"></i>Free</span></td>
                        <td class="px-5 py-4 text-right"><button type="button" class="text-slate-400 hover:text-blue-700" aria-label="Edit locker L01"><i class="fa-solid fa-pen" aria-hidden="true"></i></button></td>
                    </tr>
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-5 py-4 font-semibold text-slate-700">L02</td>
                        <td class="px-5 py-4 text-slate-500">Medium</td>
                        <td class="px-5 py-4"><span class="rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-600"><i class="fa-solid fa-circle mr-1 text-[8px]" aria-hidden="true"></i>In use</span></td>
                        <td class="px-5 py-4 text-right"><button type="button" class="text-slate-400 hover:text-blue-700" aria-label="Edit locker L02"><i class="fa-solid fa-pen" aria-hidden="true"></i></button></td>
                    </tr>
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-5 py-4 font-semibold text-slate-700">L03</td>
                        <td class="px-5 py-4 text-slate-500">Large</td>
                        <td class="px-5 py-4"><span class="rounded-full bg-orange-50 px-3 py-1 text-xs font-medium text-orange-600"><i class="fa-solid fa-circle mr-1 text-[8px]" aria-hidden="true"></i>Fix</span></td>
                        <td class="px-5 py-4 text-right"><button type="button" class="text-slate-400 hover:text-blue-700" aria-label="Edit locker L03"><i class="fa-solid fa-pen" aria-hidden="true"></i></button></td>
                    </tr>
                    <tr class="transition hover:bg-slate-50">
                        <td class="px-5 py-4 font-semibold text-slate-700">L04</td>
                        <td class="px-5 py-4 text-slate-500">Small</td>
                        <td class="px-5 py-4"><span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700"><i class="fa-solid fa-circle mr-1 text-[8px]" aria-hidden="true"></i>Free</span></td>
                        <td class="px-5 py-4 text-right"><button type="button" class="text-slate-400 hover:text-blue-700" aria-label="Edit locker L04"><i class="fa-solid fa-pen" aria-hidden="true"></i></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div> -->

<h1 class="bg-blue-500 text-white ">Lockers </h1>
@endsection
