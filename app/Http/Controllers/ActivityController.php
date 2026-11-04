<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function create(): View
    {
        return view('activities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string', 'max:2000'],
            'project' => ['required', 'string', 'max:120'],
            'activity_date' => ['required', 'date'],
            'duration_hours' => ['required', 'numeric', 'gt:0', 'lte:24'],
            'status' => ['required', 'in:pending,in_progress,completed'],
        ], [
            'title.required' => 'El nombre de la actividad es obligatorio.',
            'project.required' => 'El proyecto es obligatorio.',
            'activity_date.required' => 'La fecha es obligatoria.',
            'duration_hours.required' => 'Indica la duración en horas.',
            'duration_hours.gt' => 'La duración debe ser mayor que cero.',
            'duration_hours.lte' => 'La duración no puede superar 24 horas.',
            'status.in' => 'Selecciona un estado válido.',
        ]);

        Activity::create($validated);

        return redirect()
            ->route('home')
            ->with('success', 'La actividad se registró correctamente.');
    }
}
