<div class="modal fade" id="ojunAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ওজন যোগ কর</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('baccha.ojun.store') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-body">
                        <div class="form-group">
                            <small>শিট নাম্বার</small><span class="text-danger">*</span>
                            <select class="form-control radius-30" name="sheet_no">
                                @if (isset($sheet_list[0]))
                                    @foreach ($sheet_list as $item)
                                        @if ($item->sheet_no == session('current_sheet'))
                                            <option selected>{{ $item->sheet_no }}</option>
                                        @else
                                            <option>{{ $item->sheet_no }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <small>পরিমান</small><span class="text-danger">*</span>
                            <input type="number" class="form-control radius-30" name="qty" required>
                        </div>
                        <div class="form-group">
                            <small>বয়স</small><span class="text-danger">*</span>
                            <input type="number" class="form-control radius-30" name="age">
                        </div>
                        <div class="form-group">
                            <small>ওজন</small><span class="text-danger">*</span>
                            <input type="text" class="form-control radius-30" name="kg">
                        </div>
                        <div class="form-group">
                            <small>তারিখ</small>
                            <input type="date" class="form-control radius-30" name="date"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info radius-30 btn-lg btn-block">যোগ করুন</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
