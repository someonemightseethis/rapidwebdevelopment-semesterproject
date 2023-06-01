@guest
<script>
    window.location = "{{ route('login') }}";
</script>
@endguest

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#E4DCCF] font-['BlinkMacSystemFont'] scroll-smooth">
    <div class=" items-center justify-center px-14 py-4">
        <div class="flex flex-row justify-between">
            <div>
                <a href="{{ URL('/') }}">
                    <img src="/images/taskeda.png" alt="none" class="w-40 h-10 py-0">
                </a>
            </div>
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

        <div class="grid grid-cols-2 px-28">
            <div id="taskform" class="py-28 px-12">
                <h3 class="text-xl pb-2 text-[#EA5455] font-mono">Add Task</h3>

                <form method="POST" action="{{ url('/') }}/task" class="">
                    @csrf
                    <div class="text-[#E4DCCF]">
                        <div class="">
                            <!-- <label htmlFor="title" class="text-lg">
                                Title
                            </label> -->
                            <div class="py-2">
                                <input type="text" name="title" placeholder="enter task title" id="title" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" required />

                                <div class="grid grid-cols-2 text-[#002B5B] space-x-4">
                                    <div class="flex items-baseline justify-center space-x-2">
                                        <label for="startdate" class="text-sm">Start Date</label>
                                        <input type="date" name="startdate" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 years')) }}" class="mb-3 mt-1 w-fit px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB] object-left" value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="flex items-baseline justify-center space-x-2">
                                        <label for="enddate" class="text-sm">End Date</label>
                                        <input type="date" name="enddate" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+2 years')) }}" class="mb-3 mt-1 w-fit px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB] object-right" required>
                                    </div>
                                </div>

                                <textarea name="description" id="description" cols="10" rows="5" placeholder="enter task description" class="mb-3 mt-1 block w-full px-2 py-1.5 border-[#292C6D] border-2 rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" maxlength="300" required></textarea>
                                <div id="character-counter" class="text-sm text-[#EA5455] opacity-80 text-right">
                                    <span id="typed-characters">0</span>
                                    <span>/</span>
                                    <span id="maximum-characters">300</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center py-2">
                            <button type="submit" name="submit" class="w-full px-6 py-1.5 rounded-md bg-[#002B5B] text-[#E4DCCF] hover:bg-[#EA5455] text-md hover:bg-opacity-95">
                                Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="py-28 px-12">
                <h3 class="text-xl pb-4 text-[#EA5455] font-mono">Ending Soon</h3>
                @if(Auth::check())

                @php
                $nearestTask = null;
                $currentDate = \Carbon\Carbon::now();
                foreach ($tasks as $task) {
                $endDate = \Carbon\Carbon::parse($task->endDate);
                $daysUntilEnd = $currentDate->diffInDays($endDate);
                if ($daysUntilEnd <= 2 && $task->createdBy === auth()->user()->name) {
                    $nearestTask = $task;
                    break;
                    }
                    }
                    @endphp

                    @if ($nearestTask)
                    <div class="text-[#E4DCCF] font-mono max-w-md overflow-hidden border-[#002B5B] border-2 rounded-lg hover:shadow-lg transform hover:-translate-y-2 transition-transform duration-300 bg-[#002B5B] group">
                        <svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg' class="h-20 opacity-90 group-hover:opacity-100">
                            <defs>
                                <pattern id='a' patternUnits='userSpaceOnUse' width='40' height='69' patternTransform='scale(1.54) rotate(130)'>
                                    <rect x='0' y='0' width='100%' height='100%' fill='#002B5B' />
                                    <path d='M13.333-3.849v23.094M6.667-15.396l20 11.547M13.333-19.245l20 11.547M20 0v23.094m20-34.641l-6.667 3.849-6.666 3.849L20 0M0-11.547l6.667 3.849 6.666 3.849L20 0m0-23.094l20 11.547v23.094L20 23.094l-6.667-3.849-6.666-3.849L0 11.547v-23.094l6.667-3.849 6.666-3.849zM40-3.769L20 7.698m20-3.849l-16.253 9.384L20 15.396M6.667-7.698v23.094m6.666 50.037v23.094M6.667 53.886l20 11.547M13.333 50.037l20 11.547M20 69.282v23.094m20-34.641l-6.667 3.849-6.666 3.849L20 69.282M0 57.735l6.667 3.849 6.666 3.849L20 69.282m0-23.094l20 11.547v23.094L20 92.376l-6.667-3.849-6.666-3.849L0 80.829V57.735l6.667-3.849 6.666-3.849zm20 19.325L20 76.98m20-3.849L20 84.678M6.667 61.584v23.094m26.666-53.886v23.094m-6.666-34.641l20 11.547M33.333 15.396l20 11.547M40 34.641v23.094m20-34.641l-6.667 3.849-6.666 3.849L40 34.641M20 23.094l6.667 3.849 6.666 3.849L40 34.641m0-23.094l20 11.547v23.094L40 57.735l-6.667-3.849-6.666-3.849L20 46.188V23.094l6.667-3.849 6.666-3.849zm20 19.325L40 42.339m20-3.849L40 50.037M26.667 26.943v23.094M-6.667 30.792v23.094m-6.666-34.641l20 11.547M-6.667 15.396l20 11.547M0 34.641v23.094m20-34.641l-6.667 3.849-6.666 3.849L0 34.641m-20-11.547l6.667 3.849 6.666 3.849L0 34.641m0-23.094l20 11.547v23.094L0 57.735l-6.667-3.849-6.666-3.849L-20 46.188V23.094l6.667-3.849 6.666-3.849zm20 19.325L0 42.339m20-3.849L0 50.037m-13.333-23.094v23.094' stroke-width='1.2' stroke='#EA5455' fill='none' />
                                </pattern>
                            </defs>
                            <rect width='800%' height='800%' transform='translate(-10,0)' fill='url(#a)' />
                        </svg>
                        <div class="py-2 px-6">
                            <h2 class="text-xl text-center underline underline-offset-8 decoration-[#EA5455]">{{ $nearestTask->title }}</h2>
                            <div class="flex justify-center space-x-2 py-6">
                                <p class="flex justify-center text-xs">
                                    status:
                                <p class="@if($nearestTask->status === 'Ending Soon') animate-pulse text-[#EA5455] @endif text-xs">{{ $nearestTask->status }}</p>
                                </p>
                                <p class=" flex justify-center text-xs text-[#EA5455] opacity-80 group-hover:opacity-100">|</p>
                                <p class="flex justify-center text-xs">created at: {{ date('d-m-Y', strtotime($nearestTask->createdAt)) }}</p>
                            </div>
                            <div class="pb-4 px-2 font-mono">
                                <p class="text-sm">{{ $nearestTask->description }}</p>
                            </div>
                            <hr class="border-[#EA5455] fill-[#EA5455] mx-6 opacity-80 group-hover:opacity-100">
                            <div class="flex justify-center space-x-2 py-2">
                                <p class="flex justify-center text-xs">start date: {{ date('d-m-Y', strtotime($nearestTask->startDate)) }}</p>
                                <p class="flex justify-center text-xs text-[#EA5455] opacity-80 group-hover:opacity-100">|</p>
                                <p class="flex justify-center text-xs">end date: {{ date('d-m-Y', strtotime($nearestTask->endDate)) }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
            </div>
        </div>

        <hr class="border-[#EA5455] fill-[#EA5455]">

        <div class="py-10 px-12 grid grid-cols-3 space-x-6">
            @foreach($tasks as $task)
            @if(Auth::check())
            @if ($task->createdBy === auth()->user()->name)
            <div class="text-[#E4DCCF] font-mono max-w-md overflow-hidden border-[#002B5B] border-2 rounded-lg hover:shadow-lg transform hover:-translate-y-2 transition-transform duration-300 bg-[#002B5B] group">
                <svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg' class="h-20 opacity-90 group-hover:opacity-100">
                    <defs>
                        <pattern id='a' patternUnits='userSpaceOnUse' width='40' height='69' patternTransform='scale(1.54) rotate(130)'>
                            <rect x='0' y='0' width='100%' height='100%' fill='#002B5B' />
                            <path d='M13.333-3.849v23.094M6.667-15.396l20 11.547M13.333-19.245l20 11.547M20 0v23.094m20-34.641l-6.667 3.849-6.666 3.849L20 0M0-11.547l6.667 3.849 6.666 3.849L20 0m0-23.094l20 11.547v23.094L20 23.094l-6.667-3.849-6.666-3.849L0 11.547v-23.094l6.667-3.849 6.666-3.849zM40-3.769L20 7.698m20-3.849l-16.253 9.384L20 15.396M6.667-7.698v23.094m6.666 50.037v23.094M6.667 53.886l20 11.547M13.333 50.037l20 11.547M20 69.282v23.094m20-34.641l-6.667 3.849-6.666 3.849L20 69.282M0 57.735l6.667 3.849 6.666 3.849L20 69.282m0-23.094l20 11.547v23.094L20 92.376l-6.667-3.849-6.666-3.849L0 80.829V57.735l6.667-3.849 6.666-3.849zm20 19.325L20 76.98m20-3.849L20 84.678M6.667 61.584v23.094m26.666-53.886v23.094m-6.666-34.641l20 11.547M33.333 15.396l20 11.547M40 34.641v23.094m20-34.641l-6.667 3.849-6.666 3.849L40 34.641M20 23.094l6.667 3.849 6.666 3.849L40 34.641m0-23.094l20 11.547v23.094L40 57.735l-6.667-3.849-6.666-3.849L20 46.188V23.094l6.667-3.849 6.666-3.849zm20 19.325L40 42.339m20-3.849L40 50.037M26.667 26.943v23.094M-6.667 30.792v23.094m-6.666-34.641l20 11.547M-6.667 15.396l20 11.547M0 34.641v23.094m20-34.641l-6.667 3.849-6.666 3.849L0 34.641m-20-11.547l6.667 3.849 6.666 3.849L0 34.641m0-23.094l20 11.547v23.094L0 57.735l-6.667-3.849-6.666-3.849L-20 46.188V23.094l6.667-3.849 6.666-3.849zm20 19.325L0 42.339m20-3.849L0 50.037m-13.333-23.094v23.094' stroke-width='1.2' stroke='#EA5455' fill='none' />
                        </pattern>
                    </defs>
                    <rect width='800%' height='800%' transform='translate(-10,0)' fill='url(#a)' />
                </svg>
                <div class="py-2 px-6">
                    <h2 class="text-xl text-center underline underline-offset-8 decoration-[#EA5455]">{{ $task->title }}</h2>
                    <div class="flex justify-center space-x-2 py-6">
                        <p class="flex justify-center text-xs">
                            status:
                        <p class="@if($task->status === 'Ending Soon') animate-pulse text-[#EA5455] @endif text-xs">{{ $task->status }}</p>
                        </p>
                        <p class=" flex justify-center text-xs text-[#EA5455] opacity-80 group-hover:opacity-100">|</p>
                        <p class="flex justify-center text-xs">created at: {{ date('d-m-Y', strtotime($task->createdAt)) }}</p>
                    </div>
                    <div class="pb-4 px-2 font-mono">
                        <p class="text-sm">{{ $task->description }}</p>
                    </div>
                    <hr class="border-[#EA5455] fill-[#EA5455] mx-6 opacity-80 group-hover:opacity-100">
                    <div class="flex justify-center space-x-2 py-2">
                        <p class="flex justify-center text-xs">start date: {{ date('d-m-Y', strtotime($task->startDate)) }}</p>
                        <p class="flex justify-center text-xs text-[#EA5455] opacity-80 group-hover:opacity-100">|</p>
                        <p class="flex justify-center text-xs">end date: {{ date('d-m-Y', strtotime($task->endDate)) }}</p>
                    </div>
                    <div class="flex justify-end py-2">
                        <form action="{{ $task->delete_url }}" method="POST" id="delete-form-{{ $task->id }}" class="flex flex-row space-x-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="hover:scale-110">
                                    <g clip-path="url(#clip0_489_191522)">
                                        <path d="M5 9.5l1.087 8.036c.223 1.65.335 2.476.9 2.97.566.494 1.398.494 3.064.494h3.898c1.666 0 2.499 0 3.064-.494s.677-1.32.9-2.97L19 9.5M9 6c0-.932 0-1.398.152-1.765a2 2 0 0 1 1.083-1.083C10.602 3 11.068 3 12 3c.932 0 1.398 0 1.765.152a2 2 0 0 1 1.083 1.083C15 4.602 15 5.068 15 6m4 0H5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_489_191522">
                                            <path fill="" d="M0 0H24V24H0z"></path>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <a href="{{ route('task.edit', ['id' => $task->id]) }}">
                                <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" class="hover:scale-110">
                                    <g clip-path="url(#clip0_489_191494)">
                                        <path d="M10.293 12.293a1 1 0 1 0 1.414 1.414l-1.414-1.414zm8.414-5.586L19.414 6 18 4.586l-.707.707 1.414 1.414zm.586-3.414L18.586 4 20 5.414l.707-.707-1.414-1.414zm2.414.414a1 1 0 0 0-1.414-1.414l1.414 1.414zm-10 10l7-7-1.414-1.414-7 7 1.414 1.414zm9-9l1-1-1.414-1.414-1 1 1.414 1.414z" fill="currentColor"></path>
                                        <path d="M10 7H7c-1.886 0-2.828 0-3.414.586C3 8.172 3 9.114 3 11v6c0 1.886 0 2.828.586 3.414C4.172 21 5.114 21 7 21h6c1.886 0 2.828 0 3.414-.586C17 19.828 17 18.886 17 17v-3" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_489_191494">
                                            <path fill="currentColor" d="M0 0H24V24H0z"></path>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
    </div>

    <script>
        const textAreaElement = document.querySelector("#description");
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

        // JavaScript code to toggle dropdown visibility
        var dropdownButton = document.getElementById('userDropdown');
        var dropdownMenu = document.querySelector('.dropdown > ul');

        // Show/hide dropdown when the user icon button is clicked
        dropdownButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent the click event from bubbling up
            dropdownMenu.classList.toggle('hidden');
        });

        // Hide dropdown when clicking anywhere on the page
        document.addEventListener('click', function(event) {
            var targetElement = event.target;
            if (!dropdownButton.contains(targetElement)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>