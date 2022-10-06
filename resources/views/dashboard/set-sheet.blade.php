<div class="modal fade" id="sheetSet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">বর্তমান শিট ঠিক করুন </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route("sheet.current.set")}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <div class="form-group">

                            <select class="form-control text-center" name="sheet_no">
                                <option value="0">শিট নাম্বার</option>
                                @if (isset($sheet_list[0]))
                                    @foreach ($sheet_list as $item)
                                        <option>{{ $item->sheet_no }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info radius-30 btn-lg btn-block">আপডেট করুন</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
