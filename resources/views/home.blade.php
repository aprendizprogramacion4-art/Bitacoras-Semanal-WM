
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitácoras Semanal | Panel de control</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <a href="#overview" class="brand">
                <span class="brand-mark">B</span>
                <span class="brand-text">
                    <strong>Bitácoras</strong>
                    <small>GESTIÓN SEMANAL</small>
                </span>
            </a>

            <div class="sidebar-section">
                <p class="nav-label">MENÚ PRINCIPAL</p>

                <nav class="sidebar-nav" aria-label="Menú principal">
                    <a href="#overview" class="nav-link active">
                        <span class="nav-icon">⌂</span>
                        Inicio
                    </a>
                    <a href="#recent-activities" class="nav-link">
                        <span class="nav-icon">▤</span>
                        Mis bitácoras
                    </a>
                    <a href="#weekly-summary" class="nav-link">
                        <span class="nav-icon">◷</span>
                        Actividades
                    </a>
                    <a href="#projects" class="nav-link">
                        <span class="nav-icon">▣</span>
                        Proyectos
                    </a>
                    <a href="#weekly-summary" class="nav-link">
                        <span class="nav-icon">▥</span>
                        Reportes
                    </a>
                </nav>
            </div>

            <div class="sidebar-bottom">
                <div class="help-card">
                    <span class="help-icon">?</span>
                    <strong>¿Necesitas ayuda?</strong>
                    <p>Consulta la documentación del sistema para conocer su funcionamiento.</p>
                    <a href="#about">Conocer el sistema →</a>
                </div>

                <div class="sidebar-footer">
                    <span class="online-dot"></span>
                    Versión inicial · MVP
                </div>
            </div>
        </aside>

        <main class="main-content" id="overview">
            <header class="topbar">
                <div class="breadcrumb">
                    <span>Espacio de trabajo</span>
                    <span class="breadcrumb-separator">/</span>
                    <strong>Inicio</strong>
                </div>

                <div class="topbar-right">
                    <span class="today-label">
                        {{ now()->format('d/m/Y') }}
                    </span>
                    <div class="user-avatar" title="Perfil de usuario">U</div>
                    <div class="user-info">
                        <strong>Mi cuenta</strong>
                        <span>Usuario de prueba</span>
                    </div>
                </div>
            </header>

            <div class="page-content">
                @if (session('success'))
    <div class="flash-success" role="status">
        {{ session('success') }}
    </div>
