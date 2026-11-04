<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $startOfWeek = now()->startOfWeek()->toDateString();
        $endOfWeek = now()->endOfWeek()->toDateString();

        $activities = Activity::query()
            ->whereBetween('activity_date', [$startOfWeek, $endOfWeek])
            ->orderByDesc('activity_date')
            ->orderByDesc('id')
            ->get();

        $totalActivities = $activities->count();

        $completedActivities = $activities
            ->where('status', 'completed')
            ->count();

        $pendingActivities = $totalActivities - $completedActivities;

        $progressPercentage = $totalActivities > 0
            ? (int) round(
                ($completedActivities / $totalActivities) * 100
            )
            : 0;

        return view('home', compact(
            'activities',
            'totalActivities',
            'completedActivities',
            'pendingActivities',
            'progressPercentage'
        ));
    }
}