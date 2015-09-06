<form action="/?controller=registration&action=register" class="col-md-4 col-md-offset-4" id="form" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control" id="exampleInputName" placeholder="Name" name="exampleInputName" >
        <?php if (isset($errors['exampleInputName'])):?>
            <span class="error" id="exampleInputName-error"><?php echo $errors['exampleInputName'];?></span>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label for="exampleInputSurname">Surname</label>
        <input type="text" class="form-control" id="exampleInputSurname" placeholder="Surname" name="exampleInputSurname">
        <?php if (isset($errors['exampleInputSurname'])):?>
            <span class="error" id="exampleInputSurname-error"><?php echo $errors['exampleInputSurname'];?></span>
        <?php endif;?>
    </div>
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
    <div class="form-group">
        <label for="exampleInputRepeatPassword1">Repeat Password</label>
        <input type="password" class="form-control" id="exampleInputRepeatPassword1" placeholder="RepeatPassword" name="exampleInputRepeatPassword1" >
        <?php if (isset($errors['exampleInputRepeatPassword1'])):?>
            <span class="error" id="exampleInputRepeatPassword1-error"><?php echo $errors['exampleInputRepeatPassword1'];?></span>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Avatar</label>
        <input type="file" id="exampleInputFile" name="exampleInputFile">
        <?php if (isset($errors['exampleInputFile'])):?>
            <span class="error" id="exampleInputFile-error"><?php echo $errors['exampleInputFile'];?></span>
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
                exampleInputName: {
                    required: true,
                    maxlength: 50,

                },
                exampleInputSurname: {
                    required: true,
                    maxlength: 50,

                },
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
                exampleInputRepeatPassword1: {
                    required: true,
                    equalTo: '#exampleInputPassword1'
                },
                exampleInputFile: {
                    extension: "gif|jpg|png|jpeg"
                },
            },
            messages: {
                exampleInputName: {
                    required: 'This field is required',
                    maxlength: "Length can't be longer then 50 symbols"

                },
                exampleInputSurname: {
                    required: 'This field is required',
                    maxlength: "Length can't be longer then 50 symbols"

                },
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
                exampleInputRepeatPassword1: {
                    required: 'This field is required',
                    equalTo: 'Password is not equal'
                },
                exampleInputFile: {
                    extension:"Invalid file extension"
                },
            }
        });
//        $('.submit').on('click', function(e){
//            e.preventDefault();
//            $('#form').validate();
//            if($('#form').valid()){
//                $('#form').submit();
//            }
//        })
    })
</script>