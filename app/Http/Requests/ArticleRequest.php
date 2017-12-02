<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $tagsIds = \App\Tag::pluck('id');

        $rules = [
            'title' => 'required|min:3|unique:articles',
            'description' => 'required',
            'tag_id.*' => 'required|in:' . implode(',', $tagsIds->toArray())
        ];

        if ('article.update' == array_get($this->route()->action, 'as')) {
            $rules['title'] = 'required|min:3|unique:articles,title,' . $this->article->id;
        }

        return $rules;
    }
}
