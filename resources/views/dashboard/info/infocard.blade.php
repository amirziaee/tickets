<div class="card w-100">
    <div class="card-body">
        <h5 class="card-title">اطلاعات</h5>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ url("uploads/$info->image_name") }}" class=" img-thumbnail rounded float-end "   style="width:100px;height:100px;">
            </div>

        </div>
        <div class="row">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <label for="fullname">نام و نام خانوادگی :</label>
                    <span>{{ $user->fullname ?? 'وارد نشده' }}</span>

                </li>

                <li class="list-group-item">
                    <label for="fullname">ایمیل :</label>
                    <span>{{ $user->email ?? 'وارد نشده' }}</span>
                </li>
                <li class="list-group-item">
                    <label for="fullname">سن :</label>
                    <span>{{ $info->age ?? 'وارد نشده'  }}</span>
                </li>
                <li class="list-group-item">
                    <label for="fullname">شهر :</label>
                    <span>{{ $info->city ?? 'وارد نشده' }}</span>
                </li>
                <li class="list-group-item">
                    <label for="fullname">کشور :</label>
                    <span>{{ $info->country ?? 'وارد نشده' }}</span>
                </li>
            </ul>
            

        </div>


          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('update.info',$info->id) }}" class="btn btn-primary btn-lg " tabindex="-1" role="button" aria-disabled="true">به روز رسانی</a>
          </div>
    </div>
</div>