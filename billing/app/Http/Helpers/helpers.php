<?php 

function checkAccessPermissionFromHelper($roleId, $currentUri) {
    $userId = $roleId;
    $permission = DB::table('permissions')
        ->where('section', $currentUri)
        ->where('role_id', $userId)
        ->first();

    if ($userId > 1 && !$permission) {
        abort(403, 'You do not have permission to access this!');
    }
}



