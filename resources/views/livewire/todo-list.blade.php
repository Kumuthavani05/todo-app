
<div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
    <div class="mb-4">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">To-Do List</h2>
        <p class="text-gray-500 text-sm mb-4">Manage your tasks below. Add a new task and see it appear instantly!</p>

        <div class="flex">
            <input 
                type="text" 
                wire:model="newTask" 
                placeholder="Enter a new task" 
                class="flex-1 border border-gray-300 rounded-l-lg p-2 focus:ring focus:ring-blue-200"
            >
            <button 
                wire:click="addTask" 
                class="bg-blue-500 text-red px-6 py-2 rounded-r-lg hover:bg-blue-600 transition"
            >
                Add Task
            </button>
        </div>
    </div>

    <div class="mt-6">
        <ul class="space-y-2">
            @foreach($tasks as $task)
                <li class="flex justify-between items-center bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 shadow-sm">
                    <span class="text-gray-800">{{ $task }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    @if (empty($tasks))
        <div class="mt-6 text-center text-gray-400">
            <p>No tasks added yet. Start by adding a new task above!</p>
        </div>
    @endif
</div>
