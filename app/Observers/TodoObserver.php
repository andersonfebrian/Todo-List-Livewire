<?php

namespace App\Observers;

use App\Models\Todo;
use Illuminate\Support\Facades\Log;

class TodoObserver
{
    /**
     * Handle the todo "created" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function created(Todo $todo)
    {
        Log::info('Todo Created', [$todo]);
    }

    /**
     * Handle the todo "updated" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function updated(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "deleted" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function deleted(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "restored" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function restored(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "force deleted" event.
     *
     * @param  \App\Todo  $todo
     * @return void
     */
    public function forceDeleted(Todo $todo)
    {
        //
    }
}
