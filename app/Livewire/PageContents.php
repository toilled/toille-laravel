<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class PageContents extends Component
{
    public $pages, $links, $currentName, $title, $body;

    public function render(): View|Application|Factory|\Illuminate\View\View
    {
        return view('livewire.page-contents');
    }

    public function mount($name = ''): void
    {
        $this->pages = Config::get('pages');

        $this->links = [];
        foreach ($this->pages as $link => $page) {
            $this->links[$link] = $page['name'];
        }

        $this->currentName = $name;
        $this->updated();
    }

    public function updated(): void
    {
        if (isset($this->pages[$this->currentName])) {
            $pageContent = $this->pages[$this->currentName];
        } else {
            abort(404);
        }

        $this->title = $pageContent['title'];
        $this->body = $pageContent['body'];
    }
}
