@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mx-auto max-w-7xl space-y-6">
    <section class="overflow-hidden rounded-2xl bg-[#234397] shadow-lg">
        <div class="grid gap-8 px-6 py-7 text-white sm:px-8 sm:py-8 lg:grid-cols-[1fr_auto] lg:items-center">
            <div>
                <p class="text-sm font-medium text-blue-200">Welcome</p>
                <h1 class="mt-2 text-3xl font-semibold tracking-tight sm:text-4xl">Welcome to Smart Locker</h1>
                <p class="mt-3 max-w-xl text-sm leading-6 text-blue-100">Find a secure locker and manage your belongings easily.</p>
            </div>
            <div class="flex items-center gap-4 rounded-xl border border-white/15 bg-white/10 p-4 lg:min-w-[260px]">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-white text-[#234397]"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
                <div class="flex-1"><p class="text-xs text-blue-100">Ready to get started?</p><a href="/user/locations" class="mt-1 inline-flex items-center gap-2 text-sm font-semibold text-white hover:text-blue-100">Find a locker <i class="fa-solid fa-arrow-right text-xs" aria-hidden="true"></i></a></div>
            </div>
        </div>
    </section>

    <section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between"><p class="text-sm text-slate-500">Active locker</p><span class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-50 text-[#234397]"><i class="fa-solid fa-box-open" aria-hidden="true"></i></span></div>
            <p class="mt-4 text-2xl font-semibold text-slate-900">None</p><p class="mt-1 text-xs text-slate-500">No locker in use</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between"><p class="text-sm text-slate-500">Available lockers</p><span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600"><i class="fa-solid fa-unlock" aria-hidden="true"></i></span></div>
            <p class="mt-4 text-2xl font-semibold text-slate-900">--</p><p class="mt-1 text-xs text-slate-500">Choose a location to check</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between"><p class="text-sm text-slate-500">Locations</p><span class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-50 text-amber-600"><i class="fa-solid fa-map-location-dot" aria-hidden="true"></i></span></div>
            <p class="mt-4 text-2xl font-semibold text-slate-900">--</p><p class="mt-1 text-xs text-slate-500">Available soon</p>
        </div>
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between"><p class="text-sm text-slate-500">Completed usage</p><span class="flex h-9 w-9 items-center justify-center rounded-lg bg-violet-50 text-violet-600"><i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i></span></div>
            <p class="mt-4 text-2xl font-semibold text-slate-900">0</p><p class="mt-1 text-xs text-slate-500">Locker sessions</p>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-5">
        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-3">
            <div class="flex items-start justify-between"><div><h2 class="text-lg font-semibold text-slate-900">Your active locker</h2><p class="mt-1 text-sm text-slate-500">Your current locker details will appear here.</p></div><i class="fa-solid fa-lock text-xl text-slate-300" aria-hidden="true"></i></div>
            <div class="mt-6 rounded-xl border border-dashed border-slate-300 bg-slate-50 px-5 py-9 text-center">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-white text-slate-400 shadow-sm"><i class="fa-solid fa-box-open" aria-hidden="true"></i></div>
                <h3 class="mt-4 text-sm font-semibold text-slate-800">You are not using a locker</h3>
                <p class="mx-auto mt-1 max-w-sm text-sm text-slate-500">Find an available locker and keep your belongings safe while you are out.</p>
                <a href="/user/lockers" class="mt-5 inline-flex items-center gap-2 rounded-lg bg-[#234397] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#173276]"><i class="fa-solid fa-box" aria-hidden="true"></i>View available lockers</a>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm lg:col-span-2">
            <div class="flex items-start justify-between"><div><h2 class="text-lg font-semibold text-slate-900">Nearby locations</h2><p class="mt-1 text-sm text-slate-500">Choose a convenient place.</p></div><i class="fa-solid fa-location-dot text-xl text-slate-300" aria-hidden="true"></i></div>
            <div class="mt-6 rounded-xl border border-dashed border-slate-300 bg-slate-50 px-5 py-9 text-center"><i class="fa-solid fa-map-pin text-2xl text-slate-400" aria-hidden="true"></i><p class="mt-3 text-sm font-semibold text-slate-700">No locations available</p><p class="mt-1 text-xs text-slate-500">Staff will add locations to the system.</p><a href="/user/locations" class="mt-4 inline-block text-sm font-semibold text-[#234397] hover:underline">Browse all locations</a></div>
        </div>
    </section>

    <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between gap-4"><div><h2 class="text-lg font-semibold text-slate-900">Recent usage</h2><p class="mt-1 text-sm text-slate-500">Keep track of your previous locker sessions.</p></div><a href="/user/usage" class="text-sm font-semibold text-[#234397] hover:underline">View history</a></div>
        <div class="mt-6 flex items-center justify-center rounded-xl border border-dashed border-slate-300 bg-slate-50 px-5 py-8 text-center"><div><i class="fa-solid fa-clock-rotate-left text-2xl text-slate-400" aria-hidden="true"></i><p class="mt-3 text-sm font-semibold text-slate-700">No usage history yet</p><p class="mt-1 text-xs text-slate-500">Your completed sessions will appear here.</p></div></div>
    </section>
</div>
@endsection

