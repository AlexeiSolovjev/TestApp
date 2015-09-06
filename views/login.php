<form action="/?controller=registration&action=login" class="col-md-4 col-md-offset-4" id="form" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="exampleInputEmail1">
        <?php if (isset($errors['exampleInputEmail1'])):?>
            <span class="error" id="exampleInputEmail1-error"><?php echo $errors['exampleInputEmail1'];?></span>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="exampleInputPassword1">
        <?php if (isset($errors['exampleInputPassword1'])):?>
            <span class="error" id="exampleInputPassword1-error"><?php echo $errors['exampleInputPassword1'];?></span>
        <?php endif;?>
    </div>
    <button type="submit" class="btn btn-success submit">Submit</button>
</form>
<script src="https://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script>
    $(document).ready(function(){
        $("#form").validate({
            errorElement: 'span',
            rules: {
                exampleInputEmail1: {
                    required: true,
                    maxlength: 255,
                    email:true

                },
                exampleInputPassword1: {
                    required: true,
                    maxlength: 255,
                    minlenght: 6,
                },
            },
            messages: {
                exampleInputEmail1: {
                    required: 'This field is required',
                    maxlength: "Length can't be longer then 255 symbols",
                    email:"Email is invalid "
                },
                exampleInputPassword1: {
                    required: 'This field is required',
                    maxlength: "Length can't be longer then 255 symbols",
                    minlenght: "Length can't be longer then 6 symbols"
                },
            }
        });


