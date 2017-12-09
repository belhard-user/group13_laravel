<?php

namespace App\Classes;


use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UplaodImage
{
    /**
     * @var UploadedFile[]
     */
    private $files;
    /**
     * @var Article
     */
    private $article;

    public function __construct(Article $article, array $files)
    {
        $this->files = collect($files);
        $this->article = $article;
    }

    public function save()
    {
        $paths = [];
        $this->files->each(function(UploadedFile $file) use(&$paths){
            $path = $file->store($this->getPath(), 'images');
            $paths[] = \Storage::disk('images')->url($path);
        });

        $this->saveToDataBase($paths);
    }

    private function getPath()
    {
        return sprintf(
            '%s%s%s',
            'article',
            DIRECTORY_SEPARATOR,
            date('d_m_Y')
        );
    }

    private function saveToDataBase(array $paths)
    {
        foreach ($paths as $path){
            $this->article->images()->create([
                'url' => $path
            ]);
        }
    }
}