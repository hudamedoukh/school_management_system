@extends('admin.admin_master')
@section('admin')
@livewireStyles

    <div class="content-wrapper">
        <div class="container-full">
            <h4 class="text-info" style="margin-right: 20px">مرحبا بك : {{ auth()->user()->Name_Father }}</h4>
            <!-- Main content -->
            <section class="content">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="box overflow-hidden pull-up">
                                <div class="box-body">
                                    <div style="float:right">
                                        <i class="fa-solid fa-user-graduate"
                                            style='font-size:48px;color:rgb(30, 0, 255)'></i>
                                    </div>
                                    <div style="float:left">
                                        <p class="text-mute font-size-16">عدد الابناء</p>
                                        <h3 class="text-dark text-center mb-0 font-weight-500">
                                            {{ App\Models\Student::where('parent_id',auth()->user()->id)->count() }}</h3>
                                    </div>

                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top" style="
                                padding: 1rem;">
                                    <i class="fas fa-binoculars mr-1"  aria-hidden="true"></i><a href="{{ route('Students.index') }}"
                                        target="_blank" style="
                                        margin-right: 1rem;"><span class="text-danger">عرض البيانات</span></a>
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
                <livewire:calendar />
                @livewireScripts
    @stack('scripts')
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
