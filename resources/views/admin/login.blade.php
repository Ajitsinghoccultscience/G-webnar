<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – Graphology Webinar</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-neutral-b flex items-center justify-center px-4">

<div class="w-full max-w-md bg-white/5 border border-white/10 rounded-2xl p-8 shadow-2xl">

    <div class="flex flex-col items-center gap-3 mb-8">
        <img src="{{ asset('images/assets%20desktop/favicon.png') }}" alt="Logo" class="w-14 h-14 rounded-full object-contain">
        <h1 class="text-white text-xl font-bold tracking-wide">Admin Panel</h1>
        <p class="text-white/50 text-sm">All India Institute of Occult Science</p>
    </div>

    @if($errors->any())
        <div class="mb-4 bg-red-500/20 border border-red-500/40 text-red-300 text-sm rounded-xl px-4 py-3">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}" class="flex flex-col gap-4">
        @csrf

        <div class="flex flex-col gap-1.5">
            <label class="text-white/70 text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                class="bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-accent-gold transition-colors">
        </div>

        <div class="flex flex-col gap-1.5">
            <label class="text-white/70 text-sm font-medium">Password</label>
            <input type="password" name="password" required
                class="bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-accent-gold transition-colors">
        </div>

        <button type="submit"
            class="mt-2 w-full bg-accent-gold hover:bg-accent-gold/90 text-neutral-b font-bold py-3 rounded-xl text-sm transition-colors">
            Login
        </button>
    </form>

</div>

</body>
</html>
