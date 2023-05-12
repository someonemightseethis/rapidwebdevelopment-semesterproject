<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#E4DCCF] font-['BlinkMacSystemFont']">
    <div class=" items-center justify-center px-28">
        <div class="py-40 px-96">
            <div class="py-4 text-center text-[#002B5B]">
                <h1 class="text-4xl">Login</h1>
                <p class="flex py-4 justify-center">don't have an account? &nbsp;
                    <a href="{{ URL('/signup') }}" class="text-[#EA5455]"> Signup</a>
                </p>
            </div>
            <div>
                <form method="POST" action="">
                    @csrf
                    <div class="">
                        <input type="email" id="email" name="email" value="" placeholder="email" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" required>
                        <input type="password" id="password" name="password" value="" placeholder="password" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" required>
                    </div>
                    <div class="text-center py-4">
                        <button type="submit" class="w-full px-6 py-1.5 rounded-md bg-[#002B5B] text-[#E4DCCF] hover:bg-[#EA5455] text-md hover:bg-opacity-95">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>