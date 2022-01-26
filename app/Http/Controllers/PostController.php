<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use AppHttp\Requests\CreatePost;
use AppHttp\Requests\DeletePost;
use AppHttp\Requests\RestorePost;
use AppHttp\Requests\SearchPosts;
use AppHttp\Requests\UpdatePost;
use AppHttp\Resources\PostResource;
use AppModels\Post;
use AppModels\Thread;

class PostController extends BaseController
{
    public function indexByThread(Thread $thread, Request $request): AnonymousResourceCollection
    {
        if (! $thread->category->isAccessibleTo($request->user())) {
            return $this->notFoundResponse();
        }

        if ($thread->category->is_private) {
            $this->authorize('view', $thread);
        }

        return PostResource::collection($thread->posts()->paginate());
    }

    public function search(SearchPosts $request): AnonymousResourceCollection
    {
        $posts = $request->fulfill();

        return PostResource::collection($posts);
    }

    public function recent(Request $request, bool $unreadOnly = false): AnonymousResourceCollection
    {
        $posts = Post::recent()
            ->get()
            ->filter(function (Post $post) use ($request, $unreadOnly) {
                return $post->thread->category->isAccessibleTo($request->user())
                    && (! $unreadOnly || $post->thread->reader === null || $post->updatedSince($post->thread->reader))
                    && (
                        ! $post->thread->category->is_private
                        || $request->user()
                        && $request->user()->can('view', $post->thread)
                    );
            });

        return PostResource::collection($posts);
    }

    public function unread(Request $request): AnonymousResourceCollection
    {
        return $this->recent($request, true);
    }

    public function fetch(Post $post, Request $request): PostResource
    {
        if (! $post->thread->category->isAccessibleTo($request->user())) {
            return $this->notFoundResponse();
        }

        if ($post->thread->category->is_private) {
            $this->authorize('view', $post->thread);
        }

        return new PostResource($post);
    }

    public function store(CreatePost $request): PostResource
    {
        $post = $request->fulfill();

        return new PostResource($post);
    }

    public function update(UpdatePost $request): PostResource
    {
        $post = $request->fulfill();

        return new PostResource($post);
    }

    public function delete(DeletePost $request): Response
    {
        $post = $request->fulfill();

        if ($post === null) {
            return $this->invalidSelectionResponse();
        }

        return new Response(new PostResource($post));
    }

    public function restore(RestorePost $request): Response
    {
        $post = $request->fulfill();

        if ($post === null) {
            return $this->invalidSelectionResponse();
        }

        return new Response(new PostResource($post));
    }
}