<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#E4DCCF] font-['BlinkMacSystemFont']">
    <div class=" items-center justify-center px-14 py-12">
        <div class="flex justify-center">
            <a href="{{ URL('/') }}">
                <img src="/images/taskeda.png" alt="none" class="w-80 h-50">
            </a>
        </div>

        <div class="py-32 px-[28rem]">
            <div class="py-4 text-center text-[#002B5B]">
                <h1 class="text-4xl">Signup</h1>
                <p class="flex py-4 justify-center">already have an account? &nbsp;
                    <a href="{{ URL('/login') }}" class="text-[#EA5455]"> Login</a>
                </p>
            </div>

            <div>
                <form method="POST" action="{{ route('signup.post') }}">
                    @csrf
                    <div class="">
                        <input type="text" id="name" name="name" value="" placeholder="name" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" autocomplete="off" required>
                        @error('name')
                        <span class="text-[#EA5455] text-sm font-mono">{{ $message }}</span>
                        @enderror
                        <input type="email" id="email" name="email" value="" placeholder="email" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" autocomplete="off" required>
                        @error('email')
                        <span class="text-[#EA5455] text-sm font-mono">{{ $message }}</span>
                        @enderror
                        <input type="password" id="password" name="password" value="" placeholder="password" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" autocomplete="off" required>
                        @error('password')
                        <span class="text-[#EA5455] text-sm font-mono">{{ $message }}</span>
                        @enderror
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="confirm password" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" autocomplete="off" required>
                        @error('password_confirmation')
                        <span class="text-[#EA5455] text-sm font-mono">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="text-center py-4">
                        <button type="submit" class="w-full px-6 py-1.5 rounded-md bg-[#002B5B] text-[#E4DCCF] hover:bg-[#EA5455] text-md hover:bg-opacity-95">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>