@endif
                <section class="page-heading">
                    <div>
                        <span class="eyebrow">PANEL GENERAL</span>
                        <h1>Panel de control</h1>
                        <p>Organiza, registra y consulta tus actividades semanales.</p>
                    </div>

                    <a class="button button-primary" href="{{ route('activities.create') }}">
                        <span class="button-plus">+</span>
                        Registrar actividad
                    </a>
                </section>

                <section class="welcome-banner">
                    <div class="welcome-copy">
                        <span class="banner-tag">TU ESPACIO DE TRABAJO</span>
                        <h2>¡Organiza tu semana!</h2>
                        <p>
                            Mantén el seguimiento de tus tareas, consulta tus avances
                            y lleva un registro ordenado de tus actividades.
                        </p>
                        <a href="#weekly-summary" class="banner-link">
                            Consultar resumen <span>→</span>
                        </a>
                    </div>

                    <div class="banner-art" aria-hidden="true">
                        <div class="art-circle art-circle-one"></div>
                        <div class="art-circle art-circle-two"></div>
                        <div class="art-document">
                            <div class="document-top"></div>
                            <div class="document-line"></div>
                            <div class="document-line short"></div>
                            <div class="document-check">✓</div>
                            <div class="document-line"></div>
                        </div>
                        <div class="art-check">✓</div>
                    </div>
                </section>

                <div class="section-heading">
                    <div>
                        <h2>Resumen de actividades</h2>
                        <p>Indicadores de ejemplo para esta semana</p>
                    </div>
                    <span class="period-chip">Esta semana</span>
                </div>

                <section class="stats-grid" aria-label="Indicadores semanales">
                    <article class="stat-card">
                        <div class="stat-top">
                            <span class="stat-icon icon-blue">▤</span>
                            <span class="stat-caption">REGISTRO</span>
                        </div>
                        <p class="stat-value">12</p>
                        <h3>Actividades registradas</h3>
                        <p class="stat-description">Total de actividades de ejemplo</p>
                    </article>

                    <article class="stat-card">
                        <div class="stat-top">
                            <span class="stat-icon icon-green">✓</span>
                            <span class="stat-caption">COMPLETADAS</span>
                        </div>
                        <p class="stat-value">8</p>
                        <h3>Actividades completadas</h3>
                        <p class="stat-description">Tareas marcadas como finalizadas</p>
                    </article>

                    <article class="stat-card">
                        <div class="stat-top">
                            <span class="stat-icon icon-orange">◷</span>
                            <span class="stat-caption">PENDIENTES</span>
                        </div>
                        <p class="stat-value">4</p>
                        <h3>Actividades por finalizar</h3>
                        <p class="stat-description">En progreso o pendientes</p>
                    </article>
                </section>

                <section class="content-grid">
                    <article class="panel activities-panel" id="recent-activities">
                        <div class="panel-heading">
                            <div>
                                <h2>Actividades recientes</h2>
                                <p>Consulta los últimos registros de ejemplo.</p>
                            </div>
                            <a href="#weekly-summary" class="text-link">Ver resumen →</a>
                        </div>

                        <div class="table-wrapper">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ACTIVIDAD</th>
                                        <th>PROYECTO</th>
                                        <th>FECHA</th>
                                        <th>ESTADO</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
    @forelse ($activities as $activity)
        <tr>
            <td>
                <div class="activity-name">
                    <span class="activity-dot
                        {{ $activity->status === 'completed' ? 'dot-green' : ($activity->status === 'pending' ? 'dot-orange' : 'dot-blue') }}">
                    </span>
                    <span>
                        <strong>{{ $activity->title }}</strong>
                        <small>{{ $activity->description ?: 'Sin descripción' }}</small>
                    </span>
                </div>
            </td>

            <td>{{ $activity->project }}</td>
            <td>{{ $activity->activity_date->format('d/m/Y') }}</td>

            <td>
                @if ($activity->status === 'completed')
                    <span class="status status-complete">Completada</span>
                @elseif ($activity->status === 'in_progress')
                    <span class="status status-progress">En progreso</span>
                @else
                    <span class="status status-pending">Pendiente</span>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="empty-state">
                No hay actividades registradas para esta semana.
                <a href="{{ route('activities.create') }}">
                    Registrar la primera actividad.
                </a>
            </td>
        </tr>
    @endforelse
                            </tbody>

                            </table>
                        </div>

                        <p class="demo-note">
                            Datos ilustrativos: aún no están conectados con la base de datos.
                        </p>
                    </article>

                    <aside class="panel progress-panel" id="weekly-summary">
                        <div class="panel-heading">
                            <div>
                                <h2>Progreso semanal</h2>
                                <p>Resumen de ejemplo</p>
                            </div>
                            <span class="progress-icon">↗</span>
                        </div>

                        <div class="progress-summary">
                            <div class="progress-ring">
                                <div class="progress-ring-inner">
                                    <strong>67%</strong>
                                    <span>Completado</span>
                                </div>
                            </div>
                        </div>

                        <div class="progress-details">
                            <div>
                                <span class="legend-dot legend-green"></span>
                                <span>Completadas</span>
                                <strong>8</strong>
                            </div>
                            <div>
                                <span class="legend-dot legend-orange"></span>
                                <span>Por finalizar</span>
                                <strong>4</strong>
                            </div>
                        </div>

                        <div class="progress-footer">
                            <span>Objetivo semanal</span>
                            <strong>12 actividades</strong>
                        </div>
                    </aside>
                </section>

                <section class="projects-section" id="projects">
                    <div class="section-heading">
                        <div>
                            <h2>Proyectos en seguimiento</h2>
                            <p>Organiza tus actividades por área de trabajo.</p>
                        </div>
                    </div>

                    <div class="projects-grid">
                        <article class="project-card">
                            <span class="project-icon project-blue">▣</span>
                            <div>
                                <h3>Plataformas corporativas</h3>
                                <p>Revisión y validación funcional.</p>
                                <span class="project-label">Seguimiento</span>
                            </div>
                        </article>

                        <article class="project-card">
                            <span class="project-icon project-purple">▤</span>
                            <div>
                                <h3>Documentación</h3>
                                <p>Bitácoras e informes de actividades.</p>
                                <span class="project-label">Seguimiento</span>
                            </div>
                        </article>

                        <article class="project-card">
                            <span class="project-icon project-green">▧</span>
                            <div>
                                <h3>Módulo de préstamos</h3>
                                <p>Revisión de flujo y requerimientos.</p>
                                <span class="project-label">Seguimiento</span>
                            </div>
                        </article>
                    </div>
                </section>

                <footer class="page-footer" id="about">
                    <span>Bitácoras Semanal · Sistema de seguimiento de actividades</span>
                    <span>Versión inicial de desarrollo</span>
                </footer>
            </div>
        </main>
    </div>
</body>
</html>
