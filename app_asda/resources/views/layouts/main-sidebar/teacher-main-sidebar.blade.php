<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}} </li>

        <!-- الطلاب-->
        <li>
            <a target="_blank" href="{{route('studente.index')}}"><i class="fas fa-user-graduate"></i><span
                    class="right-nav-text">{{trans('Students_trans.Student_information')}}</span></a>
        </li>
        <li>
            <a href="{{route('classrooms')}}"><i class="fas fa-chalkboard"></i><span
                    class="right-nav-text">{{trans('main_trans.classes')}}</span></a>
        </li>


        <!-- الامتحانات-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                <div class="pull-left"><i class="fas fa-book-open"></i><span
                        class="right-nav-text">{{trans('main_trans.Exams')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Exams.index')}}">{{trans('Exam_trans.title_page')}} </a> </li>
                <li> <a href="{{route('Marks.index')}}"> {{trans('Exam_trans.Les_nombres')}}</a> </li>

            </ul>
        </li>

       <!-- الملف الشخصي-->
       <li>
        <a href="{{route('profile.show')}}"><i class="fas fa-id-card-alt"></i><span
                class="right-nav-text"> {{trans('Students_trans.personal_information')}}</span></a>
    </li>

    </ul>
</div>