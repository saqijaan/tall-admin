<?php

namespace App\Livewire\Traits;

use Livewire\Features\SupportRedirects\HandlesRedirects;

trait Notifies
{
    use HandlesRedirects;

    /**
     * Queues up a notification in either the browser or via a redirect.
     *
     * @param  string  $message
     * @param  string  $route
     * @param  array<mixed>  $routeParams
     * @param  string  $level
     * @return void|\Symfony\Component\HttpFoundation\Response
     */
    public function notify($message, $route = null, $routeParams = [], $level = 'success')
    {
        if ($route) {
            session()->flash('notify.message', $message);
            session()->flash('notify.level', $level);

            return $this->redirect(route($route, $routeParams), navigate: true);
        }

        $this->dispatch('notify', [
            'message' => $message,
            'level' => $level,
        ]);
    }
}
