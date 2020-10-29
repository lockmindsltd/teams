<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeamsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockminds_teams', function (Blueprint $table) {

            $table->engine ='InnoDB';
            $table->bigIncrements('id');
            $table->string('team_name');
            $table->string('team_description');
            $table->bigInteger('team_owner');
            $table->string('team_icon')->nullable();
            $table->string('team_firebase_uid')->nullable();
            $table->boolean('team_enabled')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lockminds_team_members', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('team_member_id')->nullable();
            $table->bigInteger('team_id')->nullable();
            $table->bigInteger('team_member_owner')->nullable();
            $table->string('team_welcome_message')->nullable();
            $table->string('team_member_firebase_uid')->nullable();
            $table->boolean('team_member_enabled')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lockminds_team_tasks', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('task_creator')->nullable();
            $table->bigInteger('task_responsible')->nullable();
            $table->bigInteger('task_team')->nullable();
            $table->string('task_title');
            $table->text('task_description');
            $table->dateTime("task_start");
            $table->integer("task_progress")->nullable();
            $table->dateTime("task_end");
            $table->string('task_status',15)->default("new");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lockminds_team_task_progress', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('task_progress_creator')->nullable();
            $table->bigInteger('task_progress_task_id')->nullable();
            $table->bigInteger('task_progress_team_id')->nullable();
            $table->text('task_progress_description');
            $table->dateTime("task_progress_date");
            $table->integer('task_progress_percent');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lockminds_team_task_comments', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('task_comment_creator')->nullable();
            $table->bigInteger('task_comment_task_id')->nullable();
            $table->bigInteger('task_comment_team_id')->nullable();
            $table->text('task_comment_description');
            $table->dateTime("task_comment_date");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lockminds_invitations', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('invitation_team');
            $table->bigInteger('invitation_member');
            $table->string('invitation_message');
            $table->boolean('invitation_status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lockminds_teams');
        Schema::dropIfExists('lockminds_team_members');
        Schema::dropIfExists('lockminds_team_tasks');
        Schema::dropIfExists('lockminds_team_task_progress');
        Schema::dropIfExists('lockminds_team_task_comments');
    }
}
