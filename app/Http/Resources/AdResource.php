<?php

namespace App\Http\Resources;

use App\Models\Ad;
use Carbon\Carbon;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if(empty($this->getTranslations('translated_title'))) {
            $title = $this->title;
        } else {
            $title = $this->getTranslations('translated_title');
        }

        if(empty($this->getTranslations('translated_description'))) {
            $description = $this->description;
        } else {
            $description = $this->getTranslations('translated_description');
        }


        return [
            'id' => $this->id,
            'title' => $title,
            'description' => $description,
            'url' => config('app.url') . '/' . $this->slug,
            'type' => $this->type,
            'city' => $this->city,
            'country' => $this->country,
            'location' => $this->location,
            'media' => Ad::find($this->id)->getFirstMediaUrl('images', 'medium'),
            'category' => CategoryResource::collection($this->categories),
            'created_at' => $this->created_at,
            'created_at_atom' => $this->created_at->format(Carbon::ATOM),
        ];
    }
}
