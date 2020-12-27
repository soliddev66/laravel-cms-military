<?php

namespace App\Http\Controllers\Frontend\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeBlog;
use App\Models\Frontend\Creative\CreativeComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'name' => 'required|max:255',
            'comment' => 'required|max:500',
        ]);

        // Get All Request
        $input = $request->all();

        // Decrypt
        $page = Crypt::decrypt($input['page']);

        if ($page == 98) {
            $creative_blog_id = Crypt::decrypt($input['creative_blog_id']);

            $blog = CreativeBlog::find($creative_blog_id);

            $input['creative_blog_id'] = $blog->id;
            $slug = $blog->slug;
        }

        // Record to database
        CreativeComment::firstOrCreate([
            'creative_blog_id' => $input['creative_blog_id'],
            'name' => $input['name'],
            'comment' => $input['comment'],
        ]);

        return redirect()->route('blog-page.show', $slug)
            ->with('success', 'frontend.your_comment_is_pending_approval');

    }
}

