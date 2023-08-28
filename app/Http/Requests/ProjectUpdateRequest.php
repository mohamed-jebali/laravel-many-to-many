<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules() :array
    {
        return [
            "title" => "required|min:5|max:30",
            "description" => "required|min:10",
            "slug" => "min:10|required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "type_id" => "required|exists:types,id" 
        ];
    }

    public function messages() : array
    {
        return [
            "title.required" => "il titolo deve essere inserito obbligatoriamente",
            "title.max" => "il titolo non puo' avere piu' di 30 caratteri",
            "description.required" => "la descrizione deve essere inserito obbligatoriamente",
            "description.min" => "la descrizione deve avere almeno 10 caratteri",
            "slug.required" => "la slug deve essere inserita obbligatoriamente",
            "slug.min" => "la slug deve avere almeno 10 caratteri",
            "image.required" => "l'immagine deve essere inserita obbligatoriamente",
            "image.image" => "Il file deve essere un'immagine.",
            "image.mimes" => "L'immagine deve essere di uno dei seguenti formati: jpg, jpeg, png, bmp, gif, svg, o webp",
            "image.max" => "L'immagine non può superare 2 MB.",
            "type_id.required" => "specificare il tipo di progetto" 
        ];
    }
}

