<?php

if (!function_exists('dashboardRoute')) {
    function dashboardRoute(): string
    {
        $role = auth()->user()->role ?? 'warga';
        return match($role) {
            'ketua'      => route('ketua.dashboard'),
            'wakil'      => route('wakil.dashboard'),
            'bendahara'  => route('bendahara.dashboard'),
            'sekretaris' => route('sekretaris.dashboard'),
            default      => route('warga.dashboard'),
        };
    }
}