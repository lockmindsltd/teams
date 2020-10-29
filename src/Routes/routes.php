<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Lockminds\Teams\Http\Controllers\Tasks\TasksController;
use Lockminds\Teams\Http\Controllers\ToolsController;

Route::get('quick_search', 'TaskmanagerController@quick_search')->name("quick-search");

Route::group(['middleware' => ['web']], function () {

    Route::prefix('lmmessages')->group(function () {
        Route::any('/', function (){
            return view('teams::pages.team.team_dashboard');
        });
    });

    Route::prefix('lmtools')->group(function () {

        Route::any('/', [ToolsController::class, 'invitations'])->name("lmtools");
        Route::any('invitations', [ToolsController::class, 'invitations'])->name("lmtools-invitations");
        Route::any('accept-invitation', [ToolsController::class, 'accept_invitation'])->name("lmtools-accept-invitation");
        Route::any('decline-invitation', [ToolsController::class, 'decline_invitation'])->name("lmtools-decline-invitation");
        Route::any('syncperms/{user}/{role}', [ToolsController::class, 'syncPermissions'])->name("lmtools-syncperms");
        Route::any('messages', [ToolsController::class, 'messages'])->name("lmtools-messages");
    });

    Route::prefix('lmtasks')->group(function () {
        Route::any('/', [TasksController::class, 'index'])->name("lmtasks");
        Route::any('new', [\Lockminds\Teams\Http\Controllers\Tasks\TasksController::class, 'newtasks'])->name("lmtasks-new");
        Route::any('progress', [\Lockminds\Teams\Http\Controllers\Tasks\TasksController::class, 'progress'])->name("lmtasks-progress");
        Route::any('complete', [\Lockminds\Teams\Http\Controllers\Tasks\TasksController::class, 'finished'])->name("lmtasks-complete");
        Route::any('mytasks', [\Lockminds\Teams\Http\Controllers\Tasks\TasksController::class, 'mytasks'])->name("lmtasks-mytasks");
        Route::any('delete/{task}', [\Lockminds\Teams\Http\Controllers\Tasks\TasksController::class, 'deletetask'])->name("lmtasks-delete-task");
    });

    Route::prefix('lmteams')->group(function () {

        Route::any('/', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'index'])->name("lmteams");

        Route::any('dashbaord', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'index'])->name("lmteams-dashbaord");

        Route::any('details/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'details'])->name("lmteams-team-details");

        Route::any('tasks/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'tasks'])->name("lmteams-team-tasks");
        Route::any('members/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'members'])->name("lmteams-team-members");
        Route::any('chatroom/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'chatroom'])->name("lmteams-team-chatroom");
        Route::any('chattingroom/{team}/{member}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'chattingroom'])->name("lmteams-chatting");
        Route::any('videoroom/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'members'])->name("lmteams-team-videoroom");
        Route::any('team', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'index'])->name("lmteams-team");

        Route::any('enable/{team}/{member}', [\Lockminds\Teams\Http\Controllers\Team\TeamMembersController::class, 'enable'])->name("lmteams-team-member-enable");
        Route::any('block/{team}/{member}', [\Lockminds\Teams\Http\Controllers\Team\TeamMembersController::class, 'block'])->name("lmteams-team-member-block");
        Route::any('remove/{team}/{member}', [\Lockminds\Teams\Http\Controllers\Team\TeamMembersController::class, 'remove'])->name("lmteams-team-member-remove");

        Route::any('new/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'newtasks'])->name("lmteams-team-tasks-new");
        Route::any('progress/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'progress'])->name("lmteams-team-tasks-progress");
        Route::any('finished/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'finished'])->name("lmteams-team-tasks-finished");
        Route::any('mytasks/{id}', [\Lockminds\Teams\Http\Controllers\Team\TeamController::class, 'mytasks'])->name("lmteams-team-tasks-mytasks");
        Route::any('taskdetails/{team}/{task}', [\Lockminds\Teams\Http\Controllers\Team\TeamTasksController::class, 'details'])->name("lmteams-team-task-details");
        Route::any('addprogress', [\Lockminds\Teams\Http\Controllers\Team\TeamTasksController::class, 'addprogress'])->name("lmteams-team-task-addprogress");
        Route::any('addcomments', [\Lockminds\Teams\Http\Controllers\Team\TeamTasksController::class, 'addcomments'])->name("lmteams-team-task-addcomment");


    });
});

