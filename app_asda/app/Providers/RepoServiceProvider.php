<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('App\Repository\TeacherRepositoryInterface', 'App\Repository\TeacherRepository');
        $this->app->bind('App\Repository\StudentRepositoryInterface', 'App\Repository\StudentRepository');
        $this->app->bind('App\Repository\StudentPromotionRepositoryInterface', 'App\Repository\StudentPromotionRepository');
        $this->app->bind('App\Repository\StudentGraduatedRepositoryInterface', 'App\Repository\StudentGraduatedRepository');      
        $this->app->bind('App\Repository\SubjectRepositoryInterface', 'App\Repository\SubjectRepository');    
        $this->app->bind('App\Repository\ExamRepositoryInterface', 'App\Repository\ExamRepository');
        $this->app->bind('App\Repository\MarkRepositoryInterface', 'App\Repository\MarkRepository');
        $this->app->bind('App\Repository\MemberRepositoryInterface', 'App\Repository\MemberRepository');
        $this->app->bind('App\Repository\DonateurRepositoryInterface', 'App\Repository\DonateurRepository');
        $this->app->bind('App\Repository\DonRepositoryInterface', 'App\Repository\DonRepository');
        $this->app->bind('App\Repository\ProductRepositoryInterface', 'App\Repository\ProductRepository');
        $this->app->bind('App\Repository\EventRepositoryInterface', 'App\Repository\EventRepository');

    }


    public function boot()
    {
        //
    }
}