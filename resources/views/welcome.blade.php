<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Door Step</title>

    <style>
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

        .mainDiv {
            width: 100%;
            min-height: 100vh;
            background-image: url("/images/deliveryman.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            display: flex;
            justify-content: center;
        }

        .container {
            padding-top: 10%;
            width: 100%;
            max-width: 1000px;
        }

        .container>h3 {
            width: fit-content;
            font-weight: 300;
            background-color: white;
            padding: 5px;
        }

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

    </style>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.session@1.0.0/jquery.session.min.js"></script>

    <script>
        $(document).ready(function() {
            if ($.session.get('user') != null) {
                $('#login').hide();
                $('#register').hide();

            } else {
                $('#profile').hide();

            }
        });
    </script>
</head>

<body>
    <nav class="navbar">
        <div class="navcontainer">
            <a href="/">
                <div class="nav">DoorStep</div>
            </a>
            <div class="logReg">
                <a id="login" href="/login">
                    <div class="nav">Login</div>
                </a>
                <a id="register" href="/register">
                    <div class="nav">Register</div>
                </a>
                <a id="profile" href="/userprofile">
                    <div class="nav">Profile</div>
                </a>
            </div>
        </div>
    </nav>
    <div class="mainDiv" }>
        <div class="container">
            <h3>
                You Stay At Home,
                <br />
                we deliver
            </h3>
        </div>
        <div>{{ Session::get('user') }}</div>
    </div>
</body>

</html>
