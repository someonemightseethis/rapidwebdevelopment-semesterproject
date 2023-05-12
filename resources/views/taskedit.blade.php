<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#E4DCCF] font-['BlinkMacSystemFont']">
    <div class=" items-center justify-center px-28">
        <div class="py-40 px-96">
            <div class="py-6 text-center">
                <h1 class="text-4xl text-[#002B5B]">edit task</h1>
            </div>
            <form method="POST" action="{{ route('task.update', $task->id) }}">
                @csrf
                @method('PUT')
                <div class="text-[#E4DCCF]">
                    <div class="">
                        <input type="text" id="title" name="title" value="{{ $task->title }}" class="mb-3 mt-1 block w-full px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" required>

                        <div class="grid grid-cols-2 text-[#002B5B] space-x-4">
                            <div class="flex items-baseline justify-center space-x-2">
                                <label for="startdate" class="text-sm">Start Date:</label>
                                <input type="date" name="startdate" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+5 years')) }}" class="mb-3 mt-1 w-fit px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB] object-left" required>
                            </div>
                            <div class="flex items-baseline justify-center space-x-2">
                                <label for="enddate" class="text-sm">End Date:</label>
                                <input type="date" name="enddate" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+5 years')) }}" class="mb-3 mt-1 w-fit px-2 py-1.5 border-2 border-[#292C6D] rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB] object-right" required>
                            </div>
                        </div>

                        <textarea id="description" name="description" rows="5" maxlength="300" value="{{ $task->task }}" class="mb-3 mt-1 block w-full px-2 py-1.5 border-[#292C6D] border-2 rounded-md text-sm shadow-sm placeholder-gray-400 focus:outline-none focus:border-[#EA5455] focus:ring-1 focus:ring-[#EA5455] text-[#002B5B] font-mono bg-[#F9F5EB]" required>{{ $task->description }}</textarea>
                        <div id="character-counter" class="text-sm text-[#EA5455] opacity-80 text-right">
                            <span id="typed-characters">0</span>
                            <span>/</span>
                            <span id="maximum-characters">300</span>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <button type="submit" class="px-6 py-1.5 rounded-md bg-[#002B5B] text-[#E4DCCF] hover:bg-[#EA5455] text-md hover:bg-opacity-95">Update</button>
                    </div>
            </form>
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

</html>