@if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <div class="form-row form-group">
            <div class="col">
                <label for="title">البريد الالكتروني</label>
                <input type="email" wire:model="Email" class="form-control">
                @error('Email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="title">كلمة المرور</label>
                <input type="password" wire:model="Password" class="form-control">
                @error('Password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row form-group">
            <div class="col-md-6">
                <label for="title">اسم الأب</label>
                <input type="text" wire:model="Name_Father" class="form-control">
                @error('Name_Father')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="title">وظيفة الاب</label>
                <input type="text" wire:model="Job_Father" class="form-control">
                @error('Job_Father')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row form-group">

            <div class="col">
                <label for="title">رقم الهوية</label>
                <input type="text" wire:model="National_ID_Father" class="form-control">
                @error('National_ID_Father')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col">
                <label for="title">رقم الهاتف</label>
                <input type="text" wire:model="Phone_Father" class="form-control">
                @error('Phone_Father')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">عنوان الأب</label>
            <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('Address_Father')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if ($updateMode)
            <button class="btn btn-info nextBtn" wire:click="firstStepSubmit_edit" type="button">التالي
            </button>
        @else
            <button class="btn btn-info nextBtn" wire:click="firstStepSubmit" type="button">التالي
            </button>
        @endif


    </div>
</div>
</div>
