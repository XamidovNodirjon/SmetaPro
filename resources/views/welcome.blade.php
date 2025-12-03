<!DOCTYPE html>
<html lang="uz" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smeta.uz – Avtomatik Smeta Yaratuvchi Platforma</title>
    <meta name="description" content="O‘zbekistonda birinchi avtomatik smeta tizimi. O‘zingiz loyiha kiriting → darhol tayyor smeta oling!">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .hero-bg { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-12px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .btn-primary { background: linear-gradient(to right, #3b82f6, #10b981); }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(59, 130, 246, 0.3); }
        .glass { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade { animation: fadeInUp 0.8s ease-out forwards; }
    </style>
</head>
<body class="bg-white text-gray-800">

<!-- Navbar -->
<nav class="fixed top-0 w-full bg-white/90 backdrop-blur-lg shadow-sm z-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
        <div class="text-3xl font-black">
            <span class="text-blue-600">Smeta</span><span class="text-emerald-600">.uz</span>
        </div>
        <div class="flex items-center gap-8">
            <a href="#features" class="hidden md:block text-gray-700 hover:text-blue-600 font-medium transition">Imkoniyatlar</a>
            <a href="#pricing" class="hidden md:block text-gray-700 hover:text-blue-600 font-medium transition">Narxlar</a>
            <a href="" class="text-gray-700 font-semibold hover:text-blue-600 transition">Kirish</a>
            <a href="{{ route('get.register') }}" class="bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-7 py-3 rounded-xl font-bold shadow-lg btn-primary transition">
                Bepul boshlash
            </a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-bg pt-32 pb-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="animate-fade">
                <div class="inline-block bg-blue-50 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold mb-6">
                    O‘zbekistonda №1 avtomatik smeta platformasi
                </div>
                <h1 class="text-5xl md:text-6xl font-black text-gray-900 leading-tight mb-6">
                    30 soniyada <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-emerald-500">professional smeta</span> yarating
                </h1>
                <p class="text-xl text-gray-600 mb-10 leading-relaxed">
                    Endi smeta mutaxassisi kerak emas. Loyihangizni kiriting — avtomatik hisoblanadi → PDF, Excel, materiallar ro‘yxati tayyor!
                </p>
                <div class="flex flex-col sm:flex-row gap-5">
                    <a href="" class="bg-gradient-to-r from-blue-600 to-emerald-500 text-white px-10 py-5 rounded-2xl text-xl font-bold shadow-xl btn-primary text-center">
                        Hoziroq bepul sinab ko‘rish
                    </a>
                    <a href="#demo" class="bg-white border-2 border-gray-300 text-gray-800 px-10 py-5 rounded-2xl text-xl font-bold hover:border-blue-500 hover:shadow-lg transition text-center">
                        Demo ko‘rish
                    </a>
                </div>

                <!-- Trust badges -->
                <div class="flex items-center gap-10 mt-12">
                    <div class="text-center">
                        <div class="text-4xl font-black text-blue-600">12,000+</div>
                        <div class="text-gray-600">yaratilgan smeta</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-black text-emerald-600">4.9 ★</div>
                        <div class="text-gray-600">foydalanuvchi bahosi</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-black text-purple-600">24/7</div>
                        <div class="text-gray-600">avtomatik ishlaydi</div>
                    </div>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="animate-fade" style="animation-delay: 0.3s;">
                <div class="glass rounded-3xl p-6 shadow-2xl card-hover">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=600&fit=crop&crop=center" 
                         alt="Smeta platformasi interfeysi" 
                         class="w-full rounded-2xl shadow-xl border border-gray-200">
                    <div class="mt-6 grid grid-cols-3 gap-4 text-center">
                        <div class="bg-blue-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-blue-600">87%</div>
                            <div class="text-sm text-gray-700">Tezroq</div>
                        </div>
                        <div class="bg-emerald-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-emerald-600">99.9%</div>
                            <div class="text-sm text-gray-700">Aniqlik</div>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-xl">
                            <div class="text-2xl font-bold text-purple-600">24/7</div>
                            <div class="text-sm text-gray-700">Ishlaydi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section id="features" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-black mb-4">Nega minglab quruvchilar bizni tanlaydi?</h2>
            <p class="text-xl text-gray-600">Hech qanday odam kerak emas — hammasi avtomatik</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="bg-white p-10 rounded-3xl shadow-lg card-hover border border-gray-100">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6">
                    <span class="text-3xl">Chart</span>
                </div>
                <h3 class="text-2xl font-bold mb-4">Avtomatik hisoblash</h3>
                <p class="text-gray-600">Devor, tom, pol — hamma narsa avtomatik hisoblanadi</p>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-lg card-hover border border-gray-100">
                <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center mb-6">
                    <span class="text-3xl">File</span>
                </div>
                <h3 class="text-2xl font-bold mb-4">Tayyor hujjatlar</h3>
                <p class="text-gray-600">PDF, Excel, davlat shakllari — hammasi bir klikda</p>
            </div>
            <div class="bg-white p-10 rounded-3xl shadow-lg card-hover border border-gray-100">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-6">
                    <span class="text-3xl">Update</span>
                </div>
                <h3 class="text-2xl font-bold mb-4">Narxlar har kuni yangilanadi</h3>
                <p class="text-gray-600">Bozor narxlari avtomatik yangilanadi — aldanish yo‘q</p>
            </div>
        </div>
    </div>
</section>

<!-- Screenshot Gallery -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-5xl font-black mb-16">Platforma ichidan ko‘rinish</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <img src="https://images.unsplash.com/photo-1558655146-9f40138ed1cb?w=600&h=500&fit=crop" alt="Dashboard" class="rounded-2xl shadow-2xl card-hover border">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=500&fit=crop" alt="Smeta yaratish" class="rounded-2xl shadow-2xl card-hover border">
            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=600&h=500&fit=crop" alt="Hisobot" class="rounded-2xl shadow-2xl card-hover border">
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-28 bg-gradient-to-r from-blue-600 to-emerald-500 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-5xl md:text-6xl font-black mb-8">Bugun boshlang — ertaga tejang!</h2>
        <p class="text-2xl mb-12 opacity-90">Birinchi smetangizni 5 daqiqada yarating</p>
        <a href="" class="inline-block bg-white text-blue-600 px-16 py-7 rounded-full text-3xl font-black shadow-2xl hover:scale-110 transition">
            Bepul ro‘yxatdan o‘tish
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <div class="text-4xl font-black mb-4">Smeta.uz</div>
        <p class="text-xl text-gray-400">© {{ date('Y') }} • O‘zbekistonning birinchi avtomatik smeta platformasi</p>
    </div>
</footer>

</body>
</html>