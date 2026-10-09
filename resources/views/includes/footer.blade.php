<!-- Footer Institucional Bootstrap 5 -->
<footer  style="background-color: #ffffff; border-top: 1px solid #fdfdfd; ...">
    <div class="container">
        <div class="row g-4 mb-4">
            
            <!-- Columna 1: Identidad Institucional -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('image/logosena.png') }}" alt="Logo SENA" style="height: 38px; width: auto; object-fit: contain;">
                    <span class="fw-bold fs-5 text-dark">Admin-SENA</span>
                </div>
                <p class="small text-muted mb-3" style="line-height: 1.6;">
                    Servicio Nacional de Aprendizaje • Regional Cauca.<br>
                    Plataforma para la optimización de procesos y gestión formativa integral.
                </p>
                <span class="badge rounded-pill bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 fw-semibold">
                    <i class="bi bi-circle-fill me-1" style="font-size: 8px;"></i> Versión 2.0 Estable
                </span>
            </div>

            <!-- Columna 2: Navegación Rápida -->
            <div class="col-lg-2 col-md-6">
                <h6 class="text-uppercase fw-bold text-dark mb-3 small tracking-wider">Navegación</h6>
                <ul class="list-unstyled small mb-0 d-flex flex-column gap-2">
                    <li>
                        <a href="{{ url('/') }}" class="text-secondary text-decoration-none hover-success d-inline-flex align-items-center gap-2">
                            <i class="bi bi-house text-success"></i> Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('quienes-somos') }}" class="text-secondary text-decoration-none hover-success d-inline-flex align-items-center gap-2">
                            <i class="bi bi-info-circle text-success"></i> ¿Quiénes Somos?
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/area/create') }}" class="text-secondary text-decoration-none hover-success d-inline-flex align-items-center gap-2">
                            <i class="bi bi-grid text-success"></i> Modulos
                        </a>
                    </li>
                    
                </ul>
            </div>

            <!-- Columna 3: Centro de Atención -->
            <div class="col-lg-3 col-md-6">
                <h6 class="text-uppercase fw-bold text-dark mb-3 small tracking-wider">Centro de Atención</h6>
                <ul class="list-unstyled small text-muted mb-0 d-flex flex-column gap-2">
                    <li class="d-flex align-items-start gap-2">
                        <i class="bi bi-geo-alt-fill text-success mt-1"></i>
                        <span>Centro de Teleinformática y Producción Industrial (CTPI)</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="bi bi-envelope-fill text-success"></i>
                        <span>soporte.cauca@sena.edu.co</span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <i class="bi bi-telephone-fill text-success"></i>
                        <span>01 8000 910 270</span>
                    </li>
                </ul>
            </div>

            <!-- Columna 4: Portales Oficiales -->
            <div class="col-lg-3 col-md-6">
                <h6 class="text-uppercase fw-bold text-dark mb-3 small tracking-wider">Portales Oficiales</h6>
                <ul class="list-unstyled small mb-0 d-flex flex-column gap-2">
                    <li>
                        <a href="https://www.sena.edu.co" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none hover-success d-inline-flex align-items-center gap-2">
                            <i class="bi bi-box-arrow-up-right text-muted"></i> Portal Web SENA
                        </a>
                    </li>
                    <li>
                        <a href="https://oferta.senasofiaplus.edu.co" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none hover-success d-inline-flex align-items-center gap-2">
                            <i class="bi bi-box-arrow-up-right text-muted"></i> SOFIA Plus
                        </a>
                    </li>
                    <li>
                        <a href="https://zajuna.sena.edu.co" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none hover-success d-inline-flex align-items-center gap-2">
                            <i class="bi bi-box-arrow-up-right text-muted"></i> Plataforma Zajuna
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Fila Inferior de Copyright -->
        <div class="border-top pt-3 d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 small text-muted">
            <div>
                © {{ date('Y') }} <strong class="text-dark">AdminSENA</strong>. Todos los derechos reservados.
            </div>
            <div>
                Desarrollado para la formación profesional integral.
            </div>
        </div>
    </div>
</footer>

<style>
    .hover-success:hover {
        color: #39A900 !important;
    }
</style>