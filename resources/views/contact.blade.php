<!doctype html>
<html lang="en">

<head>
    <title>Contact Me</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mt-3">
        <form action="" id="contact_form">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="phone_no">Contact Number</label>
                        <input type="number" name="phone_no" id="phone_no" class="form-control"
                            placeholder="Contact Number">
                    </div>
                </div>
                <div class="col-12">
                    <label for="mssg">Message</label>
                    <textarea name="mssg" id="mssg" cols="30" rows="10" placeholder="Message"
                        class="form-control"></textarea>
                </div>
            </div>


            <div class="col-12 mt-5" id="questionAnswer">
                <input type="hidden" id="randvalue" value="{{rand(1,5)}}">
                <label for="question">Please give short answers <span class="text-danger">*</span></label><br>
                <div class="question1" style="display:none">
                    <label for=""><strong>Q .</strong> <span>What is this text color</span> "<span
                            class="text-danger">RED</span>". </label>
                    <input type="text" id="1Question" class="form-control" onblur="answer1()">
                    <span class="text-danger mt-2 errormssg1" style="display:none">Wrong input, please input
                        again.</span>
                </div>
                <div class="question2" style="display: none">
                    <label for=""><strong>Q .</strong> <span>Write this number</span> "<span class="">6</span>".
                    </label>
                    <input type="text" id="2Question" class="form-control" onblur="answer2()">
                    <span class="text-danger mt-2 errormssg2" style="display:none">Wrong input, please input
                        again.</span>

                </div>
                <div class="question3" style="display: none">
                    <label for=""><strong>Q .</strong> <span>What is this text color</span> "<span
                            class="text-success">GREEN</span>". </label>
                    <input type="text" id="3Question" class="form-control" onblur="answer3()">
                    <span class="text-danger mt-2 errormssg3" style="display:none">Wrong input, please input
                        again.</span>

                </div>
                <div class="question4" style="display: none">
                    <label for=""><strong>Q .</strong> <span>6 + 2 = ?</span> </label>
                    <input type="text" id="4Question" class="form-control" onblur="answer4()">
                    <span class="text-danger mt-2 errormssg4" style="display:none">Wrong input, please input
                        again.</span>

                </div>
                <div class="question5" style="display: none">
                    <label for=""><strong>Q .</strong> <span>Please write the word</span> "<span
                            class="">CONFIRM</span>". </label>
                    <input type="text" id="5Question" class="form-control" onblur="answer5()">
                    <span class="text-danger mt-2 errormssg5" style="display:none">Wrong input, please input
                        again.</span>

                </div>
            </div>

            <div class="col-12 text-center m-5">
                <button type="submit" class="btn btn-outline-success  submitContactBtn" disabled
                    style="cursor: not-allowed">Submit
                </button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
        $( document ).ready(function() {
            var randomvalue = $('#randvalue').val();
            if(randomvalue ==1){
                $('.question1').css('display','block');
            }
            if(randomvalue ==2){
                $('.question2').css('display','block');
            }
            if(randomvalue ==3){
                $('.question3').css('display','block');
            }
            if(randomvalue ==4){
                $('.question4').css('display','block');
            }
            if(randomvalue ==5){
                $('.question5').css('display','block');
            }
        });



        function answer1(){
            var answer1 = $('#1Question').val();
            if(answer1 =='RED' || answer1=='red'){
                $(".submitContactBtn").attr("disabled", false);
                $(".submitContactBtn").css("cursor", 'pointer');
                $('.errormssg1').css('display','none');

            }else{
                $('.errormssg1').css('display','block');
            }
        }
        function answer2(){
            var answer2 = $('#2Question').val();
            if(answer2 =='6'){
                $(".submitContactBtn").attr("disabled", false);
                $(".submitContactBtn").css("cursor", 'pointer');
                $('.errormssg2').css('display','none');

            }else{
                $('.errormssg2').css('display','block');
            }
        }
        function answer3(){
            var answer3 = $('#3Question').val();
            if(answer3 =='GREEN' || answer3 =='green'){
                $(".submitContactBtn").attr("disabled", false);
                $(".submitContactBtn").css("cursor", 'pointer');
                $('.errormssg3').css('display','none');

            }else{
                $('.errormssg3').css('display','block');
            }
        }
        function answer4(){
            var answer4 = $('#4Question').val();
            if(answer4 =='8'){
                $(".submitContactBtn").attr("disabled", false);
                $(".submitContactBtn").css("cursor", 'pointer');
                $('.errormssg4').css('display','none');

            }else{
                $('.errormssg4').css('display','block');
            }
        }
        function answer5(){
            var answer5 = $('#5Question').val();
            if(answer5 =='CONFIRM' || answer5 =='confirm'){
                $(".submitContactBtn").attr("disabled", false);
                $(".submitContactBtn").css("cursor", 'pointer');
                $('.errormssg5').css('display','none');

            }
            else{
                $('.errormssg5').css('display','block');
            }
        }

    </script>
</body>

</html>