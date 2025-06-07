<?php

namespace App\Livewire\Forms;

use App\Helpers\Slug;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;


class formArticles extends Form
{
    use \Livewire\WithFileUploads;
    public ?Article $article;

    #[Validate('required|string')]
    public $title = '';

    #[Validate('required|string')]
    public $description = '';

    public $path_image = null;

    public function setArticle(Article $article)
    {
        $this->article = $article;

        $this->title = $article->title;

        $this->description = $article->description;
    }


    public function store()
    {
        $this->validate([
            'path_image' =>'required|file:mimes:jpeg,png,jpg,gif:max:2048',
        ]);

        $slug = Slug::uniqueSlug($this->title,'articles');
        $pathName = Str::random(16) . time();
        $path_image = $pathName . '.' . 'png';
        $image = Image::read($this->path_image);
        $image->resize(250,200);
        Storage::put('images/' .  $path_image ,$image->toPng());
        $this->path_image = $path_image;
        Article::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'description' => $this->description,
            'path_image' => $this->path_image,
            'slug' => $slug,
        ]);
    }

    public function update()
    {
        $this->validate([
            'path_image' =>'nullable|image|max:2048',
        ]);

        $slug = Slug::uniqueSlug("slug",'articles');

        if($this->path_image != null) {
            $pathName = Str::random(16) . time();
            $path_image = $pathName . '.' . 'png';
            $image = Image::read($this->path_image);
            $image->resize(250,200);
            Storage::put('images/' .  $path_image ,$image->toPng());
            $this->path_image = $path_image;
            $this->article->update([
                'title' => $this->title,
                'description' => $this->description,
                'path_image' => $this->path_image,
                'slug' => $slug,
            ]);
        } else {
            $this->article->update([
                'title' => $this->title,
                'description' => $this->description,
                'slug' => $slug,
            ]);
        }
    }
}
