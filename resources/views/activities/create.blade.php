
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar actividad | Bitácoras Semanal</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="form-body">
    <main class="form-page">
        <header class="form-topbar">
            <a class="form-brand" href="{{ route('home') }}">
                <span class="brand-mark">B</span>
                Bitácoras Semanal
            </a>

            <a class="form-back" href="{{ route('home') }}">
                ← Volver al panel
            </a>
        </header>

        <section class="form-card">
            <div class="form-title">
                <span class="form-eyebrow">NUEVO REGISTRO</span>
                <h1>Registrar actividad</h1>
                <p>Completa los datos de la actividad que realizaste.</p>
            </div>

            @if ($errors->any())
                <div class="form-alert form-alert-error">
                    <strong>Revisa los siguientes campos:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('activities.store') }}">
                @csrf

                <div class="form-grid">
                    <div class="form-field">
                        <label for="title">Nombre de la actividad *</label>
                        <input
                            id="title"
                            name="title"
                            type="text"
                            maxlength="150"
                            value="{{ old('title') }}"
                            placeholder="Ej. Revisión de plataformas"
                            required
                        >
                    </div>

                    <div class="form-field">
                        <label for="project">Proyecto o área *</label>
                        <input
                            id="project"
                            name="project"
                            type="text"
                            maxlength="120"
                            value="{{ old('project') }}"
                            placeholder="Ej. Plataformas corporativas"
                            required
                        >
                    </div>

                    <div class="form-field">
                        <label for="activity_date">Fecha de la actividad *</label>
                        <input
                            id="activity_date"
                            name="activity_date"
                            type="date"
                            value="{{ old('activity_date', now()->toDateString()) }}"
                            required
                        >
                    </div>

                    <div class="form-field">
                        <label for="duration_hours">Duración en horas *</label>
                        <input
                            id="duration_hours"
                            name="duration_hours"
                            type="number"
                            min="0.01"
                            max="24"
                            step="0.01"
                            value="{{ old('duration_hours') }}"
                            placeholder="Ej. 2.50"
                            required
                        >
                    </div>

                    <div class="form-field form-field-full">
                        <label for="description">Descripción</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="4"
                            maxlength="2000"
                            placeholder="Describe brevemente lo realizado."
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="form-field">
                        <label for="status">Estado *</label>
                        <select id="status" name="status" required>
                            <option
                                value="pending"
                                {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}
                            >
                                Pendiente
                            </option>
                            <option
                                value="in_progress"
                                {{ old('status') === 'in_progress' ? 'selected' : '' }}
                            >
                                En progreso
                            </option>
                            <option
                                value="completed"
                                {{ old('status') === 'completed' ? 'selected' : '' }}
                            >
                                Completada
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="{{ route('home') }}" class="form-cancel">
                        Cancelar
                    </a>

                    <button type="submit" class="button button-primary">
                        Guardar actividad
                    </button>
                </div>
            </form>
        </section>

        <p class="form-footnote">
            Bitácoras Semanal · Registro de actividades
        </p>
    </main>
</body>
</html>
