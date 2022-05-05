<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <style>
        /* navbar */
        .navbar {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .navcontainer {
            background-color: rgb(255, 255, 255, 0.8);
            top: 0px;
            z-index: 10;
            position: fixed;
            width: 100%;
            max-width: 1000px;
            box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
            display: flex;
            justify-content: space-between;
        }

        .nav {
            padding: 1rem 0.8rem;
            cursor: pointer;
        }

        .nav:hover {
            background-color: rgb(237, 250, 255);
        }

        .logReg {
            display: flex;
            gap: 5px;
            font-size: 0.8rem;
        }


        /* Body */
        html,
        body {
            padding: 0;
            margin: 0;
            font-family: -apple-system, BaMacSystemFont, Segoe UI, Roboto, Oxygen,
                Ubuntu, Cantarell, Fira Sans, Droid Sans, Helvetica Neue, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        * {
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
        }

        /* Login */
        .mainDiv {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 4rem 10px;
        }

        .headerDiv {
            width: 100%;
            max-width: 1000px;
            margin-bottom: 20px;
        }

        .headerDiv>h3 {
            font-weight: 400;
        }

        .container {
            max-width: 1000px;
            width: 100%;

        }

        .itemRow {
            max-width: 1000px;
            width: 100%;
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            padding: 10px;
            place-items: center;
        }

        .itemRow>* {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            aspect-ratio: 1/1;
            max-width: 200px;
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 5px;
            text-align: center;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
                rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
        }

        .itemRow>span>span {
            padding: 10px 5px;
            background-color: white;
            text-align: center;
        }

        .itemRow>span>span {

            display: grid;
        }

        .priceSpan {
            margin-left: auto;
        }

        .container>form {
            padding: 40px 0px;
        }

        .imgDiv {
            background-image: url("/images/deliveryman.png");
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .inputDiv>input {
            padding: 5px 0px;
            width: 100%;
            margin: 10px 0px;
            display: block;
            border: none;
            border-bottom: 1px solid black;
        }

        .inputDiv>input:hover {
            border-bottom: 2px solid black;
        }

        .controlDiv {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .controlDiv>input {
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: lighter;
            outline: none !important;
        }

        .controlDiv>input:hover {
            font-weight: 400;
            background-color: white;
        }

        .controlDiv>input:focus {
            box-shadow: none;
        }

        .forgotPassword {
            text-decoration: underline;
            font-size: 0.85rem;
            cursor: pointer;
            color: rgb(0, 119, 255);
        }

        .logReg {
            font-size: 0.8rem;
        }

        .logReg>span {
            text-decoration: underline;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px) {
            .mainDiv {
                background-image: url("/images/deliveryman.png");
                background-position: center;
                background-size: contain;
                background-repeat: no-repeat;
            }

            .container {
                background-color: rgb(255, 255, 255, 0.7);
                grid-template-columns: auto;
            }

            .imgDiv {
                display: none;
            }
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>
    <script>
        $(document).ready(function() {
            if ($.session.get('user') == undefined) {
                window.location.replace("/login");
            }

            $("#phone").attr("value", $.session.get('phone'));
            $("#addr").attr("value", $.session.get('addr'));



            $.ajax({
                mode: 'no-cors',
                url: 'http://localhost:3000',
                headers: {
                    'Content-Type': 'application/json'
                },
                crossDomain: true,
                type: "GET",
                /* or type:"GET" or type:"PUT" */
                dataType: "json",
                success: function(result) {
                    for (var i = 0; i < result.length; i += 2) {
                        if (i + 1 < result.length)
                            $('.container').append(
                                `<div class="itemRow"><span style="background-image: url(${'/images/deliveryman.png'});"><span class="priceSpan">$${result[i].price}</span><span><span>${result[i].name}</span></span></span> <span style="background-image: url(${'/images/deliveryman.png'});"><span class="priceSpan">$${result[i+1].price}</span><span><span>${result[i+1].name}</span></span></div>`
                            )
                        else
                            $('.container').append(
                                `<div class="itemRow"><div class="itemRow"><span style="background-image: url(${'/images/deliveryman.png'});"><span class="priceSpan">$${result[i].price}</span><span><span>${result[i].name}</span><span>${result[i].category}</span></span></span></div>`
                            )
                    }

                },
                error: function(xr, err, stats) {
                    console.log(xr);
                }
            });
        })
    </script>
</head>

<body>
    <nav class="navbar">
        <div class="navcontainer">
            <a href="/">
                <div class="nav">DoorStep</div>
            </a>
            <div class="logReg">
                <a href="/userprofile">
                    <div class="nav">Profile</div>
                </a>
                <a href="/login">
                    <div class="nav">Log out</div>
                </a>
            </div>
        </div>
    </nav>
    <div class="mainDiv">
        <div class="headerDiv">
            <h3>Groceries</h3>
        </div>
        <div class="container">

        </div>
    </div>
</body>

</html>
