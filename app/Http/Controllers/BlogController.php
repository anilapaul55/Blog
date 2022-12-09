<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    //

    public function index(){
        // dd(123);
        // return view('blog.list');
        $blogs = Blog::get();
        return view('blog.list' ,compact('blogs'));
    }

    public function create(){
        return view('blog.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
                'inputTitle' => 'required',
                'inputSubTitle' => 'required',
                'inputimage' => 'required',
                'inputDescription' => 'required',
            ],[
               'inputTitle.required'=>'This field is required',
               'inputSubTitle.required'=>'This field is required',
               'inputimage.required'=>'This field is required',
               'inputDescription.required'=>'This field is required',
        ]);
        try {

            $image = $request->file('inputimage');
            $imag_path = '';
            if (!empty($image)) {
                $new_name = $request->inputTitle.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploaded/blogs'), $new_name);
                $uploads_dir = 'public/uploaded/blogs';
                $imag_path = $new_name;
            }


            $blog = new Blog();
            $blog->blog_title = $request->inputTitle;
            $blog->blog_subtitle = $request->inputSubTitle;
            $blog->blog_image = $imag_path;
            $blog->blog_description = $request->inputDescription;
            $blog->save();
            return back()->with('success', 'New blog "'.$request->inputTitle.'" Added successfully');
        } catch (\Exception $e) {
            return back()->with('errors1', $e->getMessage());
        }
    }

    public function edit($id)
    {
        if (!$blog = Blog::find($id)) {
            return redirect()->route('index');
        }

        return view('blog.edit')->with('blog', $blog);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
                'inputTitle' => 'required',
                'inputSubTitle' => 'required',
                'inputDescription' => 'required',
            ],[
               'inputTitle.required'=>'This field is required',
               'inputSubTitle.required'=>'This field is required',
               'inputDescription.required'=>'This field is required',
        ]);
        try {

            $blog =Blog::find($id);

            $image = $request->file('inputimage');
            $imag_path = $blog->blog_image;

            if (!empty($image)) {
                File::delete('public/uploaded/blogs/'.$imag_path);
                $new_name = $request->inputTitle.'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploaded/blogs'), $new_name);
                $uploads_dir = 'public/uploaded/blogs';
                $imag_path = $new_name;
            }

            $blog->blog_title = $request->inputTitle;
            $blog->blog_subtitle = $request->inputSubTitle;
            $blog->blog_image = $imag_path;
            $blog->blog_description = $request->inputDescription;
            $blog->save();
            return back()->with('success', 'blog "'.$request->inputTitle.'" Updated successfully');
        } catch (\Exception $e) {
            return back()->with('errors1', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        if (!$blog = Blog::find($id)) {
            return redirect()->route('index');
        }

        try {
            Blog::where('id', $id)->delete();

            return back()->with('success', 'deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('errors1', $e->getMessage());
        }
    }
}
