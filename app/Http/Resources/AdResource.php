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
        return [
            'id' => $this->id,
            'title' => $this->getTranslations('translated_title'),
            'description' => $this->getTranslations('translated_description'),
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
