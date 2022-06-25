@extends('admin.admin_master')
@section('admin')
@livewireStyles

    <div class="content-wrapper">
        <div class="container-full">
            <h4 class="text-info" style="margin-right: 20px">مرحبا بك : {{ auth()->user()->name }}</h4>
            <!-- Main content -->
            <section class="content">
       
                <livewire:calendar />
                @livewireScripts
    @stack('scripts')
            </section>
            <!-- /.content -->
        </div>
    </div>
@endsection
