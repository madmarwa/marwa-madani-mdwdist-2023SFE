<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        
            <!-- menu item Dashboard-->
            <li>
                <a href="{{ url('/dashboard') }}">
                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <!-- menu title -->
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}}</li>
                            <!-- Grades-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                <div class="pull-left"><i class="fas fa-school"></i><span
                        class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>

            </ul>
        </li>
        <!-- classes-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                <div class="pull-left"><i class="fa fa-building"></i><span
                        class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Classrooms.index')}}">{{trans('main_trans.classes_list')}}</a></li>
            </ul>
        </li>

        <!-- sections-->
       

        <!-- students-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                    class="fas fa-user-graduate"></i>{{trans('main_trans.students')}}<div
                    class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
            <ul id="students-menu" class="collapse">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse"
                        data-target="#Student_information">{{trans('Students_trans.Student_information')}}<div
                            class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Student_information" class="collapse">
                        <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a>
                        </li>
                        <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse"
                        data-target="#Students_upgrade">{{trans('main_trans.Students_Promotions')}}<div
                            class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Students_upgrade" class="collapse">
                        <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.add_Promotion')}}</a>
                        </li>
                        <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.list_Promotions')}}</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse"
                        data-target="#Graduate_students">{{trans('main_trans.Graduate_students')}}<div
                            class="pull-right"><i class="ti-plus"></i></div><div class="clearfix"></div></a>
                    <ul id="Graduate_students" class="collapse">
                        <li> <a href="{{route('Graduated.create')}}">{{trans('main_trans.add_Graduate')}}</a>
                        </li>
                        <li> <a href="{{route('Graduated.index')}}">{{trans('main_trans.list_Graduate')}}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <!-- Teachers-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                        class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>

            </ul>
        </li>

        <!-- Parents-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                <div class="pull-left"><i class="fas fa-user-tie"></i><span
                        class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('add_parent')}}">{{trans('main_trans.List_Parents')}} </a> </li>

            </ul>
        </li>

        <!-- Subjects-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                <div class="pull-left"><i class="fas fa-book-open"></i><span
                        class="right-nav-text"> {{trans('subjcet_trans.matiere')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Subjects" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('subjects.index')}}">  {{trans('subjcet_trans.Liste_matiere')}}</a> </li>
            </ul>
        </li>

        <!-- Exams-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                        class="right-nav-text">{{trans('main_trans.Exams')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Exams.index')}}"> {{trans('Exam_trans.title_page')}} </a> </li>
                <li> <a href="{{route('Marks.index')}}">  {{trans('Exam_trans.Les_nombres')}}</a> </li>

            </ul>
        </li>
           <!-- Members-->
           <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Members-icon">
                <div class="pull-left"><i class="fas fa-id-card"></i> <span
                        class="right-nav-text">{{trans('Member_trans.Step1')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Members-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Members.index')}}">{{trans('Member_trans.Step1')}} </a> </li>
               

            </ul>
        </li>
         <!-- don-->
         <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Donateurs-icon">
                <div class="pull-left"><i class="fas fa-hand-holding-heart"></i><span
                        class="right-nav-text">{{trans('Donateur_trans.Les_dons')}} </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Donateurs-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Donateurs.index')}}"> {{trans('Donateur_trans.Informations_donateurs')}}  </a> </li>
                <li> <a href="{{route('Dons.index')}}">  {{trans('Donateur_trans.Ajouter_don')}}  </a> </li>
               

            </ul>
        </li>
          <!-- stock-->
          <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#stock-icon">
                <div class="pull-left"><i class="fas fa-child"></i><span
                        class="right-nav-text">   {{trans('Product_trans.Produits_enfants')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="stock-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('products.index')}}">    {{trans('Product_trans.Produits_enfants')}} </a> </li>
             
               

            </ul>
        </li>
         <!-- event-->
         <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#event-icon">
                <div class="pull-left"><i class="fas fa-calendar-alt"></i><span
                        class="right-nav-text">{{trans('Event_trans.event')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="event-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('events.index')}}">  {{trans('Event_trans.Step1')}}   </a> </li>
          
               
               
               

            </ul>
        </li>
        <li>
            <a href="{{route('admin.show')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text"> {{trans('Students_trans.personal_information')}}</span></a>
        </li> 

    </ul>
</div>