<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <script src="./bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <title>Sign Up</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark text-light mb-3 justify-content-center">
        <a class="navbar-brand" href="index.phtml">
            <h3>Register</h3>
        </a>
    </nav>
    <div class="container col-6 mb-4">
        <form action="signup.php" method="POST" id="signup">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input class="form-control" type="text" name="fname" id="fname" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input class="form-control" type='text' name="lname" id="lname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" required>
                <div class="invalid-feedback">Input Valid First Name</div>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input class="form-control" type="text" name="mobile" id="mobile" required>
            </div>
            <div class="form-group">
                <label for="state">State</label> 
                <select class="form-control" name="state" id="state" required>
                    <option value="">select state</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">City</label> 
                <select class="form-control" name="city" id="city" required>
                    <option value="">select city</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="confirm">Confirm Password</label>
                <input class="form-control" type="password" name="confirm" id="confirm" required>
            </div>
            <br>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <br>
            <button class="btn btn-primary col-3" type="submit" id="submit_btn">Submit</button>
            <button class="btn btn-danger col-3" type="reset">Reset</button>
        </form>
    </div>
    <script>
        var state_city_list = {
            Maharashtra : ['Pune','Mumbai','Solapur'],
            Karnataka : ['Banglore','Mysore'],
            Gujrat: ['Ahmedabad','Surat'],
        }
        var state_op = document.getElementById('state');
        var city_op = document.getElementById('city');
        $(document).ready(function(){
            $('.alert').hide();
            populate_states();
        })
        function populate_states(){
            let state_list = Object.keys(state_city_list);
            state_op.innerHTML = "<option value=''>select state</option>";
            for(let i in state_list){
                state_op.innerHTML = state_op.innerHTML+"<option value="+state_list[i]+">"+state_list[i]+"</option>";
            }
            $(state_op).change(function(){
                populate_cities(state_city_list[state_op.options[state_op.selectedIndex].text])
            })
        }

        function populate_cities(cities){
            city_op.innerHTML = "<option value=''>select city</option>";
            for(let city in cities){
                city_op.innerHTML = city_op.innerHTML+"<option value="+cities[city]+">"+cities[city]+"</option>"
            }
        }

        document.getElementById('submit_btn').addEventListener('click', function(e){
            e.preventDefault();
            console.log("Validating form..");
            let email_pattern1 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            let email_pattern2 = /\S+@\S+\.\S+/;
            var form =document.getElementById("signup");
            var fname = document.getElementById('fname')
            var lname = document.getElementById('lname')
            var email = document.getElementById('email');
            var mobile = document.getElementById('mobile');
            var state = document.getElementById('state');
            var city = document.getElementById('city');
            var password = document.getElementById('password');
            var confirm = document.getElementById('confirm');
            $(".alert").show();
            $(".alert").empty();
            if(fname.value && lname.value && email.value && mobile.value && state.value && city.value && password.value){
                if(email_pattern1.test(email.value)){
                    if(email_pattern2.test(email.value)){
                        if(mobile){
                            if(/[987]{1}[0-9]{9}/.test(mobile.value)){
                                if(password.value === confirm.value){
                                    form.submit();
                                }
                                else{
                                    $(".alert").append("<span>Passowrds don't match</span><br>");
                                }
                            }else{
                                $(".alert").append("<span>Invalid Contact</span><br>");
                            }
                        }
                    }
                    else{
                        $(".alert").append("<span>Invalid Email</span><br>");
                    }
                } else{
                    $(".alert").append("<span>Invalid Email</span><br>");
                }
            }
            else{
                $(".alert").append("<span>All fields are required!!</span><br>");
            }
        });
    </script>
</body>
</html>