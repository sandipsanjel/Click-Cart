<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce project</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>

<body>
    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}

    {{-- khalti payment gateway --}}
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_8a1d0dba00c14d888a81d54e3cef6bad",
            "productIdentity": "1234567890",
            "productName": "yatri bike",
            "productUrl": "http://localhost:8000/detail/1",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                    if (payload.idx){
                        $.ajaxSetup({
                         headers:{
                            'X-CSRF-TOKEN':'{{csrf_token()}}'
                         }
                        });
                        //ajax setup to verify the transaction order
                        $.ajax({
                            method:'post',
                            url:"{{route('ajax.khalti.verfy_order')}}",
                            data: payload,

                            success:function (respose){
                                if (response.success==1){
                                    window.location=response.redirecto;
                                }else{
                                    checkout.hide();
                                }
                            },
                            error: function(data){
                                console.log('Error:',data);
                            }
                        })
                    }
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>
</body>
{{-- <script>
$(document ).ready(function()
{
   $("button").click(function()
   {
    alert("this is to check if jquery working well or not ")
})
} )
</script> --}}
<style>
    .custom-login {
        height: 500%;
        padding-top: 10px;
        width: 50%;
        margin-left:50px
    }
    img.slider-img{
        height:400px !important;
    }
    .custom-procuct{
        height:600px;
    }
    .slider-text{
     color: #080909 !important;
    }
    .trending-image{
        height:100px;
    }
    .trending-item{
        float: left;
        width:20%;
    }
    .trending-wrapper{
        margin:30px
    }
    .detail-img{
        height:200px
    }
    .cart-border
    {
        border-bottom:1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom:20px;
    }
</style>

</html>
