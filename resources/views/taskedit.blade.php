<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#E4DCCF] font-['BlinkMacSystemFont'] scroll-smooth">
    <div class=" items-center justify-center px-14 py-4">
        <div class="flex flex-row justify-between">
            <a href="{{ URL('/') }}">
                <img src="/images/taskeda.png" alt="none" class="w-40 h-10 py-0">
            </a>
            <div class="flex flex-row space-x-6 justify-end py-2">
                <div class="flex flex-row space-x-4 justify-end py-1">
                    <svg fill="none" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 21v-1.45c0-.977 0-1.465-.113-1.864a3 3 0 0 0-2.073-2.073c-.399-.113-.887-.113-1.864-.113h-6.9c-.977 0-1.465 0-1.864.113a3 3 0 0 0-2.073 2.073C4 18.085 4 18.573 4 19.55V21M16.2 7.06c0 2.245-1.88 4.065-4.2 4.065S7.8 9.305 7.8 7.06 9.68 2.996 12 2.996s4.2 1.82 4.2 4.064z" stroke="#EA5455" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                    </svg>
                    @if(Auth::check())
                    <p class="flex items-start text-sm font-mono text-[#002B5B] underline underline-offset-8">welcome, {{ Auth::user()->name }}</p>
                    @endif
                </div>
                <div>
                    <form action="{{ route('logout') }}" method="POST" class="block text-sm text-center">
                        @csrf
                        <button type="submit" class="w-full px-6 py-1.5 rounded-md bg-[#002B5B] text-[#E4DCCF] hover:bg-[#EA5455] text-md hover:bg-opacity-95">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="py-28 px-[28rem]">
            <form method="POST" action="{{ route('task.update', $task->id) }}">
                @csrf
                @method('PUT')
                <div class="text-[#E4DCCF]">
                    <div class="">
                        <input type="text" id="title" name="title" value="{{ $task->title }}" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" required>

                        <div class="grid grid-cols-2 text-[#002B5B] space-x-4">
                            <div class="flex items-baseline justify-center space-x-2">
                                <label for="startdate" class="text-sm">Start Date:</label>
                                <input type="date" name="startdate" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 years')) }}" class="mb-3 mt-1 w-fit px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB] object-left" value="{{ $task->startDate }}" required>
                            </div>
                            <div class="flex items-baseline justify-center space-x-2">
                                <label for="enddate" class="text-sm">End Date:</label>
                                <input type="date" name="enddate" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 years')) }}" class="mb-3 mt-1 w-fit px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB] object-right" value="{{ $task->endDate }}" required>
                            </div>
                        </div>

                        <textarea id="description" name="description" rows="5" maxlength="300" value="" class="mb-3 mt-1 block w-full px-2 py-1.5 border-[#292C6D] border-2 rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" required>{{ $task->description }}</textarea>
                        <div id="character-counter" class="text-sm text-[#EA5455] opacity-80 text-right">
                            <span id="typed-characters">0</span>
                            <span>/</span>
                            <span id="maximum-characters">300</span>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <button type="submit" class="w-full px-6 py-1.5 rounded-md bg-[#002B5B] text-[#E4DCCF] hover:bg-[#EA5455] text-md">Update</button>
                    </div>
            </form>
        </div>

        <a href="{{ URL('/') }}">
            <button class="w-full px-6 py-1.5 rounded-md bg-[#EA5455] text-[#E4DCCF] hover:bg-[#002B5B] text-md">Back</button>
        </a>
    </div>

    <script>
        const textAreaElement = document.querySelector("#task");
        const characterCounterElement = document.querySelector("#character-counter");
        const typedCharactersElement = document.querySelector("#typed-characters");
        const maximumCharacters = 300;

        textAreaElement.addEventListener("keydown", (event) => {
            const typedCharacters = textAreaElement.value.length;
            if (typedCharacters > maximumCharacters) {
                return false;
            }
            typedCharactersElement.textContent = typedCharacters;
            if (typedCharacters >= 200) {
                characterCounterElement.classList.replace('opacity-80', 'opacity-100');
            } else if (typedCharacters <= 200 && typedCharacters > 0) {
                characterCounterElement.classList.replace('opacity-100', 'opacity-80');
            }
        });
    </script>
</body>

</html>