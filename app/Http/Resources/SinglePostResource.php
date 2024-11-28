<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SinglePostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'post_title' => $this->title,
            'post_content' => $this->content,
            'published_at' => $this->created_at,
            'last_update' => $this->updated_at,
            'author' => User::find($this->user_id),
            'comments_count' => Comment::find($this->id)->count(),
            'comments' => Comment::where('post_id', $this->id)->get(),
            'likes' => Like::where('post_id', $this->id)->get()
        ];
    }
}
