@extends("layout.layout")
@section("content")
    <div>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter Name" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" placeholder="Enter Email" id="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" id="password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Enter Password" id="confirmPassword">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" placeholder="Enter Phone" id="phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea type="text" class="form-control" rows="5" placeholder="Enter Address" id="address"></textarea>
            </div>
            <div class="form-group">
                <label for="birth">Birthday</label>
                <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="name">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
               <label class="radio-inline"><input type="radio" id="rbMale" value="M" name="rbGender">Male</label>
                <label class="radio-inline"><input type="radio"  id="rbFemale" value="F" name="rbGender">Female</label>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection