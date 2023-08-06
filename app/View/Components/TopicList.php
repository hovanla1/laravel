<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Topic;


class TopicList extends Component
{

    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $list_topic = Topic::where('status', '=', 1)->orderBy('created_at','desc')->get();
        return view('components.topic-list', compact('list_topic'));
    }
}
