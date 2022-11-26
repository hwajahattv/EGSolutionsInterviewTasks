<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5" style="height: 600px">
    <form id="form" enctype="multipart/form-data">
        <div class="form-group">
            <label>Enter first number</label>
            <input type="text" name="num1" id="num1" class="form-control">
        </div>
        <div class="form-group">
            <label>Enter second number</label>
            <input type="text" id="num2" name="num2" class="form-control">
        </div>
        <div class="d-flex">
            <button class="btn btn-primary m-2" onclick="addition()">Add</button>
            <button class="btn btn-primary m-2" onclick="subtract()">subtract</button>
            <button class="btn btn-primary m-2" onclick="multiply()">multiply</button>
            <button class="btn btn-primary m-2" onclick="division()">divide</button>
            <input type="text" id="operator" name="operator" hidden>
<!--            <input type="submit" hidden>-->

        </div>
        <div class="bg-success">
            <h1 class="display-5 text-center">Result <span id="result"></span></h1>
        </div>
    </form>
</div>
<footer>
    <p class="text-center">Copyright @2022 | Designed by <a href="#">Muhammad Wajahat Hassan</a></p>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    function addition(){
         operation= "+";
        $('#operator').val("+");
        // $('#form').submit();
    }
    function subtract(){
         operation= "-";
        $('#operator').val("-");
        // $('#form').submit();

    }
    function multiply(){
         operation= "*";
        $('#operator').val("*");
        // $('#form').submit();

    }
    function division(){
         operation= "/";
        $('#operator').val("/");
        // $('#form').submit();

    }
    $(document).ready(function () {
            var operation;
        $('#form').submit(function(event) {
            event.preventDefault();
            var num1 = $("#num1")[0].value;
            var num2 = $("#num2")[0].value;
            if (num1 === "" || num2 === "")
            {
                alert("No field can be empty")
            }
            else if(isNaN(parseInt(num1)) || isNaN(parseInt(num2)))
            {
                alert("Only numbers are required")
            }
            else
            {
                var fdata = new FormData($('#form')[0]);
                console.log(fdata)
                console.log(operation);

                $.ajax({
                    url: "process.php",
                    type: "POST",
                    data: fdata,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        $('#result').text(response);
                    }
                });
            }
        })
    })


</script>
</body>

</html>