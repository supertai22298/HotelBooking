<?php

namespace App\Helpers;

use App\Blog;
use Illuminate\Http\Request;


class BlogHelper{

    public static function getArrInput(Request $request)
    {
        $imageFile = $request->file('image');
        if ($imageFile == null) {
            $arrInput = $request->all();
            $arrInput['image'] = null;
        } else {
            // uploadFile
            $helper = new Helper;
            $imageName = $helper->uploadFile($imageFile);

            // get arr input
            $arrInput = $request->all();
            $arrInput['image'] = $imageName;
        }

        return $arrInput;
    }

    // update for Blog controller
    public static function update($id,Request $request)
    {
        $post = Blog::find($id);
        
        $blogHelper = new BlogHelper;
        $input = $blogHelper->getArrInput($request);

        if($input['image'] == null){
            $input['image'] = $post['image'];
        }

        $post->update($input);
    }
}
