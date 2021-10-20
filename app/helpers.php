<?php
use App\Models\Save;
function ifSave ($image_id) {
$id = auth()->user()->id;
$save = Save::where('user_id', $id)->where('image_id', $image_id)->count();
return $save;
}


function deleteComment ($comment, $owner) {
    $auth = auth()->user()->id;

    if ($auth == $comment || $auth == $owner) {
         $response = true;
         return $response;
    }
}
