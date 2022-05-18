<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

    @if ($show_table)
        @include('livewire.Parent_Tabel')
    @else
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                        class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-info' }}">1</a>
                    <p>معلومات الأب</p>

                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                        class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-info' }}">2</a>
                    <p>معلومات الأم </p>

                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                        class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-info' }}"
                        disabled="disabled">3</a>
                    <p>المرفقات و تأكيد المعلومات </p>
                </div>
            </div>
        </div>


        @include('livewire.Father_Form')

        @include('livewire.Mother_Form')


        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            @if ($currentStep != 3)
                <div style="display: none" class="row setup-content" id="step-3">
            @endif
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" style="color:red">المرفقات</label>

                        <input type="file" wire:model="photos" accept="image/*" multiple>
                    </div>
                    <br>

                    <input type="hidden" wire:model="Parent_id">

                    <h5>هل انت متاكد من حفظ البيانات ؟</h5><br>
                    <button class="btn btn-info nextBtn" type="button" wire:click="back(2)">السابق</button>
                    @if ($updateMode)
                        <button class="btn btn-info" wire:click="submitForm_edit" type="button">تعديل</button>
                    @else
                        <button class="btn btn-info" wire:click="submitForm" type="button">تأكيد الحفظ</button>
                    @endif


                </div>
            </div>
        </div>
</div>
@endif

</div>
