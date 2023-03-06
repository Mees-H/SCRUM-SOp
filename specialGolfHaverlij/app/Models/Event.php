<?php

namespace App\Models;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\Model; 

class Event{
    public $title;
    public $date;
    public $groups;
    public $body;
    public $slug;

    public function __construct($title, $date, $groups, $body, $slug){
        $this->title = $title;
        $this->date = date('d-m-y', $date);
        $this->groups = $groups;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all(){
        return collect(File::files(resource_path("events")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($document) => new Event(
            $document->title,
            $document->date,
            $document->groups,
            $document->body(),
            $document->slug
        ))
        ->sortByDesc('date');
    }

}