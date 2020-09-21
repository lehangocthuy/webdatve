<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="lib/slick/slick.min.js"></script>

    <style>
body {
    color: #404E67;
    background: white;
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 800px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;  
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
/*table.table td .add {
    display: none;
}*/
/*table.table td .edit {
    display: none;
}*/
/*table.table td .delete {
    display: none;
}*/
</style>



    <script>

        $('.slick-doitac').slick({
            dots: true,
            infinite: false,
            speed: 300,
            dots: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            adaptiveHeight: true,
            focusOnSelect: false,
            slickNext: true,
            slickPrev: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $(document).ready(function(){
            $("#click-show-nav").click(function(){
                $(".nav-mobile").slideToggle();
            });
        });
    </script>

 

<!-- <script>
$("#button-xacnhan").click(function(){
    if(confirm("Bạn đã chắc chắn nhập chính xác các thông tin?")){
        $("#button-xacnhan").attr("href", "thongtinve");
    }
    else{
        return false;
    }
});
</script>  -->


<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/dest/js/jquery.validate.min.js"></script>


<script>
    // var catVal = document.getElementsByTagName("input")[0],
    //     cat = document.getElementById("categories");

    // // catVal.style.fontSize = "1.3em";

    // catVal.addEventListener("focus", function(event){
    //     $(catVal).dblclick().val("");
    // }, false);

</script>