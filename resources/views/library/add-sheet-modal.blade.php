
  <div class="modal fade" id="sheetAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">শিট যোগ কর</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{route("sheet.store")}}" >

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-body">
                    <div class="form-group">
                        <small>শিট নাম্বার</small>
                        <input type="number" class="form-control  radius-30" name="sheet_no" required>
                    </div>
                    <div class="form-group">
                        <small>শিটের মূলধন</small>
                        <input type="number" class="form-control radius-30" name="capital" required>
                    </div>
                    <div class="form-group">
                        <small>শিট শুরু তারিখ</small>
                        <input type="date" class="form-control  radius-30" name="start_date" value="{{date('Y-m-d')}}" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info radius-30 btn-lg btn-block">তৈরি করুন</button>
                    </div>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>
