<!-- Navbar -->
<nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-tan-dark/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-xl font-extrabold text-coffee-dark tracking-tighter">
                    <i class="fas fa-mug-hot mr-2 text-mocha-light text-2xl"></i>
                    Barista Admin
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden sm:flex sm:space-x-4 lg:space-x-8 items-center">

                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link bg-cream-bg shadow-md text-coffee-dark font-semibold py-2 px-4 rounded-xl">
                    Dashboard
                </a>

                <a href="{{ route('admin.alat_kopi.create') }}" 
                   class="nav-link bg-cream-bg/60 shadow-sm text-tan-dark/70 font-medium py-2 px-4 rounded-xl hover:bg-cream-bg hover:text-coffee-dark">
                    Daftarkan Alat Kopi
                </a>

                <a href="{{ route('admin.event.create') }}" 
                   class="nav-link bg-cream-bg/60 shadow-sm text-tan-dark/70 font-medium py-2 px-4 rounded-xl hover:bg-cream-bg hover:text-coffee-dark">
                    Tambahkan Event
                </a>

                <a href="{{ route('admin.forum.create') }}" 
                   class="nav-link bg-cream-bg/60 shadow-sm text-tan-dark/70 font-medium py-2 px-4 rounded-xl hover:bg-cream-bg hover:text-coffee-dark">
                    Tambahkan Forum
                </a>

                <!-- Kelola Kedai Kopi -->
                <a href="{{ route('admin.kedai.index') }}" 
                   class="nav-link bg-cream-bg/60 shadow-sm text-tan-dark/70 font-medium py-2 px-4 rounded-xl hover:bg-cream-bg hover:text-coffee-dark">
                    Kelola Kedai Kopi
                </a>
            </div>

            <!-- Profile -->
            <div class="flex items-center">

                <div class="relative hidden sm:block">

                    <!-- Button -->
                    <button type="button" onclick="toggleDropdown()"
                            class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none">

                        <div class="w-8 h-8 rounded-full bg-mocha-light flex items-center justify-center text-white font-semibold text-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <span class="ml-2 text-tan-dark/80 font-medium hidden lg:inline">
                            {{ Auth::user()->name }}
                        </span>
                    </button>

                    <!-- Dropdown -->
                    <div id="dropdown-menu"
                         class="absolute right-0 mt-2 w-48 rounded-xl shadow-xl bg-white hidden transition-all duration-200 transform scale-95 opacity-0">

                        <a href="#" class="block px-4 py-2 text-sm text-tan-dark/70 hover:bg-cream-bg">Profil Anda</a>
                        <a href="#" class="block px-4 py-2 text-sm text-tan-dark/70 hover:bg-cream-bg">Pengaturan</a>

                        <a href="{{ route('logout') }}"
                           class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-xl">
                            Keluar
                        </a>
                    </div>

                </div>

                <!-- Mobile Menu Button -->
                <button type="button" onclick="toggleMobileMenu()" class="sm:hidden p-2 rounded-md">
                    <i class="fas fa-bars h-6 w-6" id="menu-icon"></i>
                </button>

            </div>

        </div>
    </div>
</nav>

<!-- DROPDOWN SCRIPT -->
<script>
function toggleDropdown() {
    const menu = document.getElementById('dropdown-menu');

    if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
        menu.classList.remove('opacity-0', 'scale-95');
        menu.classList.add('opacity-100', 'scale-100');
    } else {
        menu.classList.add('opacity-0', 'scale-95');
        setTimeout(() => menu.classList.add('hidden'), 150);
    }
}
</script>
