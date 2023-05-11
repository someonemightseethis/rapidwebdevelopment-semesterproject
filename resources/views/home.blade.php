<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#FAEDF0] text-[#EC255A] font-['Noto Sans]">
    <div class=" items-center justify-center px-28 py-12">
        <div class="py-6">
            <h1 class="text-6xl text-[#161853]">task manager</h1>
        </div>

        <div class="py-10 px-80">
            <form method="POST" action="{{ url('/') }}/task" class="">
                @csrf
                <div class="rounded-xl shadow-md lg:shadow-lg px-16 py-12 bg-[#292C6D]">
                    <div class="relative z-0 py-2">
                        <label htmlFor="title" class="text-[#FAEDF0] text-xl">
                            Title
                        </label>
                        <input type="text" name="title" placeholder="" id="title" class="mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-md shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EC255A] focus:ring-1 focus:ring-[#EC255A] text-[#161853]" required />
                    </div>
                    <div class="relative z-0 py-2">
                        <label htmlFor="task" class="text-[#FAEDF0] text-xl">
                            Task
                        </label>
                        <textarea name="task" id="task" cols="10" rows="5" placeholder="enter the task.." class="mb-3 mt-1 block w-full px-2 py-1.5 border border-gray-300 rounded-md text-md shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EC255A] focus:ring-1 focus:ring-[#EC255A] text-[#161853]" required></textarea>
                    </div>
                    <div class="text-right px-2 py-4">
                        <button type="submit" name="submit" class="px-4 py-1.5 rounded-md bg-[#EC255A] text-[#FAEDF0] bg-opacity-90 hover:bg-opacity-95 hover:scale-105">
                            Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="py-10 grid grid-cols-3">
            @foreach($tasks as $task)
            <div class="text-[#161853] px-2 py-4">
                <div class="max-w-sm overflow-hidden rounded-xl bg-[#FAEDF0] shadow-md duration-300 hover:scale-105 hover:shadow-xl border-[#292C6D] border-2">
                    <svg id='patternId' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg'>
                        <defs>
                            <pattern id='a' patternUnits='userSpaceOnUse' width='40' height='69.282' patternTransform='scale(2) rotate(130)'>
                                <rect x='0' y='0' width='100%' height='100%' fill='hsla(238, 58%, 21%, 1)' />
                                <path d='M13.333-3.849v23.094M6.667-15.396l20 11.547M13.333-19.245l20 11.547M20 0v23.094m20-34.641l-6.667 3.849-6.666 3.849L20 0M0-11.547l6.667 3.849 6.666 3.849L20 0m0-23.094l20 11.547v23.094L20 23.094l-6.667-3.849-6.666-3.849L0 11.547v-23.094l6.667-3.849 6.666-3.849zM40-3.769L20 7.698m20-3.849l-16.253 9.384L20 15.396M6.667-7.698v23.094m6.666 50.037v23.094M6.667 53.886l20 11.547M13.333 50.037l20 11.547M20 69.282v23.094m20-34.641l-6.667 3.849-6.666 3.849L20 69.282M0 57.735l6.667 3.849 6.666 3.849L20 69.282m0-23.094l20 11.547v23.094L20 92.376l-6.667-3.849-6.666-3.849L0 80.829V57.735l6.667-3.849 6.666-3.849zm20 19.325L20 76.98m20-3.849L20 84.678M6.667 61.584v23.094m26.666-53.886v23.094m-6.666-34.641l20 11.547M33.333 15.396l20 11.547M40 34.641v23.094m20-34.641l-6.667 3.849-6.666 3.849L40 34.641M20 23.094l6.667 3.849 6.666 3.849L40 34.641m0-23.094l20 11.547v23.094L40 57.735l-6.667-3.849-6.666-3.849L20 46.188V23.094l6.667-3.849 6.666-3.849zm20 19.325L40 42.339m20-3.849L40 50.037M26.667 26.943v23.094M-6.667 30.792v23.094m-6.666-34.641l20 11.547M-6.667 15.396l20 11.547M0 34.641v23.094m20-34.641l-6.667 3.849-6.666 3.849L0 34.641m-20-11.547l6.667 3.849 6.666 3.849L0 34.641m0-23.094l20 11.547v23.094L0 57.735l-6.667-3.849-6.666-3.849L-20 46.188V23.094l6.667-3.849 6.666-3.849zm20 19.325L0 42.339m20-3.849L0 50.037m-13.333-23.094v23.094' stroke-width='1' stroke='hsla(344, 84%, 54%, 1)' fill='none' />
                            </pattern>
                        </defs>
                        <rect width='800%' height='800%' transform='translate(-10,0)' fill='url(#a)' />
                    </svg>
                    <div class="py-4 px-6">
                        <h2 class="text-2xl text-center">{{ $task->title }}</h2>
                        <div class="p-5">
                            <p class="text-medium mb-5">{{ $task->task }}</p>
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

        <!-- <div>
            <table>
                <thead>

                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr class="">
                        <td class="whitespace-nowrap px-6 py-4">
                            {{ $task->id }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            {{ $task->title }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            {{ $task->task }}
                        </td>
                        <td>
                            <form action="{{ $task->delete_url }}" method="POST" id="delete-form-{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hover:scale-105">
                                    <svg data-src="https://api.macosicons.com/uploads/cross_with_circle_24px_c051aaae02.svg" id="cross-with-circle" class="icon-image icon-image-24" fill="none" height="24" width="24" xmlns="http://www.w3.org/2000/svg" data-attributes-set="fill,height,width,xmlns" data-rendered="true">
                                        <g stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <path d="M9 9l6 6m0-6l-6 6" stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> -->
    </div>
</body>