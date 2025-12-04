<!DOCTYPE html>
<html lang="uz" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ro‘yxatdan o‘tish • Smeta.uz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
        }

        .btn {
            background: linear-gradient(135deg, #3b82f6 0%, #10b981 100%);
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

    </style>
</head>
<body class="h-full bg-gray-50">

    <div class="min-h-screen flex items-center justify-center px-5">
        <div class="w-full max-w-sm">

            <!-- Logo -->
            <div class="text-center mb-10">
                <a href="/" class="text-4xl font-black tracking-tighter">
                    <span class="text-blue-600">Smeta</span><span class="text-emerald-600">.uz</span>
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl shadow-xl p-7">
                <h1 class="text-2xl font-bold text-center mb-7 text-gray-900">Hisob yarating</h1>

                <form method="POST" action="{{ route('post.register') }}" class="space-y-4">
                    @csrf

                    {{-- Name --}}
                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ismingiz" class="w-full px-4 py-3.5 rounded-xl border border-gray-200 focus:border-blue-500 text-base">
                    @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    {{-- Phone --}}
                    <div class="flex rounded-xl border border-gray-200 overflow-hidden focus-within:border-blue-500">
                        <span class="px-4 py-3.5 bg-gray-50 text-gray-600 text-base">+998</span>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="90 123 45 67" class="flex-1 px-4 py-3.5 text-base focus:outline-none" minlength="9" maxlength="9">
                    </div>
                    @error('phone')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    {{-- Email --}}
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email" class="w-full px-4 py-3.5 rounded-xl border border-gray-200 focus:border-blue-500 text-base">
                    @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    {{-- Password --}}
                    <input type="password" name="password" required placeholder="Parol" class="w-full px-4 py-3.5 rounded-xl border border-gray-200 focus:border-blue-500 text-base">
                    @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    {{-- Password confirmation --}}
                    <input type="password" name="password_confirmation" required placeholder="Parolni qayta kiriting" class="w-full px-4 py-3.5 rounded-xl border border-gray-200 focus:border-blue-500 text-base">
                    @error('password_confirmation')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror

                    <button type="submit" class="w-full mt-6 py-4 rounded-xl text-white font-bold text-lg btn shadow-md hover:shadow-lg transition">
                        Davom etish →
                    </button>
                </form>


                <p class="text-center mt-6 text-sm text-gray-600">
                    Hisobingiz bormi?
                    <a href="" class="font-semibold text-blue-600 hover:underline">Kirish</a>
                </p>
            </div>

            <p class="text-center mt-6 text-xs text-gray-500">
                Ro‘yxatdan o‘tish orqali <a href="#" class="underline">shartlar</a> bilan rozilik bildirasiz
            </p>
        </div>
    </div>

</body>
</html>
