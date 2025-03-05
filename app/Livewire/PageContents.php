<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Livewire\Component;

class PageContents extends Component
{
    public $pages, $links, $currentName, $title, $body, $activity, $joke;

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

        $this->newActivity();
        $this->newJoke();
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

    public function newActivity(): void
    {
        $json = file_get_contents('https://bored.api.lewagon.com/api/activity');
        $array = json_decode($json, true);

        $this->activity = ['text' => $array['activity'], 'type' => $array['type']];
    }

    public function newJoke(): void
    {
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, 'https://icanhazdadjoke.com/');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, ['Accept: application/json',]);

        $json = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $array = json_decode($json, true);

        $this->joke = $array['joke'];
    }
}
