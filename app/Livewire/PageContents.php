<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class PageContents extends Component
{
    public $links, $title, $body;

    public function render(): View|Application|Factory|\Illuminate\View\View
    {
        return view('livewire.page-contents');
    }

    public function mount(): void
    {
        $pages = Config::get('pages');

        $this->links = [];
        foreach ($pages as $link => $page) {
            $this->links[$link] = $page['name'];
        }

        $pageContent = $pages[''];
        $this->title = $pageContent['title'];
        $this->body = $pageContent['body'];
    }

    public function changePage($name): void
    {
        $pages = Config::get('pages');

        if (isset($pages[$name])) {
            $pageContent = $pages[$name];
        } else {
            abort(404);
        }

        $this->title = $pageContent['title'];
        $this->body = $pageContent['body'];
    }
}
