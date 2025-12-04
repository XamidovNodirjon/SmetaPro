<!DOCTYPE html>
<html lang="uz" class="scroll-smooth">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Smeta.uz – Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .active-tab {
            background: linear-gradient(90deg, #2563eb 0%, #059669 100%);
            color: white;
            box-shadow: 0 8px 30px rgba(5, 150, 105, 0.12);
        }

        .icon-rotate {
            transition: transform .25s ease;
        }

    </style>
</head>
<!-- HEADER -->
<header class="w-full bg-white dark:bg-gray-800 shadow px-4 py-3 flex items-center justify-between fixed top-0 left-0 z-50">

    <!-- Logo -->
    <!-- Mobile Menu Button (LEFT side) -->
    <button id="sidebarToggle" class="md:hidden p-2 bg-gray-200 dark:bg-gray-700 rounded-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <div class="text-xl font-bold text-gray-800 dark:text-white">
        MyAdmin
    </div>

    <!-- Actions -->
    <div class="flex items-center gap-4">

        <!-- Dark Mode Toggle -->
        <button id="themeToggle" class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
            <svg id="sunIcon" class="w-6 h-6 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M7.05 
                    16.95l-1.414 1.414m12.728 0l-1.414-1.414M7.05 
                    7.05L5.636 5.636M12 8a4 4 0 110 8 4 4 0 010-8z" />
            </svg>

            <svg id="moonIcon" class="w-6 h-6 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z" />
            </svg>
        </button>

        <!-- Notification Bell -->
        <button class="relative p-2 rounded-lg bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 
                      6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 
                      6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 
                      0 11-6 0v-1m6 0H9" />
            </svg>

            <!-- Badge -->
            <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full"></span>
        </button>

        <!-- User Dropdown -->
        <div class="relative">
            <button id="userMenuBtn" class="flex items-center gap-2 p-1 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700">
                <img src="https://i.pravatar.cc/40" class="w-9 h-9 rounded-full" alt="User">
                <span class="hidden md:block text-gray-800 dark:text-gray-200">John Doe</span>
            </button>

            <!-- Dropdown -->
            <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200">Profile</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200">Account Settings</a>
                <button onclick="alert('Logout!')" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-600">
                    Logout
                </button>
            </div>
        </div>

    </div>
    

</header>
<script>
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

    </script>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 text-gray-800 transition-colors duration-200 pt-[60px]">

    <div id="app" class="min-h-screen flex">

        <aside id="sidebar" class="w-64 bg-white dark:bg-slate-900 border-r border-gray-100 dark:border-slate-800 shadow-xl
           fixed inset-y-0 left-0 z-40 transform -translate-x-full transition-transform duration-300 md:translate-x-0">

            <div class="p-6">
                <div class="text-2xl font-extrabold mb-6 flex items-center gap-1">
                    <span class="text-blue-600 dark:text-blue-400">Smeta</span><span class="text-emerald-600 dark:text-emerald-400">.uz</span>
                </div>

                <nav class="space-y-2" aria-label="Main navigation">
                    <button data-tab="dashboard" id="tab-dashboard" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-800 transition">
                        <svg class="w-5 h-5 flex-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10.5L12 4l9 6.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1V10.5z" /></svg>
                        <span>Dashboard</span>
                    </button>

                    <button data-tab="projects" id="tab-projects" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-800 transition">
                        <svg class="w-5 h-5 flex-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h6v6H7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 3H7a2 2 0 0 0-2 2v14l5-3h7a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z" /></svg>
                        <span>Loyihalarim</span>
                    </button>

                    <button data-tab="statistics" id="tab-statistics" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-800 transition">
                        <!-- Chart SVG -->
                        <svg class="w-5 h-5 flex-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3v18h18" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13v6M13 7v12M17 3v16" /></svg>
                        <span>Statistika</span>
                    </button>

                    <button data-tab="settings" id="tab-settings" class="tab-btn w-full flex items-center gap-3 px-4 py-3 rounded-xl font-semibold text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-slate-800 transition">
                        <!-- Cog SVG -->
                        <svg class="w-5 h-5 flex-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15.5A3.5 3.5 0 1 0 12 8.5a3.5 3.5 0 0 0 0 7z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.4 15a1.8 1.8 0 0 0 .33 1.94l.06.06a1 1 0 0 1-1.42 1.42l-.06-.06a1.8 1.8 0 0 0-1.94-.33 1.8 1.8 0 0 0-1 1.6V20a1 1 0 0 1-2 0v-.08a1.8 1.8 0 0 0-1-1.6 1.8 1.8 0 0 0-1.94.33l-.06.06A1 1 0 0 1 5.3 18.0l.06-.06a1.8 1.8 0 0 0 .33-1.94 1.8 1.8 0 0 0-1.6-1H4a1 1 0 0 1 0-2h.08a1.8 1.8 0 0 0 1.6-1 1.8 1.8 0 0 0-.33-1.94L5.3 8.3a1 1 0 0 1 1.42-1.42l.06.06a1.8 1.8 0 0 0 1.94.33h.01A1.8 1.8 0 0 0 11 6.1V6a1 1 0 0 1 2 0v.08a1.8 1.8 0 0 0 1 1.6 1.8 1.8 0 0 0 1.94-.33l.06-.06A1 1 0 0 1 18.7 9.7l-.06.06a1.8 1.8 0 0 0-.33 1.94 1.8 1.8 0 0 0 1.6 1H20a1 1 0 0 1 0 2h-.08a1.8 1.8 0 0 0-1.6 1z" /></svg>
                        <span>Sozlamalar</span>
                    </button>
                </nav>
            </div>

            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-100 dark:border-slate-800 bg-white dark:bg-slate-900">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold">MN</div>
                    <div>
                        <div class="font-bold text-gray-800 dark:text-gray-100">Muhammadnabi</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400">Bepul tarif</div>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button id="logout-btn" class="flex-1 flex items-center justify-center gap-2 px-4 py-2 text-red-600 bg-red-50 hover:bg-red-100 rounded-lg font-semibold transition">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8v8" /></svg>
                        <span>Chiqish</span>
                    </button>

                    <button id="theme-toggle-sidebar" class="w-12 h-10 rounded-lg bg-gray-100 dark:bg-slate-800 flex items-center justify-center" aria-label="Toggle theme">
                        <svg id="sidebar-theme-icon" class="w-5 h-5 text-gray-600 dark:text-gray-200" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1M12 20v1M4.2 4.2l.7.7M19.1 19.1l.7.7M1 12h1M22 12h1M4.2 19.8l.7-.7M19.1 4.9l.7-.7M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10z" />
                        </svg>
                    </button>
                </div>
            </div>
        </aside>

        <main class="flex-1 md:ml-64 p-8">
            <header class="mb-8 flex items-center justify-between">
                <div>
                    <h1 id="page-title" class="text-4xl font-extrabold text-gray-900 dark:text-gray-100 mb-2">Dashboard</h1>
                    <p class="text-gray-600 dark:text-gray-300">Xush kelibsiz! Bugun yangi smeta yaratasizmi?</p>
                </div>

                <div class="flex items-center gap-4">
                    <button id="new-project-btn" class="hidden flex items-center gap-2 bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg hover:scale-105 transition">
                        <!-- Plus icon -->
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 5v14M5 12h14" /></svg>
                        <span>Yangi loyiha</span>
                    </button>
                </div>
            </header>

            <section id="content-dashboard">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-lg border dark:border-slate-700 hover:shadow-xl transition">
                        <div class="flex justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center text-blue-600 text-2xl">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h6v6H7z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 3H7a2 2 0 0 0-2 2v14l5-3h7a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z" /></svg>
                            </div>
                            <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">+12%</span>
                        </div>
                        <div class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 mb-1">2</div>
                        <div class="text-gray-600 dark:text-gray-300 font-medium">Jami loyihalar</div>
                    </div>

                    <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-lg border dark:border-slate-700 hover:shadow-xl transition">
                        <div class="flex justify-between mb-4">
                            <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center text-emerald-600 text-2xl">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-3.866 0-7 1.79-7 4s3.134 4 7 4 7-1.79 7-4-3.134-4-7-4z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v4" /></svg>
                            </div>
                            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Aktiv</span>
                        </div>
                        <div class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 mb-1">1.17 mlrd</div>
                        <div class="text-gray-600 dark:text-gray-300 font-medium">Umumiy qiymat</div>
                    </div>

                    <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-lg border dark:border-slate-700 hover:shadow-xl transition">
                        <div class="flex justify-between mb-4">
                            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center text-purple-600 text-2xl">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" /></svg>
                            </div>
                            <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Bepul</span>
                        </div>
                        <div class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 mb-1">1/1</div>
                        <div class="text-gray-600 dark:text-gray-300 font-medium">Loyiha limiti</div>
                    </div>

                    <div class="bg-white dark:bg-slate-800 rounded-2xl p-6 shadow-lg border dark:border-slate-700 hover:shadow-xl transition">
                        <div class="flex justify-between mb-4">
                            <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-xl flex items-center justify-center text-orange-600 text-2xl">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <rect x="3" y="4" width="18" height="18" rx="2" />
                                    <path d="M16 2v4M8 2v4M3 10h18" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" /></svg>
                            </div>
                            <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">Oxirgi</span>
                        </div>
                        <div class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 mb-1">2 kun</div>
                        <div class="text-gray-600 dark:text-gray-300 font-medium">Oldin yaratilgan</div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-blue-600 to-emerald-500 p-8 rounded-3xl mt-8 text-white shadow-xl">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                        <div>
                            <h2 class="text-3xl font-extrabold mb-2">Premium tarifga o'ting!</h2>
                            <p class="opacity-90 text-lg">Cheksiz loyihalar, kengaytirilgan hisobotlar va ko'proq imkoniyatlar</p>
                        </div>
                        <button class="bg-white text-blue-700 px-6 py-3 rounded-xl font-bold text-lg hover:scale-105 transition">Premium olish</button>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 rounded-2xl p-8 shadow-lg border dark:border-slate-700 mt-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-gray-100">So'nggi loyihalar</h2>
                        <button data-tab="projects" class="text-blue-600 dark:text-blue-400 font-semibold hover:text-blue-700 transition">Barchasini ko‘rish →</button>
                    </div>

                    <div class="space-y-4">
                        <div class="project-item flex items-center justify-between p-5 bg-gray-50 dark:bg-slate-900/40 rounded-xl border dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-900/60 cursor-pointer transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-emerald-500 text-white rounded-xl flex items-center justify-center text-xl font-bold">Y</div>
                                <div>
                                    <div class="font-bold text-gray-900 dark:text-gray-100">Yaşayış binosi loyihasi</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">Qurilish • 45 element</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-gray-900 dark:text-gray-100">850 000 000 so‘m</div>
                                <div class="bg-emerald-100 text-emerald-700 text-xs px-3 py-1 rounded-full inline-block mt-1 font-semibold">Tugallangan</div>
                            </div>
                        </div>

                        <div class="project-item flex items-center justify-between p-5 bg-gray-50 dark:bg-slate-900/40 rounded-xl border dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-900/60 cursor-pointer transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-emerald-500 text-white rounded-xl flex items-center justify-center text-xl font-bold">O</div>
                                <div>
                                    <div class="font-bold text-gray-900 dark:text-gray-100">Ofis binosi ta'miri</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">Ta'mirlash • 28 element</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-gray-900 dark:text-gray-100">320 000 000 so‘m</div>
                                <div class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full inline-block mt-1 font-semibold">Jarayonda</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="content-projects" class="hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border dark:border-slate-700">
                        <div class="flex justify-between mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Yaşayış binosi loyihasi</h3>
                                <div class="flex gap-2 text-sm text-gray-600 dark:text-gray-300">📅 <span>2024-12-01</span></div>
                            </div>
                            <div class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full">Tugallangan</div>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between"><span class="text-gray-600 dark:text-gray-300">Kategoriya:</span><span class="font-semibold">Qurilish</span></div>
                            <div class="flex justify-between"><span class="text-gray-600 dark:text-gray-300">Elementlar:</span><span class="font-semibold">45 ta</span></div>
                            <div class="flex justify-between"><span class="text-gray-600 dark:text-gray-300">Umumiy qiymat:</span><span class="font-bold text-emerald-600">850 000 000 so‘m</span></div>
                        </div>

                        <div class="flex gap-2">
                            <button class="flex-1 bg-blue-600 text-white px-4 py-3 rounded-xl font-semibold">Ko‘rish</button>
                            <button class="bg-emerald-600 text-white px-4 py-3 rounded-xl">⬇</button>
                            <button class="bg-orange-600 text-white px-4 py-3 rounded-xl">✏️</button>
                            <button class="bg-red-600 text-white px-4 py-3 rounded-xl">🗑</button>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border dark:border-slate-700">
                        <div class="flex justify-between mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Ofis binosi ta'miri</h3>
                                <div class="flex gap-2 text-sm text-gray-600 dark:text-gray-300">📅 <span>2024-11-28</span></div>
                            </div>
                            <div class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">Jarayonda</div>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between"><span class="text-gray-600 dark:text-gray-300">Kategoriya:</span><span class="font-semibold">Ta'mirlash</span></div>
                            <div class="flex justify-between"><span class="text-gray-600 dark:text-gray-300">Elementlar:</span><span class="font-semibold">28 ta</span></div>
                            <div class="flex justify-between"><span class="text-gray-600 dark:text-gray-300">Umumiy qiymat:</span><span class="font-bold text-emerald-600">320 000 000 so‘m</span></div>
                        </div>

                        <div class="flex gap-2">
                            <button class="flex-1 bg-blue-600 text-white px-4 py-3 rounded-xl font-semibold">Ko‘rish</button>
                            <button class="bg-emerald-600 text-white px-4 py-3 rounded-xl">⬇</button>
                            <button class="bg-orange-600 text-white px-4 py-3 rounded-xl">✏️</button>
                            <button class="bg-red-600 text-white px-4 py-3 rounded-xl">🗑</button>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content-statistics" class="hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg border dark:border-slate-700">
                        <h3 class="text-xl font-bold mb-6 text-gray-900 dark:text-gray-100">Oylik statistika</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between bg-blue-50 dark:bg-blue-900/20 p-4 rounded-xl">
                                <span class="text-gray-700 dark:text-gray-200">Dekabr 2024</span>
                                <span class="text-2xl font-extrabold text-blue-600 dark:text-blue-300">2</span>
                            </div>
                            <div class="flex justify-between bg-gray-50 dark:bg-slate-900/40 p-4 rounded-xl">
                                <span class="text-gray-700 dark:text-gray-200">Noyabr 2024</span>
                                <span class="text-2xl font-extrabold">0</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg border dark:border-slate-700">
                        <h3 class="text-xl font-bold mb-6 text-gray-900 dark:text-gray-100">Kategoriya bo‘yicha</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between bg-emerald-50 dark:bg-emerald-900/10 p-4 rounded-xl">
                                <span class="text-gray-700 dark:text-gray-200">Qurilish</span>
                                <span class="text-2xl font-extrabold text-emerald-600 dark:text-emerald-300">1</span>
                            </div>
                            <div class="flex justify-between bg-purple-50 dark:bg-purple-900/10 p-4 rounded-xl">
                                <span class="text-gray-700 dark:text-gray-200">Ta’mirlash</span>
                                <span class="text-2xl font-extrabold text-purple-600 dark:text-purple-300">1</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="content-settings" class="hidden">
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg border dark:border-slate-700 mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">Profil ma’lumotlari</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold mb-2 dark:text-gray-200">Ism</label>
                            <input id="input-name" class="w-full px-4 py-3 border-2 rounded-xl border-gray-200 dark:border-slate-700 focus:border-blue-500 outline-none bg-white dark:bg-slate-900 text-gray-800 dark:text-gray-100" value="Muhammadnabi">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold mb-2 dark:text-gray-200">Email</label>
                            <input id="input-email" class="w-full px-4 py-3 border-2 rounded-xl border-gray-200 dark:border-slate-700 focus:border-blue-500 outline-none bg-white dark:bg-slate-900 text-gray-800 dark:text-gray-100" value="muhammadnabi@example.com">
                        </div>

                        <button id="save-profile" class="bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-8 py-3 rounded-xl font-bold shadow hover:scale-105 transition">Saqlash</button>
                    </div>
                </div>

                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg border dark:border-slate-700">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-6">Tarif rejasi</h3>
                    <div class="flex items-center justify-between p-6 bg-gray-50 dark:bg-slate-900/40 rounded-xl border-2 border-gray-200 dark:border-slate-700">
                        <div>
                            <div class="text-2xl font-extrabold text-gray-900 dark:text-gray-100">Bepul tarif</div>
                            <div class="text-gray-600 dark:text-gray-300">1 ta bepul loyiha</div>
                        </div>

                        <button class="bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-8 py-3 rounded-xl font-bold shadow hover:scale-105 transition">Premium olish</button>
                    </div>
                </div>
            </section>

        </main>
    </div>
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
        <div class="bg-white dark:bg-slate-800 rounded-3xl p-6 max-w-lg w-full shadow-xl">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-extrabold text-gray-900 dark:text-gray-100">Yangi loyiha</h2>
                <button class="text-gray-500 dark:text-gray-300 text-2xl font-bold hover:text-gray-700" id="modal-close">×</button>
            </div>

            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 border border-orange-200 dark:border-orange-800 rounded-xl mb-4">
                <div class="font-bold text-orange-900 dark:text-orange-200 mb-1">Bepul limit tugadi</div>
                <div class="text-orange-800 dark:text-orange-300 text-sm">Ikkinchi loyiha uchun premium oling.</div>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block font-bold mb-2 dark:text-gray-200">Loyiha nomi *</label>
                    <input id="project-name" disabled class="w-full px-4 py-3 border-2 rounded-xl border-gray-200 bg-gray-100 dark:bg-slate-900/30 dark:border-slate-700 outline-none">
                </div>

                <div>
                    <label class="block font-bold mb-2 dark:text-gray-200">Kategoriya *</label>
                    <select id="project-category" disabled class="w-full px-4 py-3 border-2 rounded-xl border-gray-200 bg-gray-100 dark:bg-slate-900/30 dark:border-slate-700 outline-none">
                        <option>Kategoriyani tanlang</option>
                    </select>
                </div>

                <div class="flex gap-4 pt-4">
                    <button disabled class="flex-1 bg-gray-300 py-3 rounded-xl font-bold text-gray-500">Premium kerak</button>
                    <button id="modal-cancel" class="px-6 py-3 border rounded-xl font-bold">Bekor qilish</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('Javascript/app.js') }}"></script> --}}
    <script>
        const tabs = document.querySelectorAll('.tab-btn');

        const contents = {
            dashboard: document.getElementById('content-dashboard'), 
            projects: document.getElementById('content-projects'), 
            statistics: document.getElementById('content-statistics'), 
            settings: document.getElementById('content-settings'), };

        const pageTitle = document.getElementById('page-title');
        const newProjectBtn = document.getElementById('new-project-btn');

        const modal = document.getElementById('modal');
        const modalClose = document.getElementById('modal-close');
        const modalCancel = document.getElementById('modal-cancel');

        const logoutBtn = document.getElementById('logout-btn');

        function setActiveTab(tab) {
            const titles = {
                dashboard: 'Dashboard',
                projects: 'Mening loyihalarim',
                statistics: 'Statistika',
                settings: 'Sozlamalar', 
                };

            pageTitle.innerText = titles[tab] || 'Dashboard';

            if (newProjectBtn) newProjectBtn.classList.toggle('hidden', tab !== 'projects');

            for (const [key, el] of Object.entries(contents)) {
                if (!el) continue;
                el.classList.toggle('hidden', key !== tab);
            }

            tabs.forEach(btn => {
                btn.classList.toggle('active-tab', btn.dataset.tab === tab);
            });

            if (history.replaceState) history.replaceState(null, '', `#${tab}`);
        }

        tabs.forEach(btn =>
            btn.addEventListener('click', () => setActiveTab(btn.dataset.tab))
        );

        const initialTab = (location.hash && location.hash.substring(1)) || 'dashboard';
        setActiveTab(initialTab);

        function openModal() {
            if (!modal) return;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            if (!modal) return;
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        newProjectBtn?.addEventListener('click', openModal);
        modalClose?.addEventListener('click', closeModal);
        modalCancel?.addEventListener('click', closeModal);

        modal?.addEventListener('click', e => {
            if (e.target === modal) closeModal();
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        function showToast(title, text = '') {
            const t = document.createElement('div');
            t.className =
                'fixed right-6 bottom-6 bg-white dark:bg-slate-800 text-gray-900 dark:text-gray-100 px-4 py-3 rounded-lg shadow-lg border dark:border-slate-700 transition-all duration-500';
            t.innerHTML = `
            <div class="font-semibold">${title}</div>
            <div class="text-sm mt-1">${text}</div>
        `;
            document.body.appendChild(t);

            setTimeout(() => t.classList.add('opacity-0', 'translate-y-4'), 2000);
            setTimeout(() => t.remove(), 3000);
        }

        document.querySelectorAll('.project-item').forEach(item => {
            item.addEventListener('click', () => {
                setActiveTab('projects');
                showToast('Loyiha ochildi', 'Siz loyihani ko‘ryapsiz (demo).');
            });
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Tab') document.body.classList.add('user-is-tabbing');
        });

    </script>

</body>
</html>
