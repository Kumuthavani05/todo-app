<?php

namespace App\Livewire;

use App\Events\TodoAdded;
use Livewire\Attributes\On;
use Livewire\Component;

class ToDoList extends Component
{
    public $tasks = [];
    public $newTask = '';

    /**
     * Listen for the broadcast event "TodoAdded" on the "tasks" channel.
     */
    #[On('echo:tasks,TodoAdded')]
    public function addTaskFromEvent($data)
    {
        // Add the new task received from the broadcast event to the local task list
        $this->tasks[] = $data['task'];
    }

    /**
     * Add a new task and broadcast the TodoAdded event.
     */
    public function addTask()
    {
        if (!empty($this->newTask)) {
            // Broadcast the new task to the WebSocket channel
            TodoAdded::dispatch($this->newTask);

            // Add the task locally for the sender
            $this->tasks[] = $this->newTask;

            // Clear the input field
            $this->newTask = '';
        }
    }

    /**
     * Render the Livewire component.
     */
    public function render()
    {
        return view('livewire.todo-list')->layout('layouts.app');
    }
}