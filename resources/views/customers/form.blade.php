
<div class="form-group" >
    <lable for="name">Name:</lable>
    <input type="text" name="name" value="{{old('name') ?? $customer->name}}">
    <div>{{$errors->first('name')}}</div>
</div>
<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" name="email" value="{{old('email') ?? $customer->email}}">
    <div>{{$errors->first('email')}}</div>
</div>

<div>

</div>

<div class="form-group">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>
        @foreach($customer->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option value="{{$activeOptionKey}}" {{$customer->active == $activeOptionValue ? 'selected' : ''}}>{{$activeOptionValue}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        @foreach($companies as $company)
            <option value="{{$company->id}}" {{$company->id == $customer->company_id ? 'selected' : ''}}>{{$company->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group d-flex flex-column">
    <label for="image">Profile Image</label>
    <input type="file" name="image" class="py-3">
    <div>{{$errors->first('image')}}</div>
</div>
@csrf
