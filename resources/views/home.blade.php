<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#E4DCCF] font-['BlinkMacSystemFont']">
    <div class=" items-center justify-center px-28 py-12">
        <!-- <div class="py-6">
            <h1 class="text-6xl text-[#002B5B]">task manager</h1>
        </div> -->

        <div id="taskform" class="py-10 px-96">
            <div class="py-6 text-center">
                <h1 class="text-4xl text-[#002B5B]">add a task to get started</h1>
            </div>
            <form method="POST" action="{{ url('/') }}/task" class="">
                @csrf
                <div class="text-[#E4DCCF]">
                    <div class="">
                        <!-- <label htmlFor="title" class="text-lg">
                            Title
                        </label> -->
                        <input type="text" name="title" placeholder="enter task title" id="title" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" required />
                        <!-- <label htmlFor="task" class="text-lg">
                            Task
                        </label> -->
                        <textarea name="task" id="task" cols="10" rows="5" placeholder="enter task description" class="mb-3 mt-1 block w-full px-2 py-1.5 border-[#292C6D] border-2 rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" maxlength="300" required></textarea>
                        <!-- <span id="task-counter" class="text-sm text-[#EA5455]">10 characters remaining</span> -->
                        <div id="character-counter" class="text-sm text-[#EA5455] opacity-80 text-right">
                            <span id="typed-characters">0</span>
                            <span>/</span>
                            <span id="maximum-characters">300</span>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <button type="submit" name="submit" class="px-6 py-1.5 rounded-md bg-[#002B5B] text-[#E4DCCF] hover:bg-[#EA5455] text-md">
                            Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="py-10 grid grid-cols-3">
            @foreach($tasks as $task)
            <div class="text-[#E4DCCF] px-4 py-6">
                <div class="max-w-sm overflow-hidden card cursor-pointer border-[#002B5B] border-2 rounded-lg hover:shadow-lg transform hover:-translate-y-1 transition-transform duration-300 bg-[#002B5B]">
                    <svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg' class="h-20">
                        <defs>
                            <pattern id='a' patternUnits='userSpaceOnUse' width='40' height='69.282' patternTransform='scale(1.54) rotate(130)'>
                                <rect x='0' y='0' width='100%' height='100%' fill='#002B5B' />
                                <path d='M13.333-3.849v23.094M6.667-15.396l20 11.547M13.333-19.245l20 11.547M20 0v23.094m20-34.641l-6.667 3.849-6.666 3.849L20 0M0-11.547l6.667 3.849 6.666 3.849L20 0m0-23.094l20 11.547v23.094L20 23.094l-6.667-3.849-6.666-3.849L0 11.547v-23.094l6.667-3.849 6.666-3.849zM40-3.769L20 7.698m20-3.849l-16.253 9.384L20 15.396M6.667-7.698v23.094m6.666 50.037v23.094M6.667 53.886l20 11.547M13.333 50.037l20 11.547M20 69.282v23.094m20-34.641l-6.667 3.849-6.666 3.849L20 69.282M0 57.735l6.667 3.849 6.666 3.849L20 69.282m0-23.094l20 11.547v23.094L20 92.376l-6.667-3.849-6.666-3.849L0 80.829V57.735l6.667-3.849 6.666-3.849zm20 19.325L20 76.98m20-3.849L20 84.678M6.667 61.584v23.094m26.666-53.886v23.094m-6.666-34.641l20 11.547M33.333 15.396l20 11.547M40 34.641v23.094m20-34.641l-6.667 3.849-6.666 3.849L40 34.641M20 23.094l6.667 3.849 6.666 3.849L40 34.641m0-23.094l20 11.547v23.094L40 57.735l-6.667-3.849-6.666-3.849L20 46.188V23.094l6.667-3.849 6.666-3.849zm20 19.325L40 42.339m20-3.849L40 50.037M26.667 26.943v23.094M-6.667 30.792v23.094m-6.666-34.641l20 11.547M-6.667 15.396l20 11.547M0 34.641v23.094m20-34.641l-6.667 3.849-6.666 3.849L0 34.641m-20-11.547l6.667 3.849 6.666 3.849L0 34.641m0-23.094l20 11.547v23.094L0 57.735l-6.667-3.849-6.666-3.849L-20 46.188V23.094l6.667-3.849 6.666-3.849zm20 19.325L0 42.339m20-3.849L0 50.037m-13.333-23.094v23.094' stroke-width='0.98' stroke='#EA5455' fill='none' />
                            </pattern>
                        </defs>
                        <rect width='800%' height='800%' transform='translate(-10,0)' fill='url(#a)' />
                    </svg>
                    <div class="py-4 px-6">
                        <h2 class="text-2xl text-center underline underline-offset-8">{{ $task->title }}</h2>
                        <div class="py-6 px-2 font-mono">
                            <p class="text-sm">{{ $task->task }}</p>
                        </div>
                        <div class="flex justify-center items-center">
                            <form action="{{ $task->delete_url }}" method="POST" id="delete-form-{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:scale-110">
                                    <svg data-src="https://api.macosicons.com/uploads/cross_with_circle_24px_c051aaae02.svg" id="cross-with-circle" class="icon-image icon-image-24" fill="none" height="24" width="24" xmlns="http://www.w3.org/2000/svg" data-attributes-set="fill,height,width,xmlns" data-rendered="true">
                                        <g stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <path d="M9 9l6 6m0-6l-6 6" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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