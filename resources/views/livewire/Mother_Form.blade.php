@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="form-row form-group">
            <div class="col-md-6">
                <label for="title">اسم الأم</label>
                <input type="text" wire:model="Name_Mother" class="form-control">
                @error('Name_Mother')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="title">وظيفة الأم</label>
                <input type="text" wire:model="Job_Mother" class="form-control">
                @error('Job_Mother')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row form-group">


            <div class="col">
                <label for="title">رقم الهوية</label>
                <input type="text" wire:model="National_ID_Mother" class="form-control">
                @error('National_ID_Mother')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col">
                <label for="title">رقم الهاتف</label>
                <input type="text" wire:model="Phone_Mother" class="form-control">
                @error('Phone_Mother')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">عنوان الأم</label>
            <textarea class="form-control" wire:model="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('Address_Mother')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-info nextBtn" type="button" wire:click="back(1)">
            السابق
        </button>
        @if ($updateMode)
            <button class="btn btn-info nextBtn" type="button" wire:click="secondStepSubmit_edit">التالي</button>
        @else
            <button class="btn btn-info nextBtn" type="button" wire:click="secondStepSubmit">التالي</button>
        @endif


    </div>
</div>
</div>
