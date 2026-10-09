 <!-- 1. Barra de Navegación -->
<style>
    .btn-sena-pill {
        background-color: #39A900;
        color: #ffffff !important;
        border-radius: 9999px;
        font-weight: 700;
        padding: 0.55rem 1.4rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        border: none;
        transition: all 0.2s ease;
    }

    .btn-sena-pill:hover {
        background-color: #2f8b00;
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(57, 169, 0, 0.3);
    }

    header nav a,
    header nav a:hover,
    header nav a:focus {
        text-decoration: none !important;
    }
</style>

        <header class="bg-white border-bottom border-light sticky-top z-3">
            <div class="container-xl px-4 py-3 d-flex align-items-center justify-content-between">
                
                <div class="d-flex align-items-center gap-4 gap-lg-5">
                    <a href="{{ url('/') }}" class="d-flex align-items-center gap-2">
                        <img src="{{ asset('image/logosena.png') }}" alt="Logo SENA" style="height: 45px; width: auto; object-fit: contain;">
                        <span class="fs-4 fw-black text-[#ffffff]" style="font-weight: 900; color: #00324D;">Admin<span style="color: #39A900;">SENA</span></span>
                    </a>

                    <nav class="d-none d-md-flex align-items-center gap-4 text-sm fw-semibold">

                        <a href="{{ route('home') }}" class="text-secondary hover-sena">Inicio</a>
                        
                        <a href="{{ route('quienes-somos') }}" class="text-secondary hover-sena">¿Quiénes Somos?</a>

                        <!-- Dropdown Gestión Base -->
                        <div class="dropdown">
                            <a class="dropdown-toggle text-secondary" href="#" role="button" data-bs-toggle="dropdown">
                                Gestión Base
                            </a>
                            <ul class="dropdown-menu border-0 shadow-lg rounded-4 p-2">
                                <li><a class="dropdown-item rounded-3 py-2 small fw-semibold" href="{{ url('/area/create') }}">📚 Áreas</a></li>
                                <li><a class="dropdown-item rounded-3 py-2 small fw-semibold" href="{{ url('/training-center/create') }}">🏢 Centros de Formación</a></li>
                                <li><a class="dropdown-item rounded-3 py-2 small fw-semibold" href="{{ url('/computer/create') }}">💻Computadores</a></li>
                            </ul>
                        </div>

                        <!-- Dropdown Operación Académica -->
                        <div class="dropdown">
                            <a class="dropdown-toggle text-secondary" href="#" role="button" data-bs-toggle="dropdown">
                                Operación Académica
                            </a>
                            <ul class="dropdown-menu border-0 shadow-lg rounded-4 p-2">
                                <li><a class="dropdown-item rounded-3 py-2 small fw-semibold" href="{{ url('/course/create') }}">✏️ Cursos</a></li>
                                <li><a class="dropdown-item rounded-3 py-2 small fw-semibold" href="{{ url('/teacher/create') }}">👨‍🏫 Instructores</a></li>
                                <li><a class="dropdown-item rounded-3 py-2 small fw-semibold" href="{{ url('/apprentice/create') }}">🧑‍💻 Aprendices</a></li>
                                <li><a class="dropdown-item rounded-3 py-2 small fw-semibold" href="{{ url('/ambients/create') }}">🏫 Ambientes</a></li>
                            </ul>
                        </div>
                        
                    </nav>
                </div>
                <br>
                <!-- Búsqueda y Sesión -->
                <div class="d-flex align-items-center gap-3">
                    <div class="d-none d-sm-flex align-items-center bg-light rounded-pill px-3 py-1 border">
                        <input type="text" placeholder="Buscar..." class="bg-transparent border-0 outline-none text-secondary" style="font-size: 0.8rem; width: 140px; outline: none;">
                        <button class="btn btn-sm rounded-circle p-0 d-flex align-items-center justify-content-center text-white" style="background: #39A900; width: 24px; height: 24px;">
                            <i class="bi bi-search" style="font-size: 0.65rem;"></i>
                        </button>
                    </div>

                    <a href="/login" class="btn-sena-pill" style="font-size: 0.8rem;">
                        <i class="bi bi-person-fill"></i>
                        <span>Cerrar sesión</span>
                        
                    </a>
                </div>

            </div>
        </header>