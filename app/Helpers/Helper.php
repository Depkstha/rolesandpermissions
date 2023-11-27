<?php

function uploadImage ($request, $object, $fileName) {

    if($request->hasFile($fileName)){

        $request->validate([
            $fileName=> 'required|image|mimes:jpg,jpeg,svg,png,gif|max:2048',
        ]);
        $file = $request->$fileName;
        $newName= time() . '_' . $file->getClientOriginalName();
        $file->move("images",$newName);
        $object->image = "images/$newName";
    }
}
